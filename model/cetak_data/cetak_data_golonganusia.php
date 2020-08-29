<?php
session_start();
include '../../controller/config.php';
if (isset($_POST['cetak'])) {
    $date = $_POST['date'];
    $kesatuan = $_POST['kesatuan'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran $kesatuan Berdasarkan Golongan Usia.xls");

    include '../data/datagolonganusia.php';
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
                <td colspan="8" style="text-align: center;"><strong>DATA PELANGGARAN DARI GOLONGAN USIA</strong></td>
            </tr>
            <tr>
                <td colspan="8" style="text-align: center;"><strong>DATA BULAN <?= $date; ?></strong></td>
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
                <th colspan="5" style="text-align: center;">Golongan Usia</th>
            </tr>
            <tr>
                <th>Kurang Dari 17</th>
                <th>17 sampai 25</th>
                <th>26 sampai 45</th>
                <th>46 sampai 65</th>
                <th>Lebih dari 65</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><?= $kesatuan; ?></td>
                <td><?= $jumlah_total_golonganusia ?></td>
                <?php
                for ($i = 0; $i < count($arrGolonganusia); $i++) { ?>
                    <td>
                        <?= $total[$i] + $totalDua[$i]; ?>
                    </td>
                <?php } ?>
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
                <td colspan="4">Palu, </td>
            </tr>
            <tr>
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
            </tr>
            <tr>
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
            </tr>
        </tbody>
    </table>
<?php } ?>