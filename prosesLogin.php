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
$qeng_id=mysql_fetch_array(mysql_query("SELECT eng_id FROM engine_id where pc_id='$nama_host'"));
$eng_id=$qeng_id['eng_id'];
echo $userid,$nama_host,$eng_id;
if ($jumlah==1):
mysql_query("UPDATE tuser SET
                          is_login='0'
                          WHERE
                          is_pc='$nama_host'
            ");  
mysql_query("UPDATE tuser SET 
                          last_login=CURRENT_TIMESTAMP,
                          is_login='1',
                          is_pc='$nama_host',
                          eng_id='$eng_id'
                        WHERE
                          user_id='$userid'
                        ");
$_SESSION['username'] = $user_name;
endif;

header('Location: ../callCenter/');
?>
