<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->
<?php
	// include '../connect.php';
	include '/shopping/connect.php';
	session_start();

	if( $_SESSION["logStatus"] == 1 || isset( $_SESSION["customerID"] ) )
	{
		header( 'Location: ../' );
	}

	$sqlInsert = "INSERT INTO customers() VALUES()";

	$confirm = mysqli_query( $myConn , $sqlInsert );
	if( !$confirm )
	{
		echo "ERROR(INS-CUST) -> " . mysqli_error( $myConn );
		exit();
	}
	else
	{
		$sqlSelect = "SELECT id FROM customers ORDER BY id DESC LIMIT 1";

		$result = mysqli_query( $myConn , $sqlSelect );
		if( !$result )
		{
			echo "ERROR(SEL CUST) -> " . mysqli_error( $myConn );
			exit();
		}

		if( mysqli_num_rows( $result ) == 1 )
		{
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$cID = filter_var( $row["id"] , FILTER_VALIDATE_INT );
				$_SESSION["customerID"] = $cID;
			}
		}
	}







?>
