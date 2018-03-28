<?php
require_once 'config.php';


session_start();

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM user_details WHERE username = '".$username."'";

  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result); 

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $uid=$row['uid'];
  $address=$row['address'];

  if (count($_GET)>0) {
  $pid=$_GET['pid'];

  $insert="INSERT INTO cart VALUES (NULL,'$uid','$pid')";

  if(mysqli_query($link, $insert)){
      // echo "Records inserted successfully.";
      } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
  }

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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/materialize.min.1.js"></script>
<!--Initialising icon font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--Styling header tags-->
<style>
h1,h2,h3,h5,h6{
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
<div id="top" class="scrollspy" ></div>
<nav>
    <div class="col s12 m12 l12 nav-wrapper black">
      <a href="index.php" class="brand-logo"><img src="img/home.png" style="width:60px; height:60px;"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
	    <li><div style="width:500px"><img src="img/SFREAK.png" style="height:70px;"></div></li>
        <li><a href="mens.html">Men</a></li>
        <li><a href="women.html">Women</a></li>
        <li><a href="accessories.html">Accessories</a></li>
		<li><a class="modal-trigger" href="#login">Login</a></li>
		<li><a class="modal-trigger" href="#signup">SignUp</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
      <center><h3>Your Cart</h3></center>
      <div class="row">
        <?php
        $invoice= 0;
        $cartitem="SELECT * FROM cart WHERE uid = '".$uid."'";
        if($result_cartitem = mysqli_query($link,$cartitem)){
          if(mysqli_num_rows($result_cartitem) > 0){
            while($row_cartitem = mysqli_fetch_array($result_cartitem)){
              
              $prod="SELECT * FROM products WHERE pid='".$row_cartitem['pid']."'";
              $result_prod = mysqli_query($link, $prod);
              $row_prod = mysqli_fetch_array($result_prod);
              $invoice=$invoice + (int)$row_prod['price'];
              ?>
        <div class="col s12 offset-m2 m8 offset-l3 l6">
          <div class="card horizontal">
            <div class="card-image">
              <img src="view.php?pid=<?php echo $row_prod['pid'] ?>">
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p><span>Name:</span> <?php echo $row_prod['name']; ?></p>
                <p><span>Company:</span> <?php echo $row_prod['company']; ?></p>
                <p><span>Price:</span> <?php echo $row_prod['price']; ?></p>
                <p><span>Description:</span><?php echo $row_prod['description']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
          }
        }?>
      </div>
      <center><a class="waves-effect waves-light btn modal-trigger" href="#placeorder">Place Order</a></center>
  </div>
  <div id="placeorder" class="modal">
    <form method="POST" action="order.php">
    <div class="modal-content">
      <h4>Place Order</h4>
        <div class="row">
          <div class="input-field col s12">
            <input name="invoice" disabled value="<?php echo $invoice ?>" id="disabled" type="text" class="validate">
            <label for="disabled">Invoice</label>
          </div>
          <div class="input-field col s12">
            <textarea name="address" id="textarea1" class="materialize-textarea"><?php echo $address; ?></textarea>
            <label for="textarea1">Delivery Address</label>
          </div>
        </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit">Confirm Order
      <i class="material-icons right">send</i>
    </button>
    </form>
  </div>
<script>
  $(document).ready(function(){
    $('#placeorder').modal();
  });
</script>
</body>
</html>