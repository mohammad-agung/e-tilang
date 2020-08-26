<?php
session_start();
if ($_SESSION['level'] == 'admin') {
    header('Location: ../../page/admin/dashboard');
    exit;
} else if ($_SESSION['level'] == 'user') {
    include '../../model/user/function_jenispelanggaran.php';

    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * from tbl_jenispelanggaran where id_pelanggaran='$id'");

    if (isset($_POST["submit"])) {

        //cek imk
        if (ubah($_POST) > 0) {
            echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'pelanggaran-manage';
        </script>";
        } else {
            echo "
        <script>
            alert('Data Gagal diubah');
            document.location.href = 'pelanggaran-edit?id=$id';
        </script>";
        }
    }
    include '../../view/header.php';
?>
    <title>Dashboard User</title>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <?php include '../../view/header-mobile-user.php'; ?>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <?php include '../../view/aside-user.php'; ?>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <?php include '../../view/header-desktop.php'; ?>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">Form Manage Jenis Pelanggaran
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Edit Jenis Pelanggaran</h3>
                                            </div>
                                            <hr>
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                <form method="post" class="form-horizontal">
                                                    <input type="hidden" name="id" value="<?= htmlentities($row['id_pelanggaran']); ?>">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Jenis Pelangaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="text-input" name="jenispelanggaran" placeholder="Jenis Pelanggaran" class="form-control" value="<?= htmlentities($row['jenis_pelanggaran']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="select" class=" form-control-label">Jenis</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="jenis" id="select" class="form-control" required>
                                                                <option selected disabled value="">
                                                                    <?php
                                                                    $jenis = htmlentities($row['jenis_kendaraan']);
                                                                    if ($jenis == 'r2') {
                                                                        echo "Roda Dua";
                                                                    } else if ($jenis == 'r3') {
                                                                        echo "Roda Tiga";
                                                                    } else if ($jenis == 'r4') {
                                                                        echo "Roda Empat";
                                                                    } ?>
                                                                </option>
                                                                <option value="r2">Roda Dua</option>
                                                                <option value="r3">Roda Tiga</option>
                                                                <option value="r4">Roda Empat</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-actions form-group mt-4">
                                                        <div class="col-lg-4 col-md-12 mt-2">
                                                            <button type="submit" class="btn btn-success btn-lg button" name="submit">Edit</button>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 mt-2">
                                                            <a href="pelanggaran-manage" style="width: 100%;">
                                                                <button type="button" class="btn btn-danger btn-lg button">Kembali</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php include '../../view/copyright.php'; ?>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>
    <?php
    include '../../view/footer.php';
} else {
    header('Location: ../');
} ?>