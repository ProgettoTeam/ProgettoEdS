<?php include('../DAL.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/style.css">

    <?php include("../Librerie.php");
    ?>

</head>
<body style="background-color: #1d814a;">

    <div class="login">
        <img src="../../Css/logo-flora-fauna.png" class="logologin">

        <form action="Login.php" method="POST">
            <?php include('../Errors.php'); ?>
            <label for="username" style="margin-top: 3px;">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="email" placeholder="Email" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </div>

</body>
</html>