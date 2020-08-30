<?php
session_start();
if (isset($_POST['cetak'])) {
    $date = $_POST['date'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pelanggaran Berdasarkan Roda Empat.xls");

    include '../data_admin/datarodaempat.php';
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
                <th colspan="9">Jenis Pelanggaran Yang Di Lakukan</th>
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
            <?php
            $number = 1;
            for ($index = 0; $index < count($kesatuan); $index++) {
            ?>
                <tr>
                    <td><?= $number++; ?></td>
                    <td><?= $kesatuan[$index] ?></td>
                    <td><?= $jumlah_total[$index]; ?></td>
                    <td>
                        <?=
                            $total_kecepatan[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_kelengkapan[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_surat_surat[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_muatan[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_markarambu[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_melawanarus[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_sabukeselamatan[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_gunakanhp[$index];
                        ?>
                    </td>
                    <td>
                        <?=
                            $total_lain_lain[$index];
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