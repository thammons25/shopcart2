<script language = "JavaScript">
<!--
	window.onload = function()
	{
		window.history.back();
	}
//-->
</script>

<?php
	include '../connect.php';
	include '../header.php';
	session_start();

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'location: /shopping/' );
	}

	$sqlPrep = $myConn->prepare( "INSERT INTO productAmt( productID , quantity , customerID , categoryID ) VALUES(?,?,?,?)" );
	$sqlPrep->bind_param( "iiii" , $product , $amt , $customer , $category );

	$product = filter_var( $_GET["prodID"] , FILTER_VALIDATE_INT );
	$amt = filter_var( $_POST["howMany"] , FILTER_VALIDATE_INT );
	$customer = filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );
	$category = filter_var( $_SESSION["categoryID"] , FILTER_VALIDATE_INT );

	$confirm = $sqlPrep->execute();

	if( !$confirm )
	{
		die( "FAILED( prod ) -> " . mysqli_error( $myConn ) );
	}
	else
	{
		$prodCost = filter_var( $_POST["cost"] , FILTER_VALIDATE_FLOAT );
		$totalCost = $prodCost * $amt ;
		$_SESSION["purchaseCost"] += $totalCost;
	}
	include '../footer.php';
?>
