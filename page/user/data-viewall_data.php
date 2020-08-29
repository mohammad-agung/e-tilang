<?php

session_start();
$date = $_POST['date'];
$kesatuan = $_POST['kesatuan'];
include '../../model/data/dataall.php';
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
                    <tr>
                        <td>1</td>
                        <td><?= $kesatuan; ?></td>
                        <td><?= $jumlah_total_pelanggaran; ?></td>
                        <?php
                        for ($i = 0; $i < count($total); $i++) { ?>
                            <td>
                                <?= $total[$i] + $totalDua[$i]; ?>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <form action="../../model/cetak_data/cetak_data_all.php" method="POST">
                <input type="hidden" name="date" value="<?= $date; ?>">
                <input type="hidden" name="kesatuan" value="<?= $kesatuan; ?>">
                <div class="row form-actions form-group mt-4">
                    <div class="col-2">
                        <button type="submit" class="btn btn-success btn-sm button" name="cetak">Cetak Data</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>