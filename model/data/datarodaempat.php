<?php

include '../../controller/config.php';

// kecepatan
$query_kecepatan =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_kecepatan = mysqli_fetch_array($query_kecepatan)) {
    $kecepatantilang = intval($row_kecepatan['kecepatantilang']);
    $kecepatanteguran = intval($row_kecepatan['kecepatanteguran']);
}
$total_kecepatan = $kecepatantilang + $kecepatanteguran;

// kelengkapan
$query_kelengkapan =  mysqli_query($conn, "SELECT SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_kelengkapan = mysqli_fetch_array($query_kelengkapan)) {
    $kelengkapantilang = intval($row_kelengkapan['kelengkapantilang']);
    $kelengkapanteguran = intval($row_kelengkapan['kelengkapanteguran']);
}
$total_kelengkapan = $kelengkapantilang + $kelengkapanteguran;

// surat surat
$query_surat_surat =  mysqli_query($conn, "SELECT SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_surat_surat = mysqli_fetch_array($query_surat_surat)) {
    $surat_surattilang = intval($row_surat_surat['surat_surattilang']);
    $surat_suratteguran = intval($row_surat_surat['surat_suratteguran']);
}
$total_surat_surat = $surat_surattilang + $surat_suratteguran;

// boncengan lebih
$query_muatan =  mysqli_query($conn, "SELECT SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_muatan = mysqli_fetch_array($query_muatan)) {
    $muatantilang = intval($row_muatan['muatantilang']);
    $muatanteguran = intval($row_muatan['muatanteguran']);
}
$total_muatan = $muatantilang + $muatanteguran;

// marka rambu
$query_markarambu =  mysqli_query($conn, "SELECT SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_markarambu = mysqli_fetch_array($query_markarambu)) {
    $markarambutilang = intval($row_markarambu['markarambutilang']);
    $markarambuteguran = intval($row_markarambu['markarambuteguran']);
}
$total_markarambu = $markarambutilang + $markarambuteguran;

// melawan arus
$query_melawanarus =  mysqli_query($conn, "SELECT SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_melawanarus = mysqli_fetch_array($query_melawanarus)) {
    $melawanarustilang = intval($row_melawanarus['melawanarustilang']);
    $melawanarusteguran = intval($row_melawanarus['melawanarusteguran']);
}
$total_melawanarus = $melawanarustilang + $melawanarusteguran;

// lampu utama
$query_sabukeselamatan =  mysqli_query($conn, "SELECT SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_sabukeselamatan = mysqli_fetch_array($query_sabukeselamatan)) {
    $sabukeselamatantilang = intval($row_sabukeselamatan['sabukeselamatantilang']);
    $sabukeselamatanteguran = intval($row_sabukeselamatan['sabukeselamatanteguran']);
}
$total_sabukeselamatan = $sabukeselamatantilang + $sabukeselamatanteguran;

// gunakan hp
$query_gunakanhp =  mysqli_query($conn, "SELECT SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_gunakanhp = mysqli_fetch_array($query_gunakanhp)) {
    $gunakanhptilang = intval($row_gunakanhp['gunakanhptilang']);
    $gunakanhpteguran = intval($row_gunakanhp['gunakanhpteguran']);
}
$total_gunakanhp = $gunakanhptilang + $gunakanhpteguran;

// lain lain
$query_lain_lain =  mysqli_query($conn, "SELECT SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row_lain_lain = mysqli_fetch_array($query_lain_lain)) {
    $lain_laintilang = intval($row_lain_lain['lain_laintilang']);
    $lain_lainteguran = intval($row_lain_lain['lain_lainteguran']);
}
$total_lain_lain = $lain_laintilang + $lain_lainteguran;

// total seluruh
$jumlah_total = $total_kecepatan + $total_muatan + $total_gunakanhp + $total_kelengkapan + $total_lain_lain + $total_sabukeselamatan + $total_markarambu + $total_melawanarus + $total_surat_surat;
