<?php
require_once '../helper/connection.php';
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_email_query = "SELECT * FROM user WHERE email='$email'";
    $check_email_result = mysqli_query($connection, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $error_message = "Email sudah terdaftar. Silakan gunakan email lain.";
    } else {
        $sql = "INSERT INTO user (id, role, email, password, nama, no_hp, alamat) VALUES (uuid(), 'orderer', '$email', '$hashed_password', '$nama', '$no_hp', '$alamat')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            $_SESSION['success_message'] = "Pendaftaran berhasil. Silakan login.";
            header('Location: ../auth/login.php');
            exit;
        } else {
            $error_message = "Terjadi kesalahan saat melakukan pendaftaran. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Signup &mdash; Dapur Kopi Pasundan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Signup Admin</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Mohon isi Email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Mohon isi kata sandi
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input id="nama" type="text" class="form-control" name="nama" tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Mohon isi nama
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input id="no_hp" type="text" class="form-control" name="no_hp" tabindex="4" required>
                                        <div class="invalid-feedback">
                                            Mohon isi nomor HP
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea id="alamat" class="form-control" name="alamat" tabindex="5" required></textarea>
                                        <div class="invalid-feedback">
                                            Mohon isi alamat
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="6">
                                            Signup
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Last Team 2024
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn
