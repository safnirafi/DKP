<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$sql_pelanggan = "SELECT COUNT(*) FROM user WHERE role = 'orderer'";
$sql_menu = "SELECT COUNT(*) FROM menu";
$sql_reservasi = "SELECT COUNT(*) FROM reservasi";

$result_pelanggan = mysqli_query($connection, $sql_pelanggan);
$result_menu = mysqli_query($connection, $sql_menu);
$result_reservasi = mysqli_query($connection, $sql_reservasi);

$total_pelanggan = mysqli_fetch_array($result_pelanggan)[0];
$total_menu = mysqli_fetch_array($result_menu)[0];
$total_reservasi = mysqli_fetch_array($result_reservasi)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="row">

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pelanggan</h4>
          </div>
          <div class="card-body">
            <?= $total_pelanggan ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Menu</h4>
          </div>
          <div class="card-body">
            <?= $total_menu ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Reservasi</h4>
          </div>
          <div class="card-body">
            <?= $total_reservasi ?>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>

<?php
require_once '../layout/_bottom.php';
?>
