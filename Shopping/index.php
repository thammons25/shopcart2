<?php
	session_start();
	include './connect.php';
	include './header.php';


	if( $_SESSION["logStatus"] == 1 && isset( $_SESSION["logName"] ) )
	{
		echo "<h1>Hello, " . $_SESSION["logName"] . "!</h1>";
	}
	else
	{
		echo "<h1>Hello, World!</h1>";
	}


	
	echo "<br />";
	// print_r( $_SESSION );
	include '/footer.php';






?>
