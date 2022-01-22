<?php 

require_once '../../config.php';

	if (isset($_POST['submit'])) {
		$id_pasien = $_POST['id_pasien'];
		$nama_pasien = $_POST['nama_pasien'];
		$nomor_identitas = $_POST['nomor_identitas'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tgl_lahir = $_POST['tgl_lahir'];

		$sql = "UPDATE pasien 
				SET 
					id_pasien='$id_pasien',
					nama_pasien='$nama_pasien', 
					nomor_identitas='$nomor_identitas', 
					alamat='$alamat', 
					no_telp='$no_telp', 
					jenis_kelamin='$jenis_kelamin', 
					tgl_lahir='$tgl_lahir'
				WHERE id_pasien='$id_pasien'";
		$query = mysqli_query($con, $sql);
		
		if($query) {
			header("location: tampil_pasien.php?message=edit_success");
		} else {
			header("location: tampil_pasien.php?message=edit_fail");
		}

	}


 ?>