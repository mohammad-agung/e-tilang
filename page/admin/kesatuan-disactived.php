<?php


$id = $_GET["id"];

include '../../model/admin/function_kesatuan.php';

if (disactived($id) > 0) {
    echo "
		<script>
			alert('data di non aktifkan !');
			document.location.href = 'kesatuan-manage';
		</script>
		";
} else {
    echo "		
		<script>
			alert('data gagal di non aktifkan!');
			document.location.href = 'kesatuan-manage';
		</script>
		";
}
