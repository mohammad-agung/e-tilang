<?php
session_start();
include '../../controller/config.php';
if (isset($_POST['cetak'])) {
    $date = $_POST['date'];
    $kesatuan = $_POST['kesatuan'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran $kesatuan Berdasarkan Roda Empat.xls");

    include '../data/datarodaempat.php';
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
                <td colspan="13" style="text-align: center;"><strong>DATA PELANGGARAN DARI JENIS RODA EMPAT</strong></td>
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
                <th>Kecepatan</th>
                <th>Kelengkapan</th>
                <th>Surat-Surat</th>
                <th>Muatan</th>
                <th>Marka Rambu</th>
                <th>Melawan Arus</th>
                <th>Sabuk Keselamatan</th>
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
                        $total_muatan;
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
                        $total_sabukeselamatan;
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
            </tr>
        </tbody>
    </table>
<?php } ?>