<?php

include 'koneksi.php';

$id_kamar = $_POST['id_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$no_hp = $_POST['no_hp'];
$paket_kamar=$_POST['paket_kamar'];
 

$query = "INSERT INTO pesanan (id_pesanan,nama_pemesan, no_hp, id_kamar,paket_kamar) VALUES('".null."','".$nama_pemesan."','".$no_hp."','".$id_kamar."','".$paket_kamar."')";

$data  = $koneksi->query($query);


if ($data) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/user/album/index.php' }, 500);
    </script>";
} else { 
   
    echo "<script>
        alert('Data Gagal Disimpan');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/ADMIN.php' }, 500);
    </script>";
}
?>
    
