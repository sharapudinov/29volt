/*
// Install script dataType
jQuery.ajaxSetup({
    accepts: {
        script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
    },
    contents: {
        script: /(?:java|ecma)script/
    },
    converters: {
        "text script": function (text) {
            jQuery.globalEval(text);
            return text;
        }
    }
});

// Handle cache's special case and crossDomain
jQuery.ajaxPrefilter("script", function (s) {
    if (s.cache === undefined) {
        s.cache = false;
    }
    if (s.crossDomain) {
        s.type = "GET";
    }
});

// Bind script tag hack transport
jQuery.ajaxTransport("script", function (s) {
    // This transport only deals with cross domain requests
    if (s.crossDomain) {
        var script, callback;
        return {
            send: function (_, complete) {
                script = jQuery("<script>").prop({
                    async: true,
                    charset: s.scriptCharset,
                    src: s.url
                }).on(
                    "load error",
                    callback = function (evt) {
                        script.remove();
                        callback = null;
                        if (evt) {
                            complete(evt.type === "error" ? 404 : 200, evt.type);
                        }
                    }
                );
                document.head.appendChild(script[0]);
            },
            abort: function () {
                if (callback) {
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
 $(document).ready(function(){
 $('#company_feedback').submit(function(){
 var name = $(this).find("input[name='contact_name']").val();
 var phone = $(this).find("input[name='contact_phone']").val();
 var email = $(this).find("input[name='contact_email']").val();
 var detail = $(this).find("textarea[name='comp_form_detail']").val();
 var title = $(this).find("input[name='title']").val();
 if (name.length < 1) {
 $("input[name='contact_name']").addClass("selected");
 }
 if (phone.length < 10) {
 $("input[name='contact_phone']").addClass("selected");
 }
 var myRe = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
 var myArray = myRe.exec(email);
 if (myArray == null) {
 $("input[name='contact_email']").addClass("selected");
 }
 else {
 $.ajax({
 type: "POST",
 url: '/ajax/company_feedback.php',
 data: ({
 name: name,
 phone: phone,
 email: email,
 detail: detail,
 title: title
 }),
 success: function(data) {
 alert(data);
 if(data == '1') $('.sent_message').show();
 $('#company_feedback').trigger('reset');
 }
 });
 }
 return false;
 });
 });



function requiredCheck(selector) {
    var error = false;
    $(selector).css('position', 'relative');
    $(selector + ' .required').removeClass('r_error');
    $(selector + ' .required').each(function (i, el) {
        if ($(el).hasClass('r_phone')) {
            var myRe = /^((8|\+3|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,11}$/i;
            if (!myRe.exec($(el).val())) {
                error = true;
                $(el).addClass('r_error');
            }
        }
        else if ($(el).hasClass('r_email')) {
            if ($(el).val().length) {
                var myRe = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
                if (!myRe.exec($(el).val())) {
                    error = true;
                    $(el).addClass('r_error');
                    //$(el).val('').attr('placeholder','E-mail ������ �����������');
                }
            }
            else {
                error = true;
                $(el).addClass('r_error');
                $(el).val('').attr('placeholder', '���� E-mail �� ������ ���� ������');
            }
        }
        else {
            if (!$(el).val().length) {
                error = true;
                $(el).addClass('r_error');
                $(el).val('').attr('placeholder', '���� �� ������ ���� ������');
            }
        }
    });
    return error;
}
*/
