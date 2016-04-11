<?php
	include '../connect.php';
	include '../header.php';
	session_start();

	if( $_SESSION["logStatus"] != 0 || $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'location: ../' );
	}

	$user = filter_var( $_POST["username"] , FILTER_SANITIZE_STRING );
	$pass = md5( $_POST["password"] );

	$sqlSelect = "SELECT id , username , password FROM logins 
				  WHERE username = '" . $user . "' 
				  AND password = '" . $pass . "'";

	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED -> " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result ) == 1 )
	{
		$_SESSION["logStatus"] = 1;
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$_SESSION["logID"] = filter_var( $row["id"] , FILTER_VALIDATE_INT );
		}
		include './setSessionVars.php';
		// echo "<h2>Success! - <a href = '../'>Start Shopping!</a></h2>";
		echo "<script>window.onload=function(){window.location.href='/shopping/';}</script>";
	}
	else
	{
		echo "<p>Incorrect username/password combination</p>";
		echo "<p><a href = './loginForm.php'>Try Again</a></p>";
	}
	include '../footer.php';
?>
