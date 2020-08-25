<?php


$id = $_GET["id"];

include '../../model/admin/function_user.php';

if (hapus($id) > 0) {
    echo "
		<script>
			alert('User berhasil di hapus!');
			document.location.href = 'user-manage';
		</script>
		";
} else {
    echo "		
		<script>
			alert('User gagal di hapus!');
			document.location.href = 'user-manage';
		</script>
		";
}
