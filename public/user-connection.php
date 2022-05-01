<?php

$dbhost = "localhost";
$dbuser = "wvd441_2022_user";
$dbpass = "advanced_php";
$dbname = "wdv441_2022";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
