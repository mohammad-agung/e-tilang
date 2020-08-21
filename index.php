<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/login/style.css">
</head>

<body>

    <div class="container">
        <h1 class="title-container">Account Login</h1>
        <form action="controller/login.php" method="POST" class="form-container">
            <div class="input-grup">
                <label for="username">username</label>
                <input type="text" name="username" class="form-input">
            </div>
            <div class="input-grup">
                <label for="password">password</label>
                <input type="password" name="password" class="form-input">
            </div>
            <div class="input-grup">
                <input type="submit" name="login" class="btn" value="LOGIN">
            </div>
        </form>
    </div>

</body>

</html>