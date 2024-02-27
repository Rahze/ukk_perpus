<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form method="post">
          <?php
          if (isset($_POST['submit'])) {
            $id_buku = $_POST['id_buku'];
            $id_user = $_SESSION['user']['id_user'];
            $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
            $status_peminjaman = $_POST['status_peminjaman'];
            $query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku', id_user='$id_user', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman'");

            if ($query) {
              echo '<script>alert("ubah Data Berhasi");</script>';
            } else {
              echo '<script>alert("ubah Data Gagal");</script>';
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2">Buku</div>
            <div class="col-md-8">
              <select name="id_buku" class="from-control">
                <?php
                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Tanggal Peminjaman </div>
            <div class="col-md-8">
              <input type="date" class="form-control" name="tanggal_peminjaman">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Tanggal Pengembalian </div>
            <div class="col-md-8">
              <input type="date" class="form-control" name="tanggal_pengembalian">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Status Peminjaman </div>
            <div class="col-md-8">
              <select name="status_peminjaman" class="form-control">
                <option value="dipinjam">dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-mb-4"></div>
            <div class="col-mb-8">
              <button type="submit" class="btn btn-primary" name="submit" value="submit">simpan</button>
              <button type="reset" class="btn btn-secondary">reset</button>
              <a href="?page=peminjaman" class="btn btn-danger">kembali</a>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>