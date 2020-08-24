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

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama_kesatuan = htmlspecialchars($data["namaKesatuan"]);
    $alamat_kesatuan = htmlspecialchars($data["alamatKesatuan"]);


    // query insert data
    $query = "UPDATE tbl_kesatuan SET
				nama_kesatuan = '$nama_kesatuan',
				alamat = '$alamat_kesatuan'
			WHERE id_kesatuan = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_kesatuan WHERE id_kesatuan = $id");
    return mysqli_affected_rows($conn);
}

function disactived($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE tbl_kesatuan set status=0 where id_kesatuan='$id'");
    return mysqli_affected_rows($conn);
}

function actived($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE tbl_kesatuan set status=1 where id_kesatuan='$id'");
    return mysqli_affected_rows($conn);
}
