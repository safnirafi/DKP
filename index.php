<?php
session_start();


if (isset($_SESSION['loginUser']['nama'])) {
    $nama_pengguna = $_SESSION['loginUser']['nama'];
}

$koneksi = mysqli_connect("localhost", "root", "", "dkp");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

function tampilkanMenu($koneksi, $kategori)
{
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

    <!-- Slider Revolution Stylesheet -->
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/rev-settings.css">

</head>

<body class="de_light">

    <div id="wrapper">

        <!-- header begin -->
        <header class="header_center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="index.php">
                                <img class="logo logo_dark_bg" src="images/logo.png" alt="">
                                <img class="logo logo_light_bg" src="images/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo close -->

                        <!-- small button begin -->
                        <span id="menu-btn"></span>
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
                                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                            <div class="d-sm-none d-lg-inline-block">Hi,
                                                <?= $_SESSION['loginUser']['nama'] ?></div>
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

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            <!-- parallax section -->
            <section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
                <div id="revolution-slider">
                    <ul>
                        <li data-transition="fade" data-slotamount="10" data-masterspeed="default" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img src="images/slider/slide-1.jpg" alt="" data-bgposition="center center"
                                data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">

                            <div class="tp-caption big-s1" data-x="center" data-y="220" data-width="none"
                                data-height="none" data-whitespace="nowrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:200;e:Power2.easeInOut;" data-start="500"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                <span class="id-color-2">Perpaduan</span>
                            </div>

                            <div class="tp-caption very-big-white" data-x="center" data-y="260" data-width="none"
                                data-height="none" data-whitespace="nowrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:400;e:Power2.easeInOut;" data-start="600"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                Sempurna
                            </div>

                            <div class="tp-caption text-center" data-x="center" data-y="340" data-width="450"
                                data-height="none" data-whitespace="wrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:600;e:Power2.easeInOut;" data-start="700">
                                Dipersembahkan dengan keahlian dan kecermatan yang luar biasa, campuran ini mencerminkan
                                keunggulan tertinggi dalam dunia kopi, di mana karya seni berpadu dengan keahlian untuk
                                menghasilkan harmoni rasa yang memanjakan indera.
                            </div>

                            <div class="tp-caption" data-x="center" data-y="450" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:800;e:Power2.easeInOut;" data-start="800">
                                <a href="menu.php" class="btn-slider">Lihat Menu</a>
                            </div>
                        </li>

                        <li data-transition="fade" data-slotamount="10" data-masterspeed="default" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img src="images/slider/slide-2.jpg" alt="" data-bgposition="center center"
                                data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10">

                            <div class="tp-caption big-s1" data-x="center" data-y="220" data-width="none"
                                data-height="none" data-whitespace="nowrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:200;e:Power2.easeInOut;" data-start="500"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                <span class="id-color-2">Sensasi</span>
                            </div>

                            <div class="tp-caption very-big-white" data-x="center" data-y="260" data-width="none"
                                data-height="none" data-whitespace="nowrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:400;e:Power2.easeInOut;" data-start="600"
                                data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                Aroma Harum
                            </div>

                            <div class="tp-caption text-center" data-x="center" data-y="340" data-width="450"
                                data-height="none" data-whitespace="wrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:600;e:Power2.easeInOut;" data-start="700">
                                Bersiaplah untuk terpesona oleh daya tarik menggoda dari rasa aromatik kopi kami, sebuah
                                simfoni sensorik yang dimulai saat Anda mengangkat cangkir ke bibir Anda.
                            </div>

                            <div class="tp-caption" data-x="center" data-y="450" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                                data-transform_out="opacity:0;y:-100;s:800;e:Power2.easeInOut;" data-start="800">
                                <a href="menu.php" class="btn-slider">Lihat Menu</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- parallax section close -->

            <!-- section begin -->
            <section>
                <div class="container">
                    <div class="row aligns-item-center">
                        <div class="col-lg-6">
                            <div class="text-center">
                                <h2 class="s1 id-color-2 mb-40 wow fadeInUp">Temukan</h2>
                                <h2 class="s2 wow fadeInUp">Cerita Kita</h2>
                                <div class="spacer-single"></div>
                            </div>
                            <p class="lead">Di jantung kota metropolitan yang ramai, di mana ritme kehidupan berdenyut
                                tanpa henti, terdapat sebuah tempat perlindungan yang tersembunyi di tengah
                                kekacauan—tempat di mana waktu melambat, dan kekhawatiran memudar menjadi aroma biji
                                kopi yang baru digiling.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="images/background/bg-1.jpg" alt="" class="rounded-20 img-fluid">
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section data-bgcolor="rgba(var(--secondary-color-rgb),.1)">
                <div class="container">
                    <div class="row bb gx-5 gy-4 text-center">

                        <div class="col-lg-4 wow fadeInRight">
                            <img src="images/misc/icon-1.png" alt="">
                            <div class="spacer-single"></div>
                            <h3>Minuman</h3>
                            <p>Mewah, memikat, dan sungguh menggoda, rasa aromatik kopi adalah perjalanan indera yang
                                dimulai dengan sentuhan aroma pertama. Berikut beberapa menu minuman yang dapat Anda rasakan di Dapur Kopi Pasundan.</p>
                            <a href="menu.php" class="btn-custom">Baca selengkapnya</a>
                        </div>

                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".1s">
                            <img src="images/misc/icon-2.png" alt="">
                            <div class="spacer-single"></div>
                            <h3>Makanan</h3>
                            <p>Dari aroma pertama yang menggoda hingga rasa terakhir yang tersisa, hidangan kami
                                merupakan perayaan keanekaragaman masakan dan kreativitas kuliner yang berani. Berikut beberapa menu makanan yang dapat Anda rasakan di Dapur Kopi Pasundan.</p>
                            <a href="menu.php" class="btn-custom">Baca selengkapnya</a>
                        </div>

                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".2s">
                            <img src="images/misc/icon-3.png" alt="">
                            <div class="spacer-single"></div>
                            <h3>Snack</h3>
                            <p>Mengubah kafe kami yang nyaman menjadi tempat teman berkumpul, tawa mengalir, dan
                                kenangan tercipta, sambil menikmati aneka snack ringan yang menggugah selera. Berikut beberapa menu snack yang dapat Anda rasakan di Dapur Kopi Pasundan.</p>
                            <a href="menu.php" class="btn-custom">Baca selengkapnya</a>
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
                                <h2 class="s1 id-color-2 mb-40 wow fadeInUp">Favorit</h2>
                                <h2 class="s2 wow fadeInUp">Minuman</h2>
                                <div class="spacer-double"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section class="jarallax" aria-label="section">
                <img src="images/background/bg-3.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row wow fadeInLeft">
                        <div class="col-lg-6">
                            <div class="menu-item thead">
                                <div class="c1">Minuman</div>
                                <div class="c2">Harga</div>
                                <div class="c3">Stok</div>
                            </div>
                            <h3>Kategori Kopi</h3>
                            <?php tampilkanMenu($koneksi, 'Kopi'); ?>
                            <h3>Kategori Non Kopi</h3>
                            <?php tampilkanMenu($koneksi, 'Non Kopi'); ?>
                            <div class="spacer-single"></div>
                            <a href="menu.php" class="btn-custom">Lihat Semua Menu</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section id="section-title-2" class="text-light jarallax">
                <img src="images/background/bg-4.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row wow fadeInRight">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2 class="s1 id-color-2 mb-40 wow fadeInUp">Favorite</h2>
                                <h2 class="s2 wow fadeInUp">Makanan</h2>
                                <div class="spacer-double"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section class="jarallax" aria-label="section">
                <img src="images/background/bg-5.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row wow fadeInRight">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="menu-item thead">
                                <div class="c1">Makanan</div>
                                <div class="c2">Harga</div>
                                <div class="c3">Stok</div>
                            </div>

                            <div class="spacer-half"></div>

                            <h3>Hidangan Utama</h3>
                            <?php tampilkanMenu($koneksi, 'Hidangan Utama'); ?>
                            <h3>Makanan Ringan</h3>
                            <?php tampilkanMenu($koneksi, 'Makanan Ringan'); ?>

                            <div class="spacer-single"></div>

                            <a href="menu.php" class="btn-custom">Lihat Semua Menu</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section id="section-gallery" aria-label="section-gallery" class="no-top">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="gallery" class="gallery zoom-gallery gallery-6-cols wow fadeInUp"
                                data-wow-delay=".3s">

                                <!-- gallery item -->
                                <div class="item">
                                    <figure class="position-relative">
                                        <a href="images/menu/view/pf%20(1).jpg" title="Kroisan Cokelat">
                                            <span class="d-hover">
                                                <span class="d-text">
                                                    <span class="d-cap">View</span>
                                                </span>
                                            </span>
                                            <img src="images/menu/pf%20(1).jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                                <!-- close gallery item -->

                                <!-- gallery item -->
                                <div class="item">
                                    <figure class="position-relative">
                                        <a href="images/menu/view/pf%20(2).jpg" title="Kroisan Keju">
                                            <span class="d-hover">
                                                <span class="d-text">
                                                    <span class="d-cap">View</span>
                                                </span>
                                            </span>
                                            <img src="images/menu/pf%20(2).jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                                <!-- close gallery item -->

                                <!-- gallery item -->
                                <div class="item">
                                    <figure class="position-relative">
                                        <a href="images/menu/view/pf%20(3).jpg" title="Donat Cokelat">
                                            <span class="d-hover">
                                                <span class="d-text">
                                                    <span class="d-cap">View</span>
                                                </span>
                                            </span>
                                            <img src="images/menu/pf%20(3).jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                                <!-- close gallery item -->

                                <!-- gallery item -->
                                <div class="item">
                                    <figure class="position-relative">
                                        <a href="images/menu/view/pf%20(4).jpg" title="Roti Gandum">
                                            <span class="d-hover">
                                                <span class="d-text">
                                                    <span class="d-cap">View</span>
                                                </span>
                                            </span>
                                            <img src="images/menu/pf%20(4).jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                                <!-- close gallery item -->

                                <!-- gallery item -->
                                <div class="item">
                                    <figure class="position-relative">
                                        <a href="images/menu/view/pf%20(5).jpg" title="Kukis">
                                            <span class="d-hover">
                                                <span class="d-text">
                                                    <span class="d-cap">View</span>
                                                </span>
                                            </span>
                                            <img src="images/menu/pf%20(5).jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                                <!-- close gallery item -->

                                <!-- gallery item -->
                                <div class="item">
                                    <figure class="position-relative">
                                        <a href="images/menu/view/pf%20(6).jpg" title="Pastry Cokelat">
                                            <span class="d-hover">
                                                <span class="d-text">
                                                    <span class="d-cap">View</span>
                                                </span>
                                            </span>
                                            <img src="images/menu/pf%20(6).jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                                <!-- close gallery item -->

                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- section close -->


            <section class="side-bg no-top no-bottom text-light bg-color" aria-label="section">
                <div class="col-lg-6 pull-right image-container jarallax">
                    <img src="images/background/bg-side-1.png" class="jarallax-img" alt="">
                </div>

                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="col-lg-6 offset-lg-6 wow fadeInRight">
                            <div class="padding80">
                                <div class="text-center">
                                    <h2 class="s1 id-color-2 mb-40 wow fadeInUp">Ulasan</h2>
                                    <h2 class="s2 wow fadeInUp">Pelanggan</h2>
                                    <div class="spacer-single"></div>
                                </div>
                                <blockquote>
                                    Sebagai seorang mahasiswa yang sibuk, saya bergantung pada kopi pagi untuk memulai
                                    hari saya. Rasanya yang kaya, lembut, dan aroma yang memikat selalu memberi saya
                                    semangat dan membantu saya siap menghadapi semua tantangan hari ini. Seperti
                                    menemukan potongan kecil kebahagiaan di dalam cangkir!
                                    <span>Samuel Evan</span>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- section begin -->
            <section id="cta" aria-label="cta" class="call-to-action">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-9 text-lg-start text-sm-center">
                            <h3><i class="id-color fa fa-phone mr10"></i>Hubungi kami sekarang dan dapatkan penawaran
                                spesial!</h3>
                        </div>

                        <div class="col-lg-3 text-lg-end text-sm-center">
                            <a href="contact.php" class="btn-line-black">Hubungi Kami Sekarang</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section id="section-title-1" class="text-light jarallax">
                <img src="images/background/bg-6.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2 class="s1 id-color-2 mb-40 wow fadeInUp">Waktu</h2>
                                <h2 class="s2 wow fadeInUp">Buka</h2>
                                <div class="spacer-double"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <span class="id-color-2 bold">Senin - Kamis</span>
                                <div class="fs20">10:30AM - 12:00 WIB</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <span class="id-color-2 bold">Jumat</span>
                                <div class="fs20">Tutup</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <span class="id-color-2 bold">Sabtu - Minggu</span>
                                <div class="fs20">Buka 24 Jam</div>
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

    <!-- RS5.0 Core JS Files -->
    <script src="revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>

    <!-- RS5.0 Extensions Files -->
    <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>

    <script>
        jQuery(document).ready(function () {
            // revolution slider
            jQuery("#revolution-slider").revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                delay: 3500,
                navigation: {
                    arrows: { enable: true }
                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                },
                spinner: "off",
                gridwidth: 1140,
                gridheight: 600,
                disableProgressBar: "on"
            });
        });
    </script>

</body>

</html>