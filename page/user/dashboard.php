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
                                                    <h2><?php
                                                        $kesatuan = $_SESSION['kesatuan'];
                                                        $query =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4 WHERE nama_kesatuan='$kesatuan'");
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

                                                        $queryDua =  mysqli_query($conn, "SELECT SUM(Helm_teguran) AS helmteguran, SUM(Helm_tilang) AS helmtilang, SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(boncenganlebih_tilang) AS boncenganlebihtilang, SUM(boncenganlebih_teguran) AS boncenganlebihteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(lampuutama_tilang) AS lampuutamatilang, SUM(lampuutama_teguran) AS lampuutamateguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r2r3 WHERE nama_kesatuan='$kesatuan'");
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

                                                        // total keseluruhan
                                                        echo $jumlah_total_pelanggaran = array_sum($total) + array_sum($totalDua);
                                                        ?></h2>
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
                                                    $query_user = mysqli_query($conn, "SELECT tbl_user.level,tbl_user.id_kesatuan,tbl_kesatuan.nama_kesatuan from tbl_user INNER JOIN tbl_kesatuan ON tbl_user.id_kesatuan = tbl_kesatuan.id_kesatuan WHERE tbl_user.level = 'user' AND tbl_kesatuan.nama_kesatuan = '$kesatuan'");
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