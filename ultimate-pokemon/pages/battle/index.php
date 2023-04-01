<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idPlayer"])) {
    header("location: ../login");
}

Player::refreshSession();

$opponents = Player::getOpponents();

if (isset($_GET['idOpponent'])) {
    Player::batalha(intval($_SESSION['idPlayer']), intval($_GET['idOpponent']));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Batalha</title>
</head>
<body>
    <div class="container">
    <div class="home-navbar">
            <div class="navbar-util">
                <div class="logo-area">

                </div>
                <div class="nav-fields">
                    <a class="nav-option" href="../battle">Batalha</a>
                    <a class="nav-option" href="../roleta">Adquirir pokémon</a>
                    <a class="nav-option" href="../edit-account">Editar conta</a>
                    <a class="nav-option" href="#">Pokédex</a>
                </div>
                <div class="logout-area">
                    <a href="../login/logout.php">
                        <img src="../../assets/logout.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="users-list-area">
            <h1 class="users-list-title">
                Usuários disponíveis para batalha
            </h1>
            <div class="users-list">
                <?php
                    foreach($opponents as $opponent) {
                        if (Wallet::verifyPlayerWallet($opponent->getIdPlayer())) {
                            echo "<a href=\"index.php?idOpponent={$opponent->getIdPlayer()}\">{$opponent->getNickName()}</a>";
                        } else {
                            continue;
                        }
                    }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>