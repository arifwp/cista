<?php 

require_once 'config.php';
session_start();
if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql= mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($sql);

    //cek login
    if($cek > 0) {  
        $data = mysqli_fetch_assoc($sql);

        if($data['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            $_SESSION['status'] = "login";
            header("location: dashboard/index.php");
        }
        
    } else {
        header('location: login.php?message=login_fail');
    }

}

?>