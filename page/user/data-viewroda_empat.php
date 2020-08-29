<?php

session_start();
$date = $_POST['date'];
$kesatuan = $_POST['kesatuan'];
include '../../model/data/datarodaempat.php';
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
                        <th colspan="9" style="text-align: center;">Jenis Pelanggaran Yang Di Lakukan</th>
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
                    <tr>
                        <td>1</td>
                        <td><?= $kesatuan; ?></td>
                        <td>
                            <?=
                                $jumlah_total;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_kecepatan;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_kelengkapan;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_surat_surat;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_muatan;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_markarambu;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_melawanarus;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_sabukeselamatan;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_gunakanhp;
                            ?>
                        </td>
                        <td>
                            <?=
                                $total_lain_lain;
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <form action="../../model/cetak_data/cetak_data_rodaempat.php" method="POST">
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