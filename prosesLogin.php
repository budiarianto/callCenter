<?php 
session_start();
include'koneksi.php';
$user_name = $_POST['usrname'];
$user_pass = $_POST['psw'];
$cekuser = mysql_query("SELECT * FROM tuser WHERE user_name = '$user_name' and user_pass ='$user_pass'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
$userid=$hasil['user_id'];
$nama_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $userid,$nama_host;
if ($jumlah==1):
  
mysql_query("UPDATE tuser SET 
                          last_login=CURRENT_TIMESTAMP,
                          is_login='1',
                          is_pc='$nama_host'
                        WHERE
                          user_id='$userid'
                        ");
$_SESSION['username'] = $user_name;
echo $nama_host;
endif;

header('Location: ../callCenter/');
?>
