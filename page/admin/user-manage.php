<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../controller/config.php';
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
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama User</th>
                                                    <th>Username</th>
                                                    <th>Kesatuan</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $queryUser = mysqli_query($conn, "SELECT tbl_user.id_user,tbl_user.nama_user,tbl_user.username,tbl_user.id_kesatuan,tbl_user.status,tbl_kesatuan.nama_kesatuan from tbl_user INNER JOIN tbl_kesatuan ON tbl_user.id_kesatuan=tbl_kesatuan.id_kesatuan where tbl_user.level='user' ORDER BY tbl_user.id_kesatuan");
                                                $row_count_user = mysqli_num_rows($queryUser);
                                                $numberUser = 1;
                                                if ($row_count_user == 0) {
                                                ?>
                                                    <tr>
                                                        <td colspan="5">
                                                            <h3 style="color:red;text-align:center">No user found</h3>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    while ($rowUser = mysqli_fetch_array($queryUser)) { ?>
                                                        <tr>
                                                            <td><?= $numberUser++; ?></td>
                                                            <td><?= htmlentities($rowUser['nama_user']); ?></td>
                                                            <td><?= htmlentities($rowUser['username']); ?></td>
                                                            <td><?= htmlentities($rowUser['nama_kesatuan']); ?></td>
                                                            <?php if ($rowUser['status'] == 1) { ?>
                                                                <td class="process">Active</td>
                                                                <td>
                                                                    <div class="table-data-feature">
                                                                        <a href="user-edit?id=<?= $rowUser['id_user'] ?>" class="mr-1"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                                <i class="zmdi zmdi-edit"></i>
                                                                            </button></a>
                                                                        <a href="user-delete?id=<?= $rowUser['id_user'] ?>" class="mr-1"><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                                <i class="zmdi zmdi-delete"></i>
                                                                            </button></a>
                                                                        <a href="user-disactived?id=<?= $rowUser['id_user'] ?>"" class=" mr-1"><button class="item" data-toggle="tooltip" data-placement="top" title="Disactived">
                                                                                <i class="zmdi zmdi-power"></i>
                                                                            </button></a>
                                                                    </div>
                                                                </td>
                                                            <?php } else if ($rowUser['status'] == 2) { ?>
                                                                <td class="denied">Not Actived</td>
                                                                <td>
                                                                    <div class="table-data-feature">
                                                                        <a href="user-edit?id=<?= $rowUser['id_user'] ?>" class="mr-1"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                                <i class="zmdi zmdi-edit"></i>
                                                                            </button></a>
                                                                        <a href="user-delete?id=<?= $rowUser['id_user'] ?>" class="mr-1"><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                                <i class="zmdi zmdi-delete"></i>
                                                                            </button></a>
                                                                        <a href="user-actived?id=<?= $rowUser['id_user'] ?>"" class=" mr-1"><button class="item" data-toggle="tooltip" data-placement="top" title="Actived">
                                                                                <i class="zmdi zmdi-power"></i>
                                                                            </button></a>
                                                                    </div>
                                                                </td>
                                                            <?php } ?>
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