<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->

<?php
	// include '../connect.php';
	include '/shopping/connect.php';
	session_start();

	$sqlSelect = "SELECT id , username FROM logins ORDER BY id DESC LIMIT 1";

	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED -> " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result ) == 1 )
	{
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$_SESSION["logID"] = filter_var( $row["id"] , FILTER_VALIDATE_INT );
			$_SESSION["logName"] = filter_var( $row["username"] , FILTER_SANITIZE_STRING );
		}
	}
?>
