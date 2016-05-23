<?php
include 'kon.php';
include '../cekLogin.php';
date_default_timezone_set("Asia/Bangkok"); 
$penelepon= $_POST['penelepon'];
$notlp= $_POST['notlp'];
$perusahaan= $_POST['perusahaan'];
$keperluan= $_POST['keperluan'];
$status= $_POST['status'];
$penerima= $_POST['penerima'];
$date=date_create($_POST['datetime']);
$datetime= date_format($date,"Y-m-d H:i:s");	


$user= $_POST['user'];
$resultid=date("omdGis")."-001";


$sqlphone="INSERT INTO phone_log(
							call_type,
							date_time,
							asnwered,
							ended,
							duration,
							billsec,
							phone_number,
							phone_name,
							result_id, 
							user_id,
							is_delete) 
						VALUES(
							'0',
							CURRENT_TIMESTAMP,
							CURRENT_TIMESTAMP,
							CURRENT_TIMESTAMP,
							'1',
							'1',
							'$notlp',
							'$penelepon',
							'$resultid',
							'$user_id',
							'0')";

$sqlContactResult="INSERT INTO contact_result(
							result_id,
							date_time,
							phone_number,
							contact_name,
							contact_option,
							contact_notes,
							create_date,
							last_update,
							user_id,
							is_delete) 
						VALUES(
							'$resultid',
							CURRENT_TIMESTAMP,
							'$notlp',
							'$penelepon',
							'$perusahaan',
							'$keperluan',
							CURRENT_TIMESTAMP,
							CURRENT_TIMESTAMP,
							'$user_id',
							'0'
							)";

$sqlTicketSupport="INSERT INTO ticket_support(
							result_id,
							createDate,
							penelepon,
							notlp,
							perusahaan,
							keperluan,
							status,
							penerima,
							user)
						VALUES(
							'$resultid',
							'$datetime',
							'$penelepon',
							'$notlp',
							'$perusahaan',
							'$keperluan',	
							'$status',
							'$penerima',
							'$emp_code'
							)";
echo $sqlTicketSupport;

mysql_query($sqlphone);
mysql_query($sqlContactResult);
$sql_TicketSupport=mysql_query($sqlTicketSupport);
if($sql_TicketSupport):
	header('Location: /callCenter/record');
endif;	

?>
