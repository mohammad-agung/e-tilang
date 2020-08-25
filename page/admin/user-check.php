<?php
require_once("../../controller/config.php");


if (!empty($_POST["username"])) {
    $username = htmlspecialchars($_POST['username']);
    $query = mysqli_query($conn, "SELECT * FROM tbl_user where username='$username'");
    $user_count = mysqli_num_rows($query);
    if ($user_count > 0) {
        echo "<span class='help-block' style='color:red;' id='usercheck'>Username Not Available</span>";
    } else {
        echo "<span class='help-block' style='color:green;' id='usercheck'>Username Available</span>";
    }
}
