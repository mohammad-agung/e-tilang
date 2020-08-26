<?php
session_start();
if ($_SESSION['level'] == 'admin') {
    header('Location: ../../page/admin/dashboard');
    exit;
} else if ($_SESSION['level'] == 'user') {
    include '../../model/user/function_jenispelanggaran.php';
    if (isset($_POST["submit"])) {

        //cek imk
        if (tambah($_POST) > 0) {
            echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'kendaraan-add';
        </script>";
        } else {
            echo "
        <script>
            alert('Data Gagal ditambahkan');
            document.location.href = 'kendaraan-add';
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
                                                <h3 class="text-center title-2">Add Jenis Pelanggaran</h3>
                                            </div>
                                            <hr>
                                            <form method="post" class="form-horizontal">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Jenis Pelanggaran</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="jenispelanggaran" placeholder="Jenis Pelanggaran" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Jenis</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="jenis" id="select" class="form-control">
                                                            <option selected="true" disabled>Please select</option>
                                                            <option value="r2">Roda Dua</option>
                                                            <option value="r3">Roda Tiga</option>
                                                            <option value="r4">Roda Empat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-actions form-group mt-4">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-success btn-lg button" name="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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