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
}
  if ($_SERVER['REQUEST_METHOD']=='POST') {

    $addrs=$_POST['address'];

    $cartitemx="SELECT * FROM cart WHERE uid = '".$uid."'";
    if($result_cartitemx = mysqli_query($link,$cartitemx)){
      if(mysqli_num_rows($result_cartitemx) > 0){
        while($row_cartitemx = mysqli_fetch_array($result_cartitemx)){
          
          $prodx="SELECT * FROM products WHERE pid='".$row_cartitemx['pid']."'";
          $result_prodx = mysqli_query($link, $prodx);
          $row_prodx = mysqli_fetch_array($result_prodx);

          $pid=$row_prodx['pid'];
          $rid=$row_prodx['rid'];
          $inv=$row_prodx['price'];

          $order="INSERT INTO orders VALUES (NULL,'$uid','$pid','$rid','$inv','$addrs')";
          if(mysqli_query($link, $order)){
          	header('Location: index.php');
          }
        }
      }
    }
  }
?>