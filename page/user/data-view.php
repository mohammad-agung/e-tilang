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
    <script type="text/javascript" src="../../assets/datepicker/moment.min.js"></script>
    <script type="text/javascript" src="../../assets/datepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/datepicker/daterangepicker.css" />
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
                                        <div class="card-header">Form Manage Data
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">View Data</h3>
                                            </div>
                                            <hr>
                                            <form method="post" class="form-horizontal">
                                                <input type="hidden" name="namakesatuan" value="<?= $_SESSION['kesatuan']; ?>">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="datapelanggaran" class=" form-control-label">Data Pelanggaran</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="datapelanggaran" id="datapelanggaran" class="form-control">
                                                            <option value="" disabled selected>Choose Select</option>
                                                            <option value="opsi_rodadua">Dari Jenis Roda Dua / Roda Tiga</option>
                                                            <option value="opsi_rodaempat">Dari Jenis Roda Empat</option>
                                                            <option value="opsi_jeniskendaraan">Dari Jenis Kendaraan</option>
                                                            <option value="opsi_golonganusia">Dari Golongan Usia</option>
                                                            <option value="opsi_semuadata">Semua Data</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label class=" form-control-label">Pilih Tanggal</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                            <i class="fa fa-calendar"></i>&nbsp;
                                                            <span></span> <i class="fa fa-caret-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
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
                            <div id="data-body"></div>
                            <?php include '../../view/copyright.php'; ?>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>
        </div>
        <script type="text/javascript">
            $(function() {

                var start = moment().subtract(29, 'days');
                var end = moment();

                function cb(start, end) {
                    $('#reportrange span').html(start.format('YYYY-MM-DD') + "' and '" + end.format('YYYY-MM-DD'));
                }

                $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, cb);

                cb(start, end);

            });

            $('#viewdata').click(function() {
                let opsi = $('select[name="datapelanggaran"]').val();
                console.log(opsi);

                if (opsi == 'opsi_rodadua') {
                    let date = $('#reportrange span').html();

                    getData(date);

                    function getData(data) {
                        $.ajax({
                            type: "POST",
                            url: "data-viewroda_duatiga.php",
                            data: `date=${data}`,
                            success: function(data) {
                                $('#data-body').html(data);
                            }
                        })
                    }
                } else {
                    alert('lengkapi data');
                    $('#datapelanggaran').focus();
                }
            })
        </script>
    <?php
    include '../../view/footer.php';
} else {
    header('Location: ../');
} ?>