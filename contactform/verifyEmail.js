function verifyAJAX(verID) {
  $.ajax({
    type: "POST",
    url: "../php/verify.php",
    data: {"verID": verID},
    success: function(msg) {
      status = msg.split("*-*");
      console.log(status);
      if (status[0] == 'OK') {
        $('#confirmation').html(msg + ", your email is succesfully verified");
        $('#yes').append("<p>You will now recieve all important emails from Kanona Education for Transformation</p>");
      } else { 
        $('#confirmation').html("Oops, there was a problem with verifying your email :("); 
      }
      $('#loader').css("display", "none");
      $('#register').css("display", "flex");
    }
  });
}