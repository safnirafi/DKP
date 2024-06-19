<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM menu WHERE id='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Menu</h1>
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
                  <td>Nama Menu</td>
                  <td><input class="form-control" required name="nama_menu" value="<?= $row['nama_menu'] ?>"></td>
                </tr>
                <tr>
                  <td>Kategori Menu</td>
                  <td><input class="form-control" type="text" name="kategori_menu" required value="<?= $row['kategori_menu'] ?>"></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td><input class="form-control" type="number" name="harga" required value="<?= $row['harga'] ?>"></td>
                </tr>
                <tr>
                  <td>Stok</td>
                  <td><input class="form-control" type="number" name="stok" required value="<?= $row['stok'] ?>"></td>
                </tr>
                <tr>
                  <td>Deskripsi Menu</td>
                  <td><input class="form-control" type="text" name="deskripsi_menu" required value="<?= $row['deskripsi_menu'] ?>"></td>
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