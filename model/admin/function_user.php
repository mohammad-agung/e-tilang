<?php

require '../../controller/config.php';

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama_user = htmlspecialchars($data["namaUser"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $hashedpass = password_hash($password, PASSWORD_DEFAULT);
    $level = htmlspecialchars($data["level"]);
    $status = htmlspecialchars($data["status"]);

    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s', time());

    if ($status == 0) {
        $status = 2;
    }

    $cekUsername = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$username'");
    if (mysqli_num_rows($cekUsername) > 0) {
        return 0;
    } else {
        $kesatuan = htmlspecialchars($data["kesatuan"]);
        $query = "INSERT INTO tbl_user VALUES('', '$nama_user', '$username', '$hashedpass', '$level', '$kesatuan', '$currentTime', '$currentTime', '$status')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama_user = htmlspecialchars($data["namaUser"]);
    $username = htmlspecialchars($data["username"]);
    $level = htmlspecialchars($data["level"]);

    $kesatuan = htmlspecialchars($data["kesatuan"]); // query insert data
    $query = "UPDATE tbl_user SET
                        nama_user = '$nama_user',
                        username = '$username',
                        nama_kesatuan = '$kesatuan',
                        level = '$level'
                    WHERE id_user = $id
                    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_user WHERE id_user = $id");
    return mysqli_affected_rows($conn);
}

function disactived($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE tbl_user set status=2 where id_user='$id'");
    return mysqli_affected_rows($conn);
}


function actived($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE tbl_user set status=1 where id_user='$id'");
    return mysqli_affected_rows($conn);
}
