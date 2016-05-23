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

$update=mysql_query("UPDATE ticket_support SET 
									createDate='$datetime',
									penelepon='$penelepon',
									notlp='$notlp',
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