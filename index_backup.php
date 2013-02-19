<?php
	session_start();
	if( isset( $_SESSION['page'] ) )
	{
		$_SESSION['page'] = $_SESSION['page'] + 1;
	}
	else
	{
		$_SESSION['page'] = 1;
	}
?>

<?php
	include "dbConnect.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Income Tax Calculator</title>
	</head>

	<body>
		<?php
			if( $_SESSION['page'] == 1 )
			{
		?>
				<div id="form-wrapper">
					<form method="post" action="index.php" id="facultyDetailsForm">
						<div><input id="facultyId" type="text" placeholder="ID"/></div>
						<div><input id="facultyName" type="text" placeholder="Name"/></div>
						<div><input id="designation" type="text" placeholder="Designation"/></div>
						<div><input id="financialYear" type="text" placeholder="Financial Year"/></div>
						<div><input type="submit" value="Submit"/></div>
					</form>
				</div>
		<?php
			}
			elseif ( $_SESSION['page'] == 2)
			{
		?>
				<div>
					<form method="post" action="index.php" id="financialMonthForm">
						<select id="financialMonth">
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
						<div><input type="submit" value="Submit"/></div>
				</div>				
		<?php
			}
			else
			{
				session_destroy();
				header( "refresh:5; url=index.php" );
			}
		?>
	</body>
</html>