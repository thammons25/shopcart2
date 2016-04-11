<!-- THIS PAGE DOES NOT DISPLAY ANY HTML CONTENT FOR USER -->
<script language = "JavaScript">
<!--
	window.onload = function()
	{
		window.location.href = "/shopping/";
	}
//-->
</script>
<?php
	include '../connect.php';
	session_start();

	if( $_SESSION["logStatus"] != 1 )
	{
		// header( 'location: ../' );
		header( 'location: /shopping/');
	}


	$_SESSION = array();

	if( ini_get( "session.use_cookies" ) )
	{
		$params = session_get_cookie_params();
		setcookie( session_name() , '' , time()-42000 , 
			$params["path"] , $params["domain"] ,
			$params["secure"] , $params["httponly"]);

	}
	session_destroy();
?>
