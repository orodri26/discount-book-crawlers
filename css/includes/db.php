<?php

$server   = "localhost";
$username = "root";
$password = "";
$dbname   = "bookstore";

$dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8";
$dbconn = new PDO($dsn, $username, $password);
$conn = new PDO($dsn, $username, $password);
// $dbconn = mysqli_connect($server, $username, $password, $dbname);

?>