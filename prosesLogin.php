<?php 
session_start();
include'koneksi.php';
$user_name = $_POST['usrname'];
$user_pass = $_POST['psw'];
$cekuser = mysql_query("SELECT * FROM tuser WHERE user_name = '$user_name' and user_pass ='$user_pass'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
echo $jumlah;
if ($jumlah==1):

$_SESSION['username'] = $user_name;
endif;

header('Location: ../callCenter/');
?>
