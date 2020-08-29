<?php
session_start();
if ($_SESSION['level'] == 'admin') {
    header('Location: ../../page/admin/dashboard');
    exit;
} else if ($_SESSION['level'] == 'user') {
    include '../../model/user/function_data.php';
    include '../../model/user/function_kirimdata.php';
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
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">Form Manage Data
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Add Data</h3>
                                            </div>
                                            <hr>
                                            <form method="post" class="form-horizontal">
                                                <input type="hidden" name="namakesatuan" value="<?= $_SESSION['kesatuan']; ?>">
                                                <div class="row form-group">
                                                    <div class="col-md-3">
                                                        <label for="date" class=" form-control-label">Tanggal</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="date" id="date" name="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="golonganusia" class=" form-control-label">Golongan Usia</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="golonganusia" id="golonganusia" class="form-control">
                                                            <option value="kurangdari17">Kurang Dari 17</option>
                                                            <option value="17sampai25">17 - 25</option>
                                                            <option value="26sampai45">26 - 45</option>
                                                            <option value="46sampai65">46 - 65</option>
                                                            <option value="lebihdari65">Lebih dari 65</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="jeniskendaraan" class=" form-control-label">Jenis Kendaraan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="jeniskendaraan" id="jeniskendaraan" class="form-control">
                                                            <option value="rodadua">Roda Dua</option>
                                                            <option value="rodatiga">Roda Tiga</option>
                                                            <option value="rodaempat">Roda Empat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-actions form-group mt-4">
                                                    <div class="col-2">
                                                        <button type="button" class="btn btn-success btn-sm button" id="cekdata">Cek Data</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="data-body"></div>
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
        <script>
            $('#cekdata').click(function() {
                let jeniskendaraan = $('#jeniskendaraan').val();

                let kesatuan = $('input[name="namakesatuan"]').val();
                console.log(kesatuan);

                if (jeniskendaraan == 'rodadua' || jeniskendaraan == 'rodatiga') {
                    let date = $('#date').val();
                    let golusia = $('#golonganusia').val();

                    const data = `date=${date}&golusia=${golusia}&jenisroda=${jeniskendaraan}&kesatuan=${kesatuan}`;

                    if (date == '') {
                        alert('lengkapi data');
                        $('#date').focus();
                    } else {
                        getData(data);

                    }

                    function getData(data) {
                        $.ajax({
                            type: "POST",
                            url: "../../model/user/function_getdatarodadua.php",
                            data: data,
                            success: function(data) {
                                $('#data-body').html(data);
                            }
                        })
                    }
                }

            })
        </script>
    <?php
    include '../../view/footer.php';
} else {
    header('Location: ../');
} ?>