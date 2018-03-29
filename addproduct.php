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

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$uid=$row["uid"];
		$pname=$_POST["name"];
		$company=$_POST["company"];
		$description=$_POST["description"];
		$ptype=$_POST["type"];
		$price=$_POST["price"];
		$upload_date=date("Y/m/d");

		$image = null;
    
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check!=false){
		    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		}

		$product_upload= "INSERT INTO products VALUES (NULL,'$uid','$pname','$company','$description','$ptype','$image','$price','$upload_date');";
		if(mysqli_query($link, $product_upload)){
	    // echo "Records inserted successfully.";
	    ?>

	    <script type="text/javascript">
	      alert("Records inserted successfully.");
	    </script>

	    <?php
	  	} else {
	    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	mysqli_close($link);
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
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Styling header tags-->
<style>
body{
  font-family: 'Lato', sans-serif;
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
          <a href="retailer.php">Pending Orders</a>
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
	  	<br>
	  	<div class="col s12 m12 offset-l1 l10">
	  		<h4>Add Products for Sale</h4>
	  		<form method="POST" action="addproduct.php" class="col s12" enctype="multipart/form-data">
		      <div class="row">
		        <div class="input-field col s6">
		          <input name="name" id="name" type="text" class="validate">
		          <label for="name">Product Name</label>
		        </div>
		        <div class="input-field col s6">
		          <input name="company" id="company" type="text" class="validate">
		          <label for="company">Company Name</label>
		        </div>
		        <div class="input-field col s6">
		          <input name="price" id="price" type="text" class="validate">
		          <label for="price">Price</label>
		        </div>
		        <div class="file-field input-field col s6">
			      <div class="btn blue accent-4">
			        <span>File</span>
			        <input name="image" type="file">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
                <div class="input-field col s12">
				  <textarea name="description" id="description" class="materialize-textarea"></textarea>
				  <label for="description">Product Description</label>
				</div>
				<p><b>Select Product Type:</b></p>
				<p class="col s3">
			      <input name="type" type="radio" id="test1" value="mtshirt" />
			      <label for="test1">Men's T-Shirt</label>
			  	</p>
			  	<p class="col s3">
			      <input name="type" type="radio" id="test2" value="mshirt" />
			      <label for="test2">Men's Shirt</label>
			  	</p>
			  	<p class="col s3">
			      <input name="type" type="radio" id="test3" value="mjean" />
			      <label for="test3">Men's Jean</label>
			  	</p>
			  	<p class="col s3">
			      <input name="type" type="radio" id="test4" value="mjacket" />
			      <label for="test4">Men's Jacket</label>
			    </p>
			    <p class="col s3">
			      <input name="type" type="radio" id="test5" value="windian" />
			      <label for="test5">Women's Indian Wear</label>
			  	</p>
		  		<p class="col s3">
			      <input name="type" type="radio" id="test6" value="wshirt" />
			      <label for="test6">Women's Shirt</label>
			  	</p>
		  		<p class="col s3">
			      <input name="type" type="radio" id="test7" value="wjean" />
			      <label for="test7">Women's Jean</label>
			  	</p>
		  		<p class="col s3">
			      <input name="type" type="radio" id="test8" value="wjacket" />
			      <label for="test8">Women's Jacket</label>
			    </p>
			    <p class="col s3">
			      <input name="type" type="radio" id="test9" value="watch" />
			      <label for="test9">Watch</label>
			  	</p>
			  	<p class="col s3">
			      <input name="type" type="radio" id="test10" value="shoes" />
			      <label for="test10">Shoes</label>
			  	</p>
			  	<p class="col s3">
			      <input name="type" type="radio" id="test11" value="shades" />
			      <label for="test11">Shades</label>
			  	</p>
			  	<p class="col s3">
			      <input name="type" type="radio" id="test12" value="wallet" />
			      <label for="test12">Wallets</label>
			    </p>
		      </div>
		      <center>
		      	  <button class="btn waves-effect waves-light blue accent-4" type="submit" name="action">Submit
				    <i class="material-icons right">send</i>
				  </button>
		      </center>
		    </form>
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
          </div>
    </footer>
  <script>

  </script>
</body>
</html>