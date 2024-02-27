<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM koleksi_pribadi WHERE id_koleksi=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href = "index.php?page=koleksi_pribadi";
</script>