<?php 

require_once '../../config.php';

if(isset($_GET['id_dokter'])) {

    $id_dokter = $_GET['id_dokter'];

    $query_show = "SELECT foto_dokter FROM dokter WHERE id_dokter='$id_dokter'";
    $sql_show = mysqli_query($con, $query_show);

    $foto_dokter = mysqli_fetch_array($sql_show);

    if(unlink("../../assets/img/foto_dokter/".$foto_dokter['foto_dokter'])) {
        $query = "DELETE FROM dokter WHERE id_dokter='$id_dokter'";
        $sql = mysqli_query($con, $query);

        header('location: show_dokter.php?message=delete_success');
    } else {
        header('location: show_dokter.php?message=delete_fail');
    }


}

?>