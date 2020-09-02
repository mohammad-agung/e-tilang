<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../model/admin/function_user.php';
    if (isset($_POST["submit"])) {

        //cek imk
        if (tambah($_POST) > 0) {
            echo "
        <script>
            alert('User berhasil ditambahkan');
            document.location.href = 'user-add';
        </script>";
        } else {
            echo "
        <script>
            alert('Username sudah terdaftar, User Gagal ditambahkan');
            document.location.href = 'user-add';
        </script>";
        }
    }
    include '../../view/header.php';
?>
    <title>Dashboard Admin</title>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.password.value == "") {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.password.focus();
                return false;
            } else if (document.chngpwd.retypepassword.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.retypepassword.focus();
                return false;
            } else if (document.chngpwd.password.value != document.chngpwd.retypepassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.retypepassword.focus();
                return false;
            }
            return true;
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
                                        <div class="card-header">Form Manage User
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Add User</h3>
                                            </div>
                                            <hr>
                                            <form method="post" class="form-horizontal" onSubmit="return valid();" name="chngpwd">
                                                <input type="hidden" name="level" value="user">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="namauser" class=" form-control-label">Nama User</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="namauser" name="namaUser" placeholder="nama user" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="username" class=" form-control-label">Username</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="username" name="username" placeholder="username" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password" class=" form-control-label">Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="password" name="password" placeholder="password" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="retypepassword" class="form-control-label">Retype Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="retypepassword" name="retypePassword" placeholder="Retype Password" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="kesatuan" class=" form-control-label">Kesatuan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="kesatuan" id="kesatuan" class="form-control" required>
                                                            <option value="0">Please select</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * from tbl_kesatuan where status=1");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <option value="<?= htmlentities($row['id_kesatuan']); ?>"><?= htmlentities($row['nama_kesatuan']); ?></option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="status" class=" form-control-label">Status</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="0">Please select</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-actions form-group mt-4">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-success btn-lg button" name="submit">Submit</button>
                                                    </div>
                                                </div>
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
    <?php
    include '../../view/footer.php';
} else {
    header('Location: ../');
} ?>