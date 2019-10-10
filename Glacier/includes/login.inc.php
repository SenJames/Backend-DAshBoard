<?php

if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';

	$mailusername = $_POST['useremail'];
	$password = $_POST['userpwd'];

	if (empty($mailusername)  || empty($password)) {
		header("Location: ../login.php?error=emptyfields");
		exit();
	}
	else{

		$sql = "SELECT * FROM `users` WHERE username=? OR email=?";

		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.php?error=sqlError");
			exit();
		}
		else{

			mysqli_stmt_bind_param($stmt, "ss", $mailusername, $mailusername);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['password']);

				if ($pwdCheck == false) {
					header("Location: ../login.php?error=wrongPwd");
					exit();
				}
				else if($pwdCheck == true){
					session_start();

					$_SESSION['userId'] = $row['id'];
					$_SESSION['username'] = $row['username'];

					header("Location: ../index.php?login=success");
					exit();
					
				}
				else{
					header("Location: ../login.php?error=wrongPass");
					exit();
				}
			}
			else{
				header("Location: ../login.php?error=noUser");
				exit();
			}
		}
	}

}
else{
	header("Location: ../login.php");
	exit();
}
