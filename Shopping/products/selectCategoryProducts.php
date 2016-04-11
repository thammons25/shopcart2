<style type = "text/css">
	img {
		display: block;
		float: left;
		margin-right: 3%;
		min-width: 100px;
		min-height:160px;
		height: 25%;
		width: 15.5%;
	}

	#nestedList {
		display: block;
		list-style-type: none;
		line-height: 200%;
	}

	#allProducts {
		position: absolute;
		/*margin-left: 5%;*/
		width: 70%;
	}

</style>



<?php
	include '../connect.php';
	session_start();

	$sqlSelect = "SELECT prodID , prodTitle , prodDescription , price , image FROM products 
				  WHERE categoryID = " . $catID ;

	$result = mysqli_query( $myConn , $sqlSelect );
	if( !$result )
	{
		die( "FAILED( prod ) -> " . mysqli_error( $myConn ) );
	}

	if( mysqli_num_rows( $result ) > 0 )
	{
		echo "<h2>Products Available For " . $catName . "</h2>";
		echo "<br />";
		echo "<div id = 'allProducts'>";
			echo "<ol>";
				while( $row = mysqli_fetch_assoc( $result ) )
				{
					$prodID = filter_var( $row["prodID"] , FILTER_VALIDATE_INT );
					$title = filter_var( $row["prodTitle"] , FILTER_SANITIZE_STRING );
					$describe = filter_var( $row["prodDescription"] , FILTER_SANITIZE_STRING );
					$price = filter_var( $row["price"] , FILTER_VALIDATE_FLOAT );
					$image = $row["image"];

					echo "<div id = 'item" . $prodID . "' >";
						echo "<li>";
							echo "<h3>";
								echo "<a href = './productDetails.php?prodID=" . $prodID . "'>" . $title . "</a>";
								echo "<img src = '" . $image . "' alt = '" . $title . "' id = 'product" . $prodID . "'/>";
								// echo "<img src ='" . $image . "' />";
							echo "</h3>";
							echo "<ul id = 'nestedList'>";
								echo "<li class = 'nested'>" . $describe . "</li>";
								echo "<li class = 'nested'>Price: $" . $price . "</li>";
							echo "</ul>";
						echo "</li>";
						echo "<br />";
						echo "<form method = 'post' action = './addToCart.php?prodID=" . $prodID . "'>";
							// echo "Quantity:";
							echo "Quantity: <select name = 'howMany'>";
								$i = 0;
								while( $i < 10 )
								{
									$j=$i+1;
									if( $i == 0 )
									{
										echo "<option></option>";
									}
									// echo "<option value = '" . $j . "'>" . $j . "</option>";
									echo "<option value = " . $j . ">" . $j . "</option>";
									$i++;
								}
							echo "</select>";
							echo "<br />";
							echo "<br />";
							echo "<input type = 'hidden' name = 'cost' value =" . $price . " />";
							echo "<input type = 'submit' value = 'Add To Cart!' onclick = 'confirmCartItem(" . $prodID . ")' />";
						echo "</form>";
						echo "<br />"; 
						echo "<br />";
						echo "<br />";
						echo "<br />";
						echo "<br />";
						echo "<br />";
					echo "</div>";
				}
			echo "</ol>";
		echo "</div>";
	}
	else
	{
		echo "<h2>No products exist for " . $catName . " yet!</h2>";
	}

?>
<script language = "JavaScript">
<!--
	function confirmCartItem( productNum )
	{
		var prodName = document.getElementById( "product"+productNum);
		prodName = prodName.alt;
		alert( "Adding " + prodName + " to your cart!" );
		// var confirm = window.confirm( "Purchase " + prodName + "?" );
		// var confirm = window.confirm( "Add " + prodName + " to your cart?" );
		// if( !confirm )
		// {
		// 	preventDefault();
		// 	window.location.reload();
		// }
		// else
		// {
		// 	form.submit();
		// }
		// alert( confirm );
	}
//-->
</script>

