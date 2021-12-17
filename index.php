<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coinversion</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/styles.css">
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
                <h1 class="title is-6 has-text-centered has-text-white p-4">©SEBASTIÁN LONDERO 2021</h1>
            </div>
        </footer>

        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
              <header class="modal-card-head has-background-info">
                <p class="modal-card-title is-size-3 has-text-centered has-text-white is-uppercase">Daily News</p>
                <button class="delete" aria-label="close"></button>
              </header>
              <section class="modal-card-body">
                <h1 class="title is-2">Title</h1>
                <h3 class="title is-4">Subtitle with another added phrases</h3>
                <p class="content has-text-justified">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit natus ab quia sunt repellendus nisi, sit vel optio eum consequuntur. Officia eius voluptate earum ea quidem consequatur, ut praesentium totam natus libero dolore impedit nam ullam maiores nesciunt distinctio nobis debitis ad, aspernatur harum minima temporibus laudantium similique. Tempora delectus accusantium, ut iste corrupti tenetur nam cupiditate. Possimus delectus aliquam dolor qui ea earum recusandae dolores commodi tenetur velit facilis, nesciunt libero voluptate nobis corporis distinctio similique? Vitae, sapiente sint alias iste neque id ullam fugit qui asperiores officia rem placeat magni, maxime nisi illo, cupiditate animi voluptatibus? Eius, ducimus? Deserunt qui labore minima temporibus aliquam debitis! At qui sunt impedit architecto dicta fugiat eligendi tenetur esse laborum adipisci. Possimus.</p>
              </section>
              <footer class="modal-card-foot is-inline has-text-centered has-background-info">
                <button class="button is-info is-light"><a href="#" target="_blank">Source</a></button>
                <button class="button is-info is-light">Go Back</button>
              </footer>
            </div>
          </div>
</body>
</html>