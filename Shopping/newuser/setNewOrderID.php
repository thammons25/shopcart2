<!-- THIS PAGE DOESNT DISPLAY ANYTHING TO THE USER  -->
<script language = "JavaScript">
<!--
	window.onload = function()
	{
		// window.location.href = '../';
		window.location.href = '/shopping/';
	}
//-->
</script>
<?php
	// include '../connect.php';
	include '/shopping/connect.php';
	// include './header.php';
	session_start();

	$sqlInsert = "INSERT INTO orders(total) VALUES( 0.0 )";

	$result = mysqli_query( $myConn , $sqlInsert );
	if( !$result )
	{
		die( "FAILED -> " . mysqli_error( $myConn ) );
	}
	else
	{
		$sqlSelect = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";
		$result = mysqli_query( $myConn , $sqlSelect );
		if( !$result )
		{
			die( "FAILED(1) -> " . mysqli_error( $myConn ) );
		}

		if( mysqli_num_rows( $result ) == 1 )
		{
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$_SESSION["orderID"] = filter_var( $row["orderID"] , FILTER_VALIDATE_INT );
			}
			include './insertPersonOrder.php';
		}
		else
		{
			// echo "error -> " . mysqli_error
			echo "ERROR!<br />";
			echo $sqlSelect . "<br />";
			echo $result . "<br />";
		}
	}
	include './storeSessionVars.php';








?>
