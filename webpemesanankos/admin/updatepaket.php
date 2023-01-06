<?php

include 'koneksi.php';

$id = $_POST['id'];
$namapaket = $_POST['namapaket'];
$harga = $_POST['harga'];
$luas = $_POST['luas'];
$fasilitas = $_POST['fasilitas'];
$alamat = $_POST['alamat'];
$gambar = $_FILES['gambar']['name'];

$sql  = "UPDATE kamar SET paket_kamar='".$namapaket."',harga='".$harga."',luas_kamar='".$luas."',fasilitas='".$fasilitas."',alamat='".$alamat."',gambar='".$gambar."'";

$sql .= " WHERE id_kamar='".$id."' ";

$data  = $koneksi->query($sql);

if ($data) {
    echo "<script>
        alert('Data Berhasil Diperbarui');
        
      setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/ADMIN.php' }, 5000);
    </script>";
} else { 

    echo "<script>
        alert('Data Gagal Diperbarui');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/formedit.php' }, 500);
   </script>";
}