<?php
	session_start();
	include "db-connect.php";

	$fId = $_SESSION['fId'] = $_POST['faculty-id'];
	$fName = $_SESSION['faculty-name'] = $_POST['faculty-name'];
	$desig = $_SESSION['designation'] = $_POST['designation'];
	$fYear = $_SESSION['financial-year'] = $_POST['financial-year'];

	$query = "SELECT count(*) FROM faculty_details " .
					 "WHERE id='$fId' AND year='$fYear'";
	$result = mysql_query( $query ) or die( mysql_error() );
	$row = mysql_fetch_array( $result );
	mysql_free_result( $result );

	if( $row[0] == 0 )
	{
		$query = "INSERT INTO faculty_details " .
						 "values( '$fId', '$fName', '$desig', '$fYear' )";
		mysql_query($query) or die('Could not update DB \'user\':'.mysql_error());

		header("location: income-details.php");
	}
	else
	{
		header("location: income-details.php");
	}
?>