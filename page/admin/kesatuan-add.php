<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../model/admin/function.php';
    if (isset($_POST["submit"])) {

        //cek imk
        if (tambah($_POST) > 0) {
            echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'kesatuan-add';
        </script>";
        } else {
            echo "
        <script>
            alert('Data Gagal ditambahkan');
            document.location.href = 'kesatuan-add';
        </script>";
        }
    }
    include '../../view/header.php';
?>
    <title>Dashboard Admin</title>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <?php include '../../view/header-mobile-admin.php'; ?>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <?php include '../../view/aside-admin.php'; ?>
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
                                        <div class="card-header">Form Manage Kesatuan
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Add Kesatuan</h3>
                                            </div>
                                            <hr>
                                            <form method="post" class="form-horizontal">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Nama Kesatuan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="namaKesatuan" placeholder="nama kesatuan" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label">Alamat</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="alamatKesatuan" id="textarea-input" rows="5" placeholder="alamat kesatuan" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Status</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="status" id="select" class="form-control">
                                                            <option value="0">Please select</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Not Active</option>
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