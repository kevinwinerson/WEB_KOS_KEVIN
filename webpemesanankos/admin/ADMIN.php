<?php
session_start();
if (!@$_SESSION['telah_login']) {
             header("location: /webpemesanankos/admin/login.php");
          } 
 include 'koneksi.php';

 // lakukan query
 $query  = "SELECT * FROM kamar";


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
                        <h1 class="mt-4">HALAMAN ADMIN</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">HALAMAN ADMIN</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                               <button class="btn btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">TAMBAHKAN PAKET</button> 
                            </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                PAKET KOS
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" border=1>
                                    <thead>
                                        <tr>
                                            <th>id kamar</th>
                                            <th>PAKET KOS</th>
                                            <th>HARGA</th>
                                            <th>LUAS</th>
                                            <th>FASILITAS</th>
                                           <th>GAMBAR</th>
                                           <th>AKSI</th>
                                        </tr>
                                    </thead>
                                                            
                             <?php while ($fetch = $result->fetch_assoc()) : ?>
                               
                                        <tr>
                                            <!-- Menggunakan Nullable Operator (??) -->
                                            <td><?= $fetch["id_kamar"] ?? '-' ?></td>
                                            <!-- Metode Tenary -->
                                            <td><?= $fetch['paket_kamar'] == null ? '-' : $fetch['paket_kamar'] ?></td>
                                            <td><?= $fetch['harga'] ?? '-' ?></td>
                                            <td><?= $fetch['luas_kamar']?? '-'?></td>
                                            <td><?= $fetch['fasilitas']?? '-'?></td>
                                            <td><img src="img/<?= $fetch['gambar'] ?? '-' ?>" width="100"></td> 
                                            <td>
                                                <a href="formedit.php?id=<?= $fetch['id_kamar'] ?>" class="btn btn-success mb-1">
                                                    Edit
                                                </a>

                                                <form action="hapuspaket.php" method="post">
                                                    <input type="hidden" name="id_kamar" value="<?= $fetch['id_kamar'] ?>">
                                                    <input type="submit" value="hapus" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                 </table>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Static Backdrop Modal</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="tambahpaket.php" method="post" enctype="multipart/form-data">
                                            <div class="mb-3"><label for="namapaket">NAMA PAKET</label><input class="form-control form-control-solid" name="namapaket" type="text" placeholder="masukan nama paket">
                                            </div>
                                            <div class="mb-3"><label for="harga">harga</label><input class="form-control form-control-solid" name="harga" type="text" placeholder="harga">
                                            </div>
                                            <div class="mb-3"><label for="luas">luas</label><input class="form-control form-control-solid" name="luas" type="text" placeholder="luas">
                                            </div>
                                            <div class="mb-3"><label for="gambar">gambar</label><input class="form-control form-control-solid" name="gambar" type="file" placeholder="gambar">
                                            </div>
                                           <div class="mb-3"><label for="fasilitas">fasilitas</label><input class="form-control form-control-solid" name="fasilitas" type="text" placeholder="fasilitas">
                                            </div>
                                           <div class="mb-3"><label for="alamat">alamat</label><input class="form-control form-control-solid" name="alamat" type="text" placeholder="alamat">
                                            </div>
                                    
                                    <div class="modal-footer"><button class="btn btn-secondary" type="botton" data-bs-dismiss="modal">TUTUP</button><button class="btn btn-primary" type="submit" action="tambahpaket.php">SIMPAN</button>
                                    </div>
                                </div>
                                </form>
                                </div>
                               
                                
                            </div>
                        </div>
                                        </div>
                                    </div>
                                </div>
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
