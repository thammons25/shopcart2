<?php
	include '../connect.php';
	include '../header.php';
	session_start();


	$catID = filter_var( $_GET["catID"] , FILTER_VALIDATE_INT );

	$sqlSelect = "SELECT name FROM categories WHERE id = " . $catID;

	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED -> cat -> " . mysqli_error( $myConn ) );
	}

	while( $row = mysqli_fetch_assoc( $result ) )
	{
		$catName = filter_var( $row["name"] , FILTER_SANITIZE_STRING );

	}

	$_SESSION["categoryID"] = $catID ;



	include './selectCategoryProducts.php';






	include '../footer.php';
?>
