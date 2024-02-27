<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form method="post">
          <?php
          $id = $_GET['id'];
          if (isset($_POST['submit'])) {
            $id_buku = $_POST['id_buku'];
            $id_user = $_SESSION['user']['id_user'];
            $ulasan = $_POST['ulasan'];
            $rating = $_POST['rating'];
            $query = mysqli_query($koneksi, "UPDATE ulasan set id_buku='$id_buku', ulasan='$ulasan', rating='$rating'");

            if ($query) {
              echo '<script>alert("Ubah Data Berhasi");</script>';
            } else {
              echo '<script>alert("Ubah Data Gagal");</script>';
            }
          }
          $query = mysqli_query($koneksi, "SELECT*FROM ulasan WHERE id_ulasan=$id");
          $data = mysqli_fetch_array($query);
          ?>
          <div class="row mb-3">
            <div class="col-md-2">Buku</div>
            <div class="col-md-8">
              <select name="id_buku" class="from-control">
                <?php
                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option <?php if ($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Ulasan </div>
            <div class="col-md-8">
              <textarea name="ulasan" rows="5" class="from-control"><?php echo $data['ulasan']; ?></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-5">Rating </div>
            <div class="col-md-8">
              <select name="rating" class="from-control">
                <option <?php if ($data['id_buku'] == 1) echo 'selected'; ?>>1</option>
                <option <?php if ($data['id_buku'] == 2) echo 'selected'; ?>>2</option>
                <option <?php if ($data['id_buku'] == 3) echo 'selected'; ?>>3</option>
                <option <?php if ($data['id_buku'] == 4) echo 'selected'; ?>>4</option>
                <option <?php if ($data['id_buku'] == 5) echo 'selected'; ?>>5</option>
                <option <?php if ($data['id_buku'] == 6) echo 'selected'; ?>>6</option>
                <option <?php if ($data['id_buku'] == 7) echo 'selected'; ?>>7</option>
                <option <?php if ($data['id_buku'] == 8) echo 'selected'; ?>>8</option>
                <option <?php if ($data['id_buku'] == 9) echo 'selected'; ?>>9</option>
                <option <?php if ($data['id_buku'] == 10) echo 'selected'; ?>>10</option>
                <?php
                ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-mb-4"></div>
            <div class="col-mb-8">
              <button type="submit" class="btn btn-primary" name="submit" value="submit">simpan</button>
              <button type="reset" class="btn btn-secondary">reset</button>
              <a href="?page=ulasan" class="btn btn-danger">kembali</a>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>