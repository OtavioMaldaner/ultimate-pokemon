<?php

$pokemons = array("bulbasaur.png", "charmander.png", "squirtle.png", "pikachu.png", "jigglypuff.png", "snorlax.png", "mewtwo.png", "zapdos.png", "articuno.png", "moltres.png", "dragonite.png", "mew.png");

// Definir o nome do cookie
$cookie_nome = "ultimo_sorteio";

// Definir o tempo de expiração do cookie em segundos (um dia)
$cookie_expira = 10;

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
    <title>Sorteador de Pokemons</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P">
</head>
<body>
<div class="container">
    <h1>Sorteador de Pokemons</h1>
    <form method="post">
        <input type="submit" name="sortear" value="Sortear um Pokemon" />
    </form>
    <a href="../home">Voltar para o Menu Inicial</a>
</div>
</body>
</html>


