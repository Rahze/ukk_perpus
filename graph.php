<?php


function graph($senin, $minggu)
{
    global $koneksi;


    $tgl_awal = mysqli_real_escape_string($koneksi, $senin);
    $tgl_akhir = mysqli_real_escape_string($koneksi, $minggu);

    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman WHERE tanggal_peminjaman BETWEEN '$tgl_awal' AND '$tgl_akhir'");

    $row = ['Monday' => 0, 'Tuesday'  => 0, 'Wednesday' => 0, 'Thursday' => 0, 'Friday' => 0, 'Saturday' => 0, 'Sunday' => 0];

    while ($data = mysqli_fetch_array($query)) {
        $hari = date('l', strtotime($data['tanggal_peminjaman']));

        $row[$hari]++;
    }

    return $row;
}
