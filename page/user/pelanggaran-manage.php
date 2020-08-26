<?php
session_start();
if ($_SESSION['level'] == 'admin') {
    header('Location: ../../page/admin/dashboard');
    exit;
} else if ($_SESSION['level'] == 'user') {
    include '../../controller/config.php';
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
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Jenis Pelanggaran</th>
                                                    <th>Jenis</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_jenispelanggaran ORDER BY jenis_kendaraan");
                                                $row_count = mysqli_num_rows($query);
                                                $number = 1;
                                                if ($row_count == 0) {
                                                ?>
                                                    <tr>
                                                        <td colspan="5">
                                                            <h3 style="color:red;text-align:center">No record found</h3>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $number++; ?></td>
                                                            <td><?= htmlspecialchars($row['jenis_pelanggaran']); ?></td>
                                                            <td><?= htmlentities($row['jenis_kendaraan']); ?></td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <a href="pelanggaran-edit?id=<?= $row['id_pelanggaran'] ?>" class="mr-1">
                                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                            <i class="zmdi zmdi-edit"></i>
                                                                        </button>
                                                                    </a>
                                                                    <a href="pelanggaran-delete?id=<?= $row['id_pelanggaran'] ?>" class="mr-1">
                                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="zmdi zmdi-delete"></i>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE-->
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