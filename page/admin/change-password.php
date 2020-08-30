<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../../page/user/dashboard');
    exit;
} else if ($_SESSION['level'] == 'admin') {
    include '../../view/header.php';
?>
    <title>Account Manage</title>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.password.value == "") {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.password.focus();
                return false;
            } else if (document.chngpwd.newpassword.value == "") {
                alert("New Password Filed is Empty !!");
                document.chngpwd.newpassword.focus();
                return false;
            } else if (document.chngpwd.retypepassword.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.retypepassword.focus();
                return false;
            } else if (document.chngpwd.newpassword.value != document.chngpwd.retypepassword.value) {
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
                                        <div class="card-header">Change Password</div>
                                        <div class="card-body card-block">
                                            <form action="../../model/change-password.php" name="chngpwd" method="POST" onSubmit="return valid();">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?= $_SESSION['login']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?= $_SESSION['session']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-asterisk"></i>
                                                        </div>
                                                        <input type="password" id="password" name="password" placeholder="Old Password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-asterisk"></i>
                                                        </div>
                                                        <input type="password" id="newpassword" name="newpassword" placeholder="New Password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-asterisk"></i>
                                                        </div>
                                                        <input type="password" id="retypepassword" name="retypepassword" placeholder="Retype Password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-actions form-group">
                                                    <button type="submit" class="btn btn-success btn-sm" name="submit">Submit</button>
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