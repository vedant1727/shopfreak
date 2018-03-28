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
	$rid = $row['uid'];
}
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
<script type="text/javascript" src="js/materialize.min.1.js"></script>
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Styling header tags-->
<style>
h1,h2,h3,h4,h5,h6{
font-family:Freestyle Script
}

.card.horizontal .card-image{
  width: 30%;
  overflow: hidden;
}

.card.horizontal{
  height: 189px !important;
}

.card-content p{
  padding-bottom: 6px !important;
  max-height: 72px !important;
  overflow-y: hidden;
}

.card-content p>span{
  font-weight: 700;
  color: #F44336 !important;
}
</style>
<!--Initialisations end-->
<body>
  <div id="upar" class="scrollspy" ></div>
  <nav class="black">
  	<div class="container">
    <div class="col s12 m12 l12 nav-wrapper black">
      <a href="landing.html" class="brand-logo"><b>ShopFreak</b></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
	    <li>
	    	<a href="addproduct.php">Add Products</a>
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
	  <div class="row">
	  	<h3>Orders to Deliver:</h3>

        <?php
        $orders="SELECT * FROM orders WHERE rid = '".$rid."'";
        if($result_orders = mysqli_query($link,$orders)){
          if(mysqli_num_rows($result_orders) > 0){
            while($row_orders = mysqli_fetch_array($result_orders)){
              
              $prod="SELECT * FROM products WHERE pid='".$row_orders['pid']."'";
              $result_prod = mysqli_query($link, $prod);
              $row_prod = mysqli_fetch_array($result_prod);
              ?>
        <div class="col s12 offset-m2 m8 l6">
          <div class="card horizontal">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_prod['pid'] ?>">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p><span>Name:</span> <?php echo $row_prod['name']; ?></p>
                <p><span>Company:</span> <?php echo $row_prod['company']; ?></p>
                <p><span>Invoice:</span> <?php echo $row_orders['invoice']; ?></p>
                <p><span>Address:</span><?php echo $row_orders['address']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
          }
        }?>

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

  </script>
</body>
</html>