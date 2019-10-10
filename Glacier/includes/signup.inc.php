<?php

if (isset($_POST['submit'])) {
	
	require 'dbh.inc.php';

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['confirm_password'];

//if empty input
	if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&fullname="); //. $fullname."&username=". $username."&email".$email);
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
		header("Location: ../signup.php?error=invalidemail&username=");
		exit();
	}
	//if email is invalid return error
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidemail&fullname=");
		exit();
	}
	//checking for valid password
	elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?error=invalidusername&email=");
		exit();
	}
	//check confirmed password
	else if($password !== $passwordRepeat){
		header("Location: ../signup.php?error=passwordRepeat&username=");
		exit();
	}
	//if username is already taken
	else{

		$sql = "SELECT username FROM `users` WHERE username=?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);

			//did we get a match?

			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?error=usernametaken");// .$username);
				exit();
			}
			else{
				$sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)";

				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);


					mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();
}