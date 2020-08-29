<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../controller/config.php';
    $query =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4");
    while ($row = mysqli_fetch_array($query)) {
        $kecepatantilang  = intval($row['kecepatantilang']);
        $kecepatanteguran = intval($row['kecepatanteguran']);
        $kelengkapantilang = intval($row['kelengkapantilang']);
        $kelengkapanteguran = intval($row['kelengkapanteguran']);
        $surat_surattilang = intval($row['surat_surattilang']);
        $surat_suratteguran = intval($row['surat_suratteguran']);
        $muatantilang = intval($row['muatantilang']);
        $muatanteguran = intval($row['muatanteguran']);
        $markarambutilang = intval($row['markarambutilang']);
        $markarambuteguran = intval($row['markarambuteguran']);
        $melawanarustilang = intval($row['melawanarustilang']);
        $melawanarusteguran = intval($row['melawanarusteguran']);
        $sabukeselamatantilang = intval($row['sabukeselamatantilang']);
        $sabukeselamatanteguran = intval($row['sabukeselamatanteguran']);
        $gunakanhptilang = intval($row['gunakanhptilang']);
        $gunakanhpteguran = intval($row['gunakanhpteguran']);
        $lain_laintilang = intval($row['lain_laintilang']);
        $lain_lainteguran = intval($row['lain_lainteguran']);
    }

    $queryDua =  mysqli_query($conn, "SELECT SUM(Helm_teguran) AS helmteguran, SUM(Helm_tilang) AS helmtilang, SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(boncenganlebih_tilang) AS boncenganlebihtilang, SUM(boncenganlebih_teguran) AS boncenganlebihteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(lampuutama_tilang) AS lampuutamatilang, SUM(lampuutama_teguran) AS lampuutamateguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r2r3");
    while ($rowDua = mysqli_fetch_array($queryDua)) {
        $helmteguran = intval($rowDua['helmteguran']);
        $helmtilang = intval($rowDua['helmtilang']);
        $kecepatantilangdua  = intval($rowDua['kecepatantilang']);
        $kecepatantegurandua = intval($rowDua['kecepatanteguran']);
        $kelengkapantilangdua = intval($rowDua['kelengkapantilang']);
        $kelengkapantegurandua = intval($rowDua['kelengkapanteguran']);
        $surat_surattilangdua = intval($rowDua['surat_surattilang']);
        $surat_surattegurandua = intval($rowDua['surat_suratteguran']);
        $boncenganlebihtilangdua = intval($rowDua['boncenganlebihtilang']);
        $boncenganlebihtegurandua = intval($rowDua['boncenganlebihteguran']);
        $markarambutilangdua = intval($rowDua['markarambutilang']);
        $markarambutegurandua = intval($rowDua['markarambuteguran']);
        $melawanarustilangdua = intval($rowDua['melawanarustilang']);
        $melawanarustegurandua = intval($rowDua['melawanarusteguran']);
        $lampuutamatilangdua = intval($rowDua['lampuutamatilang']);
        $lampuutamategurandua = intval($rowDua['lampuutamateguran']);
        $gunakanhptilangdua = intval($rowDua['gunakanhptilang']);
        $gunakanhptegurandua = intval($rowDua['gunakanhpteguran']);
        $lain_laintilangdua = intval($rowDua['lain_laintilang']);
        $lain_laintegurandua = intval($rowDua['lain_lainteguran']);
    }
    $total[] =  $kecepatantilang + $kelengkapantilang + $surat_surattilang + $muatantilang + $markarambutilang + $melawanarustilang +  $sabukeselamatantilang + $gunakanhptilang + $lain_laintilang;

    $total[] = $helmteguran +  $kecepatantegurandua +  $kelengkapantegurandua  + $surat_surattegurandua  + $boncenganlebihtegurandua +  $markarambutegurandua + $melawanarustegurandua  + $lampuutamategurandua + $gunakanhptegurandua + $lain_laintegurandua;

    $totalDua[] = $helmtilang + $kecepatantilangdua + $kelengkapantilangdua + $surat_surattilangdua + $boncenganlebihtilangdua + $markarambutilangdua + $melawanarustilangdua +  $lampuutamatilangdua + $gunakanhptilangdua + $lain_laintilangdua;

    $totalDua[] =  $kecepatanteguran +  $kelengkapanteguran  + $surat_suratteguran  + $muatanteguran +  $markarambuteguran + $melawanarusteguran  + $sabukeselamatanteguran + $gunakanhpteguran + $lain_lainteguran;

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
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-folder"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?= $total[0] + $totalDua[0]; ?></h2>
                                                    <span>Jumlah Tilang</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-folder"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?= $total[1] + $totalDua[1]; ?></h2>
                                                    <span>Jumlah Teguran</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-folder-person"></i>
                                                </div>
                                                <div class="text">
                                                    <?php $query_kesatuan = mysqli_query($conn, "SELECT * from tbl_kesatuan where status=1");
                                                    $count_kesatuan = mysqli_num_rows($query_kesatuan);
                                                    ?>
                                                    <h2><?= htmlentities($count_kesatuan); ?></h2>
                                                    <span>Jumlah Kesatuan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-circle"></i>
                                                </div>
                                                <div class="text">
                                                    <?php $query_user = mysqli_query($conn, "SELECT * from tbl_user where level='user'");
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