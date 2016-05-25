<?php
include 'kon.php';
include '../cekLogin.php';
date_default_timezone_set("Asia/Bangkok");

$updateBy= $_POST['updateBy']; 
$id= $_POST['id'];
$penelepon= $_POST['penelepon'];
$notlp= $_POST['notlp'];
$perusahaan= $_POST['perusahaan'];
$keperluan= $_POST['keperluan'];
$status= $_POST['status'];
$penerima= $_POST['penerima'];
$date=date_create($_POST['datetime']);
$datetime= date_format($date,"Y-m-d H:i:s");	
//==== PHONE BOOK
$phone_number=$_POST['phone_number'];
$member_name=$_POST['member_name'];
$address=$_POST['address'];
$email=$_POST['email'];

$qadd=mysql_query("INSERT 	INTO phone_book (phone_number,member_name,address,email) 
							VALUES('$phone_number','$member_name','$address','$email')");

$update=mysql_query("UPDATE ticket_support SET 
									createDate='$datetime',
									penelepon='$penelepon$member_name',
									notlp='$notlp$phone_number',
									perusahaan='$perusahaan',
									keperluan='$keperluan',
									status='$status',
									penerima='$penerima',
									updateBy='$updateBy',
									updateDate=CURRENT_TIMESTAMP
								where 
									result_id='$id'
						");
if($update):
header('location: ../record/');
endif;	
?>