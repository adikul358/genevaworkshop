function verifyAJAX(verID) {
  $.ajax({
    type: "POST",
    url: "../php/verify.php",
    data: {"verID": verID},
    success: function(msg) {
      console.log(msg);
      var res = msg.split("-");
      console.log(res); 
      console.log(res[0] + " : " + res[1]);
      if (res[0] == 'OK') {
        $('#confirmation').html(res[1] + ", your email is succesfully verified");
        $('#yes').append("<p>You will now recieve all important emails from Kanona Education for Transformation</p>");
      } else if (res[0] == 'AL') {
        $('#confirmation').html(res[1] + ", your email is already verified");
      } else { 
        $('#confirmation').html("Oops, there was a problem with verifying your email :("); 
      }
      $('#loader').css("display", "none");
      $('#register').css("display", "flex");
    }
  });
}