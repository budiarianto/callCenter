<?php
include '../koneksi.php';
$nama=$_GET['nama'];
$no=1;
$qcari=mysql_query("SELECT * FROM speed_dial where nama like '%$nama%' or bagian='%$nama%'");

?>

<table class="table table-bordered">
	<thead>
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>Ext</td>
			<td>Bagian</td>
		</tr>
	</thead>
	<?php
	while ($row=mysql_fetch_assoc($qcari)) {
	?>
	<tbody>
		<tr onclick="pilih(<?php echo $row['spdial']; ?>)">
			<td><?php echo $no ; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['spdial']; ?></td>
			<td><?php echo $row['bagian']; ?></td>
		</tr>			
	</tbody>
	<?php
	$no++;
	}
	?>
</table>
