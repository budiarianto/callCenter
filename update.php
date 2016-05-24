<?php
$qbatas=mysql_query("SELECT createDate FROM ticket_support order by  createDate DESC LIMIT 1");
$batas=mysql_fetch_array($qbatas);
$date_time=$batas['createDate'];

$sql="
	INSERT INTO ticket_support(result_id,createDate,penelepon,notlp,perusahaan,keperluan,eng_id,user)
	SELECT  pl.result_id,pl.date_time,pl.phone_name,pl.phone_number,cr.contact_option,cr.contact_notes,SUBSTR(pl.result_id,16,3),
			(SELECT emp_code FROM tuser WHERE is_login='1' AND eng_id= SUBSTR(pl.result_id,16,3))
	FROM phone_log pl
	LEFT JOIN contact_result cr on pl.result_id=cr.result_id	
	WHERE pl.date_time > '$date_time'
	";
mysql_query($sql);
?>