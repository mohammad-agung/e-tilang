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

    $jenis_kendaraan = htmlspecialchars($data["jeniskendaraan"]);
    $jenis = htmlspecialchars($data["jenis"]);

    $query = "INSERT INTO tbl_jeniskendaraan VALUES('', '$jenis_kendaraan', '$jenis')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $jenis_kendaraan = htmlspecialchars($data["jeniskendaraan"]);
    $jenis = htmlspecialchars($data["jenis"]);


    // query insert data
    $query = "UPDATE tbl_jeniskendaraan SET
				jeniskendaraan = '$jenis_kendaraan',
				jenis = '$jenis'
			WHERE id_kendaraan = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_jeniskendaraan WHERE id_kendaraan = $id");
    return mysqli_affected_rows($conn);
}
