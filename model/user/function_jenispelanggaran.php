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

    $jenis_pelanggaran = htmlspecialchars($data["jenispelanggaran"]);
    $jenis = htmlspecialchars($data["jenis"]);

    $query = "INSERT INTO tbl_jenispelanggaran VALUES('', '$jenis_pelanggaran', '$jenis')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $jenis_pelanggaran = htmlspecialchars($data["jenispelanggaran"]);
    $jenis = htmlspecialchars($data["jenis"]);


    // query insert data
    $query = "UPDATE tbl_jenispelanggaran SET
				jenis_pelanggaran = '$jenis_pelanggaran',
				jenis_kendaraan = '$jenis'
			WHERE id_pelanggaran = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_jenispelanggaran WHERE id_pelanggaran = $id");
    return mysqli_affected_rows($conn);
}
