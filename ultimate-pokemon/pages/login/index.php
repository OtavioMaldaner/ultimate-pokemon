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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../assets/images/olifx_logo.png" type="image/png">
  <link rel="stylesheet" href="login.css">
  <title>Ultimate Pokemon | Login</title>
</head>
<body>
    <section class="form">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <h1 class="title-in-box">Login</h1>

            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>

            <a class="link-centered-orange" href="../new">Crie sua conta aqui</a>
            <input type="submit" value="Login" name="button">
        </form>
    </section>
</body>
</html>