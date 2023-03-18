<?php

require_once "../../settings/config.php";

session_start();

if (!isset($_SESSION["idUser"])) {
    header("location: ../login");
}

Player::refreshSession();

// if (isset($_GET["search"])) {
//     $search = '%'.trim($_GET['search']).'%';
//     $products = Product::findByTitle($search);
// } else {
//     $products = Product::findall();
// }

$directory = "../../database/users/";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/olifx_logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <title>OLIFX | <?php echo $content['homepage&Favorites']['homepage'] ?></title>
</head>
<body>
    <div class="container">
        <div class="superior-part">
            <div class="superior-elements">
                <form action="./search.php" method="GET">
                    <input name="search" type="text" class="search" placeholder="<?php echo $content['homepage&Favorites']['search'] ?>">    
                </form>

                <div class="dropdowns-area">
                    
                    <div class="languages-area">
                        <img style="border: none; height: 30px; width: 30px;" src="../../assets/images/world_icon.svg" alt="world-icon">
                        <div class="language-dropdown">
                            <a href="./index.php?language=pt-br">pt-br</a>
                            <a href="./index.php?language=en-us">en-us</a>
                        </div>
                    </div>
                    
                    <div class="user-area">
                        <img src="<?php echo $directory.$_SESSION["profilePic"]; ?>" alt="Default icon">
                    </div>
                    
    
                    <div class="dropdown">
                        <a href="../edit-account/"> <?php echo $content['homepage&Favorites']['dropdown']['editAccount'] ?></a>
                        <a href="../yours/"><?php echo $content['homepage&Favorites']['dropdown']['yourProducts'] ?></a>
                        <a href="../login/logout.php"><?php echo $content['homepage&Favorites']['dropdown']['logout'] ?></a>
                    </div>
                    
    
                    <span class="home-welcome"><?php echo $content['homepage&Favorites']['welcome'] ?> <?php echo $_SESSION["fullName"]?>!</span>
                </div>
            </div>
        </div>

        <div class="middle-part">

        </div>

        <div class="bottom-navigation">

            <a href="#">
                <div class="anchor selected">
                    <img src="../../assets/icons/home.png" alt="Home" class="home selected">
                </div>
            </a>

            <a href="../favorites">
                <div class="anchor">
                    <img src="../../assets/icons/star-o.png" alt="Home" class="home">
                </div>
            </a>
            
            <a href="../post">
                <div class="anchor">
                    <img src="../../assets/icons/new-o.png" alt="Home" class="home">
                </div>
            </a>
        </div>
        
        
    </div>

    <script src="main.js"></script>
</body>
</html>
