<?php
session_start();
require_once './helper/connection.php';

$id_user = $_SESSION['loginUser']['id'];

// Ambil data dari formulir
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$jumlah_pengunjung = $_POST['banyak_pengunjung'];
$bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
$catatan = $_POST['pesan'];

// Upload file bukti pembayaran
$target_dir = "uploads/"; // Direktori tempat menyimpan file
$target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);

if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
    echo "File " . basename($_FILES["bukti_pembayaran"]["name"]) . " berhasil diunggah.";
} else {
    echo "Maaf, terjadi kesalahan saat mengunggah file.";
}

// Simpan data ke database
$sql = "INSERT INTO reservasi (id, tanggal, waktu, banyak_pengunjung, pesan, status_booking, bukti_pembayaran, id_user) VALUES (uuid(), '$tanggal', '$waktu', '$jumlah_pengunjung', '$catatan', false, '$bukti_pembayaran', '$id_user')";

if ($connection->query($sql) === TRUE) {
    header("Location: booking.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>
