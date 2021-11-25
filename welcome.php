<?php
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    echo '<script>alert("Silahkan login terlebih dahulu!")</script>';
    echo '<script>window.location="index.php"</script>';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header3">
        <h1>DAFTAR INVENTARIS BARANG<br>
            KANTOR SERBA ADA</h1>
    </div>

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
        <ul style="float: right;">
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>



    <div>
        <center>
            <br><br><br><br>
            <h1>Selamat Datang</h1><br>
            <h1 style="color: rgb(44, 44, 150);">
                <?php
                include 'config.php';
                $username = $_SESSION['username'];
                $query = mysqli_query($connect, "SELECT * FROM petugas WHERE username='$username'");
                while ($data = mysqli_fetch_array($query)) {
                    echo $data['nama_lengkap'];
                }
                ?>
            </h1>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </center>
    </div>

    <footer class="header" style="padding-bottom: 14px; padding-top: 17px;">
        Inventaris 2021
    </footer>
</body>

</html>