<?php
// create database connection with the MySQL
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($serverName, $username, $password, $dbname);

// check connection

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

//echo "connection established";

// create table
?>