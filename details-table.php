<?php
	session_start();
	if( !isset( $_SESSION['fId'] ) )
	{
		header("location: index.php");
	}

	include "db-connect.php";

	$fId = $_SESSION['fId'];
	$fYear = $_SESSION['fYear'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Income Tax Calculator</title>
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<?php
			$query = "SELECT * FROM faculty_details WHERE id='$fId'";
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);

			echo "<div id=\"details-wrapper\" style=\"position: absolute; left: 35%; top: 5%\">";
			echo "<table style=\"none\">";
			echo "<tbody>";
			echo "<tr><td><div style=\"font-weight: bold\">Faculty ID : </div></td><td>".$row['id']."</td></tr>";
			echo "<tr><td><div style=\"font-weight: bold\">Faculty Name : </div></td><td>".$row['name']."</td></tr>";
			echo "<tr><td><div style=\"font-weight: bold\">Designation : </div></td><td>".$row['designation']."</td></tr>";
			echo "<tr><td><div style=\"font-weight: bold\">Financial Year : </div></td><td>".$row['year']."</td></tr>";
			echo "</tbody>";
			echo "</table>";
			echo "</div>";
		?>
		<div id="table-wrapper" style="position: absolute; left: 17%; top: 20%">
			<table id="details">
				<tbody>
					<tr>
						<th colspan="10">Payment</th>
						<th colspan="4">Deductions</th>
					</tr>
					<tr>
            <th>Month</th>
            <th>Year</th>
            <th>Pay Band</th>
            <th>Grade Pay</th>
            <th>DA</th>
            <th>HRA</th>
            <th>TA</th>
            <th>Wardenship</th>
            <th>Arrear</th>
            <th>Total</th>
            <th>GPF</th>
            <th>Income Tax</th>
            <th>Group Insurance</th>
            <th>Prof. Tax</th>
					</tr>
					<?php
						$query = "SELECT * FROM income_details WHERE id='$fId'";
						$result = mysql_query($query) or die(mysql_error());
						$pay_band_total = $grade_pay_total = $da_total = $hra_total = 0;
						$ta_total = $wardenship_total = $arrear_salary_total = $total_total = 0;
						$gpf_total = $income_tax_total = $group_insurance_total = $professional_tax_total = 0;
						while( $row = mysql_fetch_array($result) )
						{
							$pay_band_total += $row["pay_band"];
							$grade_pay_total += $row["grade_pay"];
							$da_total += $row["da"];
							$hra_total += $row["hra"];
							$ta_total += $row["ta"];
							$wardenship_total += $row["wardenship"];
							$arrear_salary_total += $row["arrear_salary"];
							$total_total += $row["total"];
							$gpf_total += $row["gpf"];
							$income_tax_total += $row["income_tax"];
							$group_insurance_total += $row["group_insurance"];
							$professional_tax_total += $row["professional_tax"];
	
							echo "<tr>";
							echo "<td>".$row["month"]."</td>";
							echo "<td>".$fYear."</td>";
							echo "<td>".$row["pay_band"]."</td>";
							echo "<td>".$row["grade_pay"]."</td>";
							echo "<td>".$row["da"]."</td>";
							echo "<td>".$row["hra"]."</td>";
							echo "<td>".$row["ta"]."</td>";
							echo "<td>".$row["wardenship"]."</td>";
							echo "<td>".$row["arrear_salary"]."</td>";
							echo "<td>".$row["total"]."</td>";
							echo "<td>".$row["gpf"]."</td>";
							echo "<td>".$row["income_tax"]."</td>";
							echo "<td>".$row["group_insurance"]."</td>";
							echo "<td>".$row["prof_tax"]."</td>";
							echo "</tr>";
						}
		
						echo "<tr>";
						echo "<th>Total</th>";
						echo "<th></th>";
	          echo "<th>".$pay_band_total."</th>";
	          echo "<th>".$grade_pay_total."</th>";
	          echo "<th>".$da_total."</th>";
	          echo "<th>".$hra_total."</th>";
	          echo "<th>".$ta_total."</th>";
	          echo "<th>".$wardenship_total."</th>";
	          echo "<th>".$arrear_salary_total."</th>";
	          echo "<th>".$total_total."</th>";
	          echo "<th>".$gpf_total."</th>";
	          echo "<th>".$income_tax_total."</th>";
	          echo "<th>".$group_insurance_total."</th>";
	          echo "<th>".$professional_tax_total."</th>";
						echo "</tr>";
	
						session_destroy();
					?>
				</tbody>
			</table>

			<br>

			<div id="return-form-wrapper" style="position: relative; left: 45%">
				<form method="post" action="index.php" id="return-form">
					<div><input type="submit" value="Home"/></div>
			</div>
			</form>
		</div>
	</body>
</html>