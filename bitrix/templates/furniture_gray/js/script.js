// Install script dataType
jQuery.ajaxSetup({
	accepts: {
		script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
	},
	contents: {
		script: /(?:java|ecma)script/
	},
	converters: {
		"text script": function( text ) {
			jQuery.globalEval( text );
			return text;
		}
	}
});
function setEqualHeight(columns) {
    var tallestcolumn = 0;
    columns.each(function () {
        currentHeight = $(this).height();
        if (currentHeight > tallestcolumn) {
            tallestcolumn = currentHeight;
        }
    });
    columns.height(tallestcolumn);
}
// Handle cache's special case and crossDomain
jQuery.ajaxPrefilter( "script", function( s ) {
	if ( s.cache === undefined ) {
		s.cache = false;
	}
	if ( s.crossDomain ) {
		s.type = "GET";
	}
});

// Bind script tag hack transport
jQuery.ajaxTransport( "script", function( s ) {
	// This transport only deals with cross domain requests
	if ( s.crossDomain ) {
		var script, callback;
		return {
			send: function( _, complete ) {
				script = jQuery("<script>").prop({
					async: true,
					charset: s.scriptCharset,
					src: s.url
				}).on(
					"load error",
					callback = function( evt ) {
						script.remove();
						callback = null;
						if ( evt ) {
							complete( evt.type === "error" ? 404 : 200, evt.type );
						}
					}
				);
				document.head.appendChild( script[ 0 ] );
			},
			abort: function() {
				if ( callback ) {
					callback();
				}
			}
		};
	}
});


    $(function() {
        $("input[name='contact_phone']").blur(function() {
            if ($(this).val().length >= 0 && ($(this).val().length < 10)) {
                $(this).addClass("selected").removeClass('selected_ok');
            }
            else {
                $(this).addClass("selected_ok").removeClass('selected');
            }
        });
        $("input[name='contact_name']").blur(function() {
            if ($(this).val().length < 1) {
                $(this).addClass("selected").removeClass('selected_ok');
            }
            else {
                $(this).addClass("selected_ok").removeClass('selected');
            }
        });
        $("input[name='contact_email']").blur(function() {
        var myRe = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
        var myArray = myRe.exec($(this).val());
        if (myArray == null) {
            $(this).addClass("selected").removeClass('selected_ok');
        }
            else {
         $(this).addClass("selected_ok").removeClass('selected');
            }
        });
    });
function progressHandlingFunction(e) {
    if (e.lengthComputable) {
        $('progress').attr({value: e.loaded, max: e.total});
    }
}
$(document).ready(function(){
    $('.feedback-form').submit(function(){
            var okay = 0;
            var this_el = $(this).attr('id');
            var name = $(this).find("input[name='contact_name']").val();
            var phone = $(this).find("input[name='contact_phone']").val();
            var email = $(this).find("input[name='contact_email']").val();
            var detail = $(this).find("textarea[name='detail']").val();
            var time = $(this).find("input[name='contact_time']").val();
            var title = $(this).find("input[name='title']").val();
            var form = $(this).attr("name");
            if(form == 'form' && name && phone) {
                okay = 1;
            }
            else if(form == 'form1' && name && phone && email || form == 'form3' && name && phone && email || form == 'form4' && name && phone && email) {
                okay = 1;
            }
            else if(form == 'form2' && name && phone && email) {
                okay = 1;
            }
        if (name.length < 1) {
            $(this).find("input[name='contact_name']").addClass("selected");
        }
        if (phone.length < 10) {
            $(this).find("input[name='contact_phone']").addClass("selected");
        }
        if (form != 'form' && email.length < 1) {
            $(this).find("input[name='contact_email']").addClass("selected");
        }
        var myRe = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
        var myArray = myRe.exec(email);
        if (email && myArray == null) {
            $(this).find("input[name='contact_email']").addClass("selected");
        }
        else if (okay){
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: '/ajax/company_feedback.php',
               xhr: function() {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Check if upload property exists
                        myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                    }
                    return myXhr;
                },
                // Form data
                data: formData,
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data == '1') $('#' + this_el + ' .sent_message').show();
                    $('#' + this_el).trigger('reset');
                    if($('.popup_3').hide()) $('.popup_3 #' + this_el + ' .sent_message').hide();
                    if($('.popup_2').hide()) $('.popup_2 #' + this_el + ' .sent_message').hide();
                    if($('.popup_1').hide()) $('.popup_1 #' + this_el + ' .sent_message').hide();
                    
                    $('#login_form').hide();
                }
            });
        }
        return false;
    });


    setEqualHeight($('.content .sistem li'));
    setEqualHeight($('.content .sistem li a'));
});
