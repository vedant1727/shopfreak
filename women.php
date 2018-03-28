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
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
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
    padding: 10px 15px !important;
    margin: 13px !important;
    font-size: 13px !important;
    text-transform: uppercase;
    font-weight: 700;
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
   <h2 class="center black-text lighten-1 head"><span>Indian Wear</span></h2>
     <div class="container">
      <div class="row">
        <?php
        $windian="SELECT * FROM products WHERE type='windian'";
        if($result_windian = mysqli_query($link, $windian)){
          if(mysqli_num_rows($result_windian) > 0){
            while($row_windian = mysqli_fetch_array($result_windian)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_windian['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_windian['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_windian['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_windian['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_windian['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_windian['description'] ?>.</p>
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
    <h2 class="center black-text lighten-1 head" >Shirts</h2>
     <div class="container">
      <div class="row">
        <?php
        $wshirt="SELECT * FROM products WHERE type='wshirt'";
        if($result_wshirt = mysqli_query($link, $wshirt)){
          if(mysqli_num_rows($result_wshirt) > 0){
            while($row_wshirt = mysqli_fetch_array($result_wshirt)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_wshirt['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_wshirt['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_wshirt['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_wshirt['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_wshirt['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_wshirt['description'] ?>.</p>
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
     <h2 class="center black-text lighten-1 head" >Jeans</h2>
     <div class="container">
      <div class="row">
        <?php
        $wjean="SELECT * FROM products WHERE type='wjean'";
        if($result_wjean = mysqli_query($link, $wjean)){
          if(mysqli_num_rows($result_wjean) > 0){
            while($row_wjean = mysqli_fetch_array($result_wjean)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_wjean['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_wjean['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_wjean['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_wjean['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_wjean['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_wjean['description'] ?>.</p>
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
    <h2 class="center black-text lighten-1 head" >Jackets</h2>
     <div class="container">
      <div class="row">
        <?php
        $wjacket="SELECT * FROM products WHERE type='wjacket'";
        if($result_wjacket = mysqli_query($link, $wjacket)){
          if(mysqli_num_rows($result_wjacket) > 0){
            while($row_wjacket = mysqli_fetch_array($result_wjacket)){?>
          <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_wjacket['pid'] ?>">
              <span class="card-title white-text"><?php echo $row_wjacket['name'] ?></span>
            </div>
            <div class="card-content">
              <a href="cart.php?pid=<?php echo $row_wjacket['pid'] ?>" class="btn-floating halfway-fab waves-effect waves-light purpleshade"><i class="material-icons">add</i></a>
              <p><span>Company:</span> <?php echo $row_wjacket['company'] ?></p>
              <p><span>Price:</span> INR <?php echo $row_wjacket['price'] ?></p>
              <p><span class="activator">DESCRIPTION</span></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Description</span>
              <p><?php echo $row_wjacket['description'] ?>.</p>
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
<script>
  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });
</script>
</body>
</html>