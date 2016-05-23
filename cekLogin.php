<?php
include'koneksi.php';
session_start();
$username= $_SESSION['username'];	
$querylogin=mysql_fetch_assoc(mysql_query("select * from tuser where user_name='$username'"));
$full_name=$querylogin['full_name'];
$user_id=$querylogin['user_id'];
$emp_code=$querylogin['emp_code'];
$user_level=$querylogin['user_level'];
?>