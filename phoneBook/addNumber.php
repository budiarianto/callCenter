<?php 
session_start();
include '../koneksi.php';
$_SESSION['title']=$_POST['title'];
$title=$_POST['title'];
$_SESSION['membername']=$_POST['membername'];
$membername=$_POST['membername'];
$_SESSION['address']=$_POST['address'];
$address=$_POST['address'];
$_SESSION['email']=$_POST['email'];
$email=$_POST['email'];
$_SESSION['pb_group_id']=$_POST['pb_group_id'];
$pb_group_id=$_POST['pb_group_id'];
$_SESSION['phoneNumber']=$_POST['phoneNumber'];
$phoneNumber=$_POST['phoneNumber'];
$_SESSION['tipePhone']=$_POST['tipePhone'];
$tipePhone=$_POST['tipePhone'];
$_SESSION['usergroup']=$_POST['usergroup'];
$usergroup=$_POST['usergroup'];
if($usergroup==""):
	$usergroup=date("YmzdGisu");
	$_SESSION['usergroup']=$usergroup;
	mysql_query("INSERT INTO phone_book (extra_fld1,phone_number,extra_fld2,extra_fld3) VALUES('$usergroup','$phoneNumber','$membername','$tipePhone')");
else:
	mysql_query("INSERT INTO phone_book (extra_fld1,phone_number,extra_fld2,extra_fld3) VALUES('$usergroup','$phoneNumber','$membername','$tipePhone')");
endif;	

?>