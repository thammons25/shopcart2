<?php
	include '../connect.php';



	$sqlSelect = "SELECT name FROM categories WHERE id = '" . $getCategory . "'";

	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED -> cat -> " . mysqli_error( $myConn ) );
	}

	while( $row = mysqli_fetch_assoc( $result ) )
	{
		$catName = filter_var( $row["name"] , FILTER_SANITIZE_STRING );

	}

	





?>
