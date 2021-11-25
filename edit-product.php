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
        <center>Ubah Data Inventaris</center>
    </div><br>
    <div>
        <center>
            <form action="" method="POST">
                <table style="border: 0px; text-align:left;">
                    <tr>
                        <td style="padding-bottom: 20px;">Kode Barang</td>
                        <td><input type="text" name="kode_barang" placeholder="Kode Barang" class="inputt" style="width: 300px;" value="<?php echo $data->kode_barang ?>"></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Nama Barang</td>
                        <td><input type="text" name="nama_barang" placeholder="Nama Barang" class="inputt" style="width: 300px;" value="<?php echo $data->nama_barang ?>"></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Jumlah</td>
                        <td><input type="number" name="jumlah" placeholder="Jumlah Barang" class="inputt" style="width: 100px;" value="<?php echo $data->jumlah ?>"></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Satuan</td>
                        <td><input type="text" name="satuan" placeholder="Satuan" class="inputt" style="width: 100px;" value="<?php echo $data->satuan ?>"></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Tanggal Datang</td>
                        <td><input type="date" name="tgl_datang" placeholder="Tanggal Datang" class="inputt" style="width: 150px;" value="<?php echo $data->tgl_datang ?>"></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Kategori</td>
                        <td>
                            <select name="kategori" selected="bangunan" class="inputt" style="width: 150px;">
                                <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                                <option value="Bangunan">Bangunan</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Kendaraan">Kendaraan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Status</td>
                        <td style="padding-bottom: 20px;"><input type="radio" id="baik" name="status_barang" value="Baik">
                            <label for="baik">Baik</label>
                            <input type="radio" id="perawatan" name="status_barang" value="Perawatan">
                            <label for="perawatan">Perawatan</label>
                            <input type="radio" id="rusak" name="status_barang" value="Rusak">
                            <label for="rusak">Rusak</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">Harga Satuan</td>
                        <td><input type="number" name="harga" placeholder="Harga Barang Satuan" class="inputt" style="width: 300px;" value="<?php echo $data->harga ?>"></td>
                    </tr>
                </table>
                <center>
                    <input type="submit" name="submit" value="Simpan" style="background-color: rgb(44, 44, 150); color:white; padding:5px 20px;">
                    <form>
                        <input type="button" value="Batal" onclick="history.back()" style="background-color: rgb(44, 44, 150); color:white; padding:5px 20px;">
                    </form>
                </center>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $kode_barang = $_POST['kode_barang'];
                $nama_barang = $_POST['nama_barang'];
                $jumlah = $_POST['jumlah'];
                $satuan = $_POST['satuan'];
                $tgl_datang = $_POST['tgl_datang'];
                $kategori = $_POST['kategori'];
                $status_barang = $_POST['status_barang'];
                $harga = $_POST['harga'];

                $update = mysqli_query($connect, "UPDATE inventaris SET kode_barang='" . $kode_barang . "',nama_barang='" . $nama_barang . "',jumlah='" . $jumlah . "',satuan='".$satuan."',tgl_datang='" . $tgl_datang . "',kategori='" . $kategori . "',status_barang='" . $status_barang . "',harga='" . $harga . "' WHERE kode_barang = '" . $_GET['kode_barang'] . "'");
                if ($update) {
                    echo '<script>alert("Berhasil Mengedit Data!")</script>';
                    echo '<script>window.location="inventaris.php"</script>';
                } else {
                    echo 'Gagal!' . mysqli_error($connect);
                }
            }
            ?>
        </center>
    </div>

</body>