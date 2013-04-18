<?php

$user='root';
$password='mysql';
$database='incomeTaxDB';
$host='localhost';

// Establish the connection
$conn=mysql_connect($host,$user,$password) or die(mysql_error());
//Select the database
mysql_select_db($database) or die(mysql_error());

?>
