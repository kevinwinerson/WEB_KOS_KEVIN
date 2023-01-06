<?php

$koneksi = new mysqli('localhost', 'root', '', 'kos');

if (!$koneksi) {
	die("<script>alert('gagal tersmabung dengan database.')</script>");
}

?>