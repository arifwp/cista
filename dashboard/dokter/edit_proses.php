<?php 

require_once '../../config.php';

if(isset($_POST['submit'])) {

    $id_dokter = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $spesialis = $_POST['spesialis'];
    $jk = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $pictures = $_FILES['pictures'] ['name'];
    $tmp = $_FILES['pictures'] ['tmp_name'];
    $imgSize = $_FILES['pictures'] ['size'];

    $valid_extensions = array('jpeg', 'jpg', 'png');
    $imgExt = strtolower(pathinfo($pictures, PATHINFO_EXTENSION));
    $ft_baru = date('dmYhis').$pictures.".".$imgExt;
    $path = "../../assets/img/foto_dokter/".$ft_baru;

    if(!move_uploaded_file($tmp, $path)) {
        echo mysqli_error($con);
    }

    $query = "UPDATE dokter SET
        foto_dokter = '$ft_baru',
        nama_dokter = '$nama_dokter',
        spesialis = '$spesialis',
        jenis_kelamin = '$jk',
        no_telp = '$no_telp',
        alamat = '$alamat' 
        WHERE id_dokter='$id_dokter'
    ";
    $sql = mysqli_query($con, $query);

    if($sql) {
        header('location: show_dokter.php?message=edit_success');
    } else {
        header('location: show_dokter.php?message=edit_fail');
    }


}