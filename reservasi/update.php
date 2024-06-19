<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$status_booking = $_POST['status_booking'];

$query = mysqli_query($connection, "UPDATE reservasi SET status_booking = '$status_booking' WHERE id = '$id'");
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
