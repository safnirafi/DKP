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
            <img src="images/background/bg-7.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center wow fadeInUp">
                            <h2 class="s1 mb-40">Temukan</h2>
                            <h2 class="s2">Cerita Kita</h2>
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Tentang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <!-- section begin -->
            <section>
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6">
                            <h2>Bagaimana ini dimulai?</h2>
                            <div class="spacer-half"></div>
                            <p class="lead">Di "Dapur Kopi Pasundan," kami percaya pada kekuatan kopi yang nikmat dan keramahtamahan yang hangat. Perjalanan kami dimulai dengan visi sederhana: menciptakan ruang ramah di mana teman, keluarga, dan orang asing dapat berkumpul untuk menikmati minuman lezat, camilan buatan sendiri, dan hubungan yang bermakna.</p>
                            <p>Terletak di jantung komunitas kami, "Dapur Kopi Pasundan" lebih dari sekedar kafe; ini adalah tempat berkumpul, perlindungan dari kekacauan kehidupan sehari-hari, dan mercusuar positif dan kehangatan. Dari saat Anda berjalan melewati pintu kami, Anda akan disambut dengan aroma kopi yang baru diseduh dan senyum ramah dari tim kami yang berdedikasi. Menu kami adalah cerminan komitmen kami terhadap kualitas dan kreativitas. Kami mengambil biji kopi terbaik dari seluruh dunia dan dengan hati-hati membuat setiap cangkir dengan presisi dan hati-hati. Baik Anda mendambakan espresso klasik, latte krim, atau es teh yang menyegarkan, kami punya sesuatu yang dapat memuaskan setiap selera.</p>
                            <p>Sebagai anggota komunitas yang bangga, kami berkomitmen untuk berkontribusi dan memberikan dampak positif di mana pun kami bisa. Mulai dari mendukung pengrajin dan petani lokal hingga mengadakan acara yang merayakan keberagaman dan inklusi, kami percaya bahwa platform kami dapat digunakan untuk menyebarkan kegembiraan dan niat baik di lingkungan sekitar dan sekitarnya.</p>                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-6">
                                    <img src="images/misc/1.jpg" class="img-fluid rounded-20 wow zoomIn" alt="">
                                    <div class="de_count wow fadeInUp">
                                        <h3><span class="timer" data-to="750" data-speed="3000"></span>+</h3>
                                        <h4>Respon Positif</h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="de_count wow fadeInUp">
                                        <h3><span class="timer" data-to="50" data-speed="3000"></span>%</h3>
                                        <h4>Tingkatan Penghasilan</h4>
                                    </div>
                                    <div class="spacer-10"></div>
                                    <img src="images/misc/2.jpg" class="img-fluid rounded-20 wow zoomIn" alt="">
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-title-1" class="text-light jarallax">
                <img src="images/background/bg-2.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2 class="s1 id-color-2 mb-40 wow fadeInUp">Temui Kami</h2>
                                <h2 class="s2 wow fadeInUp">Chef</h2>
                                <div class="spacer-double"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section>
                <div class="container">
                    <div class="row justify-content-center"> <!-- Mengubah align-items-center menjadi justify-content-center -->
                        <div class="col-lg-3 col-md-6 text-center mb-sm-20">
                            <div class="rounded-30 position-relative overflow-hidden mb20">
                                <img src="images/team/11.PNG" class="img-fluid position-relative z-index-1000" alt="">
                                <div class="position-absolute start-0 bottom-0 bg-color-2 w-100 h-75 rounded-30"></div>
                            </div>
                            <h4 class="mb-0">Mami</h4>
                            <div>Chef</div>
                            <div class="social-icons s2 mt-2">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-discord"></i></a>
                            </div>
                        </div>
            
                        <div class="col-lg-3 col-md-6 text-center mb-sm-20">
                            <div class="rounded-30 position-relative overflow-hidden mb20">
                                <img src="images/team/12.PNG" class="img-fluid position-relative z-index-1000" alt="">
                                <div class="position-absolute start-0 bottom-0 bg-color-2 w-100 h-75 rounded-30"></div>
                            </div>
                            <h4 class="mb-0">Reva Pranata</h4>
                            <div>Chef</div>
                            <div class="social-icons s2 mt-2">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
            
                        <div class="col-lg-3 col-md-6 text-center mb-sm-20">
                            <div class="rounded-30 position-relative overflow-hidden mb20">
                                <img src="images/team/13.PNG" class="img-fluid position-relative z-index-1000" alt="">
                                <div class="position-absolute start-0 bottom-0 bg-color-2 w-100 h-75 rounded-30"></div>
                            </div>
                            <h4 class="mb-0">Papi</h4>
                            <div>Chef</div>
                            <div class="social-icons s2 mt-2">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
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

</body>

</html>