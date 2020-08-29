<?php

include '../../controller/config.php';

if (!empty($_POST['date']) && !empty($_POST['golusia']) && !empty($_POST['jenisroda'])) {
    $date = $_POST['date'];
    $golonganusia = $_POST['golusia'];
    $jenisroda = $_POST['jenisroda'];
    $namakesatuan = $_POST['kesatuan'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_pelanggaran_r2r3 WHERE golongan_usia='$golonganusia' AND tanggal='$date' AND jenis_roda='$jenisroda' AND nama_kesatuan='$namakesatuan'");

    $count = mysqli_num_rows($query);

    if ($count > 0) {
        while ($row = mysqli_fetch_array($query)) { ?>
            <input type="hidden" name="id" value="<?= $row['id_pelanggaran']; ?>">
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class="form-control-label"><strong>Jenis Pelanggaran</strong></label>
                </div>
                <div class="col-6 col-md-4">
                    <label class="form-control-label"><strong>Jumlah Teguran</strong></label>
                </div>
                <div class="col-6 col-md-4">
                    <label class="form-control-label"><strong>Jumlah Tilang</strong></label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Helm</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="helmteguran" placeholder="Jumlah Teguran" value="<?= $row['Helm_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="helmtilang" placeholder="Jumlah Tilang" value="<?= $row['Helm_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Kecepatan</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="kecepatanteguran" placeholder="Jumlah Teguran" value="<?= $row['kecepatan_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="kecepatantilang" placeholder="Jumlah Tilang" value="<?= $row['kecepatan_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Kelengkapan</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="kelengkapanteguran" placeholder="Jumlah Teguran" value="<?= $row['kelengkapan_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="kelengkapantilang" placeholder="Jumlah Tilang" value="<?= $row['kelengkapan_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Surat - Surat</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="suratsuratteguran" placeholder="Jumlah Teguran" value="<?= $row['surat_surat_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="suratsurattilang" placeholder="Jumlah Tilang" value="<?= $row['surat_surat_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Boncengan Lebih Dari 1</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="boncenganlebihteguran" placeholder="Jumlah Teguran" value="<?= $row['boncenganlebih_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="boncenganlebihtilang" placeholder="Jumlah Tilang" value="<?= $row['boncenganlebih_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Marka Rambu</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="markarambuteguran" placeholder="Jumlah Teguran" value="<?= $row['markarambu_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="markarambutilang" placeholder="Jumlah Tilang" value="<?= $row['markarambu_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Melawan Arus</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="melawanarusteguran" placeholder="Jumlah Teguran" value="<?= $row['melawanarus_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="melawanarustilang" placeholder="Jumlah Tilang" value="<?= $row['melawanarus_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Lampu Utama</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="lampuutamateguran" placeholder="Jumlah Teguran" value="<?= $row['lampuutama_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="lampuutamatilang" placeholder="Jumlah Tilang" value="<?= $row['lampuutama_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Gunakan HP</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="gunahpteguran" placeholder="Jumlah Teguran" value="<?= $row['gunakanhp_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="gunahptilang" placeholder="Jumlah Tilang" value="<?= $row['gunakanhp_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label class=" form-control-label">Lain - Lain</label>
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="lainlainteguran" placeholder="Jumlah Teguran" value="<?= $row['lain_lain_teguran']; ?>" class="form-control">
                </div>
                <div class="col-6 col-md-4">
                    <input type="number" name="lainlaintilang" placeholder="Jumlah Tilang" value="<?= $row['lain_lain_tilang']; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-actions form-group mt-4">
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-md button" name="datarodaduaedit">Submit</button>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class="form-control-label"><strong>Jenis Pelanggaran</strong></label>
            </div>
            <div class="col-6 col-md-4">
                <label class="form-control-label"><strong>Jumlah Teguran</strong></label>
            </div>
            <div class="col-6 col-md-4">
                <label class="form-control-label"><strong>Jumlah Tilang</strong></label>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Helm</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="helmteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="helmtilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Kecepatan</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="kecepatanteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="kecepatantilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Kelengkapan</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="kelengkapanteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="kelengkapantilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Surat - Surat</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="suratsuratteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="suratsurattilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Boncengan Lebih Dari 1</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="boncenganlebihteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="boncenganlebihtilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Marka Rambu</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="markarambuteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="markarambutilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Melawan Arus</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="melawanarusteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="melawanarustilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Lampu Utama</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="lampuutamateguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="lampuutamatilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Gunakan HP</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="gunahpteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="gunahptilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Lain - Lain</label>
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="lainlainteguran" placeholder="Jumlah Teguran" class="form-control">
            </div>
            <div class="col-6 col-md-4">
                <input type="number" name="lainlaintilang" placeholder="Jumlah Tilang" class="form-control">
            </div>
        </div>
        <div class="row form-actions form-group mt-4">
            <div class="col-2">
                <button type="submit" class="btn btn-success btn-md button" name="datarodadua">Submit</button>
            </div>
        </div>
<?php }
} ?>