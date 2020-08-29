<?php

include '../../controller/config.php';
$total = array();
$totalDua = array();
$query =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($row = mysqli_fetch_array($query)) {
    $kecepatantilang  = intval($row['kecepatantilang']);
    $kecepatanteguran = intval($row['kecepatanteguran']);
    $kelengkapantilang = intval($row['kelengkapantilang']);
    $kelengkapanteguran = intval($row['kelengkapanteguran']);
    $surat_surattilang = intval($row['surat_surattilang']);
    $surat_suratteguran = intval($row['surat_suratteguran']);
    $muatantilang = intval($row['muatantilang']);
    $muatanteguran = intval($row['muatanteguran']);
    $markarambutilang = intval($row['markarambutilang']);
    $markarambuteguran = intval($row['markarambuteguran']);
    $melawanarustilang = intval($row['melawanarustilang']);
    $melawanarusteguran = intval($row['melawanarusteguran']);
    $sabukeselamatantilang = intval($row['sabukeselamatantilang']);
    $sabukeselamatanteguran = intval($row['sabukeselamatanteguran']);
    $gunakanhptilang = intval($row['gunakanhptilang']);
    $gunakanhpteguran = intval($row['gunakanhpteguran']);
    $lain_laintilang = intval($row['lain_laintilang']);
    $lain_lainteguran = intval($row['lain_lainteguran']);
}

$queryDua =  mysqli_query($conn, "SELECT SUM(Helm_teguran) AS helmteguran, SUM(Helm_tilang) AS helmtilang, SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(boncenganlebih_tilang) AS boncenganlebihtilang, SUM(boncenganlebih_teguran) AS boncenganlebihteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(lampuutama_tilang) AS lampuutamatilang, SUM(lampuutama_teguran) AS lampuutamateguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
while ($rowDua = mysqli_fetch_array($queryDua)) {
    $helmteguran = intval($rowDua['helmteguran']);
    $helmtilang = intval($rowDua['helmtilang']);
    $kecepatantilangdua  = intval($rowDua['kecepatantilang']);
    $kecepatantegurandua = intval($rowDua['kecepatanteguran']);
    $kelengkapantilangdua = intval($rowDua['kelengkapantilang']);
    $kelengkapantegurandua = intval($rowDua['kelengkapanteguran']);
    $surat_surattilangdua = intval($rowDua['surat_surattilang']);
    $surat_surattegurandua = intval($rowDua['surat_suratteguran']);
    $boncenganlebihtilangdua = intval($rowDua['boncenganlebihtilang']);
    $boncenganlebihtegurandua = intval($rowDua['boncenganlebihteguran']);
    $markarambutilangdua = intval($rowDua['markarambutilang']);
    $markarambutegurandua = intval($rowDua['markarambuteguran']);
    $melawanarustilangdua = intval($rowDua['melawanarustilang']);
    $melawanarustegurandua = intval($rowDua['melawanarusteguran']);
    $lampuutamatilangdua = intval($rowDua['lampuutamatilang']);
    $lampuutamategurandua = intval($rowDua['lampuutamateguran']);
    $gunakanhptilangdua = intval($rowDua['gunakanhptilang']);
    $gunakanhptegurandua = intval($rowDua['gunakanhpteguran']);
    $lain_laintilangdua = intval($rowDua['lain_laintilang']);
    $lain_laintegurandua = intval($rowDua['lain_lainteguran']);
}
$total[] =  $kecepatantilang + $kelengkapantilang + $surat_surattilang + $muatantilang + $markarambutilang + $melawanarustilang +  $sabukeselamatantilang + $gunakanhptilang + $lain_laintilang;

$total[] = $helmteguran +  $kecepatantegurandua +  $kelengkapantegurandua  + $surat_surattegurandua  + $boncenganlebihtegurandua +  $markarambutegurandua + $melawanarustegurandua  + $lampuutamategurandua + $gunakanhptegurandua + $lain_laintegurandua;

$totalDua[] = $helmtilang + $kecepatantilangdua + $kelengkapantilangdua + $surat_surattilangdua + $boncenganlebihtilangdua + $markarambutilangdua + $melawanarustilangdua +  $lampuutamatilangdua + $gunakanhptilangdua + $lain_laintilangdua;

$totalDua[] =  $kecepatanteguran +  $kelengkapanteguran  + $surat_suratteguran  + $muatanteguran +  $markarambuteguran + $melawanarusteguran  + $sabukeselamatanteguran + $gunakanhpteguran + $lain_lainteguran;


// total keseluruhan
$jumlah_total_pelanggaran = array_sum($total) + array_sum($totalDua);
