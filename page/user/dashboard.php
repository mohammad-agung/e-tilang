<?php
session_start();
if ($_SESSION['level'] == 'admin') {
    header('Location: ../');
    exit;
} else if ($_SESSION['level'] == 'user') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard User</title>
    </head>

    <body>
        <h1>User</h1>
        <a href="../../controller/logout.php">Logout</a>
    </body>

    </html>
<?php } else {
    header('Location: ../');
} ?>