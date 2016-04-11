<style type = "text/css">
	#everyItem {
		margin-left: 3.5%;
		/*border: 1px solid black;*/
	}

	img {
		float: left;
		min-width: 100px;
		min-height: 160px;
		height: 25%;
		width: 15.5%;
	}
	#showItem {
		/*padding-left: 20%;*/
		/*padding: 1%;*/
		padding-left: 17.5%;
		/*padding-top: .005%;*/

	}

	#totalDue {
		display: none;
	}

	button.alterItem {
		margin-right: 10px;
	}

	input {
		float: left;
		margin-right: 10px;
	}



</style>

<?php
	include './connect.php';
	include './header.php';
	session_start();

	if( $_SESSION["logStatus"] != 1 || !isset( $_SESSION["logName"] ) )
	{
		echo "<h1>You need to sign in first to view your cart!</h1>";
		echo "<h3><a href = '/shopping/login/loginForm.php'>Login</a></h3>";
		echo "<h3><a href = '/shopping/newuser/newUserFormOne.php'>Create Account</a></h3>";
	}
	else
	{
		$sqlSelect = "SELECT productID , quantity , categoryID FROM productAmt 
					  WHERE customerID = " . filter_var( $_SESSION["customerID"] , FILTER_VALIDATE_INT );
		$result = mysqli_query( $myConn , $sqlSelect );
		if( !$result )
		{
			die( "FAILED -> " . mysqli_error( $myConn ) );
		}
		else
		{
			if( mysqli_num_rows( $result ) > 0 )
			{
				$_SESSION["cartItems"] = array();
				$_SESSION["cartItemsCategory"] = array();
				$_SESSION["itemQuantity"] = array();
				$_SESSION["cartTotal"] = 0;
				while( $row = mysqli_fetch_assoc( $result ) )
				{
					$product = filter_var( $row["productID"] , FILTER_VALIDATE_INT );
					$category = filter_var( $row["categoryID"] , FILTER_VALIDATE_INT );
					$amt = filter_var( $row["quantity"] , FILTER_VALIDATE_INT );
					array_push( $_SESSION["cartItems"] , $product );
					array_push( $_SESSION["cartItemsCategory"] , $category );
					array_push( $_SESSION["itemQuantity"] , $amt );
				}
			}
			else
			{
				echo "<h2>You have not items in your cart!</h2>";
			}
			$i = 0;
			echo "<h1>Your Current Shopping Cart!</h1>";
			echo "<br />";
			echo "<br />";
			echo "<div id = 'everyItem'>";
				while( $i < count( $_SESSION["cartItems"] ) )
				{
					$item = filter_var( $_SESSION["cartItems"][$i] , FILTER_VALIDATE_INT );
					$itemCat = filter_var( $_SESSION["cartItemsCategory"][$i] , FILTER_VALIDATE_INT );
					$itemAmt = filter_var( $_SESSION["itemQuantity"][$i] , FILTER_VALIDATE_INT );
					// echo "item => " . $item . "<br />";
					// echo "itemCat => " . $itemCat . "<br />";
					// echo "itemAmt => " . $itemAmt . "<br />";

					$sqlSelect = "SELECT prodID , prodTitle , prodDescription , price , image FROM products 
								  WHERE prodID = '" . $item . "' AND categoryID = '" . $itemCat . "'";
					$result = mysqli_query( $myConn , $sqlSelect );
					if( !$result )
					{
						die( "FAILED(2) -> " . mysqli_error( $myConn ) );
					}
					while( $row = mysqli_fetch_assoc( $result ) )
					{
						$image = filter_var( $row["image"] , FILTER_SANITIZE_STRING );
						echo "<h3> <img src = '" . $image . "' /> </h3>";
						echo "<div id = 'showItem'>";
							echo "<h3>" . filter_var( $row["prodTitle"] , FILTER_SANITIZE_STRING ) . "</h3>";
							echo "<p><strong>Description</strong> -> " . filter_var( $row["prodDescription"] , FILTER_SANITIZE_STRING ) . "</p>";
							echo "<p><strong>Cost</strong> -> $" . filter_var( $row["price"] , FILTER_VALIDATE_FLOAT ) . "</p>";
							echo "<p id = 'theQuantity" . $i . "'><strong>Quantity</strong> -> " . $itemAmt . "</p>";
							echo "<p><strong>Total</strong> -> $" . $itemAmt * filter_var( $row["price"] , FILTER_VALIDATE_FLOAT ) . "</p>";
							$_SESSION["cartTotal"] += $itemAmt * filter_var( $row["price"] , FILTER_VALIDATE_FLOAT );
							// echo "<button class = 'alterItem' id = 'updateItem" . filter_var( $row["prodID"] , FILTER_VALIDATE_INT ) . "'>Update Quantity</button>";
							// echo "<button class = 'alterItem' id = 'removeItem" . filter_var( $row["prodID"] , FILTER_VALIDATE_INT ) . "'>Remove From Cart</button>";
							// echo "<button class = 'updateItem'>Update Quantity</button>";
							// echo "<button class = 'removeItem'>Remove From Cart</button>";
							echo "<button class = 'alterItem' onclick = 'updateAmt(" . $i . ")'>Update Quantity</button>";
							echo "<button class = 'alterItem' onclick = 'removeItem(" . $i . ")'>Remove From Cart</button>";


							echo "<form id = 'myForm" . $i . "' method = 'post' action = '/shopping/updateQuantity.php'>";
								echo "<input type = 'hidden' name = 'item' value = '" . $item . "' />";
								echo "<input type = 'hidden' name = 'itemCat' value = '" . $itemCat . "' />";
								echo "<input id = 'update" . $i . "' type = 'hidden' name = 'newQuantity' />";
								// echo "<input type = 'submit' value = 'Update Quantity' />";
							echo "</form>";


							echo "<form method = 'post' action = '/shopping/removeFromCart.php'>";
								echo "<input type = 'hidden' name = 'item' value = '" . md5( $item ) . "' />";
								echo "<input type = 'hidden' name = 'itemCat' value = '" . md5( $itemCat ) . "' />";
								// echo "<input type = 'submit' value = 'Remove From Cart' />";
							echo "</form>";
							// echo "<br />prodID => " . $item . "<br />";
							// echo "catID => " . $itemCat . "<br />";
						echo "</div>"; //CLOSES DIV FOR SHOWITEM 
						echo "<br />";
						echo "<br />";
						echo "<br />";
					} //ENDS WHILE( $ROW )
				$i++;
			
			} //ENDS WHILE LOOP WITH $i 
			echo "</div>"; //ENDS DIV FOR EVERYITEM
			echo "<p id = 'totalDue'>" . $_SESSION["cartTotal"] . "</p>";
			echo "<h2 id = 'showTotal'>Current Cart Total: $</h2>";
			// echo ""
		} //ENDS ELSE FOR IF( !$RESULT ) FOR SELECT FORM PRODCUT AMT 
	} //ENDS ELSE FOR NOT BEING LOGGED IN
	include './footer.php';
?>
<script language = "JavaScript">
<!--
	window.onload = function()
	{
		var setTotal = document.getElementById( "totalDue" ).innerHTML;
		var getTotal = document.getElementById( "showTotal" );
		getTotal.innerHTML += setTotal;
		getTotal.innerHTML += " (tax not yet included)";
	}

	function updateAmt( itemNumber )
	{
		var changeAmt = window.prompt( "Enter New Quantity" );
		// var getAmt = document.getElementById( "theQuantity" + itemNumber );
		// getAmt.innerHTML = changeAmt;
		alert( "new amt -> " + changeAmt );

		var changeForm = document.getElementById( "update" + itemNumber );
		// alert( "new value -> " + changeForm )
		changeForm.value = changeAmt;

		var getForm = document.getElementById( "myForm" + itemNumber );
		getForm.submit();
	}



//-->
</script>








