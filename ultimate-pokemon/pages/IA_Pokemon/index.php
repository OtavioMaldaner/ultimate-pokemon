<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idPlayer"])) {
    header("location: ../login");
}

Player::refreshSession();

if (isset($_POST["save"])){
    if($_POST["save"] != "save"){
        $idPokemon = Pokemon::findIdPokemonByName($_POST['save']);
        $transacao = new Wallet($_SESSION['idPlayer'], $idPokemon);
        $transacao->save();
    }
    header("location: ../home/");
}




?>
<!DOCTYPE html>
<html lang="br">
<head>
    <title>Scanner pokemon</title>
</head>
<body>


 <button type="button" onclick="init()">Iniciar reconhecimento</button>
 <div id="webcam-container"></div>
 <div id="label-container"></div>

 <form method="post" action="index.php">
     <input type="submit" value="save" class="save-bnt"  name="save"/>

 </form>

 <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

<script src="script.js"></script>
 <a href="../home">Voltar para o Menu Inicial</a>

</body>
</html>