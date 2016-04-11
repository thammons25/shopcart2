<!-- THIS PAGE SHOWS A SECOND FORM AFTER THE USERNAME/PASSWORD ONE PROMPTING USER FOR NAME,ADDRESS STUFF -->
<!-- WONT LOAD UNLESS THE PREVIOUS PAGE WAS GONE TO PRIOR -->
<?php
	// include '../connect.php';
	include '/shopping/connect.php';
	include '../header.php';

	if( !isset( $_SESSION["logID"] ) || !isset( $_SESSION["logName"] ) )
	{
		echo "<h1>Oops! -> You need to create an account first! </h1>";
		echo "<p>You can do that -> <a href = './newUserFormOne.php'>HERE</a> </p>";
	}
	else
	{
?>
		<h2>Almost Done! - Finalize Your Info</h2>
		<div id = "newUserFormTwo">
			<form method = "post" action = "./createPerson.php">
				<p>First Name: <input type = "text" name = "forname" required /> </p>
				<p>Last Name: <input type = "text" name = "surname" required /> </p>
				<p>Street Address: <input type = "text" name = "street" required /> </p>
				<p>City: <input type = "text" name = "city" required /> </p>
				<p>State: <select id = "state" name = "state"></select> </p>
				<p>Zip Code: <input type = "text" name = "zip" required /> </p>
				<p>Phone: <input type = "tel" name = "phone" /> </p>
				<br />
				<input type = "submit" value = "Create Account!" />
			</form>
		</div>
<script language = "JavaScript">
<!--
	var allStates = [ '' , 'Alabama','Alaska','American Samoa','Arizona','Arkansas',
	'California','Colorado','Connecticut','Delaware','District of Columbia',
	'Federated States of Micronesia','Florida','Georgia','Guam','Hawaii',
	'Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana',
	'Maine','Marshall Islands','Maryland','Massachusetts','Michigan',
	'Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada',
	'New Hampshire','New Jersey','New Mexico','New York','North Carolina',
	'North Dakota','Northern Mariana Islands','Ohio','Oklahoma','Oregon',
	'Palau','Pennsylvania','Puerto Rico','Rhode Island','South Carolina',
	'South Dakota','Tennessee','Texas','Utah','Vermont','Virgin Island',
	'Virginia','Washington','West Virginia','Wisconsin','Wyoming'];

	var stateBar = document.getElementById( "state" );
	for( var i = 0 ; i < allStates.length ; i++ )
	{
		var myState = document.createElement( "option" );
		myState.innerHTML = allStates[i];
		myState.value = allStates[i];
		stateBar.appendChild( myState );
	}
//-->
</script>
<?php

	}
	include '../footer.php';			

?>
