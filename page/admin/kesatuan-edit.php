<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../model/admin/function_kesatuan.php';

    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * from tbl_kesatuan where id_kesatuan='$id'");

    if (isset($_POST["submit"])) {

        //cek imk
        if (ubah($_POST) > 0) {
            echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'kesatuan-manage';
        </script>";
        } else {
            echo "
        <script>
            alert('Data Gagal diubah');
            document.location.href = 'kesatuan-edit?id=<?= $id; ?>';
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
                                                <h3 class="text-center title-2">Edit Kesatuan</h3>
                                            </div>
                                            <hr>
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                <form method="post" class="form-horizontal">
                                                    <input type="hidden" name="id" value="<?= htmlentities($row['id_kesatuan']); ?>">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Kesatuan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="text-input" name="namaKesatuan" placeholder="nama kesatuan" class="form-control" value="<?= htmlentities($row['nama_kesatuan']); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="textarea-input" class=" form-control-label">Alamat</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="alamatKesatuan" id="textarea-input" rows="5" placeholder="alamat kesatuan" class="form-control" required><?= htmlentities($row['alamat']); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row form-actions form-group mt-4">
                                                        <div class="col-lg-4 col-md-12 mt-2">
                                                            <button type="submit" class="btn btn-success btn-lg button" name="submit">Edit</button>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 mt-2">
                                                            <a href="kesatuan-manage" style="width: 100%;">
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