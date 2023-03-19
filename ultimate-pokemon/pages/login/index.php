<?php

require_once __DIR__."/../../settings/config.php";

if (isset($_POST["button"])) {
    $player = new Player();
    $player->constructLogin($_POST["email"], $_POST["password"]);
    
    if ($player->authenticate()) {
        header("location: ../home");
    } else {
        header("location: index.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ultimate Pokémon | Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login-util">
		<div class="login">
			<h1 class="titulo">Ultimate Pokémon</h1>
			<form action="index.php" method="post" enctype="multipart/form-data">

				<label for="usuario">Usuário:</label>
				<input type="email" name="email" id="email" required>

				<label for="senha">Senha:</label>
				<input type="password" name="password" id="password" required>

				<a class="create-account" href="../new">Crie sua conta aqui</a>

            	<input type="submit" value="Login" class="botao" name="button">
			</form>
		</div>
	</div>
</body>
</html>