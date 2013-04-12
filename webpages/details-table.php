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
		<style>
			#details,
			#details td,
			#details th
			{
				border-collapse: collapse;
				border: 1px solid black;
				text-align: center;
			}
		</style>
	</head>

	<body>
		<div id="wrapper" style="position: absolute; top: 5%">
			<?php
				$query = "SELECT * FROM faculty_details WHERE id='$fId'";
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
	
				echo "<div id=\"details-wrapper\" style=\"position: relative; left: 50%\">";
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

			<br>

			<div id="table-wrapper" style="position: relative; left: 10%">
				<table id="details">
					<tbody>
						<tr>
							<th colspan="12">Payment</th>
							<th colspan="4">Deductions</th>
						</tr>
						<tr>
	            <th>Month</th>
	            <th>Year</th>
	            <th>Pay Band</th>
	            <th>Current Basic</th>
	            <th>Grade Pay</th>
	            <th>DA</th>
	            <th>HRA</th>
	            <th>Actual HRA</th>
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
							$query = "SELECT * FROM income_details WHERE id='$fId' order by year, month";
							$result = mysql_query($query) or die(mysql_error());
							$current_basic_total = $grade_pay_total = $da_total = $hra_total = $actual_hra_total = 0;
							$ta_total = $wardenship_total = $arrear_salary_total = $total_total = 0;
							$gpf_total = $income_tax_total = $group_insurance_total = $professional_tax_total = 0;
							while( $row = mysql_fetch_array($result) )
							{
								$current_basic_total += $row["current_basic"];
								$grade_pay_total += $row["grade_pay"];
								$da_total += $row["da"];
								$hra_total += $row["hra"];
								$actual_hra_total += $row["actual_hra"];
								$ta_total += $row["ta"];
								$wardenship_total += $row["wardenship"];
								$arrear_salary_total += $row["arrear_salary"];
								$total_total += $row["total"];
								$gpf_total += $row["gpf"];
								$income_tax_total += $row["income_tax"];
								$group_insurance_total += $row["group_insurance"];
								$professional_tax_total += $row["prof_tax"];

								echo "<tr>";
								echo "<td>".date("F", mktime(0, 0, 0, $row["month"], 1))."</td>";
								echo "<td>".$row["year"]."</td>";
								echo "<td>".$row["pay_band"]."</td>";
								echo "<td>".$row["current_basic"]."</td>";
								echo "<td>".$row["grade_pay"]."</td>";
								echo "<td>".$row["da"]."</td>";
								echo "<td>".$row["hra"]."</td>";
								echo "<td>".$row["actual_hra"]."</td>";
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

							$_SESSION['current-basic-total'] = $current_basic_total;
							$_SESSION['grade-pay-total'] = $grade_pay_total;
							$_SESSION['da-total'] = $da_total;
							$_SESSION['hra-total'] = $hra_total;
							$_SESSION['actual-hra-total'] = $actual_hra_total;
							$_SESSION['ta-total'] = $ta_total;
							$_SESSION['wardenship-total'] = $wardenship_total;
							$_SESSION['arrear-salary-total'] = $arrear_salary_total;
							$_SESSION['total-total'] = $total_total;
							$_SESSION['gpf-total'] = $gpf_total;
							$_SESSION['income-tax-total'] = $income_tax_total;
							$_SESSION['group-insurance-total'] = $group_insurance_total;
							$_SESSION['professional-tax-total'] = $professional_tax_total;
							
							echo "<tr>";
							echo "<th>Total</th>";
							echo "<th></th>";
							echo "<th></th>";
		          echo "<th>".number_format((float)$current_basic_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$grade_pay_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$da_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$hra_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$actual_hra_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$ta_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$wardenship_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$arrear_salary_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$total_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$gpf_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$income_tax_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$group_insurance_total, 2, '.', '')."</th>";
		          echo "<th>".number_format((float)$professional_tax_total, 2, '.', '')."</th>";
							echo "</tr>";
						?>
					</tbody>
				</table>
	
				<br>
	
				<div id="return-form-wrapper" style="position: relative; left: 40%">
					<form method="post" action="go-home.php" id="return-form">
						<div>
							<input name="submit" type="submit" value="Back"/>
							<input name="submit" type="submit" value="Home"/>
							<a href="print-page.php" target="_blank">Print</a>
						</div>
				</div>
				</form>
			</div>
		</div>
	</body>
</html>