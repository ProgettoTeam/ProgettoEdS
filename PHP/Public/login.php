<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>

        <?php include ("../librerie.php")?>
        </head>
	<body style="background-color: #1d814a;-webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;box-sizing: border-box;font-family:Roboto;"> 
		<div class="login">
			<img src="../../CSS/logo-flora-fauna.png" class="logologin">
			<form action="authenticate.php" method="post">
				<label for="username">
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