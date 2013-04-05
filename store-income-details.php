<?php
	session_start();
	include "db-connect.php";

	if ( $_POST['submit'] == 'Next' )
	{
		header("location: details-table.php");
	}
	elseif( $_POST['submit'] == 'Back' )
	{
		header("location: index.php");		
	}
	else
	{
		$fId = $_SESSION['fId'];
		$fMonth = $_SESSION['fMonth'] = $_POST['financial-month'];
		$pay_band = $_SESSION['pay-band'] = $_POST['pay-band'];
		$grade_pay = $_SESSION['grade-pay'] = $_POST['grade-pay'];
		$da = $_SESSION['da'] = $_POST['da'];
		$hra = $_SESSION['hra'] = $_POST['hra'];
		$ta = $_SESSION['ta'] = $_POST['ta'];
		$wardenship = $_SESSION['wardenship'] = $_POST['wardenship'];
		$arrear_salary = $_SESSION['arrear-salary'] = $_POST['arrear-salary'];
		$total = $_SESSION['total'] = $pay_band + $grade_pay + $da + $hra + $ta + $wardenship + $arrear_salary;
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
							 "values( '$fId', '$fMonth', '$pay_band', '$grade_pay', '$da', '$hra', '$ta', '$wardenship', '$arrear_salary', '$total', '$gpf', '$income_tax', '$group_insurance', '$professional_tax' )";
		}
		else
		{
			$query = "UPDATE income_details " .
							 "SET pay_band='$pay_band', grade_pay='$grade_pay', da='$da', hra='$hra', ta='$ta', wardenship='$wardenship', arrear_salary='$arrear_salary', total='$total', " .
							 "gpf='$gpf', income_tax='$income_tax', group_insurance='$group_insurance', prof_tax='$professional_tax'" .
							 "WHERE id='$fId' AND month='$fMonth'";
		}
		mysql_query($query) or die('Could not update DB \'user\':'.mysql_error());
		header("location: income-details.php");
	}
?>