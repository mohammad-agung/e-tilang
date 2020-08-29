<?php
if (isset($_POST["datarodadua"])) {

    //cek imk
    if (tambahDataRodaDua($_POST) > 0) {
        echo "
    <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'data-add';
    </script>";
    } else {
        echo "
    <script>
        alert('Data Gagal ditambahkan');
        document.location.href = 'data-add';
    </script>";
    }
}

if (isset($_POST["datarodaempat"])) {

    //cek imk
    if (tambahDataRodaEmpat($_POST) > 0) {
        echo "
    <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'data-add';
    </script>";
    } else {
        echo "
    <script>
        alert('Data Gagal ditambahkan');
        document.location.href = 'data-add';
    </script>";
    }
}

if (isset($_POST["datarodaduaedit"])) {

    //cek imk
    if (editDataRodaDua($_POST) > 0) {
        echo "
    <script>
        alert('Data berhasil diubah');
        document.location.href = 'data-add';
    </script>";
    } else {
        echo "
    <script>
        alert('Data Gagal diubah');
        document.location.href = 'data-add';
    </script>";
    }
}

if (isset($_POST["datarodaempatedit"])) {

    //cek imk
    if (editDataRodaEmpat($_POST) > 0) {
        echo "
    <script>
        alert('Data berhasil diubah');
        document.location.href = 'data-add';
    </script>";
    } else {
        echo "
    <script>
        alert('Data Gagal diubah');
        document.location.href = 'data-add';
    </script>";
    }
}
