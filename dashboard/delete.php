<?php 

require_once '../config.php';

    // echo $_GET['id_rm'];

if(isset($_GET['id_rm'])) {

    $id_rm = $_GET['id_rm'];

    $sql_rm_obat = "DELETE FROM rm_obat WHERE id_rm='$id_rm'";
    $query_rm_obat = mysqli_query($con, $sql_rm_obat);

    if($query_rm_obat) {
        $sql_rekammedis = "DELETE FROM rekammedis WHERE id_rm='$id_rm'";
        $query_rekammedis = mysqli_query($con, $sql_rekammedis);
    } 

    if($query_rm_obat AND $query_rekammedis) {
        header('location: index.php?message=delete_success');
    } else {
        header('location: index.php?message=delete_fail');
    }

}