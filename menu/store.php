<?php
session_start();
require_once '../helper/connection.php';

$nama_menu = $_POST['nama_menu'];
$kategori_menu = $_POST['kategori_menu'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi_menu = $_POST['deskripsi_menu'];
$query = mysqli_query($connection, "insert into menu (id, nama_menu, kategori_menu, harga, stok, deskripsi_menu) value (uuid(), '$nama_menu', '$kategori_menu', '$harga', '$stok', '$deskripsi_menu')");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
