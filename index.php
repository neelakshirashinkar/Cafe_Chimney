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
<BODY class="text-center">

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
        if($_SESSION['login'] = false)
        {      
            echo ' <h5 style="font: normal 30px Cookie, cursive;margin-right:20px;" id="uname">Welcome <span style="color:  #e0ac1c;">' . $_SESSION['username'] . '</span></h5>';
        }
        else 
        {
            echo '<a href = "login.php"><button class="btn btn-outline-light my-2 my-sm-0" style="margin: 10px;" id="login">Login / Register </button></a>';
        }
    ?>
    
  </div>

</nav>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src='product-images/cafe.jpg' class="d-block w-100" alt="..."  style="height: 700px;">
     
      <div class="container">
              <div class="carousel-caption text-left">
                <h1>LET US DELIGHT YOU.</h1>
                <p style="font-size: 20px;">Delicious, handcrafted beverages and great-tasting food. The secret to making life better.</p>
                <p><a class="btn btn-lg btn btn-outline-light" href="order.php" role="button" style="border-width: 4px;">Order Now</a></p>
              </div>
            </div>
    </div>
    <div class="carousel-item">
      <img src='product-images/cafe1.jpg' style="height: 700px;" class="d-block w-100 h-60" alt="...">
      <div class="container">
              <div class="carousel-caption">
                <!-- <h1>EXPERIENCE CAFE CHIMNEY.</h1> -->
                <p><a class="btn btn-lg btn btn-dark" href="order.php" role="button" style="border-width: 4px;">Order Now</a></p>
              </div>
            </div>
    </div>
    <div class="carousel-item">
      <img src='product-images/cafe3.jpg' class="d-block w-100 h-60" alt="..." style="height: 700px;">
      <div class="container">
              <div class="carousel-caption text-right">
                <h1>INTRODUCING WEB ORDER</h1>
                <p style="font-size:20px;">Skip the Line!</p>
                <p><a class="btn btn-lg btn btn-outline-light" href="order.php" role="button" style="border-width: 4px;">Order Now</a></p>
              </div>
            </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br>


<main role="main">

    


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="product-images/italian1.jpg" alt="Generic placeholder image" width="140" height="140">
            <br><h2>Italian Cuisine</h2>
<p>With many types of Antipasti, Pizza, Pasta, Risottos, and a well-curated selection of Classic Desserts, We guarantee that you will be spoilt for choice.</p>  
        </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="product-images/dessert.jpg" alt="Generic placeholder image" width="140" height="140">
            <br><h2>Desserts</h2>
            <p>A meal which ends with dessert becomes a celebration. To this end, we offer a wide range of cakes & desserts to please every palette.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="product-images/quality.jpg" alt="Generic placeholder image" width="140" height="140">
            <br><h2>Premium Quality</h2>
            <p>Customer Satisfaction matters the most to us. Hence we provide our customers with products of top notch quality.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <!-- <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider"> -->

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="footer-distributed">

			<div class="footer-left">
				<h3>Cafe<span>Chimney</span>
        </h3>                    <p class="footer-links">
                    
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
					  <p>Shop 505, Linking Road, Bandra</p>
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
    </main>
</BODY>
</HTML>
