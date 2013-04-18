<?php
	session_start();
	if( !isset( $_SESSION['fId'] ) )
	{
		header("location: index.php");
	}

	include "db-connect.php";

	$Salary = $_SESSION['total-total'] - $_SESSION['actual-hra-total'];
	$HRA = $_SESSION['actual-hra-total'];
	$Gross_Salary = $_SESSION['total-total'];
	$Less_Exempt = min( floatval($Salary) / 10 - $HRA, $HRA, 0.4 * floatval($Salary) );
	$Salary_Income = $Salary - $Less_Exempt;
	$Less_Deduction = $_SESSION['professional-tax-total'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Income Tax Calculator</title>
		<style type="text/css">
			p
			{
				margin-top: 3px;
				margin-bottom: 3px;
			}

			td
			{
				padding-top: 8px;
				padding-bottom: 8px;
			}
		</style>
	</head>

	<body>
		<p align="center">
			<b>
				NATIONAL INSTITUTE OF  TECHNOLOGY, DURGAPUR
			</b>
		</p>
		<br>
		<p align="center">
			<b>
				COMPUTATION OF TOTAL INCOME FOR THE
			</b>
		</p>
		<p align="center">
			<b>
				FINANCIAL YEAR 2011 - 2012
			</b>
		</p>
		<p align="center">
			<u>
				(Assessment Year 2012 - 2013)
			</u>
		</p>
		<p align="center">
			<u> </u>
		</p>
		<br>
		<table>
			<tr>
				<td>
					<p>Name (In block letters)</p>
				</td>
				<td>
					: <?php echo strtoupper($_SESSION['faculty-name']); ?>
				</td>
		</tr>
			<tr>
				<td>
					<p>Name of Father</p>
				</td>
				<td>
					: <?php echo ""; ?>
				</td>
		</tr>
			<tr>
				<td>
					<p>Designation</p>
				</td>
				<td>
					: <?php echo ""; ?>
				</td>
		</tr>
			<tr>
				<td>
					<p>Department / Section</p>
				</td>
				<td>
					: <?php echo ""; ?>
				</td>
		</tr>
			<tr>
				<td>
					<p>Date of Birth</p>
				</td>
				<td>
					: <?php echo ""; ?>
				</td>
		</tr>
			<tr>
				<td>
					<p>PAN / GIR No.</p>
				</td>
				<td>
					: <?php echo ""; ?>
				</td>
		</tr>
		</table>
		<p>
			..............................................................................................................................................................................................
		</p>
		<table>
		<tr><td><p>
			 1.     <b>Salary </b>[Basic Pay,  DP,  DA,  IR,  Leave Salary,  Arrear          
		</p>
		<p>
			&nbsp; &nbsp; Salary,   Advance of Pay,   CCA,   Fees,   Subsistence
		</p>
		<p>
			&nbsp; &nbsp;         Allowance, Bonus, Honorarium, Reimbursement of
		</p>
		<p>
			&nbsp; &nbsp;         Tutition Fees, Overtime Allowance, Pension, Family
		</p>
		<p>
			&nbsp; &nbsp;         Pension,  Warenship Allowance etc.,  if any, recieved  /
		</p>
		<p>
			&nbsp; &nbsp;         receieveable during the period 2011 - 2012]
			<b>
				(Annexure-I)
			</b>
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs. <?php echo number_format($Salary, 2, '.', '') ?></b></td></tr>
		<tr><td>
		<p>
			2.<b>    House Rent Allowance </b>(HRA) Recieved/ Receivable               
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs. <?php echo number_format($HRA, 2, '.', '') ?></b></td></tr>
		<tr><td>
		<p>
			3. <b>  Gross Salary Income </b>(1+2)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs. <?php echo number_format($Gross_Salary, 2, '.', '') ?></b></td></tr>
		<tr><td><p>
			4.<b>    <u>Less</u>: Exempt U/S 10 </b>(House Rent Allowance)
		</p>
		<p>
			<i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                 Least of (a), (b)  &amp; (c) below: </i>
		</p>
		<p>
			&nbsp; &nbsp;        (a)    The Actual expenditure incurred in payment of Rent
		</p>
		<p>
			&nbsp; &nbsp; &nbsp; &nbsp;                in excess of 1/10<sup>th</sup> of the salary due for the relevant
		</p>
		<p>
			&nbsp; &nbsp; &nbsp; &nbsp;                period ( Rs. <?php echo number_format(floatval($Salary)/10 - $HRA, 2, '.', '') ?> )
		</p>
		<p>
			<b>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	OR
			</b>
		</p>
		<p>
			&nbsp; &nbsp;        (b)    The actual amount of HRA recieved in respect of the
		</p>
		<p>
			&nbsp; &nbsp; &nbsp; &nbsp;                 relevant period ( Rs. <?php echo number_format($HRA, 2, '.', '') ?>)
		</p>
		<p>
			<b>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OR
			</b>
		</p>
		<p>
			&nbsp; &nbsp;        (c)    40% of salary due to the Employer for the relevant
		</p>
		<p>
			&nbsp; &nbsp; &nbsp; &nbsp;                 period ( Rs. <?php echo number_format(0.4 * floatval($Salary), 2, '.', '') ?> )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs. <?php echo number_format($Less_Exempt, 2, '.', '') ?></b></td></tr>
		<tr><td><p>
			5.    Salary Income ( 3 - 4 )                                                                 
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs. <?php echo number_format($Salary_Income, 2, '.', '') ?></b></td></tr>
		<tr><td><p>
			6.    <b>Deduction U/S 16</b>
		</p></td></tr>
		<tr><td><p>
			&nbsp; &nbsp;               <b><u>Less:</u> </b>Professional Tax
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs. <?php echo number_format($Less_Deduction, 2, '.', '') ?></b></td></tr>
		<tr><td>
		<p>
			<b>7.    Net Salary Income </b>
			[5 - 6]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td colspan="2">
			<p>
			8.<b>    Add/Subtract Income from House property, </b>if any
		</p>
		<p>
		&nbsp; &nbsp; 	       (As declared by employee)         
		</p>
		</td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (a)   Actual Rent recieved / Recievable
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (b)   <b><u>Less:</u></b> Municipal Tax
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (c)   <b><u>Less:</u></b> 30% of total of [(a)-(b)]
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	             (For Repair / Maintenance)                                                   
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			<b>
		&nbsp; &nbsp; 		{(a), (b) &amp; (c) are applicable only for Let out house property}
			</b>
		</p>
		</td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(d)   Less:   Interest   paid  on  borrowed  capital  vide U/S
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              24(1) (VI) [in the financial year where the Property is
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              acquired  or  constructed with  capital  borrowed on or
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              after the 1<sup>st</sup> day of April, 2009 and such acquisition or
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              construction  is  completed  before  31<sup>st</sup>  day  of march
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              2012. The  maximum  amount  of  deduction allowable
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              will be limited to Rs. 1,50,000/-]
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	                                    (Document to be produced)               
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	        (e) Net income from other sources (a-b-c-d)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			9<b>.     Add Income</b> from other sources as declared by the
		</p>
		<p>
		&nbsp; &nbsp; 	        Employee
		</p>
		</td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (a)   Bank and other interests
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (b)   NSC Interest (accured + 6<sup>th</sup> yr. Interest for NSC
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	              Matured in the year) (Document to be submitted)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (c)   Testing and Consultancy
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (d)   Any other (specify)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	       (e)   Net income from other sources (a+b+c+d)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			10.    <b>Gross Total Income</b> [7 <u>+</u> 8(e) + 9(e)]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td colspan="2"><p>
			11. <b>Deductions allowed in computing Total Taxable </b>Income (Chapter VI A)
		</p>
		</td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(a)        <b>Savings U/S 80 C</b> (Prescribed savings through
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	                        investments &amp; payments)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	             i)         Premium paid in LIC policies (Limited to 20% of
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	                        Sum Assured) (No.&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; )    
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	            ii)         Subscription to Group Insurance Scheme
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	iii)        Subscription to GPF Account
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	                        (No.&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	iv)        Deposit under 10/15 year CTD
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(No.: ...............................................)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	v)         Contribution to ULIP of UTI and Unity Linked
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	Insurance Plan of LIC (No.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	vi)        Subscription to any deposit scheme of National
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	Housing Bank
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(No.: ....................................)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	vii)       Interest on NSC which is accrued as investment
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(upto 5<sup>th</sup> year of interest)       
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(Calculations to be shown separately)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	viii)      Subscription to PPF Account
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(No. &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;          )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	ix)        Repayment of loans (Principal amount) taken from
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	Govt./Bank/LIC/Public Companies as HDFC/ Co-
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	operative Societies engaged in providing long term
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	loans for purchase/construction of House
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(Document to be produced)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	x)         Subscription to NSC VIII issue
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	[No(s)........................... Date............................. ]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xi)        Child Education (Tution fees only)
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(Limited to two children)
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(Document to be produced)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xii)       Purchase of Infrastructure Tax saving Bonds
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(ICICI,IDBI etc.) (Certificate/Application No. &nbsp; &nbsp; &nbsp; &nbsp; )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xiii)      Subscription to Units of any Mutual Fund
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	LICI Future Plus (No.  &nbsp; &nbsp; &nbsp; &nbsp;     )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xiv)      Investment in a term deposit for a fixed period of
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	not less than 5 years with a scheduled Bank (Name
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	of Bank Should be mentioned) in the financial year
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xv)       Any other investment or payment (Details to be
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	given)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xvi)      Total Savings [summation from (i) to (xv)]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	xvii)     <b>Deduction U/S 80 C</b>
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	[Should not exceed <b>Rs. 1,00,000/-</b> ]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	            (b)        <b>Deduction U/S 80 CCC</b> [Limited to Rs. 10,000/-
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	in respect of pension Fund of LIC( jeevan
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	Suraksha) or of other Insurance Companies]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(c)        <b>Deduction U/S 80 CCD</b>
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	                        Contribution to New Pension Scheme (Limited
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	to 10% of salary)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	<b>Total of [{(a) (xvii)}, (b) &amp; (c)]</b>
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(d)       <b>Deduction U/S 80 CCE</b> (Aggregate amount of
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	deductions under sections 80 C, 80 CCC &amp; 80
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	CCD) [Should not exceed <b>Rs. 1,00,000</b>]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(e)        <b>Deduction U/S 80 CCF</b> [Limited to Rs. 20,000/-
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	if invested in Long-term Infrastructure Bonds
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	of Govt. of India]
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(f)        Deduction U/S 80 D (Medical Insurance Premium
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	limited to Rs. 15,000/- in general, paid by Cheque/Draft)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(Policy No.
		</p><p>
		&nbsp; &nbsp; 	<b>Cheque No. &amp; Date -  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                       </b>
			)
		</p>
		<p>
		&nbsp; &nbsp; 	[Increased limit of Rs. 20,000/- may be availed if any dependent
		</p>
		<p>
		&nbsp; &nbsp; 	member of the family covered under the mediclaim insurance of the
		</p>
		<p>
		&nbsp; &nbsp; 	assessee is a  Senior  <a name="_GoBack"></a>Citizen of age 65 years and above. to avail the
		</p>
		<p>
		&nbsp; &nbsp; 	deduction in excess of Rs. 15,000/-, the assessee has to pay mediclaim
		</p>
		<p>
		&nbsp; &nbsp; 	insurance for the Swenior Citizen only] (Document to be enclosed)
		</p></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(g)        <b>Deduction U/S 80 DD</b> ( Maintenance including medical
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	treatment of Handicapped dependent limited to Rs. 50,000/-,
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	However a higher deduction of rs. 75,000/- is allowed if %
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	disability of the handicapped dependent is over 80%)
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(Documents to be enclosed)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(h)        <b>Deduction U/S 80 DDB</b> ( Special  deduction  of  actual
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	expenditure limited to Rs. 40,000/- to the patient or a dependent
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	suffering   from   Cancer   or  AIDS   involving    considetrable
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	expenditure on treatment and Rs. 60,000/- if such a dependent is
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	a senior citizen of age 65 years and above. This  will, however,
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	be subject to deduction of any amount received through medical
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	insurance, if any)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(i)         <b>Deduction U/S 80 E</b> (If an assessee has taken any loan from
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	any financial institution or charitable institution for purpose of
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	his/her higher education or for the purpose of higher education
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	of his/her relative (spouse &amp; children), the amount of interest
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	paid during that year can be deducated from the taxable income
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	till the loan including interest is cleared or for a period of eight
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	years, whichever is earlier)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(j)<b>         Deduction U/S 80 U </b>(Rs. 50,000/- in the case of assessee
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	who is a person with disability, and Rs. 75,000/- if he is a person
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	with severe disability)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(k)<b>        Deduction U/S 80 G    </b>(Donation  to  certain  Funds /
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	Charitable Institutions)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(l)           <b>Any other Deduction</b> (Mention section)
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(Document to be enclosed)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	(m)       <b>Total Deductions Under Chapter VI A</b>
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(d+e+f+g+h+i+j+k+l)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		12.<b>  Total Taxable Income </b>[10-11(m)]
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			13. <b>Total Taxable Income</b>
		</p>
		<p>
		&nbsp; &nbsp; 	      (Rounded off to nearest multiple of Ten Rupee)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			14. <b>Income Tax (on SL. No.13) Payable</b>
		</p>
		<p>
		&nbsp; &nbsp; 	     (Rounded off to nearest rupee)
		</p>
		<p>
		&nbsp; &nbsp; 	     [Rates of Income Tax for Total Payable Income (Sl.No.13)
		</p>
		<p>
			<b>
				<i>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 			For Men Employee:
					<p>
					</p>
				</i>
			</b>
		</p>
		<p>
		&nbsp; &nbsp;	     i) upto Rs.1,80,000/- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<b>: NIL</b>
		</p>
		<p>
		&nbsp; &nbsp; 	    ii) between Rs.1,80,001/- to  Rs.5,00,000/- 
		&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>
				: 10% of
			</b>
		</p>
		<p>
			<b>
		&nbsp; &nbsp; &nbsp; &nbsp; 		income exceeding Rs.1,80,000   
			</b>
		</p>
		<p>
		&nbsp; &nbsp; 	   iii) between  Rs.5,00,001/- to Rs.8,00,000/-  
		&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	<b>
				: Rs. 32,000/-
			</b>
		</p>
		<p>
			<b>
		&nbsp; &nbsp; &nbsp; &nbsp; 		+ 20% of  income exceeding Rs.5,00,000/-
			</b>
		</p>
		<p>
		&nbsp; &nbsp; 	   iv) above Rs.8,00,000/- 
		&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; <b>
				: Rs. 92,000/-
			</b>
		</p>
		<p>
			<b>
		&nbsp; &nbsp; &nbsp; &nbsp; 		+ 30% of income exceeding Rs.8,00,000/-  
			</b>
		</p>
		<p>
			<b>
				<i>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 			For Women Employee:
				</i>
			</b>
		</p>
		<p>
		&nbsp; &nbsp; 	     i) upto Rs.1,90,000/- 
		&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp;	<b>
				: NIL
			</b>
		</p>
		<p>
		&nbsp; &nbsp; 	    ii) between Rs.1,90,001/- to Rs.5,00,000/-
			<b>
				: 10% of
			</b>
		</p>
		<p>
			<b>
		&nbsp; &nbsp; &nbsp; &nbsp; 		        income exceeding Rs.1,90,000/-          
			</b>
		</p>
		<p>
		&nbsp; &nbsp; 	   iii) income exceeding Rs.5,00,001/- to Rs.8,00,000/-
		&nbsp;	<b>
				: Rs. 31,000/-
			</b>
		</p>
		<p>
			<b>
		&nbsp; &nbsp; &nbsp; &nbsp; 		         + 20% of income exceeding Rs.5,00,000/-
			</b>
		</p>
		<p>
		&nbsp; &nbsp; 	   iv) above Rs. 8,00,000/-
		&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp;	<b>
				: Rs. 91,000/-
			</b>
		</p>
		<p>
			<b>
		&nbsp; &nbsp; &nbsp; &nbsp; 		         + 30% of income exceeding Rs. 8,00,000/- ]
			</b>
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			15.<b> Education Cess </b>[3% on Income Tax Payable (Sl.No.
		</p>
		<p>
		&nbsp; &nbsp; 	              14)](Rounded off to nearest Rupee)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			16. <b>Total Income Tax Payable</b> (14+15)
			<p>
			</p>
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			17. <b><u>Less:</u></b>
		</p></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	      (a) Income Tax deducted from salary during the period
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	            from <b>March,2011 to Nov.,2011(Annexure-1)</b>
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	      (b) Income Tax paid in cash,if any
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	            (Receipt No.&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; ,dated:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; )
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	      (c) Tax deducted at N.I.T. ,Durgapur (a+b)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	      (d) TDS Certificate, if any (Xerox copy to be enclosed)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
		&nbsp; &nbsp; 	      (e) Total Tax deducted at source (c+d)
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	            (Rounded off to nearest Rupee)
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			18. <b>Balance of Income Tax payable </b>[16-17(e)]
		</p>
		<p>
		&nbsp; &nbsp; 	       (To be deducted from salary bill of <b>Dec-11,Jan&amp; Feb,12</b>)
		</p>
		<p>
			<b>
		&nbsp; &nbsp; 		(Rupees &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; only)
			</b>
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(i)                 Dec-2011=Rs.
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(ii)               Jan-2011=Rs.
		</p>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; 	(iii)             Feb-2011=Rs.
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr>
		<tr><td><p>
			19. <b>Refund of excess Income Tax already paid, if any</b>
		</p>
		<p>
		&nbsp; &nbsp; 	       [when 17(e)&gt;16]                                                                                     
		</p>
		</td><td style="vertical-align:top">&nbsp; &nbsp; :&nbsp; &nbsp;    <b>Rs.</b></td></tr></table>
		<p>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	                                                                                            
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	                                                                                            
			<b>
				<i>
					<u>
						Signature of Assesse  with  date 
					</u>
				</i>
			</b>
		</p>
		<p>
			           [Photocopy of all supporting documents regarding savings must be enclosed]         
		</p>

	<script type="text/javascript">
		window.onload = function(){ window.print(); }
	</script>
	</body>
</html>