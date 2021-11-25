<?php 
    include "config.php";

    if(isset($_GET['kode_barang'])){
        $delete = mysqli_query($connect,"DELETE FROM inventaris WHERE kode_barang='".$_GET['kode_barang']."'");
        echo '<script>alert("Berhasil Menghapus Data!")</script>';
        echo '<script>window.location="inventaris.php"</script>';
    } else{
        echo 'Gagal!'.mysqli_error($connect);
    }
?>