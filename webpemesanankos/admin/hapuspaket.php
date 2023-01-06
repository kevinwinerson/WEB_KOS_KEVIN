<?php

include 'koneksi.php';

$id_kamar = $_POST['id_kamar'];

$query = "DELETE FROM kamar WHERE id_kamar = '".$id_kamar."'";

$data  = $koneksi->query($query);

if ($data) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/ADMIN.php' }, 500);
    </script>";
} else { 
    // http://localhost/cruds/formtambah.php
    // cruds adalah nama project kalian

    echo "<script>
        alert('Data Gagal Dihapus');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/ADMIN.php' }, 500);
    </script>";
}