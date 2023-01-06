<?php

include 'koneksi.php';
$paket_kamar = $_POST['namapaket'];
$harga = $_POST['harga'];
$luas = $_POST['luas'];
$fasilitas = $_POST['fasilitas'];
$alamat = $_POST['alamat'];
$gambar = $_FILES['gambar']['name'];


$query = "INSERT INTO kamar (id_kamar,paket_kamar, harga, luas_kamar, fasilitas, alamat, gambar) VALUES('".null."','".$paket_kamar."','".$harga."','".$luas."','".$fasilitas."','".$alamat."','".$gambar."')";

$data  = $koneksi->query($query);


if ($data) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/ADMIN.php' }, 500);
    </script>";
} else { 
   
    echo "<script>
        alert('Data Gagal Disimpan');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/ADMIN.php' }, 500);
    </script>";
}