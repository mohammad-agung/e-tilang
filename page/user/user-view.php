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
                                                    <th>Nama User</th>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Kesatuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $kesatuan = $_SESSION['kesatuan'];
                                                $query = mysqli_query($conn, "SELECT tbl_user.nama_user,tbl_user.username,tbl_user.id_kesatuan,tbl_user.status,tbl_kesatuan.nama_kesatuan from tbl_user INNER JOIN tbl_kesatuan ON tbl_user.id_kesatuan =  tbl_kesatuan.id_kesatuan where tbl_kesatuan.nama_kesatuan='$kesatuan' ORDER BY tbl_user.status");
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
                                                            <td><?= htmlspecialchars($row['nama_user']); ?></td>
                                                            <td><?= htmlentities($row['username']); ?></td>
                                                            <?php if ($row['status'] == 1) { ?>
                                                                <td class="process">Active</td>
                                                            <?php } else if ($row['status'] == 2) { ?>
                                                                <td class="denied">Not Actived</td>
                                                            <?php } ?>
                                                            <td><?= $kesatuan; ?></td>
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