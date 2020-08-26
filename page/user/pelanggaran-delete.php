<?php


$id = $_GET["id"];

include '../../model/user/function_jenispelanggaran.php';

if (hapus($id) > 0) {
	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = 'pelanggaran-manage';
		</script>
		";
} else {
	echo "		
		<script>
			alert('data gagal di hapus!');
			document.location.href = 'pelanggaran-manage';
		</script>
		";
}
