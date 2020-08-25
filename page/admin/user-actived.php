<?php


$id = $_GET["id"];

include '../../model/admin/function_user.php';

if (actived($id) > 0) {
    echo "
		<script>
			alert('User di aktifkan!');
			document.location.href = 'user-manage';
		</script>
		";
} else {
    echo "		
		<script>
			alert('User gagal di aktivkan!');
			document.location.href = 'user-manage';
		</script>
		";
}
