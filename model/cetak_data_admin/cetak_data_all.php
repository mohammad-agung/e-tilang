<?php

include '../../controller/config.php';
if (isset($_POST['cetak'])) {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran.xls");

    $date = $_POST['date'];
    include '../data_admin/dataall.php';
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
                <td colspan="5" style="text-align: center;"><strong>DATA PELANGGARAN</strong></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center;"><strong>DATA BULAN <?= $date; ?></strong></td>
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
                <th colspan="2" style="text-align: center;">Jenis Pelanggaran</th>
            </tr>
            <tr>
                <th>Tilang</th>
                <th>Teguran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number = 1;
            for ($index = 0; $index < count($kesatuan); $index++) {
            ?>
                <tr>
                    <td><?= $number++; ?></td>
                    <td><?= $kesatuan[$index] ?></td>
                    <td><?= $totalr4[$index] + $totalDuar2[$index] + $totalr2[$index] + $totalDuar4[$index]; ?></td>
                    <td><?= $totalr4[$index] + $totalDuar2[$index]; ?></td>
                    <td><?= $totalr2[$index] + $totalDuar4[$index]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">Palu, </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">a.n DIREKTUR LALU LINTAS POLDA SULTENG</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">KABUBDIT GAKKUM</td>
            </tr>
            <tr>
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
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php } ?>