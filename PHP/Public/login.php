<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/style.css">

    <?php include("../librerie.php");
    ?>

</head>
<body style="background-color: #1d814a;">

    <div class="login">
        <img src="../../CSS/logo-flora-fauna.png" class="logologin">

        <form action="authenticate.php" method="post">
            <label for="username" style="margin-top: 3px;">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>