<?php
session_start();

if (isset($_SESSION['loginUser']['nama'])) {
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

    <!-- Map leaflet -->
    <link rel="stylesheet" href="map/css/leaflet.css">
    <link rel="stylesheet" href="map/css/L.Control.Layers.Tree.css"> 
    <link rel="stylesheet" href="map/css/qgis2web.css">
    <link rel="stylesheet" href="map/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="map/css/leaflet-search.css">
    <style>
        #map {
            width: 70%;
            height: 70%;
            padding: 0;
            margin: 0;
        }
    </style>

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

        <!-- subheader -->
        <section id="subheader" class="jarallax text-light">
            <img src="images/background/bg-9.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center wow fadeInUp">
                            <h2 class="s1 mb-40">Hubungi</h2>
                            <h2 class="s2">Kami</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <section>
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-4 sm-text-center">
                            <h3>Lokasi Kami</h3>
                            Malabar Ujung, Bogor Kota, Indonesia<br>
                            T. (62) 856-9732-8712<br>
                            E. dkp@gmail.com<br>
                        </div>

                        <div class="col-lg-8">
                            <form name="contactForm" id="contact_form" class="position-relative z1000" method="post"
                                action="#">
                                <div class="row gx-4">
                                    <div class="col-lg-6 col-md-6 mb10">
                                        <div class="field-set">
                                            <input type="text" name="Name" id="name" class="form-control"
                                                placeholder="Nama Anda" required>
                                        </div>

                                        <div class="field-set">
                                            <input type="text" name="Email" id="email" class="form-control"
                                                placeholder="Email Anda" required>
                                        </div>

                                        <div class="field-set">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Nomor Anda" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="field-set mb20">
                                            <textarea name="message" id="message" class="form-control"
                                                placeholder="Pesan Anda" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id='submit' class="mt20">
                                    <input type='submit' id='send_message' value='Send Message' class="btn-custom">
                                </div>

                                <div id="success_message" class='success'>
                                    Pesan Anda telah berhasil tersambung ke WhatsApp. Refresh halaman ini jika Anda ingin mengirim
                                    lebih banyak pesan.
                                </div>
                                <div id="error_message" class='error'>
                                    Maaf ada kesalahan saat mengirimkan formulir Anda.
                                </div>

                                <!-- Custom JavaScript for handling WhatsApp message -->
                                <script>
        document.getElementById('send_message').addEventListener('click', function(event) {
            event.preventDefault();  // Mencegah form submit default

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var message = document.getElementById('message').value;
            var whatsappNumber = '6285697328712';  // Ganti dengan nomor WhatsApp tujuan

            if (name && email && phone && message) {
                var whatsappUrl = `https://wa.me/${whatsappNumber}?text=` +
                                  `Nama: ${encodeURIComponent(name)}%0A` +
                                  `Email: ${encodeURIComponent(email)}%0A` +
                                  `Nomor: ${encodeURIComponent(phone)}%0A` +
                                  `Pesan: ${encodeURIComponent(message)}`;
                
                // Membuka URL WhatsApp
                window.open(whatsappUrl, '_blank');

                // Menampilkan pesan sukses setelah beberapa detik
                setTimeout(function() {
                    document.getElementById('success_message').style.display = 'block';
                    document.getElementById('error_message').style.display = 'none';
                }, 5000);  // Menunggu 5 detik sebelum menampilkan pesan sukses

            } else {
                document.getElementById('error_message').style.display = 'block';
                document.getElementById('success_message').style.display = 'none';
            }
        });
    </script>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div id="map">
                </div>
                <script src="map/js/qgis2web_expressions.js"></script>
                <script src="map/js/leaflet.js"></script>
                <script src="map/js/L.Control.Layers.Tree.min.js"></script>
                <script src="map/js/leaflet.rotatedMarker.js"></script>
                <script src="map/js/leaflet.pattern.js"></script>
                <script src="map/js/leaflet-hash.js"></script> 
                <script src="map/js/Autolinker.min.js"></script>
                <script src="map/js/rbush.min.js"></script>
                <script src="map/js/labelgun.min.js"></script>
                <script src="map/js/labels.js"></script>
                <script src="map/js/leaflet-search.js"></script>
                <script src="map/data/ADMINISTRASIDESA_AR_25K_1.js"></script>
                <script src="map/data/Kafe_2.js"></script>
                <script>
                    var map = L.map('map', {
                        zoomControl: true, maxZoom: 19, minZoom: 12
                    }).fitBounds([[-6.59962712057183, 106.80704960999505], [-6.59860900941792, 106.80843890750715]]);
                    var hash = new L.Hash(map);
                    map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
                    var autolinker = new Autolinker({ truncate: { length: 30, location: 'smart' } });
                    function removeEmptyRowsFromPopupContent(content, feature) {
                        var tempDiv = document.createElement('div');
                        tempDiv.innerHTML = content;
                        var rows = tempDiv.querySelectorAll('tr');
                        for (var i = 0; i < rows.length; i++) {
                            var td = rows[i].querySelector('td.visible-with-data');
                            var key = td ? td.id : '';
                            if (td && td.classList.contains('visible-with-data') && feature.properties[key] == null) {
                                rows[i].parentNode.removeChild(rows[i]);
                            }
                        }
                        return tempDiv.innerHTML;
                    }
                    document.querySelector(".leaflet-popup-pane").addEventListener("load", function (event) {
                        var tagName = event.target.tagName,
                            popup = map._popup;
                        // Also check if flag is already set.
                        if (tagName === "IMG" && popup && !popup._updated) {
                            popup._updated = true; // Set flag to prevent looping.
                            popup.update();
                        }
                    }, true);
                    var bounds_group = new L.featureGroup([]);
                    function setBounds() {
                    }
                    map.createPane('pane_OpenStreetMap_0');
                    map.getPane('pane_OpenStreetMap_0').style.zIndex = 400;
                    var layer_OpenStreetMap_0 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        pane: 'pane_OpenStreetMap_0',
                        opacity: 1.0,
                        attribution: '',
                        minZoom: 12,
                        maxZoom: 19,
                        minNativeZoom: 0,
                        maxNativeZoom: 19
                    });
                    layer_OpenStreetMap_0;
                    map.addLayer(layer_OpenStreetMap_0);
                    function pop_ADMINISTRASIDESA_AR_25K_1(feature, layer) {
                        var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['NAMOBJ'] !== null ? autolinker.link(feature.properties['NAMOBJ'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
                        layer.bindPopup(popupContent, { maxHeight: 400 });
                        var popup = layer.getPopup();
                        var content = popup.getContent();
                        var updatedContent = removeEmptyRowsFromPopupContent(content, feature);
                        popup.setContent(updatedContent);
                    }

                    function style_ADMINISTRASIDESA_AR_25K_1_0() {
                        return {
                            pane: 'pane_ADMINISTRASIDESA_AR_25K_1',
                            opacity: 1,
                            color: 'rgba(35,35,35,0.15)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 6.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(8,0,255,0.15)',
                            interactive: false,
                        }
                    }
                    map.createPane('pane_ADMINISTRASIDESA_AR_25K_1');
                    map.getPane('pane_ADMINISTRASIDESA_AR_25K_1').style.zIndex = 401;
                    map.getPane('pane_ADMINISTRASIDESA_AR_25K_1').style['mix-blend-mode'] = 'normal';
                    var layer_ADMINISTRASIDESA_AR_25K_1 = new L.geoJson(json_ADMINISTRASIDESA_AR_25K_1, {
                        attribution: '',
                        interactive: false,
                        dataVar: 'json_ADMINISTRASIDESA_AR_25K_1',
                        layerName: 'layer_ADMINISTRASIDESA_AR_25K_1',
                        pane: 'pane_ADMINISTRASIDESA_AR_25K_1',
                        onEachFeature: pop_ADMINISTRASIDESA_AR_25K_1,
                        style: style_ADMINISTRASIDESA_AR_25K_1_0,
                    });
                    bounds_group.addLayer(layer_ADMINISTRASIDESA_AR_25K_1);
                    map.addLayer(layer_ADMINISTRASIDESA_AR_25K_1);
                    function pop_Kafe_2(feature, layer) {
                        var popupContent = '<table>\
                    <tr>\
                        <th scope="row">nama</th>\
                        <td class="visible-with-data" id="nama">' + (feature.properties['nama'] !== null ? autolinker.link(feature.properties['nama'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">alamat</th>\
                        <td class="visible-with-data" id="alamat">' + (feature.properties['alamat'] !== null ? autolinker.link(feature.properties['alamat'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">jam</th>\
                        <td class="visible-with-data" id="jam">' + (feature.properties['jam'] !== null ? autolinker.link(feature.properties['jam'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
                        layer.bindPopup(popupContent, { maxHeight: 400 });
                        var popup = layer.getPopup();
                        var content = popup.getContent();
                        var updatedContent = removeEmptyRowsFromPopupContent(content, feature);
                        popup.setContent(updatedContent);
                    }

                    function style_Kafe_2_0() {
                        return {
                            pane: 'pane_Kafe_2',
                            rotationAngle: 0.0,
                            rotationOrigin: 'center center',
                            icon: L.icon({
                                iconUrl: 'map/markers/Kafe_2.svg',
                                iconSize: [41.8, 41.8]
                            }),
                            interactive: true,
                        }
                    }
                    map.createPane('pane_Kafe_2');
                    map.getPane('pane_Kafe_2').style.zIndex = 402;
                    map.getPane('pane_Kafe_2').style['mix-blend-mode'] = 'normal';
                    var layer_Kafe_2 = new L.geoJson(json_Kafe_2, {
                        attribution: '',
                        interactive: true,
                        dataVar: 'json_Kafe_2',
                        layerName: 'layer_Kafe_2',
                        pane: 'pane_Kafe_2',
                        onEachFeature: pop_Kafe_2,
                        pointToLayer: function (feature, latlng) {
                            var context = {
                                feature: feature,
                                variables: {}
                            };
                            return L.marker(latlng, style_Kafe_2_0(feature));
                        },
                    });
                    bounds_group.addLayer(layer_Kafe_2);
                    map.addLayer(layer_Kafe_2);
                    map.on("zoomend", function (e) {
                        if (map.getZoom() <= 19 && map.getZoom() >= 12) {
                            map.addLayer(layer_Kafe_2);
                        } else if (map.getZoom() > 19 || map.getZoom() < 12) {
                            map.removeLayer(layer_Kafe_2);
                        }
                    });
                    if (map.getZoom() <= 19 && map.getZoom() >= 12) {
                        map.addLayer(layer_Kafe_2);
                    } else if (map.getZoom() > 19 || map.getZoom() < 12) {
                        map.removeLayer(layer_Kafe_2);
                    }
                    setBounds();
                    var i = 0;
                    layer_Kafe_2.eachLayer(function (layer) {
                        var context = {
                            feature: layer.feature,
                            variables: {}
                        };
                        layer.bindTooltip((layer.feature.properties['nama'] !== null ? String('<div style="color: #323232; font-size: 9pt; font-weight: bold; font-family: \'Open Sans\', sans-serif;">' + layer.feature.properties['nama']) + '</div>' : ''), { permanent: true, offset: [-0, -16], className: 'css_Kafe_2' });
                        labels.push(layer);
                        totalMarkers += 1;
                        layer.added = true;
                        addLabel(layer, i);
                        i++;
                    });
                    map.addControl(new L.Control.Search({
                        layer: layer_Kafe_2,
                        initial: false,
                        hideMarkerOnCollapse: true,
                        propertyName: 'nama'
                    }));
                    document.getElementsByClassName('search-button')[0].className +=
                        ' fa fa-binoculars';
                    resetLabels([layer_Kafe_2]);
                    map.on("zoomend", function () {
                        resetLabels([layer_Kafe_2]);
                    });
                    map.on("layeradd", function () {
                        resetLabels([layer_Kafe_2]);
                    });
                    map.on("layerremove", function () {
                        resetLabels([layer_Kafe_2]);
                    });
                </script>
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

</body>

</html>