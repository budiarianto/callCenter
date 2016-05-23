<?php
include '../koneksi.php';
?>
    
<?php
$query=mysql_query("select 
                        *
                        from phone_book
                        where is_delete='0'
                        and pb_group_id='3'
                        ");
$no=1;
?>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead style="overflow: auto">
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>PHONE NUMBER</th>
                <th>ALAMAT / PERUSAHAAN</th>
                <th>EMAIL</th>
                <th>GROUP</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php
                while ($row = mysql_fetch_assoc($query)) {
                    
        ?>  
            <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row['member_name']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['pb_group_id']; ?></td>
            <td><a id="myBtnPhone" href="../phoneBook/edit.php?id=<?php echo $row['phonebook_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            </tr>   
        <?php
            $no++;
            }

        ?>  
        </tbody>
    </table>
</div>