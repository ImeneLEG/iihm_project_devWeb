<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "JVprog97#";
$dbname = "htmlpages";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>