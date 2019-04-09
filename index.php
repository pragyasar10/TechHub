<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['uemail']))
    {
       header('location:home.php'); 
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>TechHub</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="assets/css/Footer-with-social-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index_css.css">
    <style media="screen">
    .jumbotron{
      width: 100%;
      height: 590px;
      background-image: url(images/back.jpg);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      color: white;
    }
    </style>
  </head>
  <body>

    <div class="jumbotron justify-content-center text-center">
      <a href="index.html"> <img src="images/icon.png" alt="site logo" id="logo_image"></a>
      <h1>TechHub</h1>
        <p><strong>Learn & Grow</strong></p>
      <p><strong>Find the Best answers for your Query!!</strong></p>
      <div class="row">
        <div class="col-12">
          <button type="button" name="button" class="btn btn-default button_cust" id="align_button" onclick="location.href='login.php';">Log In</button>
            <button type="button" name="button" class="btn btn-default button_cust" id="align_button" onclick="location.href='registration.php';">Sign Up</button>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row lighting_images_row">
          <div class="col-12 col-sm-6 justify-content-center text-center lighting_images_justify" id="lighting_images_justify_1">
            <h2>Have doubts?</h2>
            <p><strong><h4>You are at the best place,</h4></strong></p>
            <p><strong><h4>Share your query with the world and get answer.</h4></strong></p>
            <br>
          </div>
          <div class="col-12 col-sm-6 justify-content-center text-center">
            <img src="images/pic1.jpg" alt="image" class="lighting_images">
          </div>
      </div>
      <div class="row lighting_images_row">
          <div class="col-12 col-sm-6 justify-content-center text-center">
            <img src="images/pic2.jpg" alt="image" class="lighting_images">
          </div>
          <div class="col-12 col-sm-6 justify-content-center text-center lighting_images_justify" id="lighting_images_justify_2">
            <h2>Any Question? </h2>
            <p><strong><h4>This place is heaven for people having Questions</h4></strong></p>
            <p><strong><h4>Ask here and let the world Answer!!</h4></strong></p>
          </div>
      </div>
      <div class="row lighting_images_row">
          <div class="col-12 col-sm-6 justify-content-center text-center lighting_images_justify" id="lighting_images_justify_3">
            <h2>Join Us!</h2>
            <p><strong><h4>Welcome to a place to share knowledge</h4></strong></p>
            <p><strong><h4>Start Exploring!!</h4></strong></p>
              <br>
              <br>
          </div>
          <div class="col-12 col-sm-6 justify-content-center text-center">
            <img src="images/pic3.png" alt="image" class="lighting_images">
          </div>
      </div>
    </div>

        <footer id="myFooter">
            <center>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-3 myCols">
                      <h5></h5>
                      <ul>
                          <li><a href="#"></a></li>
                          <li><a href="#"></a></li>
                      </ul>
                  </div>
                  <div class="col-sm-3 myCols">
                      <h5>Get started</h5>
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="registration.php">Sign up</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-3 myCols">
                      <h5>About us</h5>
                      <ul>
                          <li><a href="about.html">Company Information</a></li>
                          <li><a href="contactus.html">Contact us</a></li>
                      </ul>
                  </div>
               
              </div>
          </div>
          <div class="social-networks">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="fb.html" class="facebook"><i class="fa fa-facebook-official"></i></a>
              <a href="gmail.html" class="google"><i class="fa fa-google-plus"></i></a>
          </div>
          <div class="footer-copyright">
              <p>2019 TechHub </p>
          </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
    </script>
</html>
