<?php


$id = $_GET["id"];

include '../../model/admin/function_user.php';

if (disactived($id) > 0) {
    echo "
		<script>
			alert('user di non aktifkan !');
			document.location.href = 'user-manage';
		</script>
		";
} else {
    echo "		
		<script>
			alert('user gagal di non aktifkan!');
			document.location.href = 'user-manage';
		</script>
		";
}
