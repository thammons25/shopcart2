<?php
	include '../connect.php';
	session_start();

	$sqlSelect = "SELECT customerID , logID , logName , personID , orderID FROM sessionVars 
				  WHERE logID = " . filter_var( $_SESSION["logID"] , FILTER_VALIDATE_INT );
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED TO SET SESSION -> " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result ) == 1 )
	{
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$cID = filter_var( $row["customerID"] , FILTER_VALIDATE_INT );
			$name = filter_var( $row["logName"] , FILTER_SANITIZE_STRING );
			$pID = filter_var( $row["personID"] , FILTER_VALIDATE_INT );
			$oID = filter_var( $row["orderID"] , FILTER_VALIDATE_INT );
			$_SESSION["customerID"] = $cID;
			$_SESSION["logName"] = $name;
			$_SESSION["personID"] = $pID;
			$_SESSION["orderID"] = $oID;
		}
	}
?>
