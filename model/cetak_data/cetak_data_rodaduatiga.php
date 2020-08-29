<?php
session_start();
include '../../controller/config.php';
if (isset($_POST['cetak'])) {
    $date = $_POST['date'];
    $kesatuan = $_POST['kesatuan'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran $kesatuan Berdasarkan Roda Dua dan Tiga.xls");
    $query_helm =  mysqli_query($conn, "SELECT SUM(Helm_tilang) AS helmtilang, SUM(Helm_teguran) AS helmteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_helm = mysqli_fetch_array($query_helm)) {
        $helmtilang = intval($row_helm['helmtilang']);
        $helmteguran = intval($row_helm['helmteguran']);
    }
    $total_helm = $helmtilang + $helmteguran;

    // kecepatan
    $query_kecepatan =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_kecepatan = mysqli_fetch_array($query_kecepatan)) {
        $kecepatantilang = intval($row_kecepatan['kecepatantilang']);
        $kecepatanteguran = intval($row_kecepatan['kecepatanteguran']);
    }
    $total_kecepatan = $kecepatantilang + $kecepatanteguran;

    // kelengkapan
    $query_kelengkapan =  mysqli_query($conn, "SELECT SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_kelengkapan = mysqli_fetch_array($query_kelengkapan)) {
        $kelengkapantilang = intval($row_kelengkapan['kelengkapantilang']);
        $kelengkapanteguran = intval($row_kelengkapan['kelengkapanteguran']);
    }
    $total_kelengkapan = $kelengkapantilang + $kelengkapanteguran;

    // surat surat
    $query_surat_surat =  mysqli_query($conn, "SELECT SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_surat_surat = mysqli_fetch_array($query_surat_surat)) {
        $surat_surattilang = intval($row_surat_surat['surat_surattilang']);
        $surat_suratteguran = intval($row_surat_surat['surat_suratteguran']);
    }
    $total_surat_surat = $surat_surattilang + $surat_suratteguran;

    // boncengan lebih
    $query_boncenganlebih =  mysqli_query($conn, "SELECT SUM(boncenganlebih_tilang) AS boncenganlebihtilang, SUM(boncenganlebih_teguran) AS boncenganlebihteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_boncenganlebih = mysqli_fetch_array($query_boncenganlebih)) {
        $boncenganlebihtilang = intval($row_boncenganlebih['boncenganlebihtilang']);
        $boncenganlebihteguran = intval($row_boncenganlebih['boncenganlebihteguran']);
    }
    $total_boncenganlebih = $boncenganlebihtilang + $boncenganlebihteguran;

    // marka rambu
    $query_markarambu =  mysqli_query($conn, "SELECT SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_markarambu = mysqli_fetch_array($query_markarambu)) {
        $markarambutilang = intval($row_markarambu['markarambutilang']);
        $markarambuteguran = intval($row_markarambu['markarambuteguran']);
    }
    $total_markarambu = $markarambutilang + $markarambuteguran;

    // melawan arus
    $query_melawanarus =  mysqli_query($conn, "SELECT SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_melawanarus = mysqli_fetch_array($query_melawanarus)) {
        $melawanarustilang = intval($row_melawanarus['melawanarustilang']);
        $melawanarusteguran = intval($row_melawanarus['melawanarusteguran']);
    }
    $total_melawanarus = $melawanarustilang + $melawanarusteguran;

    // lampu utama
    $query_lampuutama =  mysqli_query($conn, "SELECT SUM(lampuutama_tilang) AS lampuutamatilang, SUM(lampuutama_teguran) AS lampuutamateguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_lampuutama = mysqli_fetch_array($query_lampuutama)) {
        $lampuutamatilang = intval($row_lampuutama['lampuutamatilang']);
        $lampuutamateguran = intval($row_lampuutama['lampuutamateguran']);
    }
    $total_lampuutama = $lampuutamatilang + $lampuutamateguran;

    // gunakan hp
    $query_gunakanhp =  mysqli_query($conn, "SELECT SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_gunakanhp = mysqli_fetch_array($query_gunakanhp)) {
        $gunakanhptilang = intval($row_gunakanhp['gunakanhptilang']);
        $gunakanhpteguran = intval($row_gunakanhp['gunakanhpteguran']);
    }
    $total_gunakanhp = $gunakanhptilang + $gunakanhpteguran;

    // lain lain
    $query_lain_lain =  mysqli_query($conn, "SELECT SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row_lain_lain = mysqli_fetch_array($query_lain_lain)) {
        $lain_laintilang = intval($row_lain_lain['lain_laintilang']);
        $lain_lainteguran = intval($row_lain_lain['lain_lainteguran']);
    }
    $total_lain_lain = $lain_laintilang + $lain_lainteguran;

    // total seluruh
    $jumlah_total = $total_helm + $total_kecepatan + $total_boncenganlebih + $total_gunakanhp + $total_kelengkapan + $total_lain_lain + $total_lampuutama + $total_markarambu + $total_melawanarus + $total_surat_surat;
?>
    <table>
        <tbody>
            <tr>
                <td colspan="3">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
            </tr>
            <tr>
                <td colspan="3">DAERAH SULAWESI TENGAH</td>
            </tr>
            <tr>
                <td colspan="3">DIREKTORAT LALU LINTAS</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td colspan="13" style="text-align: center;"><strong>DATA PELANGGARAN DARI JENIS RODA DUA DAN TIGA</strong></td>
            </tr>
            <tr>
                <td colspan="13" style="text-align: center;"><strong>DATA BULAN <?= $date; ?></strong></td>
            </tr>
            <tr></tr>
        </tbody>
    </table>
    <table border="1" style="text-align: center;">
        <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Nama Kesatuan</th>
                <th rowspan="2">Jumlah Pelanggaran</th>
                <th colspan="10">Jenis Pelanggaran Yang Di Lakukan</th>
            </tr>
            <tr>
                <th>Helm</th>
                <th>Kecepatan</th>
                <th>Kelengkapan</th>
                <th>Surat-Surat</th>
                <th>Boncengan Lebih Dari 1</th>
                <th>Marka Rambu</th>
                <th>Melawan Arus</th>
                <th>Lampu Utama</th>
                <th>Gunakan HP</th>
                <th>Lain Lain</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><?= $kesatuan; ?></td>
                <td>
                    <?=
                        $jumlah_total;
                    ?>
                </td>
                <td>
                    <?=
                        $total_helm;
                    ?>
                </td>
                <td>
                    <?=
                        $total_kecepatan;
                    ?>
                </td>
                <td>
                    <?=
                        $total_kelengkapan;
                    ?>
                </td>
                <td>
                    <?=
                        $total_surat_surat;
                    ?>
                </td>
                <td>
                    <?=
                        $total_boncenganlebih;
                    ?>
                </td>
                <td>
                    <?=
                        $total_markarambu;
                    ?>
                </td>
                <td>
                    <?=
                        $total_melawanarus;
                    ?>
                </td>
                <td>
                    <?=
                        $total_lampuutama;
                    ?>
                </td>
                <td>
                    <?=
                        $total_gunakanhp;
                    ?>
                </td>
                <td>
                    <?=
                        $total_lain_lain;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="4">Palu, </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="4">a.n DIREKTUR LALU LINTAS POLDA SULTENG</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="4">KABUBDIT GAKKUM</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="4" style="border-bottom: 1px solid black;"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php } ?>