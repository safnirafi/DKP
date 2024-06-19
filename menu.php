<?php
session_start();

if(isset($_SESSION['loginUser']['nama'])) {
    $nama_pengguna = $_SESSION['loginUser']['nama'];
}

$koneksi = mysqli_connect("localhost", "root", "", "dkp");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

function tampilkanMenu($koneksi, $kategori) {
    $query = "SELECT * FROM menu WHERE kategori_menu = '$kategori'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="menu-item">';
            echo '<div class="c1">' . $row['nama_menu'] . '<span>' . $row['deskripsi_menu'] . '</span></div>';
            echo '<div class="c2">Rp ' . number_format($row['harga'], 0, ',', '.') . '</div>';  
            echo '<div class="c3">' . $row['stok'] . '</div>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada menu dalam kategori ini.";
    }

    mysqli_free_result($result);
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
            <img src="images/background/bg-2.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center wow fadeInUp">
                            <h2 class="s1 mb-40">Temukan</h2>
                            <h2 class="s2">Menu Kita</h2>
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Menu</li>
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
            <section id="section-coffee" aria-label="section-coffee">
                <div class="container">
                    <div class="col-md-12">
                        <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                            <li><a href="#" data-filter="*" class="selected">Semua Menu</a></li>
                            <li><a href="#" data-filter=".coffee">Kopi</a></li>
                            <li><a href="#" data-filter=".non-coffee">Non Kopi</a></li>
                            <li><a href="#" data-filter=".main-dishes">Hidangan Utama</a></li>
                            <li><a href="#" data-filter=".breads">Makanan Ringan</a></li>
                        </ul>
                        <div class="spacer-single"></div>
                    </div>

                    <div id="gallery" class="row masonry">

                        <div class="col-lg-6 col-sm-12 item coffee">
                            <div class="menu-wrap">
                                <div class="menu-item thead">
                                    <div class="c1">Kopi</div>
                                    <div class="c2">Harga</div>
                                    <div class="c3">Stok</div>
                                </div>
                                <?php tampilkanMenu($koneksi, 'Kopi'); ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 item non-coffee">
                            <div class="menu-wrap">
                                <div class="menu-item thead">
                                    <div class="c1">Non Kopi</div>
                                    <div class="c2">Harga</div>
                                    <div class="c3">Stok</div>
                                </div>
                                <?php tampilkanMenu($koneksi, 'Non Kopi'); ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 item breads">
                            <div class="menu-wrap">
                                <div class="menu-item thead">
                                    <div class="c1">Makanan Ringan</div>
                                    <div class="c2">Harga</div>
                                    <div class="c3">Stok</div>
                                </div>

                            <div class="spacer-half"></div>
                                <?php tampilkanMenu($koneksi, 'Makanan Ringan'); ?>

                                <div class="spacer-half"></div>                                

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 item main-dishes">
                            <div class="menu-wrap">
                                <div class="menu-item thead">
                                    <div class="c1">Hidangan Utama</div>
                                    <div class="c2">Harga</div>
                                    <div class="c3">Stok</div>
                                </div>
                                <div class="spacer-half"></div>
                                <?php tampilkanMenu($koneksi, 'Hidangan Utama'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

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