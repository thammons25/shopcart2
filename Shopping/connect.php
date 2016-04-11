<?php
	$host = "localhost:3306";
	$user = "root";
	$pass = "qweasd";
	$db = "ShopCart";

	$configBasedir = "localhost/newstuff/";
	$configSitename = "newstuff";

	$myConn = mysqli_connect( $host , $user , $pass , $db );

	if( !$myConn )
	{
		die( "FAILED(!!!!!) -> " . mysqli_connect_error($myConn ) );
	}
?>
