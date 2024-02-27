<?php
// Data koleksi pribadi (contoh data)
// $personal_collection = [
//     [
//         'kategori' => 'Fiksi',
//         'judul' => 'Matahari',
//         'penulis' => 'Tere Liye',
//         'penerbit' => 'Gramedia Pustaka Utama',
//         'tahun_terbit' => 2010,
//         'deskripsi' => 'Novel tentang perjalanan hidup seorang pemuda bernama Bari'
//     ],
//     [
//         'kategori' => 'Non-fiksi',
//         'judul' => 'Atomic Habits',
//         'penulis' => 'James Clear',
//         'penerbit' => 'Penguin Random House',
//         'tahun_terbit' => 2018,
//         'deskripsi' => 'Buku yang membahas tentang kebiasaan dan bagaimana membangunnya.'
//     ]
// ];

// $query = mysqli_query($koneksi, "SELECT*FROM koleksi_pribadi LEFT JOIN user ON user.id_user = koleksi_pribadi.id_user LEFT JOIN buku ON buku.id_buku = koleksi_pribadi.id_buku");

$id_user = $_SESSION['user']['id_user'];
$query = mysqli_query($koneksi, "SELECT*FROM koleksi_pribadi LEFT JOIN user ON user.id_user = koleksi_pribadi.id_user LEFT JOIN buku ON buku.id_buku = koleksi_pribadi.id_buku WHERE koleksi_pribadi.id_user = '$id_user'");

$row = [];

while ($result = mysqli_fetch_array($query)) {
    $row[] = $result;
}


?>

<h1 class="mt-4">Koleksi Pribadi</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=koleksi_tambah" class="btn btn-primary">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <!-- <th>Nama Kategori</th> -->
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>


                    </tr>
                    <?php
                    $i = 1;
                    foreach ($row as $book) {
                    ?>
                        <tr><?php
                            // Misalkan ada variabel $isAdmin yang menunjukkan apakah pengguna adalah admin atau tidak
                            $isAdmin = true; // Anda harus menggantinya dengan logika autentikasi yang sesungguhnya

                            foreach ($row as $book) {
                            ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $book['judul'] ?? ''; ?></td>
                            <td><?php echo $book['penulis'] ?? ''; ?></td>
                            <td><?php echo $book['penerbit'] ?? ''; ?></td>
                            <td><?php echo $book['tahun_terbit'] ?? ''; ?></td>
                            <td><?php echo $book['deskripsi'] ?? ''; ?></td>
                            <!-- Cek apakah pengguna adalah admin -->
                            <?php if ($isAdmin) : ?>
                                <td>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=koleksi_hapus&&id=<?php echo $book['id_koleksi']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php
                            }
                    ?>

                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>