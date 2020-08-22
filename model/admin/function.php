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

    $nama_kesatuan = htmlspecialchars($data["namaKesatuan"]);
    $alamat_kesatuan = htmlspecialchars($data["alamatKesatuan"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO tbl_kesatuan VALUES('', '$nama_kesatuan', '$alamat_kesatuan', '', '$status')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
