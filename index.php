<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coinversion</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="./img/coin.ico" sizes="32x32" type="image/vnd.microsoft.icon">
</head>
<body>
    <header>
        <div class="content has-background-primary xd-shadow">
            <h1 class="title is-1 has-text-centered has-text-white pt-3 pb-5">₵o!nv€r$¡0n</h1>
        </div>
    </header>

    <div class="content has-background-white mt-6 xd-shadow">
        <h3 class="title is-3 has-text-centered has-text-primary p-3">Updated Currencies</h3>
    </div>
    
    <?php
        require_once('updated_currencies.php');
    ?>

    <div class="content has-background-white mt-5 xd-shadow">
        <h3 class="title is-3 has-text-centered has-text-primary p-3">Cryptocurrencies</h3>
    </div>

    <?php
        require_once('cryptocurrencies.php');
    ?>

    <div class="content has-background-white mt-5 xd-shadow">
        <h3 class="title is-3 has-text-centered has-text-info p-3">Business & Financial News</h3>
    </div>

    <?php
        require_once('news.php');
    ?>

    <br>

        <footer>
            <div class="content has-background-primary xd-shadowtop">
                <h1 class="title is-6 has-text-centered has-text-white p-4">
                    <a href="" class="has-text-white">
                        ©SEBASTIÁN LONDERO 2021
                    </a>
                </h1>
            </div>
        </footer>

</body>
</html>