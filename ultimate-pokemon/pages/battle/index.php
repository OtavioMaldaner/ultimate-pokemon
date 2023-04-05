<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idPlayer"])) {
    header("location: ../login");
}

Player::refreshSession();

$opponents = Player::getOpponents();

$pokemons_carteira = Wallet::getPlayerWallet($_SESSION['idPlayer']);

//if (isset($_GET['idOpponent'])) {
//    $vencedor = Player::batalha(intval($_SESSION['idPlayer']), intval($_GET['idOpponent']));
//    $player_vencedor = Player::find($vencedor);
//    var_dump($player_vencedor);
//}
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
        <div class="users-list-area">
            <div class="users-list">
                <?php
                if (count($pokemons_carteira) != 0) {
                    if (isset($_GET['idOpponent'])) {
                        $vencedor = Player::batalha(intval($_SESSION['idPlayer']), intval($_GET['idOpponent']));
                        $player_vencedor = Player::find($vencedor);
                        echo "<h1 class='users-list-title'> O player vencedor foi {$player_vencedor->getNickName()} </h1>";
                        echo "<h1 class=\"user-deck\">Pokémons do adversário:</h1>";
                        ?>
                <div class="pokemonsAdversarios">
                    <?php
                        $opponentPokemons = Wallet::getPlayerWallet(intval($_GET['idOpponent']));
                        foreach ($opponentPokemons as $pokemon) {
                            $id = $pokemon->getIdPokemon();
                            $pokemon = Pokemon::find($id);
                            $img = Media::findMediaByPokemon($id);
                            echo "<img src=\"../../database/media/{$img->getPath()}\" alt=\"Default icon\" class='pokemonImg'>";
                            
                        }

                        ?>
                </div>
                <?php
                        echo "<a href='index.php'>Batalhar novamente</a>";
                    } else {
                        echo "<h1 class='users-list-title'>Usuários disponíveis para batalha</h1>";

                        foreach ($opponents as $opponent) {
                            if (Wallet::verifyPlayerWallet($opponent->getIdPlayer())) {
                                echo "<a href=\"index.php?idOpponent={$opponent->getIdPlayer()}\">{$opponent->getNickName()}</a>";
                            } else {
                                continue;
                            }
                        }
                    }
                }else{
                    echo "<h3 class='no-pokemons'>Você ainda não possui nenhum Pokémon!</h3>";
                    echo "<a href='../roleta' class='add-pokemon'>Adicione um Pokémon à sua Pokédex</a>";

                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>