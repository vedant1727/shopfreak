<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.html");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<html>
<head>
	<title>
		ShopFreak
	</title>
</head>
<!--Initialising css folders-->
<link rel="stylesheet" href="css/materialize.css">
<!--Initialising javascript folders-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript"src="js/materialize.min.1.js"></script>
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Styling header tags-->
<style>
h1,h2,h3,h4,h5,h6{
font-family:ariel
}
</style>
<!--Initialisations end-->
<body>
  <div id="upar" class="scrollspy" ></div>
  <nav>
    <div class="col s12 m12 l12 nav-wrapper black">
      <a href="landing.html" class="brand-logo"><img src="img/ISTE.png" style="width:60px; height:60px;"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
	    <li><div style="width:500px"><img src="img/SFREAK.png" style="height:70px;"></div></li>
        <li><a href="mens.html">Men</a></li>
        <li><a href="women.html">Women</a></li>
        <li><a href="accessories.html">Accessories</a></li>
		<li><a class="modal-trigger" href="#login">Hello User</a></li>
      </ul>
    </div>
  </nav>
  <!--<div><hr><center><h1>ShopFreak</h1></center><hr></div>-->
  <br>
  <br>
  <br>
   <center><h2>If you are a man, click</h2></center>
   <a href="mens.html"><center><h2>here.</h2></center></a>
   <br>
   <br>
   <br>
   <center><h2>If you are a woman, click</h2></center>
   <a href="women.html"><center><h2>here.</h2></center></a>
   <br>
   <br>
   <br>
   <center><h2>If you want to shop accessories, click</h2></center>
   <a href="accessories.html"><center><h2>here.</h2></center></a>
   <div class="fixed-action-btn tooltipped" data-position="left" data-delay="50" data-tooltip="Back to Top"   style="bottom: 14px;">
		<a class="btn-floating btn-large black" href="#upar">
			<i class="large material-icons">navigation</i>
		</a>
	</div>
	<div class="fixed-action-btn" style="bottom: 14px; right:95%;">
		<a class="btn-floating btn-large black">
			<i class="large material-icons">star</i>
		</a>
		<ul>
		    <li><a class="btn-floating black tooltipped modal-trigger" data-position="right" data-delay="50" data-tooltip="LogOut" href="logout.php?logout"><i class="large material-icons">power_settings_new</i></a></li>
			<li><a class="btn-floating black tooltipped modal-trigger" data-position="right" data-delay="50" data-tooltip="Developers" href="#developers"><i class="large material-icons">perm_identity</i></a></li>
			<li><a class="btn-floating black tooltipped modal-trigger" data-position="right" data-delay="50" data-tooltip="Cart" href="#cart"><i class="large material-icons">shopping_cart</i></a></li>
		</ul>
	</div>
	

  <div id="cart" class="modal">
	<div class="modal-content center blue-grey lighten-4 black-text">
		<h2>Your Cart </h2>
	</div>
	 <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
  </div>
  
  <div id="developers" class="modal">
	<div class="modal-content center blue-grey lighten-4 black-text">
		<h2>Developers</h2>
		<div class="col s4 m4 l4 offset-s4">
		<img src="img/yash.jpg" width="300" height="200" style=" width: 200px;border-radius:0%;height:200px;">
		<div class="desc" style="padding: 15px; text-align: center;color:black;"><b>Yash Gupta</b>
		</div>
		</div>
		<div class="row">
		<div class="col s4 m4 l4 ">
		<img src="img/anmol.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Anmol Agrawal
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/Rakshit.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Rakshit Jain
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/sakshi.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Sakshi Agarwal
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/aman.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Aman Deep Singh
		</div>
		</div>		
<div class="col s4 m4 l4 ">
		<img src="img/rishav.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Rishav Keshari
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/jishu.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Jishu Dohare
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/divyansh.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Divyansh Rai
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/nidhish.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Nidhish Gautam
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/kanav.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Kanav Sabhrawal
		</div>
		</div>
<div class="col s4 m4 l4 ">
		<img src="img/Anik.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Anik Saha
		</div>
		</div>

<div class="col s4 m4 l4 ">
		<img src="img/divya.jpg" width="300" height="200" style=" width: 200px;border-radius:50%;height:200px;">
		<div class="desc" style="padding: 15px;
			text-align: center;color:black;">Divya Chibber
		</div>
		</div>
 	</div>	
	</div>
	
	 <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
  </div> 
  <footer class="page-footer grey darken-3">
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
            <div class="center" style="margin-left:35%">Indian Society for Technical Education (VITU) &copy; 2016 Copyright</div>
          </div>
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