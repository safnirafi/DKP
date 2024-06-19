<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// Lakukan JOIN antara tabel reservasi dan users untuk mendapatkan informasi pengguna
$result = mysqli_query($connection, "SELECT reservasi.*, user.nama, user.email, user.alamat 
                                    FROM reservasi 
                                    INNER JOIN user ON reservasi.id_user = user.id");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Reservasi</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Bukti Pembayaran</th>
                  <th>Pesan</th>
                  <th>Status Reservasi</th>
                  <th style="width: 500">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                    $status_booking = ($data['status_booking'] == 0) ? 'Belum Terbooking' : 'Booked';
                    $badge_color = ($data['status_booking'] == 0) ? 'btn-danger' : 'btn-success';
                ?>
                <tr class="text-center">
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['waktu'] ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary btn-modal-bukti" data-image-path="../uploads/<?= $data['bukti_pembayaran'] ?>">Lihat</button>
                    </td>
                    </td>
                    <td><?= $data['pesan'] ?></td>
                    <td><span class="badge <?= $badge_color ?>"><?= $status_booking ?></span></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id=<?= $data['id'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id=<?= $data['id'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                </tr>
                <?php
                $no++;
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>
<script>
  $(document).ready(function() {
    // Fungsi untuk menampilkan gambar bukti pembayaran di halaman terpisah
    $('.btn-modal-bukti').click(function() {
        var imagePath = $(this).data('image-path');
        // Buka halaman baru untuk menampilkan bukti pembayaran
        window.open('view_payment.php?imagePath=' + encodeURIComponent(imagePath), '_blank');
    });
});
</script>