<?php
	session_start();
	if( !isset( $_SESSION['fId'] ) )
	{
		header("location: index.php");
	}

	if( !isset( $_SESSION['fMonth']) )
	{
		$_SESSION['fMonth'] = "03";
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
						<tr>
							<td><div><label>Month : </label></td>
							<td>
								<select id="financial-month" name="financial-month">
									<option value="03">March'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="04">April'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="05">May'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="06">June'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="07">July'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="08">August'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="09">September'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="10">October'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="11">November'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="12">December'<?php echo $_SESSION['financial-year'] % 100; ?></option>
									<option value="01">January'<?php echo $_SESSION['financial-year'] % 100 + 1; ?></option>
									<option value="02">February'<?php echo $_SESSION['financial-year'] % 100 + 1; ?></option>
								</select>
							</td>
							<td>
								<div><label>Next Month :</label>
									<input name="submit" type="button" value="Same" onclick="fillSame()"/>
									<input name="submit" type="button" value="New" onclick="clearAll()"/>
								</div>
							</td>
						</tr>
						<tr>
							<td><div><label>Pay Band :</label></td>
							<td>
								<select id="pay-band-select" name="pay-band-select">
									<option value="1-2">1-2</option>
									<option value="3-4">3-4</option>
									<option value="5-6">5-6</option>
									<option value="7-8">7-8</option>
									<option value="9-10">9-10</option>
								</select>
							</td>
						</tr>
						<tr><td><div><label>Current Basic : </label></td><td><input id="current-basic" name="current-basic" type="number" step="any" min="0"/></div></td></tr>
						<tr><td><div><label>Grade Pay : </label></td><td><input id="grade-pay" name="grade-pay" type="number" step="any" min="0"/></div></td></tr>
						<tr>
							<td><div><label>Dearness Allowance ( DA ) :</label></td>
							<td>
								<select id="da-select" name="da-select" onclick="clickedDA()">
									<option value="1">1%</option>
									<option value="2">2%</option>
									<option value="3">3%</option>
									<option value="4">4%</option>
									<option value="other">Specify manually</option>
								</select>
							</td>
							<td><input id="da" name="da" type="number" step="any" min="0"/></div></td>
						</tr>
						<tr>
							<td><div><label>Housing Rent Allowance ( HRA ) :</label></td>
							<td>
								<select id="hra-select" name="hra-select">
									<option value="1">1%</option>
									<option value="2">2%</option>
									<option value="3">3%</option>
									<option value="4">4%</option>
								</select>
							</td>
						</tr>
						<tr><td><div><label>Actual HRA :</label></td><td><input id="actual-hra" name="actual-hra" type="number" step="any" min="0"/></div></td></tr>
						<tr>
							<td><div><label>Travelling Allowance ( TA ) :</label></td>
							<td>
								<select id="ta-select" name="ta-select" onclick="clickedTA()">
									<option value="1">1%</option>
									<option value="2">2%</option>
									<option value="3">3%</option>
									<option value="4">4%</option>
									<option value="other">Specify manually</option>
								</select>
							</td>
							<td><input id="ta" name="ta" type="number" step="any"/></div></td>
						</tr>
						<tr><td><div><label>Wardenship : </label></td><td><input id="wardenship" name="wardenship" type="number" step="any" min="0"/></div></td></tr>
						<tr><td><div><label>Arrear Salary : </label></td><td><input id="arrear-salary" name="arrear-salary" type="number" step="any" min="0"/></div></td></tr>
						<tr><td><div><label>General Provident Fund : </label></td><td><input id="gpf" name="gpf" type="number" step="any" min="0"/></div></td></tr>
						<tr><td><div><label>Income Tax : </label></td><td><input id="income-tax" name="income-tax" type="number" step="any" min="0"/></div></td></tr>
						<tr><td><div><label>Group Insurance : </label></td><td><input id="group-insurance" name="group-insurance" type="number" step="any" min="0"/></div></td></tr>
						<tr><td><div><label>Professional Tax : </label></td><td><input id="professional-tax" name="professional-tax" type="number" step="any" min="0"/></div></td></tr>
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
			function initPage()
			{
				var element = document.getElementById( "financial-month" );
				for( var i = 0; i < element.length; i++ )
				{
					if( element.options[i].value == "<?php echo $_SESSION['fMonth']; ?>" )
					{
						document.getElementById( "financial-month" ).selectedIndex = i;
						break;
					}
				}


				document.getElementById( "da" ).style.display = 'none';
				document.getElementById( "ta" ).style.display = 'none';
			}
			initPage();

			function clickedDA()
			{
				if( document.getElementById( "da-select" ).value == 'other' )
					document.getElementById( "da" ).style.display = 'block';
				else
					document.getElementById( "da" ).style.display = 'none';
			}

			function clickedTA()
			{
				if( document.getElementById( "ta-select" ).value == 'other' )
					document.getElementById( "ta" ).style.display = 'block';
				else
					document.getElementById( "ta" ).style.display = 'none';
			}

			function fillSame()
			{
				var selected_index = document.getElementById( "financial-month" ).selectedIndex;
				document.getElementById( "financial-month" ).selectedIndex = selected_index + 1;

				document.getElementById( "current-basic" ).value = "<?php echo $_SESSION['current-basic']; ?>";
				document.getElementById( "grade-pay" ).value = "<?php echo $_SESSION['grade-pay']; ?>";
				document.getElementById( "actual-hra" ).value = "<?php echo $_SESSION['actual-hra']; ?>";
				document.getElementById( "wardenship" ).value = "<?php echo $_SESSION['wardenship']; ?>";
				document.getElementById( "arrear-salary" ).value = "<?php echo $_SESSION['arrear-salary']; ?>";
				document.getElementById( "gpf" ).value = "<?php echo $_SESSION['gpf']; ?>";
				document.getElementById( "income-tax" ).value = "<?php echo $_SESSION['income-tax']; ?>";
				document.getElementById( "group-insurance" ).value = "<?php echo $_SESSION['group-insurance']; ?>";
				document.getElementById( "professional-tax" ).value = "<?php echo $_SESSION['professional-tax']; ?>";

				var element = document.getElementById( "pay-band-select" );
				for( var i = 0; i < element.length; i++ )
				{
					if( element.options[i].value == "<?php echo $_SESSION['pay-band-select']; ?>" )
					{
						document.getElementById( "pay-band-select" ).selectedIndex = i;
						break;
					}
				}

				element = document.getElementById( "da-select" );
				for( var i = 0; i < element.length; i++ )
				{
					if( element.options[i].value == "<?php echo $_SESSION['da-select']; ?>" )
					{
						document.getElementById( "da-select" ).selectedIndex = i;
						break;
					}
				}

				element = document.getElementById( "hra-select" );
				for( var i = 0; i < element.length; i++ )
				{
					if( element.options[i].value == "<?php echo $_SESSION['hra-select']; ?>" )
					{
						document.getElementById( "hra-select" ).selectedIndex = i;
						break;
					}
				}

				element = document.getElementById( "ta-select" );
				for( var i = 0; i < element.length; i++ )
				{
					if( element.options[i].value == "<?php echo $_SESSION['ta-select']; ?>" )
					{
						document.getElementById( "ta-select" ).selectedIndex = i;
						break;
					}
				}

				clickedDA();
				clickedTA();
			}

			function clearAll()
			{
				var selected_index = document.getElementById( "financial-month" ).selectedIndex;
				document.getElementById( "financial-month" ).selectedIndex = selected_index + 1;

				document.getElementById( "current-basic" ).value = "";
				document.getElementById( "grade-pay" ).value = "";
				document.getElementById( "actual-hra" ).value = "";
				document.getElementById( "wardenship" ).value =  "";
				document.getElementById( "arrear-salary" ).value = "";
				document.getElementById( "gpf" ).value = "";
				document.getElementById( "income-tax" ).value = "";
				document.getElementById( "group-insurance" ).value = "";
				document.getElementById( "professional-tax" ).value = "";
			}
		</script>	
	</body>
</html>