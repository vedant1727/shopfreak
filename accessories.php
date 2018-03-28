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
    ShopFrek
  </title>
</head>
<!--Initialising css folders-->
<link rel="stylesheet" href="assets/css/materialize.css">
<!--Initialising javascript folders-->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/materialize.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.1.js"></script>
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Styling header tags-->
<style>
body{
  font-family: 'Lato', sans-serif;
}

.card-image{
  height: 340px !important;
  overflow-y: hidden;
}

.card-image .card-title{
  background-color: #98a7d2 !important;
  border-radius: 20px;
  padding: 5px 13px !important;
  margin: 13px !important;
  font-size: 17px !important;
}

.card-content{
  position: relative;
}

.card-content>a{
  position: absolute;
  top: -20px;
  right: 24px;
}

.card-content>p{
  margin-bottom: 10px !important;
}

.card-content>p span{
  font-weight: 700;
  color: #2962ff !important;
}

.tabs .indicator{
  background-color: #98a7d2 !important;
  height: 5px !important;
}

.purpleshade{
  background-color: #98a7d2 !important;
}
</style>
<!--Initialisations end-->
<body>
  <nav class="blue accent-4">
    <div class="container">
    <div class="col s12 m12 l12 nav-wrapper blue accent-4">
      <a href="index.php" class="brand-logo">ShopFreak</a>
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
 
  <div class="container">
    <br>
    <div class="col s12">
        <ul class="tabs row" style="z-index:0; overflow:hidden;">
          <li class="tab col s3 m3 l3"><a id="tshirt_tab" href="#tshirts" class="black-text lighten-1"><b>T-Shirts</b></a></li>
          <li class="tab col s3 m3 l3"><a id="shirt_tab"  href="#shirts" class="black-text lighten-1"><b>Shirts</b></a></li>
          <li class="tab col s3 m3 l3"><a id="jeans_tab"  href="#jeans" class="black-text lighten-1"><b>Jeans</b></a></li>
          <li class="tab col s3 m3 l3"><a id="shorts_tab" href="#jackets" class="black-text lighten-1"><b>Jackets</b></a></li>
        </ul>
    </div>
  </div>
  <div id="tshirts">
   <h2 class="center black-text lighten-1 head"><span>Watch</span></h2>
     <div class="container">
      <div class="row">
        <?php
        $watch="SELECT * FROM products WHERE type='watch'";
        if($result_watch = mysqli_query($link, $watch)){
          if(mysqli_num_rows($result_watch) > 0){
            while($row_watch = mysqli_fetch_array($result_watch)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_watch['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_watch['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_watch['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_watch['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_watch['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_watch['description'] ?>.</p>
            </div>
          </div>
        </div>
        <?php
            }
          }
        }?>
      </div>  
     </div>
  </div>
  <div id="shirts">
    <h2 class="center black-text lighten-1 head" >Shoes</h2>
     <div class="container">
      <div class="row">
        <?php
        $shoes="SELECT * FROM products WHERE type='shoes'";
        if($result_shoes = mysqli_query($link, $shoes)){
          if(mysqli_num_rows($result_shoes) > 0){
            while($row_shoes = mysqli_fetch_array($result_shoes)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_shoes['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_shoes['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_shoes['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_shoes['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_shoes['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_shoes['description'] ?>.</p>
            </div>
          </div>
        </div>
        <?php
            }
          }
        }?>
      </div>  
     </div>
  </div>
  <div id="jeans">
     <h2 class="center black-text lighten-1 head" >Shades</h2>
     <div class="container">
      <div class="row">
        <?php
        $shades="SELECT * FROM products WHERE type='shades'";
        if($result_shades = mysqli_query($link, $shades)){
          if(mysqli_num_rows($result_shades) > 0){
            while($row_shades = mysqli_fetch_array($result_shades)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_shades['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_shades['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_shades['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_shades['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_shades['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_shades['description'] ?>.</p>
            </div>
          </div>
        </div>
        <?php
            }
          }
        }?>
      </div>  
     </div>
  </div>
  <div id="jackets">
    <h2 class="center black-text lighten-1 head" >Wallet</h2>
     <div class="container">
      <div class="row">
        <?php
        $wallet="SELECT * FROM products WHERE type='wallet'";
        if($result_wallet = mysqli_query($link, $wallet)){
          if(mysqli_num_rows($result_wallet) > 0){
            while($row_wallet = mysqli_fetch_array($result_wallet)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_wallet['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_wallet['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_wallet['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_wallet['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_wallet['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_wallet['description'] ?>.</p>
            </div>
          </div>
        </div>
        <?php
            }
          }
        }?>
      </div>  
     </div>
  </div>
 <div id="cart" class="modal">
  <div class="modal-content center blue-grey lighten-4 black-text">
    <h2>Your Cart </h2>
  </div>
   <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
 </div>
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
  <script>
  $(document).ready(function(){
      $('.carousel').carousel();
    });
    
  </script>
  <script>
  $('.carousel').carousel('next');
$('.carousel').carousel('next', 3); // Move next n times.
// Previous slide
$('.carousel').carousel('prev');
$('.carousel').carousel('prev', 4); // Move prev n times.
// Set to nth slide
$('.carousel').carousel('set', 4);
</script>
</body>
</html>