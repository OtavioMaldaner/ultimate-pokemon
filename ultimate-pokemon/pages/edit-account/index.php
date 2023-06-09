<?php
require_once "../../settings/config.php";
session_start();
if (isset($_SESSION['idPlayer'])) {
    $player = Player::find($_SESSION['idPlayer']);
    if (isset($_POST["button"])) {

        $player->setNickName(trim($_POST['nickName']));
        $player->setEmail(trim($_POST['email']));

        if ($player->save()) {
            header('location: ../home');
        } else {
            echo "<script>alert('Ocorreu um erro ao editar o seu perfil');</script>";
        };
    }
} else {
    header("location: ../login");
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../home/style.css">

    <link rel="stylesheet" href="style.css">
    <title>Editar conta</title>

</head>

<body>
<div class="edit-account-util">
    <div class="edit-account">
        <h1 class="titulo">Editar conta</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">

            <label for="nickName">Usuário:</label>
            <input type="text" name="nickName" id="nickName" value="<?php echo $player->getNickName() ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?php echo $player->getEmail() ?>" required>

            <a class="go-home" href="../home">Voltar para a tela inicial</a>

            <input type="submit" value="Editar" class="botao" name="button">
        </form>
    </div>
</div>
</body>

</html>