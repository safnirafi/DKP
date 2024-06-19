<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nama_menu = $_POST['nama_menu'];
$kategori_menu = $_POST['kategori_menu'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi_menu = $_POST['deskripsi_menu'];

$query = mysqli_query($connection, "UPDATE menu SET nama_menu = '$nama_menu', kategori_menu = '$kategori_menu', harga = '$harga', stok = '$stok', deskripsi_menu = '$deskripsi_menu' WHERE id = '$id'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
