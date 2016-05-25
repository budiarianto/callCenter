<?php
$phone_number=$_POST['phone_number'];
$member_name=$_POST['member_name'];
$address=$_POST['address'];
$email=$_POST['email'];

$qadd=mysql_query("INSERT 	INTO phone_book (phone_number,member_name,address,email) 
							VALUES('$phone_number','$member_name','$address','$email')");
if($qadd):
	header('location : /callCenter/phoneBook/');
endif;	
?>