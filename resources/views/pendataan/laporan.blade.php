<!DOCTYPE html>
<html>
<head>
	<title>CETAK</title>
</head>
<body>
 
	<?php 
	include 'connect.php';

	$query = "SELECT * FROM berkas WHERE deleted=0";

    $result = mysqli_query($conn , $query);

	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Tanggal</th>
			<th>Waktu</th>
            <th>Media</th>
            <th>Untuk</th>
            <th>Dari</th>
            <th>Materi/Pesan</th>
			
		</tr>
		<?php 
		$no = 1;
		while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['waktu']; ?></td>
			<td><?php echo $row['media']; ?></td>
            <td><?php echo $row['untuk']; ?></td>
            <td><?php echo $row['dari']; ?></td>
            <td><?php echo $row['materi_pesan']; ?></td>
		</tr>
		<?php 
		}
		mysqli_close($conn);
		?>
	</table>
	<script>
		window.print();
	</script>
	</div>
	

 
</body>
</html>