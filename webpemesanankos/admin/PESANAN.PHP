<?php
session_start();
if (!@$_SESSION['telah_login']) {
             header("location: /webpemesanankos/admin/login.php");
          } 
 include 'koneksi.php';

 // lakukan query
 $query  = "SELECT * FROM Pesanan";


 $result = $koneksi->query($query);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KOS KEVIN</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">KOS KEVIN</a>
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
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                               PEMESAN
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
                        <h1 class="mt-4">LAPORAN PEMESANAN</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">HALAMAN PEMESANAN</li>
                        </ol>
                        <div class="row">
                            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pesanaan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>di pemesan</th>
                                            <th>nama pemesan</th>
                                            <th>no hp</th>
                                            <th>paket kamar</th>
                                            <th>id kamar</th>
                                           <th>tgl pemesanan</th>
                                           <th>aksi</th>
                                        </tr>
                                    </thead>
                                 <?php while ($fetch = $result->fetch_assoc()) : ?>
                               
                                        <tr>
                                            <!-- Menggunakan Nullable Operator (??) -->
                                            <td><?= $fetch["id_pesanan"] ?? '-' ?></td>
                                            <!-- Metode Tenary -->
                                            <td><?= $fetch['nama_pemesan'] == null ? '-' : $fetch['nama_pemesan'] ?></td>
                                            <td><?= $fetch['no_hp'] ?? '-' ?></td>
                                            <td><?= $fetch['paket_kamar']?? '-'?></td>
                                            <td><?= $fetch['id_kamar']?? '-'?></td>
                                            <td><?= $fetch['tanggal']?? '-'?></td>
                                              <td>
                                                <form action="tambahpenyewa.php" method="post">
                                                <input type="hidden" name="nama_pemesan" value="<?= $fetch['nama_pemesan'] ?>">
                                                <input type="hidden" name="no_hp" value="<?= $fetch['no_hp'] ?>">
                                                <input type="hidden" name="paket_kamar" value="<?= $fetch['paket_kamar'] ?>">
                                                <input type="submit" value="tambahkan penyewa" class="btn btn-success mb-1">
                                                </form>
                                                <form action="hapuspesanan.php" method="post">
                                                    <input type="hidden" name="id_pesanan" value="<?= $fetch['id_pesanan'] ?>">
                                                    <input type="submit" value="hapus" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <footer>MAKE BY KEVIN WINERSON</footer>
</html>