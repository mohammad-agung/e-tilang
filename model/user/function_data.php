<?php

require '../../controller/config.php';

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahDataRodaDua($data)
{
    global $conn;

    $kesatuan = htmlspecialchars($data["namakesatuan"]);
    $golongan_usia = htmlspecialchars($data["golonganusia"]);
    $jenisroda = htmlspecialchars($data["jeniskendaraan"]);
    $helm_teguran = htmlspecialchars($data["helmteguran"]);
    $helm_tilang = htmlspecialchars($data["helmtilang"]);
    $kecepatan_teguran = htmlspecialchars($data["kecepatanteguran"]);
    $kecepatan_tilang = htmlspecialchars($data["kecepatantilang"]);
    $kelengkapan_teguran = htmlspecialchars($data["kelengkapanteguran"]);
    $kelengkapan_tilang = htmlspecialchars($data["kelengkapantilang"]);
    $suratsurat_teguran = htmlspecialchars($data["suratsuratteguran"]);
    $suratsurat_tilang = htmlspecialchars($data["suratsurattilang"]);
    $boncenganlebih_teguran = htmlspecialchars($data["boncenganlebihteguran"]);
    $boncenganlebih_tilang = htmlspecialchars($data["boncenganlebihtilang"]);
    $markarambu_teguran = htmlspecialchars($data["markarambuteguran"]);
    $markarambu_tilang = htmlspecialchars($data["markarambutilang"]);
    $melawanarus_teguran = htmlspecialchars($data["melawanarusteguran"]);
    $melawanarus_tilang = htmlspecialchars($data["melawanarustilang"]);
    $lampuutama_teguran = htmlspecialchars($data["lampuutamateguran"]);
    $lampuutama_tilang = htmlspecialchars($data["lampuutamatilang"]);
    $gunahp_teguran = htmlspecialchars($data["gunahpteguran"]);
    $gunahp_tilang = htmlspecialchars($data["gunahptilang"]);
    $lainlain_teguran = htmlspecialchars($data["lainlainteguran"]);
    $lainlain_tilang = htmlspecialchars($data["lainlaintilang"]);
    $date = htmlspecialchars($data['date']);

    $query = "INSERT INTO tbl_pelanggaran_r2r3 VALUES('', '$kesatuan', '$golongan_usia','$jenisroda','$helm_teguran','$helm_tilang','$kecepatan_teguran','$kecepatan_tilang','$kelengkapan_teguran','$kelengkapan_tilang','$suratsurat_teguran','$suratsurat_tilang','$boncenganlebih_teguran','$boncenganlebih_tilang','$markarambu_teguran','$markarambu_tilang','$melawanarus_teguran','$melawanarus_tilang','$lampuutama_teguran','$lampuutama_tilang','$gunahp_teguran','$gunahp_tilang','$lainlain_teguran','$lainlain_tilang','$date')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editDataRodaDua($data)
{
    global $conn;

    $id = $data['id'];
    $helm_teguran = htmlspecialchars($data["helmteguran"]);
    $helm_tilang = htmlspecialchars($data["helmtilang"]);
    $kecepatan_teguran = htmlspecialchars($data["kecepatanteguran"]);
    $kecepatan_tilang = htmlspecialchars($data["kecepatantilang"]);
    $kelengkapan_teguran = htmlspecialchars($data["kelengkapanteguran"]);
    $kelengkapan_tilang = htmlspecialchars($data["kelengkapantilang"]);
    $suratsurat_teguran = htmlspecialchars($data["suratsuratteguran"]);
    $suratsurat_tilang = htmlspecialchars($data["suratsurattilang"]);
    $boncenganlebih_teguran = htmlspecialchars($data["boncenganlebihteguran"]);
    $boncenganlebih_tilang = htmlspecialchars($data["boncenganlebihtilang"]);
    $markarambu_teguran = htmlspecialchars($data["markarambuteguran"]);
    $markarambu_tilang = htmlspecialchars($data["markarambutilang"]);
    $melawanarus_teguran = htmlspecialchars($data["melawanarusteguran"]);
    $melawanarus_tilang = htmlspecialchars($data["melawanarustilang"]);
    $lampuutama_teguran = htmlspecialchars($data["lampuutamateguran"]);
    $lampuutama_tilang = htmlspecialchars($data["lampuutamatilang"]);
    $gunahp_teguran = htmlspecialchars($data["gunahpteguran"]);
    $gunahp_tilang = htmlspecialchars($data["gunahptilang"]);
    $lainlain_teguran = htmlspecialchars($data["lainlainteguran"]);
    $lainlain_tilang = htmlspecialchars($data["lainlaintilang"]);

    $query = "UPDATE tbl_pelanggaran_r2r3 SET
                Helm_teguran = '$helm_teguran',
                Helm_tilang = '$helm_tilang',
                kecepatan_teguran = '$kecepatan_teguran',
                kecepatan_tilang = '$kecepatan_tilang',
                kelengkapan_teguran = '$kelengkapan_teguran',
                kelengkapan_tilang = '$kelengkapan_tilang',
                surat_surat_teguran = '$suratsurat_teguran',
                surat_surat_tilang = '$suratsurat_tilang',
                boncenganlebih_teguran = '$boncenganlebih_teguran',
                boncenganlebih_tilang = '$boncenganlebih_tilang',
                markarambu_teguran = '$markarambu_teguran',
                markarambu_tilang = '$markarambu_tilang',
                melawanarus_teguran = '$melawanarus_teguran',
                melawanarus_tilang = '$melawanarus_tilang',
                lampuutama_teguran = '$lampuutama_teguran',
                lampuutama_tilang = '$lampuutama_tilang',
                gunakanhp_teguran = '$gunahp_teguran',
                gunakanhp_tilang = '$gunahp_tilang',
                lain_lain_teguran = '$lainlain_teguran',
                lain_lain_tilang = '$lainlain_tilang'
			WHERE id_pelanggaran = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
