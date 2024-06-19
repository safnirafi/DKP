<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Menu</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Nama Menu</td>
                <td><input class="form-control" type="text" name="nama_menu"></td>
              </tr>
              <tr>
                <td>Kategori Menu</td>
                <td>
                  <select class="form-control" name="kategori_menu">
                    <option value="Kopi">Kopi</option>
                    <option value="Non Kopi">Non Kopi</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                    <option value="Hidangan Utama">Hidangan Utama</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="number" name="harga"></td>
              </tr>
              <tr>
                <td>Stok</td>
                <td><input class="form-control" type="number" name="stok"></td>
              </tr>
              <tr>
                <td>Varian</td>
                <td><input class="form-control" type="text" name="deskripsi_menu"></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Hapus">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
