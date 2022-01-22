<?php 

require_once '../config.php';

if(isset($_POST['submit'])) {
    $nomor_rm = $_POST['nomor_rm'];
    $pasien = $_POST['pasien'];
    $keluhan = $_POST['keluhan'];
    $dokter = $_POST['dokter'];
    $diagnosa = $_POST['diagnosa'];
    $poli = $_POST['poliklinik'];

    $sql = "INSERT INTO rekammedis VALUES ('$nomor_rm', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', CURRENT_TIMESTAMP)";
    $query = mysqli_query($con, $sql);

    $obat = $_POST['obat'];
    foreach ($obat as $ob) {
        $sql_obat = "INSERT INTO rm_obat (id_rm, id_obat) VALUES ('$nomor_rm', '$ob')";
        $query_obat = mysqli_query($con, $sql_obat);
    }

    if($query AND $query_obat) {
        header('location: index.php?message=add_success');
    } else {
        header('location: index.php?message=add_fail');
    }
    

}