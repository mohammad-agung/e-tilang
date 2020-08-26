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
                                <div class="col-sm-12 col-md-6">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-folder"></i>
                                                </div>
                                                <div class="text">
                                                    <h2>1,368</h2>
                                                    <span>Jumlah Data Pelanggaran</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-circle"></i>
                                                </div>
                                                <div class="text">
                                                    <?php
                                                    $kesatuan = $_SESSION['kesatuan'];
                                                    $query_user = mysqli_query($conn, "SELECT * from tbl_user where level='user' AND nama_kesatuan='$kesatuan'");
                                                    $count_user = mysqli_num_rows($query_user);
                                                    ?>
                                                    <h2><?= htmlentities($count_user); ?></h2>
                                                    <span>Jumlah User</span>
                                                </div>
                                            </div>
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