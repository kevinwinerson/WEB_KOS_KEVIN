<?php

include 'koneksi.php';

$id = $_POST['id_pesanan'];

$query = "DELETE FROM   Pesanan WHERE id_pesanan = '".$id."'";

$data  = $koneksi->query($query);

if ($data) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        
        setTimeout(() => { window.location.href =window.location.origin +  /webpemesanankos/admin/PESANAN.php' }, 500);
    </script>";
} else { 
    // http://localhost/cruds/formtambah.php
    // cruds adalah nama project kalian

    echo "<script>
        alert('Data Gagal Dihapus');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/PESANAN.php' }, 500);
    </script>";
}