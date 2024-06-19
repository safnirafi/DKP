<?php
session_start();
require_once './helper/connection.php';

if(isset($_SESSION['loginUser']['nama'])) {
    $nama_pengguna = $_SESSION['loginUser']['nama'];
}

$id_user = $_SESSION['loginUser']['id']; 

$query = "SELECT * FROM reservasi WHERE id_user = '$id_user'";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <title>Dapur Kopi Pasundan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/plugins.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">    
    <link rel="stylesheet" href="css/coloring.css" type="text/css">
    <!-- css for scheme color -->
    <link rel="stylesheet" href="css/colors/maroon-gold.css" type="text/css" id="colors">	
    <style> 
        .red-text {
            color: #23dc2c; /* Gunakan kode warna merah (#FF0000) */
        }
        .modal-backdrop {
            opacity: 0 !important;
        }
    </style>
</head>

<body class="de_light">
    <div id="wrapper">
        <!-- header begin -->
        <header class="header_center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="index.php">
                                <img class="logo logo_dark_bg" src="images/logo.png" alt="">
                                <img class="logo logo_light_bg" src="images/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo close -->
                        <!-- small button begin -->
                        <div id="menu-btn"></div>
                        <!-- small button close -->
                        <!-- mainmenu begin -->
                        <nav>
                            <ul id="mainmenu">
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="about.php">Tentang</a></li>
                                <li><a href="gallery.php">Galeri</a></li>
                                <?php if (isset($_SESSION['loginUser']) && isset($_SESSION['loginUser']['role']) && $_SESSION['loginUser']['role'] === 'orderer'): ?>
                                    <li><a href="booking.php">Pemesanan</a></li>
                                <?php endif; ?>
                                <li><a href="menu.php">Menu</a></li>
                                <li><a href="contact.php">Kontak</a></li>
                                <?php if (isset($_SESSION['loginUser']) && isset($_SESSION['loginUser']['role']) && $_SESSION['loginUser']['role'] === 'orderer'): ?>
                                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['loginUser']['nama'] ?></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="./auth/logout.php" class="dropdown-item has-icon text-danger">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </a>
                                        </div>
                                    </li>
                                <?php else: ?>
                                    <li><a href="auth/login.php">Login</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                    <!-- mainmenu close -->
                </div>
            </div>
        </header>
        <!-- header close -->
        <!-- subheader -->
        <section id="subheader" class="jarallax text-light">
            <img src="images/background/bg-6.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center wow fadeInUp">
                            <h2 class="s1 mb-40">Buat</h2>
                            <h2 class="s2">Pesananmu</h2>
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->
        <div id="content" class="no-bottom no-top">
            <section id="section-book-form">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-lg-4">
                            <h3 class="s2 id-color">Pesan Sekarang!</h3>
                            <p>Cukup pilih tanggal, waktu, dan jumlah pengunjung yang Anda inginkan, dan serahkan sisanya kepada kami. Bersiaplah untuk menikmati cita rasa istimewa, layanan sempurna, dan momen tak terlupakan saat Anda memulai perjalanan kuliner yang tiada duanya. </p>
                            <a class="red-text" href="whatsapp://send?phone=6281227173265&text=Halo%20saya%20ingin%20melakukan%20pemesanan%20di%20DKP%0A%0ATanggal%20Kunjungan:%20%0AWaktu%20Kunjungan:%20%0AJumlah%20Pengunjung:">Klik di sini untuk menghubungi via WhatsApp</a>
                        </div>
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-primary mb-3" id="buatReservasiBtn" data-bs-toggle="modal" data-bs-target="#modalReservasi">Buat Reservasi</button>
                            <!-- Formulir reservasi -->
                            <div id="formReservasi" style="display: none;">
                                <h3 class="s2 id-color">Formulir Reservasi</h3>
                                <form id="reservationForm" method="post" action="proses_reservasi.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" class="form-control" id="waktu" name="waktu" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="banyak_pengunjung" class="form-label">Jumlah Pengunjung</label>
                                        <input type="number" class="form-control" id="banyak_pengunjung" name="banyak_pengunjung" placeholder="Masukkan Jumlah Pengunjung" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran (min DP 50K)</label>
                                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Catatan Tambahan (Opsional)</label>
                                        <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                            <table class="table table-hover table-striped w-100" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Catatan</th>
                                        <th>Status Reservasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) :
                                       $status_booking = ($data['status_booking'] == 0) ? 'Belum Terbooking' : 'Booked';
                                       $badge_color = ($data['status_booking'] == 0) ? 'btn-danger' : 'btn-success';
                                    ?>

                                    <tr class="text-center">
                                        <td><?= $no ?></td>
                                        <td><?= $data['tanggal'] ?></td>
                                        <td><?= $data['waktu'] ?></td>
                                        <td><?= $data['pesan'] ?></td>
                                        <td><span class="badge <?= $badge_color ?>"><?= $status_booking ?></span></td>
                                    </tr>

                                    <?php
                                    $no++;
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="spacer-single"></div>
                    </div>
                </div>
            </section>
        </div>
        <!-- footer begin -->
        <footer>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 sm-text-center">
                        <h3>Lokasi Kami</h3>
                        Malabar Ujung, Bogor Kota, Indonesia<br>
                        T. (62) 856-9732-8712<br>
                        E. dkp@gmail.com<br>
                    </div>
                    <div class="col-lg-4 text-center">
                        <img class="logo" src="images/logo.png" alt="">
                    </div>
                    <div class="col-lg-4 text-lg-end text-center">
                        <div class="social-icons">
                            <a href="https://wa.me/6285697328712"><i class="fa fa-whatsapp fa-lg"></i></a>
                            <a href="https://www.instagram.com/dapurkopipasundan/"><i class="fa fa-instagram fa-lg"></i></a>
                            <a href="https://id.foursquare.com/v/dapur-kopi-pasundan-2/4d762677ec646dcb83bbf610"><i class="fa fa-foursquare fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->
        <div id="preloader">
            <div class="preloader1"></div>
        </div>
    </div>
    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="form.js"></script>
    <script src="../assets/js/page/modules-datatables.js"></script>
    <script>
        $(function () {
          $("#date").datepicker({ 
                autoclose: true, 
                todayHighlight: true
          }).datepicker('update', new Date());
        });
    </script> 
    <script>
        $(document).ready(function() {
            // Tambahkan event listener untuk tombol "Buat Reservasi"
            $('#buatReservasiBtn').click(function() {
                // Tampilkan formulir reservasi di bawah tombol
                $('#formReservasi').slideDown();
            });
        });
    </script>
</body>

</html>
