<?php
	session_start();
	if( !isset( $_SESSION['fId'] ) )
	{
		header("location: index.php");
	}

	if( !isset( $_SESSION['fMonth']) )
	{
		$_SESSION['fMonth'] = "January";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Income Tax Calculator</title>
	</head>

	<body>
		<div id="form-wrapper">
			<form method="post" action="store-income-details.php" id="income-details-form">
				<select id="financial-month" name="financial-month">
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
				<div><label>Pay Band : </label><input id="pay-band" name="pay-band" type="text" /></div>
				<div><label>Grade Pay : </label><input id="grade-pay" name="grade-pay" type="text"/></div>
				<div><label>Dearness Allowance : </label><input id="da" name="da" type="text"/></div>
				<div><label>Housing Rent Allowance : </label><input id="hra" name="hra" type="text"/></div>
				<div><label>Travelling Allowance : </label><input id="ta" name="ta" type="text"/></div>
				<div><label>Wardenship : </label><input id="wardenship" name="wardenship" type="text"/></div>
				<div><label>Arrear Salary : </label><input id="arrear-salary" name="arrear-salary" type="text"/></div>
				<div><label>General Provident Fund : </label><input id="gpf" name="gpf" type="text"/></div>
				<div><label>Income Tax : </label><input id="income-tax" name="income-tax" type="text"/></div>
				<div><label>Group Insurance : </label><input id="group-insurance" name="group-insurance" type="text"/></div>
				<div><label>Professional Tax : </label><input id="professional-tax" name="professional-tax" type="text"/></div>
				<div><input name="submit" type="submit" value="Save""/></div>
				<div>
					<label>Next Month :</label>
					<input name="submit" type="button" value="Same" onclick="fillSame()"/>
					<input name="submit" type="button" value="New" onclick="clearAll()"/>
				</div>
			</form>
			<form method="post" action="details-table.php" id="income-details-form">
				<div><input name="submit" type="submit" value="Done"/></div>
		</div>

		<script type="text/javascript">
			function setSelectedIndex()
			{
				var element = document.getElementById( "financial-month" );
				for( var i = 0; i < element.length; i++ )
				{
					if( element.options[i].text == "<?php echo $_SESSION['fMonth']; ?>" )
					{
						document.getElementById( "financial-month" ).selectedIndex = i;
						break;
					}
				}
			}
			setSelectedIndex();

			setSelectedIndex();
			function fillSame()
			{
				var selected_index = document.getElementById( "financial-month" ).selectedIndex;
				document.getElementById( "financial-month" ).selectedIndex = selected_index + 1;

				document.getElementById( "pay-band" ).value = "<?php echo $_SESSION['pay-band']; ?>";
				document.getElementById( "grade-pay" ).value = "<?php echo $_SESSION['grade-pay']; ?>";
				document.getElementById( "da" ).value = "<?php echo $_SESSION['da']; ?>";
				document.getElementById( "hra" ).value = "<?php echo $_SESSION['hra']; ?>";
				document.getElementById( "ta" ).value = "<?php echo $_SESSION['ta']; ?>";
				document.getElementById( "wardenship" ).value = "<?php echo $_SESSION['wardenship']; ?>";
				document.getElementById( "arrear-salary" ).value = "<?php echo $_SESSION['arrear-salary']; ?>";
				document.getElementById( "gpf" ).value = "<?php echo $_SESSION['gpf']; ?>";
				document.getElementById( "income-tax" ).value = "<?php echo $_SESSION['income-tax']; ?>";
				document.getElementById( "group-insurance" ).value = "<?php echo $_SESSION['group-insurance']; ?>";
				document.getElementById( "professional-tax" ).value = "<?php echo $_SESSION['professional-tax']; ?>";
			}

			function clearAll()
			{
				var selected_index = document.getElementById( "financial-month" ).selectedIndex;
				document.getElementById( "financial-month" ).selectedIndex = selected_index + 1;

				document.getElementById( "pay-band" ).value = "";
				document.getElementById( "grade-pay" ).value = "";
				document.getElementById( "da" ).value = "";
				document.getElementById( "hra" ).value = "";
				document.getElementById( "ta" ).value = "";
				document.getElementById( "wardenship" ).value = "";
				document.getElementById( "arrear-salary" ).value = "";
				document.getElementById( "gpf" ).value = "";
				document.getElementById( "income-tax" ).value = "";
				document.getElementById( "group-insurance" ).value = "";
				document.getElementById( "professional-tax" ).value = "";
			}
		</script>	
	</body>
</html>