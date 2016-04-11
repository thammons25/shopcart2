<!-- THIS PAGE DISPLAYS A FORM FOR THE USER AND PROMPTS THEM FOR A USERNAME AND PASSWORD -->
<!-- IT APPEARS UNDERNEATH THE HOME BAR UNDER THE HEADER -->
<?php
	// include '../connect.php';
	include '/shopping/connect.php';
	include '../header.php';
	session_start();

	$_SESSION["logStatus"] = 0;

	// if( $_SESSION["logStatus"] != 0 )
	if( !isset( $_SESSION["logStatus"] ) )
	{
		// header("Location: ../");
		header( 'Location: /shopping/')
	}
	// include './addNewCustomerID.php';
	include '/shopping/addNewCustomerID.php';
?>
<style type = "text/css">
	#newUserFormOne {
		width: 20%;
	}
	#newUserFormOne p {
		width: 100%;
		
		/*box-sizing: border-box;*/
	}



</style>
<h2>Create New Account!</h2>
<div id = "newUserFormOne">
	<form method = "post" action = "./createLogin.php">
		<p>Username: <input type = "text" name = "username" required /> </p>
		<p>Password: <input type = "password" name = "password" required /> </p>
		<p>Password Again: <input type = "password" name = "passwordAgain" required /></p>
		<br />
		<input type = "submit" value = "Create Account!" />
	</form>
</div>


<?php
	include '../footer.php';
?>