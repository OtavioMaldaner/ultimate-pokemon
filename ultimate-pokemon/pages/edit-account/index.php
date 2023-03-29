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
    <div class="edit-account-container">
        <section class="edit-account-form">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <h1 class="edit-account-form-title">Editar conta</h1>

                <label for="name">Nickname</label>
                <input type="text" name="nickName" id="nickName" value="<?php echo $player->getNickName() ?>" required>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="<?php echo $player->getEmail() ?>" required>

                <input type="submit" value="Editar" name="button">
            </form>
        </section>
    </div>

    <script src="../home/main.js"></script>
</body>

</html>