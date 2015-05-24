(function($){
    $.fn.validationEngineLanguage = function(){
    };
    $.validationEngineLanguage = {
        newLang: function(){
            $.validationEngineLanguage.allRules = {
                "required": {
                    "regex": "none",
                    "alertText": "* Ce champ est requis",
                    "alertTextCheckboxMultiple": "* Choisir une option",
                    "alertTextCheckboxe": "* Cette option est requise"
                },
                "requiredInFunction": { 
                    "func": function(field, rules, i, options){
                        return (field.val() == "test") ? true : false;
                    },
                    "alertText": "* Field must equal test"
                },
               "minSize": {
                    "regex": "none",
                    "alertText": "* Minimum ",
                    "alertText2": " caractères requis"
                },
				"groupRequired": {
                    "regex": "none",
                    "alertText": "* Vous devez remplir un des champs suivant"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "* Maximum ",
                    "alertText2": " caractères requis"
                },
		        "min": {
                    "regex": "none",
                    "alertText": "* Valeur minimum requise "
                },
                "majority": {
                    "func": function(field, rules, i, options){
                        var today = new Date();
                        var birthDate = parseFloat(field.val());
                        var birthDate = new Date(birthDate);
                        var age = today.getFullYear() - birthDate.getFullYear();
                        var m = today.getMonth() - birthDate.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }
                        if(age<18)
                        {
                            var rule = options.allrules.majority;
                            return rule.alertText + 'TOTO'+age;
                        }
                    },
                    "alertText": "* Vous devez avoir au moins 18 ans pour acceder à nos services"
                },
                "max": {
                    "regex": "none",
                    "alertText": "* Valeur maximum requise "
                },
		        "past": {
                    "regex": "none",
                    "alertText": "* Date antérieure au "
                },
                "future": {
                    "regex": "none",
                    "alertText": "* Date postérieure au "
                },
                "maxCheckbox": {
                    "regex": "none",
                    "alertText": "* Nombre max de choix excédé"
                },
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "* Veuillez choisir ",
                    "alertText2": " options"
                },

                "equals": {
                    "regex": "none",
                    "alertText": "* Votre champ n'est pas identique"
                },
                "equalspassword": {
                    "regex": "none",
                    "alertText": "* Les deux nouveaux mot de passe saisis ne sont pas identiques"
                },
                "creditCard": {
                    "regex": "none",
                    "alertText": "* Numéro de carte bancaire valide"
                },
                "phone": {
                    // credit: jquery.h5validate.js / orefalo
                    "regex": /^([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9 \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)$/,
                    "alertText": "* Numéro de téléphone invalide"
                },
               "email": {
                    // Shamelessly lifted from Scott Gonzalez via the Bassistance Validation plugin http://projects.scottsplayground.com/email_address_validation/
                    "regex": /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
                    "alertText": "* Adresse email invalide"
                },
                "integer": {
                    "regex": /^[\-\+]?\d+$/,
                    "alertText": "* Nombre entier invalide"
                },
                "number": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "* Nombre flottant invalide"
                },
                "passwordLength": {
                    "regex": /^.{6,50}$/,
                    "alertText": "* Ce champs doit avoir minimum 6 caractères"
                },
                "fieldLength": {
                    "regex": /^(\d{3})((?=[a-zA-Z]{2,})([a-zA-Z ]{50}))(\d{8})$/,
                    "alertText": "* Ce champs doit avoir minimum 2 caractères"
                },
                "codePostalLength": {
                    "regex": /^[0-9]{4,5}$/,
                    "alertText": "* Ce champs doit avoir 5 caractères"
                },

                "date": {
                    //"regex": /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/equals[password]((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/,
                    "regex": /^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/,
                    "alertText": "* Date invalide, format DD-MM-YYYY requis"
                },
                "ipv4": {
                	"regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    "alertText": "* Adresse IP invalide"
                },
                "url": {
                    "regex": /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
                    "alertText": "* URL invalide"
                },
                "onlyNumberSp": {
                    "regex": /^[0-9\ ]+$/,
                    "alertText": "* Seuls les chiffres sont acceptés"
                },
                "onlyImageFile": {
                    "regex":/^.*(\.[Jj][Pp][Gg]|\.[Gg][Ii][Ff]|\.[Jj][Pp][Ee][Gg]|\.[Pp][Nn][Gg]|\.[Tt][Ii][Ff][Ff])$/,
                    "alertText": "* Seuls les fichiers au format jpeg, png, jpg, gif, tiff sont autorisés"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\u00C0-\u00D6\u00D9-\u00F6\u00F9-\u00FD\ \']+$/,
                    "alertText": "* Seules les lettres sont acceptées"
                },
                "onlyLetterNumber": {
                    "regex": /^[0-9a-zA-Z\u00C0-\u00D6\u00D9-\u00F6\u00F9-\u00FD]+$/,
                    "alertText": "* Aucun caractère spécial n'est accepté"
                },

				// --- CUSTOM RULES -- Those are specific to the demos, they can be removed or changed to your likings
                "ajaxUserCall": {
                    "url": "ajaxValidateFieldUser",
                    "extraData": "name=eric",
                    "alertTextLoad": "* Chargement, veuillez attendre",
                    "alertText": "* Ce nom est déjà pris"
                },
                "ajaxNameCall": {
                    "url": "ajaxValidateFieldName",
                    "alertText": "* Ce nom est déjà pris",
                    "alertTextOk": "*Ce nom est disponible",
                    "alertTextLoad": "* Chargement, veuillez attendre"
                },
                "validate2fields": {
                    "alertText": "Veuillez taper le mot HELLO"
                }
            };
        }
    };
    $.validationEngineLanguage.newLang();
})(jQuery);