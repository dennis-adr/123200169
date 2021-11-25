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

    <div>
        <br>
        <ul>
            <li style="background-color: rgb(44, 44, 150);">
                <a href="tambah-product.php" type="button" style="color:white">+ Tambah</a>
            </li>
        </ul> <br><br>

        <div style="margin-left: 150px;">
            <table>
                <thead style="text-align: center;">
                    <td> No </td>
                    <td> Kode </td>
                    <td> Nama Barang </td>
                    <td> Jumlah </td>
                    <td> Satuan </td>
                    <td> Tanggal Datang </td>
                    <td> Kategori </td>
                    <td> Status </td>
                    <td> Harga Satuan </td>
                    <td> Total Harga </td>
                    <td> Aksi </td>
                </thead>
                <tbody>
                    <?php
                    $totalinventaris = 0;
                    include 'config.php';
                    $nomor = 0;
                    $jumlah = 0;
                    if (empty($_GET['list'])) {
                        $query = mysqli_query($connect, "SELECT * FROM inventaris");
                    } else if ($_GET['list'] == 'bangunan') {
                        $query = mysqli_query($connect, "SELECT * FROM inventaris WHERE kategori='Bangunan'");
                    } else if ($_GET['list'] == 'kendaraan') {
                        $query = mysqli_query($connect, "SELECT * FROM inventaris WHERE kategori='Kendaraan'");
                    } else if ($_GET['list'] == 'alattuliskantor') {
                        $query = mysqli_query($connect, "SELECT * FROM inventaris WHERE kategori='alat tulis kantor'");
                    } else if ($_GET['list'] == 'elektronik') {
                        $query = mysqli_query($connect, "SELECT * FROM inventaris WHERE kategori='Elektronik'");
                    }
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td> <?php $nomor++;
                                    echo $nomor; ?> </td>
                            <td> <?php echo $data['kode_barang']; ?></td>
                            <td> <?php echo $data['nama_barang']; ?> </td>
                            <td> <?php echo $data['jumlah']; ?></td>
                            <td> <?php echo $data['satuan']; ?></td>
                            <td> <?php echo $data['tgl_datang']; ?></td>
                            <td> <?php echo $data['kategori']; ?></td>
                            <td> <?php echo $data['status_barang']; ?></td>
                            <td> Rp.<?php echo $data['harga']; ?></td>
                            <td> Rp. <?php $totalharga = $data['harga'] * $data['jumlah'];
                                        echo $totalharga;
                                        ?>
                            <td>
                                <?php $totalinventaris = $totalinventaris + $totalharga ?>
                                <ul>
                                <li style="background-color: rgb(44, 44, 150); margin-right:5px"><a style="color:white; padding:5px 30px;" href="edit-product.php?kode_barang=<?php echo $data['kode_barang'];?>">Edit</a></li>
                                <li style="background-color: rgb(44, 44, 150);"><a style="color:white; padding:5px 25px;" href="hapus.php?kode_barang=<?php echo $data['kode_barang'];?>">Hapus</a></li>
                                </ul>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table> <br>
            <center>
            Total Inventaris = Rp.<?= $totalinventaris ?>,00
            </center>
        </div>
    </div>

</body>

</html>