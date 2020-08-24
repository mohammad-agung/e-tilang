<?php


$id = $_GET["id"];

include '../../model/admin/function_kesatuan.php';

if (actived($id) > 0) {
    echo "
		<script>
			alert('data di aktifkan!');
			document.location.href = 'kesatuan-manage';
		</script>
		";
} else {
    echo "		
		<script>
			alert('data gagal di aktivkan!');
			document.location.href = 'kesatuan-manage';
		</script>
		";
}
