<?php


$id = $_GET["id"];

include '../../model/admin/function_kesatuan.php';

if (hapus($id) > 0) {
	echo "
		<script>
			alert('data berhasil di hapus!');
			document.location.href = 'kesatuan-manage';
		</script>
		";
} else {
	echo "		
		<script>
			alert('data gagal di hapus!');
			document.location.href = 'kesatuan-manage';
		</script>
		";
}
