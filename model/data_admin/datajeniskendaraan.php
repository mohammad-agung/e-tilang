<?php
include '../../model/data_admin/datarodadua.php';

$arrKendaraan = array("Bus", "Truck", "Pick_Up", "Mini_Bus", "Jeep", "Sedan", "Mobil_Penumpang", "Metro_MIni", "Taksi", "Ransus");

for ($indexsatu = 0; $indexsatu < count($kesatuan); $indexsatu++) {
    for ($index = 0; $index < count($arrKendaraan); $index++) {
        // Bus
        $query =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan[$indexsatu]' AND jenis_kendaraan='$arrKendaraan[$index]' ORDER BY tanggal DESC");
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
        $total[$indexsatu][] = $kecepatantilang + $kecepatanteguran + $kelengkapantilang + $kelengkapanteguran + $surat_surattilang + $surat_suratteguran + $muatantilang + $muatanteguran + $markarambutilang + $markarambuteguran + $melawanarustilang + $melawanarusteguran + $sabukeselamatantilang + $sabukeselamatanteguran +  $gunakanhptilang + $gunakanhpteguran + $lain_laintilang + $lain_lainteguran;
    }
}
