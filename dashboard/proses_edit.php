<?php 

require_once '../config.php';

if(isset($_POST['submit'])) {
    $nomor_rm = $_POST['nomor_rm'];
    $pasien = $_POST['pasien'];
    $keluhan = $_POST['keluhan'];
    $dokter = $_POST['dokter'];
    $diagnosa = $_POST['diagnosa'];
    $poli = $_POST['poli'];

    // $sql = "UPDATE rekammedis SET
    //         keluhan='$keluhan',
    //         diagnosa='$diagnosa'
    //         ";


    $sql = "UPDATE rekammedis SET 
    id_pasien = '$pasien',
    keluhan = '$keluhan',
    id_dokter = '$dokter',
    diagnosa = '$diagnosa',
    id_poli = '$poli' WHERE id_rm = '$nomor_rm'
    ";

    $query = mysqli_query($con, $sql);

    $query_rm_obat = "DELETE FROM rm_obat WHERE id_rm='$nomor_rm'";
    $query_rm_obat = mysqli_query($con, $query_rm_obat);

    if($query_rm_obat) {
        $obat = $_POST['obat'];
        foreach ($obat as $ob) {
            $sql_obat = "INSERT INTO rm_obat (id_rm, id_obat) VALUES ('$nomor_rm', '$ob')";
            $query_obat = mysqli_query($con, $sql_obat);
        }
    } else  {
        echo mysqli_error($con);
    }

    

    // $obat = $_POST['obat'];
    // $sql_obat = "UPDATE rm_obat SET
    // id_rm = '$nomor_rm',
    // id_obat = '$obat' WHERE id_rm = '$nomor_rm'
    // ";


    if($query AND $query_obat ) {
        header('location: index.php?message=edit_success');
    } else {
        header('location: index.php?message=edit_fail');
    }
    

}