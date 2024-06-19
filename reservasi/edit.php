<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = mysqli_real_escape_string($connection, $_GET['id']);
$query = mysqli_query($connection, "SELECT reservasi.*, user.nama, user.email, user.alamat 
                                    FROM reservasi 
                                    INNER JOIN user ON reservasi.id_user = user.id
                                    WHERE reservasi.id = '$id'");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Mahasiswa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" required value="<?= $row['nama'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input class="form-control" required value="<?= $row['email'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><input class="form-control" required value="<?= $row['alamat'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td><input class="form-control" required value="<?= $row['tanggal'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Waktu</td>
                  <td><input class="form-control" required value="<?= $row['waktu'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Jumlah Pengunjung</td>
                  <td><input class="form-control" required value="<?= $row['banyak_pengunjung'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Bukti Pembayaran</td>
                  <td><img src="../uploads/<?= $row['bukti_pembayaran'] ?>" alt="Bukti Pembayaran" style="max-width: 500px;"></td>
                </tr>
                <tr>
                  <td>Pesan</td>
                  <td><input class="form-control" required value="<?= $row['pesan'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Status Reservasi</td>
                  <td>
                  <select class="form-control" name="status_booking" id="status_booking" required>
                      <option value="1" <?php if ($row['status_booking'] == "1") { echo "selected"; } ?>>Booked</option>
                      <option value="0" <?php if ($row['status_booking'] == "0") { echo "selected"; } ?>>Belum Terbooking</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>