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
		<div id="form-wrapper" style="position: absolute; left: 35%; top: 10%;">
			<form method="post" action="store-income-details.php" id="income-details-form">
				<table>
					<tbody>
						<tr><td><div>
							<label>Month : </label></td>
							<td>
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
							</td>
							<td><div>
							<label>Next Month :</label>
							<input name="submit" type="button" value="Same" onclick="fillSame()"/>
							<input name="submit" type="button" value="New" onclick="clearAll()"/>
						</div></td>
						</tr>
						<tr><td><div><label>Pay Band : </label></td><td><input id="pay-band" name="pay-band" type="text" /></div></td></tr>
						<tr><td><div><label>Grade Pay : </label></td><td><input id="grade-pay" name="grade-pay" type="text"/></div></td></tr>
						<tr><td><div><label>Dearness Allowance : </label></td><td><input id="da" name="da" type="text"/></div></td></tr>
						<tr><td><div><label>Housing Rent Allowance : </label></td><td><input id="hra" name="hra" type="text"/></div></td></tr>
						<tr><td><div><label>Travelling Allowance : </label></td><td><input id="ta" name="ta" type="text"/></div></td></tr>
						<tr><td><div><label>Wardenship : </label></td><td><input id="wardenship" name="wardenship" type="text"/></div></td></tr>
						<tr><td><div><label>Arrear Salary : </label></td><td><input id="arrear-salary" name="arrear-salary" type="text"/></div></td></tr>
						<tr><td><div><label>General Provident Fund : </label></td><td><input id="gpf" name="gpf" type="text"/></div></td></tr>
						<tr><td><div><label>Income Tax : </label></td><td><input id="income-tax" name="income-tax" type="text"/></div></td></tr>
						<tr><td><div><label>Group Insurance : </label></td><td><input id="group-insurance" name="group-insurance" type="text"/></div></td></tr>
						<tr><td><div><label>Professional Tax : </label></td><td><input id="professional-tax" name="professional-tax" type="text"/></div></td></tr>
						<tr></tr>
						<tr></tr>
						<tr>
							<td>
								<div style="position: relative; left: 50%">
									<input name="submit" type="submit" value="Back"/>
									<input name="submit" type="submit" value="Save"/>
									<input name="submit" type="submit" value="Next"/>
								</div>
							</td>
						</tr>
						<tr></tr>
						<tr></tr>
					</tbody>
				</table>
			</form>

			<br><br>

			<form method="post" action="details-table.php" id="income-details-form">
				<tr><td><div style="position: relative; left: 42%;"></div></td></tr>
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