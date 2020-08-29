<?php

include '../../controller/config.php';
$arrGolonganusia = array("kurangdari17", "17sampai25", "26sampai45", "46sampai65", "lebihdari65");
$total = array();
for ($index = 0; $index < count($arrGolonganusia); $index++) {
    // Bus
    $query =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' AND golongan_usia='$arrGolonganusia[$index]' ORDER BY tanggal DESC");
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
    $total[] = $kecepatantilang + $kecepatanteguran + $kelengkapantilang + $kelengkapanteguran + $surat_surattilang + $surat_suratteguran + $muatantilang + $muatanteguran + $markarambutilang + $markarambuteguran + $melawanarustilang + $melawanarusteguran + $sabukeselamatantilang + $sabukeselamatanteguran +  $gunakanhptilang + $gunakanhpteguran + $lain_laintilang + $lain_lainteguran;
}

for ($index = 0; $index < count($arrGolonganusia); $index++) {
    // Bus
    $queryDua =  mysqli_query($conn, "SELECT SUM(Helm_teguran) AS helmteguran, SUM(Helm_tilang) AS helmtilang, SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(boncenganlebih_tilang) AS boncenganlebihtilang, SUM(boncenganlebih_teguran) AS boncenganlebihteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(lampuutama_tilang) AS lampuutamatilang, SUM(lampuutama_teguran) AS lampuutamateguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' AND golongan_usia='$arrGolonganusia[$index]' ORDER BY tanggal DESC");
    while ($row = mysqli_fetch_array($queryDua)) {
        $helmteguran = intval($row['helmteguran']);
        $helmtilang = intval($row['helmtilang']);
        $kecepatantilang  = intval($row['kecepatantilang']);
        $kecepatanteguran = intval($row['kecepatanteguran']);
        $kelengkapantilang = intval($row['kelengkapantilang']);
        $kelengkapanteguran = intval($row['kelengkapanteguran']);
        $surat_surattilang = intval($row['surat_surattilang']);
        $surat_suratteguran = intval($row['surat_suratteguran']);
        $boncenganlebihtilang = intval($row['boncenganlebihtilang']);
        $boncenganlebihteguran = intval($row['boncenganlebihteguran']);
        $markarambutilang = intval($row['markarambutilang']);
        $markarambuteguran = intval($row['markarambuteguran']);
        $melawanarustilang = intval($row['melawanarustilang']);
        $melawanarusteguran = intval($row['melawanarusteguran']);
        $lampuutamatilang = intval($row['lampuutamatilang']);
        $lampuutamateguran = intval($row['lampuutamateguran']);
        $gunakanhptilang = intval($row['gunakanhptilang']);
        $gunakanhpteguran = intval($row['gunakanhpteguran']);
        $lain_laintilang = intval($row['lain_laintilang']);
        $lain_lainteguran = intval($row['lain_lainteguran']);
    }
    $totalDua[] = $helmtilang + $helmteguran + $kecepatantilang + $kecepatanteguran + $kelengkapantilang + $kelengkapanteguran + $surat_surattilang + $surat_suratteguran + $boncenganlebihtilang + $boncenganlebihteguran + $markarambutilang + $markarambuteguran + $melawanarustilang + $melawanarusteguran + $lampuutamatilang + $lampuutamateguran +  $gunakanhptilang + $gunakanhpteguran + $lain_laintilang + $lain_lainteguran;
}
// total keseluruhan
$jumlah_total_golonganusia = array_sum($total) + array_sum($totalDua);
