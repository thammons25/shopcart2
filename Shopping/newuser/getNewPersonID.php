<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->

<?php
	// include '../connect.php';
	include '/shopping/connect.php';

	$sqlSelect = "SELECT id FROM persons ORDER BY id DESC LIMIT 1";

	$result = mysqli_query( $myConn , $sqlSelect );

	if( !$result )
	{
		die( "FAILED -> " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result ) == 1 )
	{
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			$_SESSION["personID"] = filter_var( $row["id"] , FILTER_VALIDATE_INT );
		}

	}
	else
	{
		echo "ERROR -> " . mysqli_error( $myConn );
		echo "<br />";
		echo $sqlSelect . "<br />";

	}







?>
