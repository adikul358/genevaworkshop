<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CERN South Asia Science Education Program</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
    rel="stylesheet">
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    .content {
      flex: 1 0 auto;
    }
    .content section {
      height: calc(100% - 70px);
      top: 70px;
      position: relative;
      padding: 100px;
      padding-top: 70px;
    }
    .footer {
      flex-shrink: 0;
    }
  </style>
</head>
<?php $code = "'" . $_GET['vercode'] . "'";?>

<body onload="verifyAJAX(<?php echo $code;?>)">
  <div class="content">

    <header id="header-no" class="header-scrolled">
      <div class="container">
        <div id="logo" class="pull-left">
          <a href="../#intro" class="scrollto">
            <h1 class="mb-4 pb-0"><span>Kanona</span></h1>
          </a>
        </div>
      </div>
    </header>

    <section id="loader" class="section-with-bg">
      <div class="container" style="display:flex; justify-content:center">
        <img src='../img/loading.gif' style="margin: 20px; margin-top: 0px">
      </div>
    </section>

    <section id="register" class="section-with-bg" style="display:none">
      <div class="container wow fadeInUp">
        <div class="section-header" id="yes">
          <h2 id="confirmation"></h2>
        </div>
        <div class="form" style="display:flex; justify-content: center; margin-bottom: 60px">
          <a href="/"><button type="submit">Go To Home</button></a>
        </div>
      </div>
    </section>

  </div>

  <?php include "../footer.html"; ?>

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/venobox/venobox.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/\contactform.js"></script>
  <script src="../js/\verifyemail.js"></script>
</body>

</html>