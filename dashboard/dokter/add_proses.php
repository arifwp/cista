<?php 

require_once '../../config.php';

if(isset($_POST['submit'])) {

    $pictures = $_FILES['pictures'] ['name'];
    $tmp = $_FILES['pictures'] ['tmp_name'];
    $imgSize = $_FILES['pictures'] ['size'];

    $valid_extensions = array('jpeg', 'jpg', 'png');
    $imgExt = strtolower(pathinfo($pictures, PATHINFO_EXTENSION));
    $ft_baru = date('dmYhis').$pictures.".".$imgExt;
    $path = "../../assets/img/foto_dokter/".$ft_baru;

    $nama_dokter = $_POST['nama_dokter'];
    $spesialis = $_POST['spesialis'];
    $jk = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];


    // if (isset($_FILES["files"]) == false)
    // {
    // // echo "Please select file to upload!";
    // var_dump($_tmp);
    // return;
    // }

    if(!move_uploaded_file($tmp, $path)) {
        die(mysqli_error($con));
    } 

        // if(!empty($_FILES['foto_dokter'])){
        //     if(in_array($imgExt, $valid_extensions)) {
        //         if($imgSize < 2000000){
    
        //         } else {
        //             echo "<script>alert('Maaf, ukuran foto harus dibawah 2Mb');
        //                     document.location.href='add_dokter.php';</script>";
        //         }
        //     } else {
        //         echo "<script>alert('Maaf, ekstensi foto tidak sesuai');
        //                     document.location.href='add_dokter.php';</script>";
        //     }
        // } else {
        //     echo "<script>alert('Maaf, anda harus upload foto terlebih dahulu');
        //                     document.location.href='add_dokter.php';</script>";
        // }
    
        $query = "INSERT INTO dokter SET 
        foto_dokter = '$ft_baru',
        nama_dokter = '$nama_dokter',
        spesialis = '$spesialis',
        jenis_kelamin = '$jk',
        no_telp = '$no_telp',
        alamat = '$alamat'
        ";
        $sql = mysqli_query($con, $query);
    
        if($sql) {
            header('location: show_dokter.php?message=add_success');
        } else {
            header('location: show_dokter.php?message=add_fail');
        }




}