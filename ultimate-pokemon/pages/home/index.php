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
    <link rel="stylesheet" href="./style.css">
    <title>Ultimate Pokémon | Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <a class="logo" href="/">Ultimate Pokémon</a>
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
                <ul class="nav-list">
                    <li><a href="../home">Home</a></li>
                    <li><a href="../battle">Batalha</a></li>
                    <li><a href="../roleta">Adquirir Pokémon</a></li>
                    <li><a href="../edit-account">Editar conta</a></li>
                    <li><a href="../IA_Pokemon">Escanear Pokémon</a></li>
                    <li><a href="../login/logout.php"><img src="../../assets/logout.svg" alt=""></a></li>
                </ul>
            </nav>
        </header>
        <main>

            <?php
            if (count($pokemons_carteira) > 0) {
                echo "<div class=\"pokemon-carousel\">";
                echo "<button class=\"arrow-left control\" aria-label=\"Previous image\">";
                echo "<img src=\"../../assets/flecha.svg\">";
                echo "</button>";

                echo "<div class=\"gallery-wrapper\">";
                echo "<div class=\"gallery\">";
                foreach ($pokemons_carteira as $pokemons) {
                    $id = $pokemons->getIdPokemon();
                    $pokemon = Pokemon::find($id);
                    $img = Media::findMediaByPokemon($id);



                    echo "<div class=\"item current-item animated-carousel\">";
                    echo "<h2 class=\"pokemon-type\">" . $pokemon->getTipo() . "</h2>";
                    echo "<h1 class=\"pokemon-name\">" . $pokemon->getNome() . "</h1>";
                    echo "<h3 class=\"pokemon-owner\">" . $_SESSION['nickName'] . "</h3>";
                    echo "<img src=\"../../database/media/{$img->getPath()}\" alt=\"Default icon\">";
                    echo "<div class=\"additional-infos\">" . "<div class=\"stat-field\"><span>Overall</span><span class=\"pokemon-over\">" . $pokemon->getOver() . "</span></div>" . "<div class=\"stat-field\"><span >Altura</span><span class=\"pokemon-height\">" . $pokemon->getAltura() . "</span></div>" . "<div class=\"stat-field\"><span >Peso</span><span class=\"pokemon-weight\">" . $pokemon->getPeso() . "</span></div>" . "</div>";
                    echo "<a href='formDelete.php?id={$pokemons->getIdTransacao()}'>Excluir</a>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                echo "<button class=\"arrow-right control\" aria-label=\"Next image\">";
                echo "<img src=\"../../assets/flecha.svg\">";
                echo "</button>";
                echo "<div class=\"mobile-arrows\">";
                echo "<div class=\"control mobile-arrow-left\" aria-label=\"Previous image\">";
                echo "<img src=\"../../assets/flecha.svg\" alt=\"\">";
                echo "</div>";
                echo "<div class=\"control mobile-arrow-right\" aria-label=\"Next image\">";
                echo "<img src=\"../../assets/flecha.svg\">";
                echo "</div>";
                echo "</div>";
            } else {
            ?>
                <h3 class="no-pokemons">Você ainda não possui nenhum Pokémon !</h3>
                <a href="../roleta" class="add-pokemon">Adicione um Pokémon à sua Pokédex</a>
            <?php
            }
            ?>
        </main>
    </div>
</body>

<script>
    let screenWidth = window.innerWidth;
    const controls = document.querySelectorAll('.control');
    let maxItems;
    const images = document.querySelectorAll('.item');
    items = images;
    const tamanhoArray = items.length;
    maxItems = tamanhoArray;
    let currentItem = 0;
    let interval;
    items.forEach(item => item.classList.remove('current-item'));
    items[0].classList.add('current-item');
    controls.forEach(control => {
        control.addEventListener('click', (e) => {
            e.stopPropagation();
            const isLeft = control.classList.contains('arrow-left');
            if (isLeft) {
                currentItem -= 1;
            } else {
                currentItem += 1;
            }
            if (currentItem >= maxItems) {
                currentItem = 0;
            } else if (currentItem < 0) {
                currentItem = maxItems - 1;
            }
            items.forEach(item => {
                item.classList.remove('current-item');
                item.classList.remove('animated-carousel')
            });
            items[currentItem].classList.add('current-item');
            clearInterval(carouselInterval);
        })
    });
    const carouselInterval = setInterval(function() {
        currentItem++;
        if (currentItem >= maxItems) {
            currentItem = 0;
        }
        items.forEach(item => item.classList.remove('current-item'));
        items[currentItem].classList.add('current-item');
        interval = 3000;
    }, interval ? interval : 3000);
</script>
<script src="mobile-navbar.js"></script>


</html>