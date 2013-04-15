<?php
	session_start();
	include "db-connect.php";

	if ( $_POST['submit'] == 'Next' )
	{
		header("location: details-table.php");
	}
	elseif( $_POST['submit'] == 'Back' )
	{
		$fId = $_SESSION['fId'];

		$query = "DELETE FROM income_details WHERE id = '$fId'";
		$result = mysql_query( $query ) or die( mysql_error() );

		$query = "DELETE FROM faculty_details WHERE id = '$fId'";
		$result = mysql_query( $query ) or die( mysql_error() );

		session_unset();
		session_destroy();

		header("location: index.php");		
	}
	else
	{
		$fId = $_SESSION['fId'];
		$fMonth = $_SESSION['fMonth'] = $_POST['financial-month'];

		$fYear = $_SESSION['financial-year'];
		if( $fMonth == '01' || $fMonth == '02' )
			$fYear += 1;

		$pay_band = $_SESSION['pay-band-select'] = $_POST['pay-band-select'];
		$current_basic = $_SESSION['current-basic'] = $_POST['current-basic'];
		$grade_pay = $_SESSION['grade-pay'] = $_POST['grade-pay'];
		$basic_pay = $current_basic + $grade_pay;

		$_SESSION['da-select'] = $_POST['da-select'];
		$_SESSION['hra-select'] = $_POST['hra-select'];
		$_SESSION['ta-select'] = $_POST['ta-select'];

		if( $_POST['da-select'] != 'other')
		{
			$da = $_SESSION['da'] = ceil( ( $basic_pay * floatval( $_POST['da-select'] ) ) / 100 );
		}
		else
		{
			$da = $_SESSION['da'] = ceil( ( $basic_pay * floatval( $_POST['da'] ) ) / 100 );
		}

		$hra = $_SESSION['actual-hra'] = ceil( ( $basic_pay * floatval( $_POST['hra-select'] ) ) / 100 );
		$actual_hra = $_SESSION['actual-hra'] = $_POST['actual-hra'];

		if( $_POST['ta-select'] != 'other')
		{
			$ta = $_SESSION['ta'] = ceil( ( $basic_pay * floatval( $_POST['ta-select'] ) ) / 100 );
		}
		else
		{
			$ta = $_SESSION['ta'] = ceil( ( $basic_pay * floatval( $_POST['ta'] ) ) / 100 );
		}

		$wardenship = $_SESSION['wardenship'] = $_POST['wardenship'];
		$arrear_salary = $_SESSION['arrear-salary'] = $_POST['arrear-salary'];
		$total = $_SESSION['total'] = $basic_pay + $da + $hra + $ta + $wardenship + $arrear_salary;
		$gpf = $_SESSION['gpf'] = $_POST['gpf'];
		$income_tax = $_SESSION['income-tax'] = $_POST['income-tax'];
		$group_insurance = $_SESSION['group-insurance'] = $_POST['group-insurance'];
		$professional_tax = $_SESSION['professional-tax'] = $_POST['professional-tax'];
		
		$query = "SELECT count(*) FROM income_details " .
						 "WHERE id='$fId' AND month='$fMonth'";
		$result = mysql_query( $query ) or die( mysql_error() );
		$row = mysql_fetch_array( $result );
		mysql_free_result( $result );

		if( $row[0] == 0 )
		{
			$query = "INSERT INTO income_details " .
							 "values( '$fId', '$fMonth', '$fYear','$pay_band', '$current_basic', '$grade_pay', '$da', '$hra', '$actual_hra', '$ta', '$wardenship', '$arrear_salary', '$total', '$gpf', '$income_tax', '$group_insurance', '$professional_tax' )";
		}
		else
		{
			$query = "UPDATE income_details " .
							 "SET pay_band='$pay_band', current_basic='$current_basic', grade_pay='$grade_pay', da='$da', hra='$hra', actual_hra='$actual_hra', ta='$ta', wardenship='$wardenship', arrear_salary='$arrear_salary', total='$total', " .
							 "gpf='$gpf', income_tax='$income_tax', group_insurance='$group_insurance', prof_tax='$professional_tax'" .
							 "WHERE id='$fId' AND month='$fMonth'";
		}
		mysql_query($query) or die('Could not update DB \'user\':'.mysql_error());
		header("location: income-details.php");
	}
?>