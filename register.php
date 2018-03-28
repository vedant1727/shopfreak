<?php

require_once 'config.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_password']) && isset($_POST['register_username'])){
 
    // Validate username
    if(empty(trim($_POST["register_username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT uid FROM user_details WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["register_username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["register_username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['register_password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['register_password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['register_password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["register_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['register_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
    	$first_name = $_POST['first_name'];
    	$last_name= $_POST['last_name'];
    	$type = $_POST['type'];
    	$address = $_POST['address'];

        // Prepare an insert statement
        $sql1 = "INSERT INTO user_details VALUES (null,?,?,?,?,?,?)";

        if($stmt1 = mysqli_prepare($link, $sql1)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1,"ssssss",$first_name,$last_name,$param_username, $param_password,$address,$type);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            $select = mysqli_query($link,"SELECT `username` FROM `user_details` WHERE `username` = '".$param_username."'") or exit(mysql_error());

            /*if(mysql_num_rows($select)) {
                ?>
                    <script type="text/javascript">
                        alert("Email Already Used");
                        window.location = "index.php"
                    </script>
            <?php  
            }
            else */

            if(mysqli_stmt_execute($stmt1)){
                    header("location: index.php");
            }else{ ?>
                <script type="text/javascript">
                    alert("Something went wrong. Please try again later.");
                </script>
                <?php
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt1);
    }
    
    // Close connection
    mysqli_close($link);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShopFreak|SignUp</title>
<link rel="stylesheet" href="css/materialize.css">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div id="upar" class="scrollspy" ></div>
  <nav>
    <div class="col s12 m12 l12 nav-wrapper black">
      <a href="landing.html" class="brand-logo"><img src="img/ISTE.png" style="width:60px; height:60px;"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
	    <li><div style="width:900px"><img src="img/SFREAK.png" style="height:70px;"></div></li>
      </ul>
    </div>
  </nav>

<div class="container">

	<div id="login-form">
    <form method="post" action="register.php" autocomplete="off">

    	<div class="col-l12">
        	<div class="form-group">
            	<h2>Sign Up</h2>
            </div>
			<br>
            <div class="row">
		        <div class="input-field col s12 m6 l6">
		          <input name="first_name" id="first_name" type="text" class="validate" required>
		          <label for="first_name">First Name</label>
		        </div>
		        <div class="input-field col s12 m6 l6">
		          <input name="last_name" id="last_name" type="text" class="validate" required>
		          <label for="last_name">Last Name</label>
		        </div>
		        <div class="input-field col s12">
		          <input name="register_username" id="email" type="email" class="validate" required>
		          <label for="email">Email</label>
		        </div>
		        <div class="input-field col s12">
		          <input name="register_password" id="password" type="password" class="validate" required>
		          <label for="password">Password</label>
		        </div>
		        <div class="input-field col s12">
		          <input name="address" id="address" type="text" class="validate" required>
		          <label for="address">Address</label>
		        </div>
		        <div class="input-field col s12">
		          <input name="type" id="type" type="text" class="validate" required>
		          <label for="type">Account Type</label>
		        </div>
	     	</div>
			<br>
            <center><div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div></center>
			<br>
        </div>
    </form>
    </div>
</div>



<footer class="page-footer grey darken-3" style="margin-top:10px;">
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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
</html>