<?php

session_start();
$date = $_POST['date'];
include '../../model/data_admin/datajeniskendaraan.php';
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
            <form action="../../model/cetak_data_admin/cetak_data_jeniskendaraan.php" method="POST">
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