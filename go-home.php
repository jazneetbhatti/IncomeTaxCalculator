<?php
	session_start();

	if( $_POST['submit'] == "Back" )
	{
		header("location: income-details.php");
	}
	else
	{
		session_unset();
		session_destroy();
		header("location: index.php");
	}
?>