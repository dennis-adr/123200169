<?php
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    echo '<script>alert("Silahkan login terlebih dahulu!")</script>';
    echo '<script>window.location="index.php"</script>';
}
include 'config.php';
$query = mysqli_query($connect, "SELECT * FROM inventaris WHERE kode_barang = '" . $_GET['kode_barang'] . "' ") or die(mysqli_error($connect));
$data = mysqli_fetch_object($query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header2">
        <ul>
            <li><a href="welcome.php">Beranda</a></li>
            <li><a href="inventaris.php">Daftar Inventaris</a></li>
        </ul>
        <div class="dropdown">
            <button class="dropbtn">List Per Kategori</button>
            <div class="dropdown-content">
                <a href="inventaris.php?list=bangunan">Bangunan</a>
                <a href="inventaris.php?list=kendaraan">Kendaraan</a>
                <a href="inventaris.php?list=alattuliskantor">Alat Tulis Kantor</a>
                <a href="inventaris.php?list=elektronik">Elektronik</a>
            </div>
        </div>
    </div>
    <div style="color: white; background-color: rgb(44, 44, 150);">
        <center>Hapus Data Inventaris</center>
    </div><br>
    <div>
        <center>
            Apakah anda yakin ingin menghapus <a style="color: blue;"> <?= $data->nama_barang ?> </a> ?
        </center>
    </div>
    <br>
    <div style="margin-left: 55%; margin-top:10px;">
        <form>
            <input type="button" value="Hapus" onclick="window.location.href='hapus-product.php?kode_barang=<?= $data->kode_barang ?>';" style="background-color: rgb(44, 44, 150); color:white; padding:5px 20px;">
            <input type="button" value="Batal" onclick="history.back()" style="background-color: rgb(44, 44, 150); color:white; padding:5px 20px; margin-left:5px">
        </form>
    </div>