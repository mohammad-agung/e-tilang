<?php

session_start();
include '../../controller/config.php';
$date = $_POST['date'];

include '../../model/data_admin/datarodadua.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">Nama Kesatuan</th>
                        <th rowspan="2">Jumlah Pelanggaran</th>
                        <th colspan="10" style="text-align: center;">Jenis Pelanggaran Yang Di Lakukan</th>
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
                                    $total_helm[$index];
                                ?>
                            </td>
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
                                    $total_boncenganlebih[$index];
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
                                    $total_lampuutama[$index];
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
            <form action="../../model/cetak_data_admin/cetak_data_rodaduatiga.php" method="POST">
                <input type="hidden" name="date" value="<?= $date; ?>">
                <div class="row form-actions form-group mt-4">
                    <div class="col-2">
                        <button type="submit" class="btn btn-success btn-sm button" name="cetak">Cetak Data</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>