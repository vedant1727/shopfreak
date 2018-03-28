<?php
	
require_once 'config.php';

session_start();

// Define variables and initialize with empty values
$username = $password = "default";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_username']) && isset($_POST['login_password'])){
 
    // Check if username is empty
    if(empty(trim($_POST["login_username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["login_username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['login_password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['login_password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM user_details WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            //Password is correct, so start a new session and save the username to the session 
                            session_start();
                            $_SESSION['username'] = $username;
                            $user_details = "SELECT * FROM user_details WHERE username = '".$username."'";
                            $result_user = mysqli_query($link, $user_details);
                            $row_user = mysqli_fetch_assoc($result_user);
                            if ($row_user['type']=='customer') {
                                header("location: index.php");
                            } else {
                                header("location: retailer.php");
                            }
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                            ?>
                                <script type="text/javascript">
                                	alert('The password you entered was not valid.');
                                </script>
                            <?php
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                    ?>
                        <script type="text/javascript">
                        	alert('No account found with that username.');
                        </script>
                    <?php

                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                ?>
                    <script type="text/javascript">
                       	alert('No account found with that username.');
                    </script>
                <?php
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShopFreak|SignIn</title>
<link rel="stylesheet" href="assets/css/materialize.css">
</head>
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
            <a href="signup.php">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>
<div class="container">
	<div id="login-form">
    <form method="post" action="signin.php" autocomplete="off">
        <br><br>
        <h5 class="center">SING IN</h5>
        <div class="row">
        	<div class="col offset-s2 s8">
                <div class="form-group">
                	<div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                	<input type="email" name="login_username" class="form-control" placeholder="Your Email" maxlength="40" />
                    </div>
                </div>
                <div class="form-group">
                	<div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                	<input type="password" name="login_password" class="form-control" placeholder="Your Password" maxlength="15" />
                    </div>
                </div>
                <center><div class="form-group"><ul>
                	<li><button type="submit" class="btn btn-block btn-primary blue accent-4" name="btn-login">Sign In</button></li>
    				<!--<li><button type="submit" class="btn btn-block btn-primary" name="btn-sign" href="register.php">Sign Up</button></li>-->
                </ul></div></center>
            </div>
        </div>
    </form>
    </div>
</div>
<footer class="page-footer grey darken-3" style="margin-top:185px;">
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
</footer>
</body>
</html>