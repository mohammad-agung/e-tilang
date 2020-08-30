<?php

session_start();
$date = $_POST['date'];
include '../../model/data_admin/datagolonganusia.php';
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
                            <td><?= array_sum($totalr2[$index]) + array_sum($totalr4[$index]); ?></td>
                            <?php for ($i = 0; $i < count($arrGolonganusia); $i++) { ?>
                                <td><?= $totalr2[$index][$i] + $totalr4[$index][$i]; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="../../model/cetak_data_admin/cetak_data_golonganusia.php" method="POST">
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