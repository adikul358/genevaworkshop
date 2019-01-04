jQuery(document).ready(function($) {
  "use strict";

  //Contact
  $('form.contactForm').submit(function() {
    $("#sendmessage").removeClass("show");
    $("#errormessage").removeClass("show");

    var f = $(this).find('.form-group'),
      ferror = false,
      emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
    var phoneExp = /^[0-9]*$/;

    f.children('input').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (! i.is(':checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'phone':
            if (i.val().length < 10 || !phoneExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    if (ferror) return false;
    else var str = $(this).serialize();
    var action = $(this).attr('action');
    if( ! action ) {
      action = 'js/\contactform.php';
    }
    $.ajax({
      type: "POST",
      url: action,
      data: str,
      success: function(msg) {
        // alert(msg);
        if (msg == 'OK') {
          var  default_html = 'A mail has been sent to verify your account.<p style="margin:0; font-size:0.9rem; font-weight: 400;">Check your spam folder if you can' + "'t see the mail</p>";
          $('#sendmessage').html(default_html);
          $("#sendmessage").addClass("show");
          $("#errormessage").removeClass("show");
          $('.contactForm').find("input, textarea").val(""); 
        } else {
          var res = msg.split(":-");
          if (res[0] == "AL -v") {
            $("#sendmessage").html(res[1] + ", you already have a verified account.");
            $("#sendmessage").addClass("show");
            $("#errormessage").removeClass("show");
            $('.contactForm').find("input, textarea").val(""); 
          } else if (res[0] == "AL") {
            $("#sendmessage").html("You already have an unverified account, please check your mail to verify it.");
            $("#sendmessage").addClass("show");
            $("#errormessage").removeClass("show");
            $('.contactForm').find("input, textarea").val(""); 
          } else {
            $("#sendmessage").removeClass("show");
            $("#errormessage").addClass("show");
            $('#errormessage').html(msg);
          }
        }

      }
    });
    return false;
  });

});
