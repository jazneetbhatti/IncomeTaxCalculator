<?php
	session_start();

// Establish database connection
	include "db-connect.php";

// Set up session variables for use during the entire session
	$fId = $_SESSION['fId'] = $_POST['faculty-id'];
	$fName = $_SESSION['faculty-name'] = $_POST['faculty-name'];
	$desig = $_SESSION['designation'] = $_POST['designation'];
	$fYear = $_SESSION['financial-year'] = $_POST['financial-year'];

	$query = "SELECT count(*) FROM faculty_details " .
					 "WHERE id='$fId' AND year='$fYear'";

// Execute the query
	$result = mysql_query( $query ) or die( mysql_error() );
//Fetch the results
	$row = mysql_fetch_array( $result );
	mysql_free_result( $result );

// Create a faculty details entry only if the id and year do not already exist
	if( $row[0] == 0 )
	{
		$query = "INSERT INTO faculty_details " .
						 "values( '$fId', '$fName', '$desig', '$fYear' )";
		mysql_query($query) or die('Could not update DB \'user\':'.mysql_error());

		header("location: income-details.php");
	}
// If the id and year already exist in the database possibly because of some previous
// improperly closed session, do not create a new faculty details entry
	else
	{
		header("location: income-details.php");
	}
?>