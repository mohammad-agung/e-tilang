<?php

include '../../controller/config.php';
if (isset($_POST['cetak'])) {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran Dari Golongan Usia.xls");

    $date = $_POST['date'];
    include '../data_admin/datagolonganusia.php';
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
            <?php
            $number = 1;
            for ($index = 0; $index < count($kesatuan); $index++) {
            ?>
                <tr>
                    <td><?= $number++; ?></td>
                    <td><?= $kesatuan[$index] ?></td>
                    <td>
                        <?= $totalr2[$index][0] + $totalr4[$index][0] +
                            $totalr2[$index][1] + $totalr4[$index][1] +
                            $totalr2[$index][2] + $totalr4[$index][2] +
                            $totalr2[$index][3] + $totalr4[$index][3] +
                            $totalr2[$index][4] + $totalr4[$index][4];
                        ?></td>
                    <?php for ($i = 0; $i < count($arrGolonganusia); $i++) { ?>
                        <td><?= $totalr2[$index][$i] + $totalr4[$index][$i]; ?></td>
                    <?php } ?>
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