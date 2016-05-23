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
include '../cekLogin.php';
?>
    
<?php
if($user_level=="1"):
    $query=mysql_query("select 
                        *
                        from ticket_support
                        where DATE_SUB(NOW(), INTERVAL 1 MONTH)  
                        order by createDate desc");
else:
    $query=mysql_query("select 
                        *
                        from ticket_support
                        where DATE_SUB(NOW(), INTERVAL 1 MONTH)  
                        and user='$emp_code'
                        order by createDate desc");
endif;

$no=1;
?>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead style="overflow: auto">
            <tr>
                <th>NO</th>
                <th>HARI/TANGGAL</th>
                <th>WAKTU</th>
                <th>TIPE</th>
                <th>PENELEPON</th>
                <th>NO TELP/HP</th>
                <th>PERUSAHAAN</th>
                <th>KEPERLUAN</th>
                <th>STATUS</th>
                <th>TUJUAN PENERIMA</th>
                <th>USER</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php
                while ($row = mysql_fetch_assoc($query)) {
                    $createDate=$row["createDate"];
                    $d = new DateTime($createDate);
                    $arrayName = array('Sunday' =>'Minggu' ,
                                        'Monday' =>'Senin' ,
                                        'Tuesday' =>'Selasa' ,
                                        'Wednesday' =>'Rabu' ,
                                        'Thursday' =>'Kamis' ,
                                        'Friday' =>'Jum\'at' ,
                                        'Saturday' =>'Sabtu' );

        ?>  
            <tr onclick="myFunction()">
            <td><?php echo $no ?></td>
            <td><?php echo  strtr($d->format('l'),$arrayName ),",",$d->format('d-m-Y');  ?></td>
            <td><?php echo $d->format('H:i:s');  ?></td>
            <td>0</td>
            <td><?php echo $row["penelepon"]; ?></td>
            <td><?php echo $row["notlp"]; ?></td>
            <td><?php echo $row["perusahaan"]; ?></td>
            <td><?php echo $row["keperluan"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td><?php echo $row["penerima"]; ?></td>
            <td><?php echo $row["user"]; ?></td>
            <td><a href="../record/edit.php?id=<?php echo $row['result_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            </tr>   
        <?php
            $no++;
            }

        ?>  
        </tbody>
    </table>
</div>

</body>
</html>