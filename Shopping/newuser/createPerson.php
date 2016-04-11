<!-- IF THERE IS A LOGGING IN PROBLEM THEN GET RID OF JAVASCRIPT FUNCTION AND UNCOMMENT THE SUCCESS! <a> tag 4/9/16-->

<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->
	<!-- UNLESS THE JAVASCRIPT FUNCTION IS FUNNY -->
<script language = "JavaScript">
<!--
	window.onload = function()
	{
		window.location.href = '/shopping/';
	}
</script>

<?php
	include '../connect.php';
	include '../header.php';
	session_start();

	if( $_SERVER["REQUEST_METHOD"] != "POST" )
	{
		header( 'Location: ../' );
	}

	$sqlPrep = $myConn->prepare( "INSERT INTO persons( fname , lname , street , city , state , zip , phone , customerID ) 
		VALUES(?,?,?,?,?,?,?,?)" );
	$sqlPrep->bind_param( "sssssssi" , $first , $last , $street , $city , $state , $zip , $phone , $cID );

	$first = filter_var( $_POST["forname"] , FILTER_SANITIZE_STRING);
	$last = filter_var( $_POST["surname"] , FILTER_SANITIZE_STRING);
	$street = filter_var( $_POST["street"] , FILTER_SANITIZE_STRING );
	$city = filter_var( $_POST["city"] , FILTER_SANITIZE_STRING );
	$state = filter_var( $_POST["state"] , FILTER_SANITIZE_STRING );
	$zip = filter_var( $_POST["zip"] , FILTER_SANITIZE_STRING );
	$phone = filter_var( $_POST["phone"] , FILTER_SANITIZE_STRING );
	$cID = filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );

	$sqlPrep->execute();

	include './getNewPersonID.php';


	// echo "<h2>Success! - <a href = './setNewOrderID.php'>Start Shopping!</a> </h2>";

	include '../footer.php';







?>
