<?php
session_start();

if(isset($_SESSION['loginUser']['nama'])) {
    $nama_pengguna = $_SESSION['loginUser']['nama'];
}
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
        .figcaption {
            text-align: center; /* Mengatur teks menjadi rata tengah */
            font-weight: bold; /* Mengatur teks menjadi tebal */
            margin-top: 10px; /* Menambahkan jarak atas antara gambar dan teks */
        }
        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; /* Menambahkan jarak antara tombol */
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
            <img src="images/background/bg-10.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center wow fadeInUp">
                            <h2 class="s1 mb-40">Temukan</h2>
                            <h2 class="s2">Galeri</h2>
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="btn-container">
            <a href="gal-makanan.php" class="btn-custom">Makanan</a>
        <a href="gal-minuman.php" class="btn-custom">Minuman</a>
        <a href="gal-snack.php" class="btn-custom">Snack</a>
    </div>

        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <section aria-label="section">
                <div class="container">
                    <div id="gallery" class="row g-4 zoom-gallery">

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/1.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/1.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Kopi Latte</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>
                        
                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/2.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/2.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Beng-Beng Drink</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/3.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/3.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Nutrisari</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/4.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/4.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Milo</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/5.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/5.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Kopi Hitam</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/6.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/6.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Teh Manis</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/7.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/7.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Kopi Liong</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>
                        
                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/28.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/28.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Kopi Bajigur</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/29.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/29.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Kopi Bandrek</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/30.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/30.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Teh Lemon</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        <div class="col-lg-4 item">
                            <figure class="hover-zoom position-relative rounded-20 overflow-hidden">
                                <a href="images/gallery/31.jpg">
                                    <span class="d-hover">
                                        <span class="d-text">
                                            <span class="d-cap">Lihat</span>
                                        </span>
                                    </span>
                                    <img src="images/gallery/31.jpg" alt="" >
                                    <figcaption class="figcaption">
                                        <p>Kopi Jahe</p>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                        

                    </div>
                    
                </div>
                    
            </section>           
        </div>

        <!-- footer begin -->
        <footer>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 sm-text-center">
                        <h3>Our Location</h3>
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

</body>

</html>

