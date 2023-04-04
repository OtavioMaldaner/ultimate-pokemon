<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idPlayer"])) {
    header("location: ../login");
}

Player::refreshSession();

?>

<?php

$pokemons = array("Venusaur.png",
"Charizard.png",
"Blastoise.png",
"Butterfree.png",
"Beedrill.png",
"Pidgeot.png",
"Fearow.png",
"Arbok.png",
"Pikachu.png",
"Raichu.png",
"Ninetales.png",
"Vileplume.png",
"Golduck.png",
"Arcanine.png",
"Poliwrath.png",
"Alakazam.png",
"Machamp.png",
"Golem.png",
"Gengar.png",
"Onix.png",
"Rydhon.png",
"Magmar.png",
"Gyarados.png",
"Lapras.png",
"Ditto.png",
"Eevee.png",
"Vaporeon.png",
"Jolteon.png",
"Snorlax.png",
"Articuno.png",
"Zapdos.png",
"Moltres.png",
"Dragonite.png",
"Mewtwo.png",
"Mew.png");

// Definir o nome do cookie
$cookie_nome = "ultimo_sorteio";

// Definir o tempo de expiração do cookie em segundos (um dia)
$cookie_expira = 86400;

// Verificar se o cookie existe
if (isset($_COOKIE[$cookie_nome])) {
    $ultimo_sorteio = $_COOKIE[$cookie_nome];
    $agora = time();

    // Verificar se já passou um dia desde o último sorteio
    if (($agora - $ultimo_sorteio) < $cookie_expira) {
        echo "<p>Você já sorteou hoje. Tente novamente amanhã.</p>";
    } else {
        // Sortear um novo pokemon
        $sorteado = rand(0, count($pokemons) - 1);
        $pokemon_sorteado = $pokemons[$sorteado];
        echo "<h2>Parabéns, você sorteou:</h2>";
        echo "<img src=\"../../database/media/$pokemon_sorteado\" alt=\"Pokemon sorteado\" />";
        echo "<a href=\"../../database/media/$pokemon_sorteado\" download>Download da imagem</a>";
        echo "<h3> Lembrando que você deve enviar essa imagem para seu dispositivo móvel para poder scannear posteriormente</h3>";
        echo" <h2>Não saia dessa página sem fazer o dowload da imagem, se não o pokémon será perdido!</h2>";


        // Definir o novo valor do cookie com a data atual
        setcookie($cookie_nome, time(), time() + $cookie_expira);
    }
} else {
    // Sortear um novo pokemon
    $sorteado = rand(0, count($pokemons) - 1);
    $pokemon_sorteado = $pokemons[$sorteado];
    echo "<h2>Parabéns, você sorteou:</h2>";
    echo "<img src=\"../../database/media/$pokemon_sorteado\" alt=\"Pokemon sorteado\" />";
    echo "<a href=\"../../database/media/$pokemon_sorteado\" download>Download da imagem</a>";


    // Definir o valor do cookie com a data atual
    setcookie($cookie_nome, time(), time() + $cookie_expira);
}


?>

<!DOCTYPE html>
<html lang="br">
<link rel="stylesheet" href="style.css">
<head>
    <title>Sorteador de Pokémons</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P">
</head>
<body>
<div class="container">
    <a href="../home">Voltar para o Menu Inicial</a>
</div>
</body>
</html>


