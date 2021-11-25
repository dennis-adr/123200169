<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "responsi";
$connect  = new mysqli($hostname, $username, $password, $db);

if ($connect->connect_error) {
    die('Maaf Koneksi Gagal: ' . $connect->connect_error);
}
?>