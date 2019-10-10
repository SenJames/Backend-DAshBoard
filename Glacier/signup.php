<?php
	
	require 'includes/dbh.inc.php';
	// require_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico&display=swap">
    <link rel="stylesheet" type="text/css" href="assets/css/SIGNUP.css">
    <title>REGISTER</title>
</head>
<body>
    <div id="container">       
        <p id="center_heading">Get started today!</p>
        <?php  
        	if (isset($_GET['error'])) {
        		if ($_GET['error'] == "emptyfields") {
        			echo "<p>Sign Up Error</p>";
        		}else if ($_GET['error'] == "invalidemail&username") {
        			echo "<p>Sign Up Error(Password and Username do not match)</p>";
        		}
        		else if ($_GET['error'] == "invalidemail&fullname") {
        			echo "<p>Sign Up Error</p>";
        		} 
        		else if ($_GET['error'] == "usernametaken") {
        			echo "<p>Sign Up Error(Username Taken)</p>";
        		}
        		else if ($_GET['error'] == "passwordRepeat&username") {
        			echo "<p>Sign Up Error(Both passwords do not match)</p>";
        		}
        		 		
        	} else if (isset($_GET['signup'])) {

        			echo "<p>Signup Successful</p>";
        		}
        ?>
        <div class="display">
            <div class="view">
                <img src="assets/imgs/image.png" alt="just_an_image">
            </div>
            <div class="view">
                <form action="includes/signup.inc.php" method="POST" signup>
                    <input type="text" name="fullname" placeholder="Full name" required>
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="email" placeholder="me@glacier.com" required> 
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm password">
                    <input type="submit" name="submit" value="Create account">
                </form>
                <div footer>
                    <p>Already have an account? <a href="login.php">Login</a> </p>
                    <p>By creating an account, you agree to our <a href="#">terms, conditions & privacy policy</a> </p>
                </div>
               
            </div>

<?php 
 require_once 'footer.php';
 

?>