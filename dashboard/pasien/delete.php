<?php 

require_once '../../config.php';


if(isset ($_GET['id_pasien'])) {

    $id_pasien = $_GET['id_pasien'];
    $sql = "DELETE FROM pasien WHERE id_pasien='$id_pasien'";
    $query = mysqli_query($con, $sql);
      
    if($query) {
        header('location: tampil_pasien.php?message=delete_success');
    } else {
        header('location: tampil_pasien.php?message=delete_fail');
    }
}

