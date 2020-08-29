<?php

session_start();
$date = $_POST['date'];

include '../../model/data_admin/dataall.php';
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
            <form action="../../model/cetak_data_admin/cetak_data_all.php" method="POST">
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