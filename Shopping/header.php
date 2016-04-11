<?php
	include '/shopping/connect.php';
	session_start();
	// print_r( $_SESSION );
?>
<html>
	<head>
		<title>Shopping Cart - PHP/MYSQL</title>
		<link rel = "stylesheet" type = "text/css" href = "/shopping/style.css" />
	</head>

	<body>
		<div id = "header"></div>
		<div id = "menu">
			<a href = "/shopping/">Home</a>
			--
			<a href = "/shopping/showcart.php">View Basket/Checkout</a>

		<!-- THIS PHP IS THE SAME AS THE HTML <a> TAGS ABOVE IT JUST ONLY SHOWS UP WHEN YOURE LOGGED IN -->
		<?php
			if( $_SESSION["logStatus"] == 1 && isset( $_SESSION["logName"] ) )
			{
				echo " -- "; 
				echo "<a href = '/shopping/viewAccount.php'>View Account</a>";
			}
		?>


		</div>
		<div id = "container">
			<div id = 'bar'>

				<!-- THIS APPEARS ON THE RIGHT SIDE OF THE PAGE  -->
				<!-- THE FIRST BLOCK JUST SHOWS A MESSAGE TO SOMEONE LOGGED IN -->
				<!-- BOTTOM MESSAGE TO SOMEONE WHO IS NOT LOGGED IN -->
				<?php
					include '/Applications/MAMP/htdocs/shopping/sideBar.php';
					echo "<hr />";
					if( $_SESSION["logStatus"] == 1 && isset( $_SESSION["logName"] ) )
					{
						echo "<p>Welcome Back, <strong>" . $_SESSION["logName"] . "</strong></p>";
						echo "<p>All Done Shopping? - <strong><a href = '/shopping/logout/logout.php'>Logout</a></strong></p>";
					}
					else
					{
						echo "<p><strong>Already A Member?</strong> - <a href = '/shopping/login/loginForm.php'>Login</a></p>";
						echo "<p>
								<strong>New To This Site?</strong> - <a href = '/shopping/newuser/newUserFormOne.php'>Create An Account!</a>
							 </p>";
					}
				?>
			</div>
			<div id = 'main'> <!-- CLOSES IN FOOTER -->











