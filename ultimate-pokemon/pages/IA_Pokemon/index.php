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
        <div class="home-navbar">
            <div class="navbar-util">
                <div class="logo-area">

                </div>
                <div class="nav-fields">
                    <a class="nav-option" href="../home">Home</a>
                    <a class="nav-option" href="../battle">Batalha</a>
                    <a class="nav-option" href="../roleta">Adquirir pokémon</a>
                    <a class="nav-option" href="../edit-account">Editar conta</a>
                    <a class="nav-option" href="../IA_Pokemon">Scannear pokemon</a>
                </div>
                <div class="logout-area">
                    <a href="../login/logout.php">
                        <img src="../../assets/logout.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="button scan-button" onclick="init()">Iniciar reconhecimento</div>
        <div class="img"></div>
        <div id="webcam-container"></div>
        <div id="label-container"></div>

        <form method="post" action="index.php">
            <input type="submit" value="Salvar" class="save-bnt button" name="save" />
        </form>

    </div>
    <script src="script.js"></script>
</body>

</html>