<?php
session_start();
if ($_SESSION['level'] == 'user') {
    header('Location: ../');
    exit;
} else if ($_SESSION['level'] == 'admin') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>
    </head>

    <body>
        <h1>Admin</h1>
        <a href="../../controller/logout.php">Logout</a>
    </body>

    </html>
<?php } else {
    header('Location: ../');
} ?>