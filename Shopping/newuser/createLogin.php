<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->

<script language = "JavaScript">
<!--
	window.onload = function()
	{
		window.location.href = "./newUserFormTwo.php";
	}
//-->
</script>
<?php
	include '/shopping/connect.php';
	// include '../connect.php';
	// include './header.php';
	session_start();

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		echo "<h1>Oops - Not sure youre in the right place!</h1>";
		echo "<p><a href = '../'>RETURN HOME HERE</a></p>";
	}
	else
	{
		if( !isset( $_SESSION["customerID"] ) )
		{
			include './addNewCustomerID.php';
		}
		else
		{	
			$sqlPrep = $myConn->prepare( "INSERT INTO logins( username , password , customerID ) VALUES( ?,?,?)" );
			$sqlPrep->bind_param( "ssi" , $user , $pass , $cID );

			$user = filter_var( $_POST["username"] , FILTER_SANITIZE_STRING );
			$pass = md5( $_POST["password"] );
			$cID = filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );

			$confirm = $sqlPrep->execute();
			if( !$confirm )
			{
				echo "ERROR( 1 ) -> " . mysqli_error( $myConn );
				echo "<br />";
				echo $sqlPrep;
				echo "<br />";
			}
			else
			{
				$_SESSION["logStatus"] = 1;
				include './getNewUserNameID.php';
			}
		}

	}

	// include './footer.php';
?>




