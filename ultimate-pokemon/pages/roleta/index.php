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
</div>
</body>
</html>

<?php

$pokemons = array(
    array("nome" => "Bulbasaur", "imagem" => "bulbasaur.png"),
    array("nome" => "Charmander", "imagem" => "charmander.png"),
    array("nome" => "Squirtle", "imagem" => "squirtle.png"),
    array("nome" => "Pikachu", "imagem" => "pikachu.png"),
    array("nome" => "Jigglypuff", "imagem" => "jigglypuff.png"),
    array("nome" => "Snorlax", "imagem" => "snorlax.png"),
    array("nome" => "Mewtwo", "imagem" => "mewtwo.png"),
    array("nome" => "Zapdos", "imagem" => "zapdos.png"),
    array("nome" => "Articuno", "imagem" => "articuno.png"),
    array("nome" => "Moltres", "imagem" => "moltres.png"),
    array("nome" => "Dragonite", "imagem" => "dragonite.png"),
    array("nome" => "Mew", "imagem" => "mew.png")
);

if (isset($_POST['sortear'])) {
    $sorteado = rand(0, count($pokemons) - 1);
    $pokemon_sorteado = $pokemons[$sorteado];
    echo "<h2>" . $pokemon_sorteado['nome'] . "</h2>";
    echo "<img src=\"../../database/media/" . $pokemon_sorteado['imagem'] . "\" alt=\"Pokemon sorteado\" />";
}

?>
