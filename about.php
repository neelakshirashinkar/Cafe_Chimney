<?php
    session_start();
    require 'dbconfig/config.php';
?>
<HTML>
<HEAD>
<TITLE>Cafe Chimney</TITLE>
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</HEAD>
<BODY class="text-center" >
<nav class="navbar top navbar-expand-lg navbar-dark" style="background-color: black;"  >
  <a class="navbar-brand" href="index.php"><img src="product-images/logo1.png" alt="" style="width: 200px;height:100px;margin-left:30px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color:white; margin-left:350px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="about.php">About Us <span class="sr-only"></span></a>
      </li>
      
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="order.php?action=empty">Order <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active" style="margin: 10px;">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only"></span></a>
      </li>
    </ul>
    <?php
        if($_SESSION['login'] = true)
        {      

            echo ' <h5 style="font: normal 30px Cookie, cursive;margin-right:20px;">Welcome <span style="color:  #e0ac1c;">' . $_SESSION['username'] . '</span></h5>';
        }
        else
        {
            echo '<form class="form-inline my-2 my-lg-0">
            <a href="login.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="margin: 10px;">Login / Register </button></a>
          </form>';
        }
    ?>
  </div>
</nav>


<div class="row featurette">
          <div class="col-md-7"> <br><br><br>
          <h3 style="font: bold 60px 'Cookie', cursive;">About <span style="color:  #e0ac1c;">Us</span></h3><br><br>

            <h2 class="lead">Founded By : <span style="color: #e0ac1c;">Rushi Shah, Neelakshi Rashinkar and Nidhi Pednekar.</span></h2>
            <p class="lead" style="color: grey;">Cafe Chimney is more than just a cafe destination. It is the beautiful coming together of passion, obsession, flavour and magic.

What started off as a 200 sq. ft. experimental kitchen on Linking Road, Bandra has today grown to be one of Mumbai’s top cafe destinations.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="product-images/cafe2.jpg" alt="Generic placeholder image" style="margin-right:20%">
          </div>
        </div>


</BODY>
 <!-- FOOTER -->
 <footer class="footer-distributed">

<div class="footer-left">
    <h3>Cafe<span>Chimney</span></h3>
    <p class="footer-company-about">
        
         				
        <p class="footer-links">
        
        <a href="#">| Home |</a>
        <br>					
        <a href="#">| About |</a>
        <br>
        <a href="#">| Menu |</a>
        <br>
        <a href="#">| Order |</a>
    </p>

        <!-- <p class="footer-company-name">© 2019 Eduonix Learning Solutions Pvt. Ltd.</p> -->
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
          <p> Shop 505, Linking Road, Bandra</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+91 1234567890</p>
    </div>
    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:support@eduonix.com">contact@cafechimney.com</a></p>
    </div>
</div>
<div class="footer-right">
    <p class="footer-company-about">
                  
    <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
    </div>
</div>
</footer>
</HTML>