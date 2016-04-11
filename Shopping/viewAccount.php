<style type = "text/css">
	table {
		float: left;
	}
	#customerTable {
		margin-left: 125px;
	}
	#actualInfo {
		border-left: none;
	}
	th , td {
		height: 50px;
		padding: 5px;
	}
	#acctInfo {
		margin-left: 155px;
		/*text-align: left;*/
		/*float: left;*/
	}
</style>

<?php
	include './connect.php';
	include './header.php';
	session_start();

	$sqlSelect = "SELECT fname , lname , street , city , state , zip , phone FROM persons
				  WHERE id = " . filter_var( $_SESSION["personID"] , FILTER_VALIDATE_INT );
	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED -> " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result ) == 1 )
	{
		echo "<h1 id = 'acctInfo'>" . $_SESSION["logName"] . " Account Information</h1>";
		echo "<br />";
	?>
		<table border = ".50" id = "customerTable">
			<tr>
				<th>Name</th>
			</tr>
			<tr>
				<th>Street</th>
			</tr>
			<tr>
				<th>City,State Zip</th>
			</tr>
			<tr>
				<th>Phone</th>
			</tr>
		</table>
	<?php
		echo "<table border = '.50' id = 'actualInfo'>";
			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$first = filter_var( $row["fname"] , FILTER_SANITIZE_STRING );
				$last = filter_var( $row["lname"] , FILTER_SANITIZE_STRING );
				$street = filter_var( $row["street"] , FILTER_SANITIZE_STRING );
				$city = filter_var( $row["city"] , FILTER_SANITIZE_STRING );
				$state = filter_var( $row["state"] , FILTER_SANITIZE_STRING );
				$zip = filter_var( $row["zip"] , FILTER_SANITIZE_STRING );
				$phone = filter_var( $row["phone"] , FILTER_SANITIZE_STRING );

				echo "<tr>";
					echo "<td>" . $first . " " . $last . "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>" . $street . "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>" . $city . "," . $state . " " . $zip . "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>(" . $phone[0] , $phone[1] , $phone[2] . ")-" . 
								   $phone[3] , $phone[4] , $phone[5] . "-" .
								   $phone[6] , $phone[7] , $phone[8] , $phone[9] . 
						"</td>";
				echo "</tr>";
			}
		echo "</table>";

	}





?>
