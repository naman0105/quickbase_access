<?php

$dbname = "quickbaselogin";
$username = "root";
$password = "mysql12345";
$servername ="localhost";


$conn = new mysqli($servername,$username,$password,$dbname);

if( $conn->connect_error){
	die("connection failier". $conn->connect_error);
}

?>
