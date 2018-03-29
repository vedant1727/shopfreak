<?php

require_once 'config.php';

session_start();

if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM user_details WHERE username = '".$username."'";

	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result); 

	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
}
?>
<html>
<head>
	<title>
		ShopFreak
	</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<!--Initialising css folders-->
<link rel="stylesheet" href="assets/css/materialize.css">
<!--Initialising javascript folders-->
<script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.1.js"></script>
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Styling header tags-->
<style>
body{
	font-family: 'Lato', sans-serif;
}

.card.large{
	overflow: hidden !important;
}

.card-image{
	max-height: none !important;
}

.slider .indicators .indicator-item.active{
	background-color: #98a7d2 !important;
}
</style>
<!--Initialisations end-->
<body>
  <nav class="blue accent-4">
  	<div class="container">
    <div class="col s12 m12 l12 nav-wrapper blue accent-4">
      <a href="landing.html" class="brand-logo">ShopFreak</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li>
        	<a href="mens.php">Men</a>
        </li>
        <li>
        	<a href="women.php">Women</a>
        </li>
        <li>
        	<a href="accessories.php">Accessories</a>
        </li>
        <li>
        	<?php 
        		if (isset($_SESSION['username'])) { ?>
        			<a href=""><?php echo $first_name." ".$last_name; ?></a>
        	<?php } else { ?>
        			<a href="signin.php">Login</a>
        	<?php } ?>
        	
        </li>
		<li>
			<?php 
        		if (isset($_SESSION['username'])) { ?>
        			<a href="logout.php">Logout</a>
        	<?php } else { ?>
        			<a href="register.php">Sign Up</a>
        	<?php } ?>
		</li>
      </ul>
    </div>
	</div>
  </nav>
  <br><br>
  	<div class="container">
	  <div class="slider">
	    <ul class="slides">
	      <li>
	        <img src="assets/img/r1.jpg">
	        <div class="caption left-align"></div>
	      </li>
	      <li>
	        <img src="assets/img/r2.jpg">
	        <div class="caption left-align"></div>
	      </li>
	      <li>
	        <img src="assets/img/r3.jpg">
	        <div class="caption right-align"></div>
	      </li>
	      <li>
	        <img src="assets/img/r4.jpg">
	        <div class="caption center-align"></div>
	      </li>
	    </ul>
	  </div>
	</div>
	<br>
	<div class="container">
	  <div class="row">
	    <div class="col s12 m6 l6">
	      <div class="card large">
	        <div class="card-image">
	          <a href="mens.php"><img src="assets/img/1.jpg"></a>
	        </div>
	      </div>
	    </div>
		<div class="col s12 m6 l6">
	      <div class="card large">
	        <div class="card-image">
	          <a href="women.php"><img src="assets/img/2.jpg"></a>
	        </div>
	      </div>
	    </div>
	    <div class="col s12 m12 l12">
	      <div class="card">
	        <div class="card-image">
	          <a href="accessories.php"><img src="assets/img/3.jpg"></a>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
  <footer class="page-footer blue accent-4">
          <div class="container">
            <div class="row">
              <div class="col l2 offset-l1">
                <h5 class="white-text">Digital Partner</h5>
				<img src="img/adobe.png" width="50px" height="50px">
				<img src="img/bahwan.jpg" width="50px" height="50px">
              </div>
              <div class="col l2 offset-l6">
                <h5 class="white-text">Media Partner</h5>
				<img src="img/beepweep.png" width="100px" height="50px">
              </div>
            </div>
			<div class="footer-copyright">
            	<div class="center" style="margin-left:35%">Developed by Vedant Jain</div>
          	</div>
			</div>
    </footer>
  <script>
    $(document).ready(function(){
      $('.slider').slider();
    });
  </script>
  <script>
	// Pause slider
	$('.slider').slider('pause');
	// Start slider
	$('.slider').slider('start');
	// Next slide
	$('.slider').slider('next');
	// Previous slide
	$('.slider').slider('prev');
  </script>
  <script>
$(document).ready(function(){
    $('.modal-trigger').leanModal();
  });
</script> 
  <script>
	
  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });
  </script>
</body>
</html>