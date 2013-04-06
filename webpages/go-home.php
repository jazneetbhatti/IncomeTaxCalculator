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

		include "db-connect.php";
		$query = "TRUNCATE TABLE income_details";
		$result = mysql_query( $query ) or die( mysql_error() );

		$query = "TRUNCATE TABLE faculty_details";
		$result = mysql_query( $query ) or die( mysql_error() );

		header("location: index.php");
	}
?>