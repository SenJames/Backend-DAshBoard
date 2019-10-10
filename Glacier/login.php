<?php 
session_start();
 require 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico&display=swap">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<title>Login</title>
</head>
<body>
        <h1>Glacier</h1>
    <div id="container">
       
        <p id="center_heading">Login</p>
        <div class="display">
            <div class="view">
                <img src="https://res.cloudinary.com/jammie/image/upload/v1569006201/image_gx27eg.png" alt="just_an_image">
            </div>
            <div class="view">
			<form action="includes/login.inc.php" method="POST" signup>
				        <?php  
			        	if (isset($_GET['error'])) {
			        		if ($_GET['error'] == "wrongPwd") {
			        			echo "<p>Login Error(Wrong Password)</p>";
			        		}else if ($_GET['error'] == "noUser") {
			        			echo "<p>Login Error(No user found)</p>";
			        		}
			        		else if ($_GET['error'] == "invalidemail&fullname") {
			        			echo "<p>Sign Up Error</p>";
			        		}
			        		else if ($_GET['error'] == "emptyfields") {
			        			echo "<p>All spaces required</p>";
			        		} 
			        		else if ($_GET['error'] == "sqlError") {
			        			echo "<p>Sql_error(Contact Admin)</p>";
			        		}
			        		 		
			        	} else if (isset($_GET['success'])) {

			        			echo "<p>login Successful</p>";
			        		}
       					 ?>
                    <input type="text" name="useremail" id="useremail" placeholder="Username">
                    <input type="password" name="userpwd" id="password" placeholder="Password">
                    <input type="submit"  name="login-submit" value="Login">

                <div footer>
                    <p>Don't have an account? <a href="signup.php">Create An Account</a> </p>
                </div>
			</form>
		</div>


<?php 
 require_once 'footer.php';
 

?>