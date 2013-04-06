<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Income Tax Calculator</title>
	</head>

	<body>
		<div style="position: absolute; left:40%; top: 10%; font-size: 30px"><strong>Income Tax Calculator</strong></div>
		<br>
		<div id="form-wrapper" style="position: absolute; left:40%; top: 35%;">
			<form method="post" action="store-faculty-details.php" id="faculty-details-form">
				<table>
					<tbody>
						<tr><td><label>ID : </label></td><td><input id="faculty-id" name="faculty-id" type="text"/></td></tr>
						<tr><td><label>Name : </label></td><td><input id="faculty-name" name="faculty-name" type="text"/></tr>
						<tr><td><label>Designation : </label></td><td><input id="designation" name="designation" type="text"/></tr>
						<tr><td><label>Financial Year : </label></td>
							<td>
								<select id="financial-year" name="financial-year">
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012" selected="selected">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
								</select>
							</td>
						</tr>
						<tr><td><input name="submit" type="submit" value="Submit"/></td></tr>
					</tbody>
				</table>
			</form>
		</div>				
	</body>
</html>