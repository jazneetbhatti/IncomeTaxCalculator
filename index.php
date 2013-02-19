<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Income Tax Calculator</title>
	</head>

	<body>
		<div id="form-wrapper">
			<form method="post" action="store-faculty-details.php" id="faculty-details-form">
				<div><label>ID : </label><input id="faculty-id" name="faculty-id" type="text"/></div>
				<div><label>Name : </label><input id="faculty-name" name="faculty-name" type="text"/></div>
				<div><label>Designation : </label><input id="designation" name="designation" type="text"/></div>
				<div><label>Financial Year : </label>
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
				</div>
				<div><input name="submit" type="submit" value="Submit"/></div>
			</form>
		</div>				
	</body>
</html>