<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idPlayer"])) {
    header("location: ../login");
}

Player::refreshSession();

$pokemons_carteira = Wallet::getPlayerWallet($_SESSION['idPlayer']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/olifx_logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <title>Ultimate Pokémon | Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <div class="container">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    if (count($pokemons_carteira) > 0) {
                        foreach ($pokemons_carteira as $pokemons) {
                            $id = $pokemons->getIdPokemon();
                            $pokemon = Pokemon::find($id);

                            echo "<div class=\"swiper-slide\">";
                            echo "<h2 class=\"pokemon-type\">".$pokemon->getTipo()."</h2>";
                            echo "<h1 class=\"pokemon-name\">".$pokemon->getNome()."</h1>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</html>