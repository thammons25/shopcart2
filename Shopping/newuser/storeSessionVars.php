<?php
	include '/shopping/connect.php';
	// include '../connect.php';
	session_start();

	$sqlPrep = $myConn->prepare( "INSERT INTO sessionVars( customerID , logID , logName , personID , orderID ) VALUES(?,?,?,?,?)");
	$sqlPrep->bind_param( "iisii" , $cID , $lID , $name , $pID , $oID );

	$cID = filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );
	$lID = filter_var( $_SESSION["logID"] , FILTER_VALIDATE_INT );
	$name = filter_var( $_SESSION["logName"] , FILTER_SANITIZE_STRING );
	$pID = filter_var( $_SESSION["personID"] , FILTER_VALIDATE_INT );
	$oID = filter_var( $_SESSION["orderID"] , FILTER_VALIDATE_INT );

	$sqlPrep->execute();

?>
