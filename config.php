<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'db_rekammedis';

$con = mysqli_connect($servername, $username, $password, $database);

if(!$con) {
	die("Koneksi gagal :". mysqli_error());
}

?>