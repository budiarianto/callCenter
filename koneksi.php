<?php
$servername = "localhost";
$username = "root";
$password = "12345";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
if (!mysql_select_db('dbpccall', $conn)) {
    echo 'Could not select database';
    exit;
}
?>

