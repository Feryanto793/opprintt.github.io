<!DOCTYPE html>
<html>
<head>
	<title>Selamat datang</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div class="judul">		
		<h1>EDIT DENGAN BENAR</h1>
		<h2>Menampilkan data dari database</h2>
		
	</div>
	<br/>

	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
	<br/>
	<a class="tombol" href="input1.php">+ Tambah Data Baru</a>

	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
			<th>no</th>
            <th>id</th>
			<th>nama</th>
			<th>username</th>
			<th>password</th>
            <th>aksi</th>
			
		</tr>
		<?php 
		include "koneksi.php";
		$query_mysql = mysql_query("SELECT * FROM admin")or die(mysql_error());
		$nomor = 1;
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td>
				<a class="edit" href="edit1.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<a class="hapus" href="hapus1.php?id=<?php echo $data['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
		<center><a href="kembali.php"><button type='button' class='btn btn-danger'>kembali</button></a></center>
	</table>
</body>
</html>