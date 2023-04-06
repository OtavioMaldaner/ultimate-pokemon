<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idPlayer"])) {
    header("location: ../login");
}

Player::refreshSession();

if (isset($_POST["save"])) {
    if ($_POST["save"] != "Salvar") {

        $idPokemon = Pokemon::findIdPokemonByName($_POST['save']);
        $temPokemon = Pokemon::verificaPokemonNaCarteira($idPokemon,$_SESSION['idPlayer']);
        if($temPokemon){
            header("location: ../login");
        }else{
            $transacao = new Wallet($_SESSION['idPlayer'], $idPokemon);
            $transacao->save();
        }
    } else {
        header("location: ../home/");
    }
    header("location: ../home/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Escanear Pokémon</title>
</head>

<body>

    <div class="container">
        <header>
            <nav>
                <div class="home-navbar">
                    <div class="navbar-util">

                        <a class="logo" href="/">Ultimate Pokémon</a>
                        <div class="mobile-menu">
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                        </div>
                        <ul class="nav-list">
                            <li><a class="nav-option" href="../home">Home</a></li>
                            <li><a class="nav-option" href="../battle">Batalha</a></li>
                            <li><a class="nav-option" href="../roleta">Adquirir pokémon</a></li>
                            <li><a class="nav-option" href="../edit-account">Editar conta</a></li>
                            <li><a class="nav-option" href="../IA_Pokemon">Escanear pokemon</a></li>
                        </ul>
                        <div class="logout-area">
                            <ul>
                                <li><a href="../login/logout.php">
                                    <img src="../../assets/logout.svg" alt="">
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="button scan-button" onclick="init()">Qual é esse Pokémon?</div>
        <div id="webcam-container"></div>
        <div id="label-container"></div>

        <form method="post" action="index.php">
            <input type="submit" value="Salvar" class="save-bnt button" name="save" />
        </form>

    </div>
    <script src="script.js"></script>
</body>

</html>