<?php 
   require_once 'header.php' ;

?>
		<div class="login">
				<?php 

					if (isset($_SESSION['username'])) {
						echo"<h1>Hello User, You have successfully Logged in</h1>
							<form action='includes/logout.inc.php' method='POST' signup>
                    <a href='login.php'><input type='submit' name='submit' value='Log Out'></a>
                </form>";
					}else{
						echo"<h1>Hello User, You are Logged Out!</h1>
										<hr><br><br>
										<a href='login.php'><input type='submit' name='submit' value='Log in'></a>";
					}

				?>
				
				<hr>


				<br>
				<br>
			</form>
		</div>

<?php 
   require_once 'footer.php'; 
?>