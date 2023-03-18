<?php

require_once "../../settings/config.php";
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["button"])) {
    $player = new Player();
    $player->constructorCreate(
        trim($_POST["email"]),
        trim($_POST["nickName"]),
        $_POST["password"],
    );
    $player->save();
    
    header("location: ../login/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../assets/images/olifx_logo.png" type="image/png">
  <title>Ultimate Pokémon | Criar conta</title>
  <link rel="stylesheet" href="new.css">
</head>
<body>
    <section class="form">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <h1 class="title-in-box">Criar Conta</h1>

            <label for="fullname">Nickname</label>
            <input type="text" name="nickName" id="nickName" required>

            <label for="email">E-Mail</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Create" name="button">
        </form>
    </section>
</body>
</html>
