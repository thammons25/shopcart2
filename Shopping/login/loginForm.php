<?php
	include '../connect.php';
	include '../header.php';
	session_start();

	if( $_SESSION["logStatus"] != 0 )
	{
		header( 'location: ../' );
	}
?>
<style type = "text/css">
	#loginForm {
		width: 20%;
	}
	#loginForm p {
		width: 100%;
	}
</style>

<h2>Login And Start Shopping!</h2>
<div id = "loginForm">
	<form method = 'post' action = './selectExistingUser.php'>
		<p>Username: <input type = 'text' name = 'username' required /> </p>
		<p>Password: <input type = 'password' name = 'password' required /> </p>
		<br />
		<input type = 'submit' value = "Login!" />
	</form>
</div>


<?php
	include '../footer.php';
?>

