<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../model/admin/function_user.php';

    $id = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * from tbl_user where id_user='$id'");

    if (isset($_POST["submit"])) {

        //cek imk
        if (ubah($_POST) > 0) {
            echo "
        <script>
            alert('User berhasil diubah');
            document.location.href = 'user-manage';
        </script>";
        } else {
            echo "
        <script>
            alert('User Gagal diubah');
            document.location.href = 'user-edit?id=$id';
        </script>";
        }
    }
    include '../../view/header.php';
?>
    <title>Dashboard Admin</title>
    <script>
        function checkAvailability() {
            jQuery.ajax({
                url: "user-check.php",
                data: 'username=' + $("#username").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    let check = $('#usercheck').html();
                    console.log(check);
                    if (check == 'Username Not Available') {
                        $('#onSubmit').attr('disabled', '');
                    } else if (check == 'Username Available') {
                        $('#onSubmit').removeAttr('disabled', '');
                    }
                },
                error: function() {}
            });
        }
    </script>
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
                                                <form method="post" class="form-horizontal" name="chngpwd" onSubmit="return valid();">
                                                    <input type="hidden" name="id" value="<?= htmlentities($row['id_user']); ?>">
                                                    <input type="hidden" name="level" value="<?= htmlentities($row['level']); ?>">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="namauser" class=" form-control-label">Nama User</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="namauser" name="namaUser" placeholder="nama user" class="form-control" value="<?= htmlentities($row['nama_user']); ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="username" class=" form-control-label">Username</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="username" name="username" placeholder="username" class="form-control" value="<?= htmlentities($row['username']); ?>" onBlur="checkAvailability()" required>
                                                            <div id="user-availability-status"></div>
                                                        </div>
                                                    </div>
                                                    <?php if ($row['level'] == 'user') { ?>
                                                        <div class=" row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="kesatuan" class=" form-control-label">Kesatuan</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="kesatuan" id="kesatuan" class="form-control">
                                                                    <option value="<?= htmlentities($row['nama_kesatuan']); ?>"><?= htmlentities($row['nama_kesatuan']); ?></option>
                                                                    <?php
                                                                    $query_kesatuan = mysqli_query($conn, "SELECT * from tbl_kesatuan where status=1");
                                                                    while ($row_kesatuan = mysqli_fetch_array($query_kesatuan)) {
                                                                    ?>
                                                                        <option value="<?= htmlentities($row_kesatuan['id_kesatuan']); ?>"><?= htmlentities($row_kesatuan['nama_kesatuan']); ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="row form-actions form-group mt-4">
                                                        <div class="col-lg-4 col-md-12 mt-2">
                                                            <button type="submit" class="btn btn-success btn-md button" name="submit" id="onSubmit">Edit</button>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 mt-2">
                                                            <a href="user-manage" style="width: 100%;">
                                                                <button type="button" class="btn btn-danger btn-md button">Kembali</button>
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