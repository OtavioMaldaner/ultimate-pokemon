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
                echo "<h2 style=\"color: #fff\" class=\"pokemon-type\">" . $pokemon->getTipo() . "</h2>";
                echo "<h1 style=\"color: #fff\" class=\"pokemon-name\">" . $pokemon->getNome() . "</h1>";
                echo "<h3 style=\"color: #fff\" class=\"pokemon-owner\">" . $_SESSION['nickName'] . "</h3>";
                echo "<img src=\"../../database/media/{$img->getPath()}\" alt=\"Default icon\">";
                echo "<div class=\"additional-infos\">" . "<div class=\"stat-field\"><span style=\"color: #fff\">Overall</span><span style=\"color: #fff\" class=\"pokemon-over\">" . $pokemon->getOver() . "</span></div>" . "<div style=\"color: #fff\" class=\"stat-field\"><span style=\"color: #fff\" >Altura</span><span style=\"color: #fff\" class=\"pokemon-height\">" . $pokemon->getAltura() . "</span></div>" . "<div class=\"stat-field\"><span style=\"color: #fff\" >Peso</span><span style=\"color: #fff\" class=\"pokemon-weight\">" . $pokemon->getPeso() . "</span></div>" . "</div>";
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
            <a href="" class="add-pokemon">Adicione um Pokémon à sua Pokédex</a>
        <?php
        }
        ?>

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
            items.forEach(item => {item.classList.remove('current-item'); item.classList.remove('animated-carousel')});
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


</html>