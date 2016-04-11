<?php
	include './connect.php';
	session_start();

	$sqlSelect = "SELECT id , name FROM categories";

	$result = mysqli_query( $myConn , $sqlSelect );

	if( !$result )
	{
		die( "FAILED -> " . mysqli_error( $myConn ) );
	}

	while( $row = mysqli_fetch_assoc( $result ) )
	{
		$catID = filter_var( $row["id"] , FILTER_VALIDATE_INT );
		$catName = filter_var( $row["name"] , FILTER_SANITIZE_STRING );

		echo "<a href = '/shopping/products/products.php?catID=" . $catID . "'>" . $catName . "</a>";
		echo "<br height = '.5' />";
		echo "<br />";
	}
?>
