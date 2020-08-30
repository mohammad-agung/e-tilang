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
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">Form Manage Data
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">View Data Grafik</h3>
                                            </div>
                                            <hr>
                                            <form method="post" class="form-horizontal">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="tahun" class=" form-control-label">Data Pelanggaran</label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <select name="tahun" id="tahun" class="form-control">
                                                            <?php
                                                            for ($i = date('Y'); $i >= date('Y') - 15; $i -= 1) {
                                                                echo "<option value='$i'> $i </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="kesatuan" class=" form-control-label">Kesatuan</label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <select name="kesatuan" id="kesatuan" class="form-control">
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * from tbl_kesatuan where status=1");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <option value="<?= htmlentities($row['nama_kesatuan']); ?>"><?= htmlentities($row['nama_kesatuan']); ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-actions form-group mt-4">
                                                    <div class="col-2">
                                                        <button type="button" class="btn btn-success btn-sm button" id="viewdata">View Data</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="data-grafik"></div>
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
        <script>
            $('#tahun').change(function() {
                $('#data-grafik').html("");
            });

            $('#kesatuan').change(function() {
                $('#data-grafik').html("");
            })

            $('#viewdata').click(function() {
                let date = $('#tahun').val();
                let kesatuan = $('#kesatuan').val();
                console.log(date);
                console.log(kesatuan);

                getData(date);

                function getData(data) {
                    $.ajax({
                        type: "POST",
                        url: "../../model/chart_data/dataallchart.php",
                        data: `date=${data}&kesatuan=${kesatuan}`,
                        success: function(data) {
                            $('#data-grafik').html(data);
                        }
                    })
                }
            });
        </script>
    <?php
    include '../../view/footer.php';
} else {
    header('Location: ../');
} ?>