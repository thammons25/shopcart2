<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->

<?php
	// include '../connect.php';
	include '/shopping/connect.php';
	session_start();

	$sqlPrep = $myConn->prepare( "INSERT INTO personOrder( poCustomer , poOrder ) VALUES( ?,? )" );
	$sqlPrep->bind_param( "ii" , $customer , $order );

	$customer = filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );
	$order = filter_var( $_SESSION["orderID"] , FILTER_VALIDATE_INT );

	$sqlPrep->execute();








?>
