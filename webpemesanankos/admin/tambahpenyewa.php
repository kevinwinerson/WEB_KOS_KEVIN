<?php 
include 'koneksi.php';

$nama_penyewa= $_POST['nama_pemesan'];
$no_hp= $_POST['no_hp'];
$paket_kamar= $_POST['paket_kamar'];


$query = "INSERT INTO penyewa (id_penyewa,nama_penyewa,no_hp,paket_kamar) VALUES('".null."','".$nama_penyewa."','".$no_hp."','".$paket_kamar."')";

$data  = $koneksi->query($query);

if ($data) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/user.php' }, 500);
    </script>";
} else { 
   
    echo "<script>
        alert('Data Gagal Disimpan');
        
        setTimeout(() => { window.location.href = window.location.origin + '/webpemesanankos/admin/PESANAN.php' }, 500);
    </script>";
}
 ?>