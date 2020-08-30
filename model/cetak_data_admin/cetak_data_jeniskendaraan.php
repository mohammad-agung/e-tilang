<?php
session_start();
if (isset($_POST['cetak'])) {
    $date = $_POST['date'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran Berdasarkan Jenis Kendaraan.xls");

    include '../data_admin/datajeniskendaraan.php';
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
                <td colspan="14" style="text-align: center;"><strong>DATA PELANGGARAN DARI JENIS KENDARAAN</strong></td>
            </tr>
            <tr>
                <td colspan="14" style="text-align: center;"><strong>DATA BULAN <?= $date; ?></strong></td>
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
                <th colspan="11" style="text-align: center;">Jenis Kendaran</th>
            </tr>
            <tr>
                <th>Bus</th>
                <th>Truck</th>
                <th>Pick Up</th>
                <th>Mini Bus</th>
                <th>JEEP</th>
                <th>Sedan</th>
                <th>MKL/Mobil Penumpang</th>
                <th>Metro Mini</th>
                <th>Taksi</th>
                <th>Ransus</th>
                <th>Roda 2 / 3</th>
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
                    <td><?= array_sum($total[$index]) ?></td>
                    <?php for ($i = 0; $i < count($arrKendaraan); $i++) { ?>
                        <td><?= $total[$index][$i]; ?></td>
                    <?php } ?>
                    <td>
                        <?=
                            $jumlah_total[$index];
                        ?>
                    </td>
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
                <td></td>
            </tr>
        </tbody>
    </table>
<?php } ?>