<?php
require_once "../../settings/config.php";
session_start();
if (isset($_SESSION['idUser'])) {
    $player = Player::find($_SESSION['idUser']);
    if (isset($_POST["button"])) {
        $haveProfilePic = true;

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


$directory = "../../database/users/";


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

        <div class="dropdown" style="display: none">
            <a href="../edit-account/">Edite sua conta</a>
            <a href="../yours">Seus Pokémons</a>
            <a href="../login/logout.php">Logout</a>
        </div>
        
        <section class="edit-account-form">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <h1 class="edit-account-form-title">Editar conta</h1>

                <label for="name">Nickname</label>
                <input type="text" name="nickName" id="nickName" value="<?php echo $player->getNickName()?>" required>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="<?php echo $player->getEmail()?>" required>

                <input type="submit" value="Editar" name="button">
            </form>
        </section>

        <div class="bottom-navigation">

            <a href="../home">
                <div class="anchor">
                    <img src="../../assets/icons/home-o.png" alt="Home" class="home">
                </div>
            </a>

            <a href="../favorites">
                <div class="anchor">
                    <img src="../../assets/icons/star-o.png" alt="Home" class="home">
                </div>
            </a>

            <a href="../post">
                <div class="anchor">
                    <img src="../../assets/icons/new-o.png" alt="Home" class="home">
                </div>
            </a>
        </div>

        
    </div>

    <script src="../home/main.js"></script>
</body>
</html>