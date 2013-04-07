<?php
	session_start();

	if( $_POST['submit'] == "Back" )
	{
		header("location: income-details.php");
	}
	else
	{
		include "db-connect.php";

		$fId = $_SESSION['fId'];

		$query = "DELETE FROM income_details WHERE id = '$fId'";
		$result = mysql_query( $query ) or die( mysql_error() );

		$query = "DELETE FROM faculty_details WHERE id = '$fId'";
		$result = mysql_query( $query ) or die( mysql_error() );

		session_unset();
		session_destroy();

		header("location: index.php");
	}
?>