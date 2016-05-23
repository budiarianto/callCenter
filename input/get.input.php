<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php
include '../koneksi.php';
?>
    
<?php
$query=mysql_query("select * from phone_log where order by date_time asc limit 1");
$no=1;
?>


</body>
</html>