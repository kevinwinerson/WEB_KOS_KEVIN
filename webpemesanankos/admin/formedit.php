<?php

include 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM kamar WHERE id_kamar='".$id."'";
$query = $koneksi->query($sql);

$result = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HALAMAN EDITPAKET</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                       <div class="nav">
                            <div class="sb-sidenav-menu-heading">PAGE</div>
                            <a class="nav-link" href="ADMIN.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ADMIN
                            </a>
                            <a class="nav-link" href="PESANAN.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                LAPORAN PESANAN
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                PENYEWA
                            </a>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">MAKE BY:</div>
                       KEVIN WINERSON
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">HALAMAN EDIT</h1>
                        

<form action="updatepaket.php" method="post" enctype="multipart/form-data">
    <input type="hiden" name="id" value="<?= $result['id_kamar'] ?>">
    <div class="mb-3"><label for="namapaket">nama paket</label><input class="form-control" id="namapaket" type="text" placeholder="nama paket" name="namapaket" value="<?= $result['paket_kamar'] ?>"></div>
    <div class="mb-3"><label for="harga">harga</label><input class="form-control" id="harga" type="text" placeholder="harga" name="harga"value="<?= $result['harga'] ?>"></div>
    <div class="mb-3"><label for="harga">luas</label><input class="form-control" id="luas" type="text" placeholde="luas"
       name="luas" value="<?= $result['luas_kamar'] ?>"></div>
    <div class="mb-3"><label for="fasilitas">fasilitas</label><input class="form-control" id="fasilitas" type="text" placeholder="fasilitas" name="fasilitas" value="<?= $result['fasilitas'] ?>"></div>
    <div class="mb-3"><label for="alamat">alamat</label><input class="form-control" id="alamat" type="text" placeholder="alamat" name="alamat" value="<?= $result['alamat'] ?>"></div>
    <div class="mb-3"><label for="gambar">gambar</label><input class="form-control" id="gambar" type="file" placeholder="gambar" name="gambar" value="<?= $result['gambar'] ?>"></div>
     <div class="mb-3"><button class="btn btn-primary" type="submit" action="updatepaket.php">SIMPAN</button></div>
   
</form>
</form>


                       
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
