<?php
session_start();
include('./config.php');
// error_reporting(0);
if (isset($_POST['login'])) {
    // Getting username/ email and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT tbl_user.nama_user,tbl_user.password,tbl_user.username,tbl_user.status,tbl_user.level,tbl_kesatuan.nama_kesatuan FROM tbl_user INNER JOIN tbl_kesatuan ON tbl_user.id_kesatuan = tbl_kesatuan.id_kesatuan WHERE tbl_user.username='$username'");

    $num = mysqli_fetch_array($sql);

    if ($num > 0) {
        $status = $num['status'];

        if ($status == 1) {
            $hashpassword = $num['password']; // Hashed password fething from database

            //verifying Password
            if (password_verify($password, $hashpassword)) {
                $namauser = $num['nama_user'];
                $level = $num['level'];

                $_SESSION['login'] = $namauser;
                $_SESSION['level'] = $level;
                $_SESSION['session'] = $username;
                if ($level == 'admin') {
                    echo "<script>document.location = '../page/admin/'</script>";
                } else if ($level == 'user') {
                    $_SESSION['kesatuan'] = $num['nama_kesatuan'];
                    echo "<script>document.location = '../page/user/'</script>";
                } else {
                    echo "<script>alert('Gagal login');
                            document.location = '../login';
                            </script>";
                }
            } else {
                echo "<script>alert('Password Salah');
					document.location = '../';</script>";
            }
        } else {
            echo "<script>alert('username tidak aktif');
					document.location = '../';</script>";
        }
    } //if username or email not found in database
    else {
        echo "<script>alert('username tidak ada');
				document.location = '../';</script>";
    }
}
