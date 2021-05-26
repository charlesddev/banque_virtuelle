<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>À Propos</title>
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
</head>

<body id="page_accueil" onload="changeButton()">
    <header id="header-acc">
        <img class="image_header" src="img/toronto-crop.jpg" alt="image_header">
        <div class="transparent">
            <img src="img/logo_transparent.png" alt="Logo Mitb">
        </div>

        <img onclick="showMenu()" src="img/menu-hamb.png" alt="menu" id="menu-hamb-button">
        <div id="menu-hamburger">
            <nav>
                <ul>
                    <li id="button-acc"><a href="https://mitb.tk/index.php">Accueil</a></li>
                    <li><a href="https://mitb.tk/contact.php">Nous contacter</a></li>
                    <li id="button-connec"><a id="comptelinkheader" href="https://mitb.tk/connection.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
        <article id="ensavoirplus">
            <b>À PROPOS</b>
            <p>Money in the bank a vu le jour en 2020 dans la petite ville de Sherbrooke. Derrière cette banque branchée se cachent trois jeunes hommes avec un grand rêve commun, permettre aux gens de placer leur argent entre des mains de confiance. C'est sous un contexte scolaire que le projet MITB a pris forme. Depuis, nous avons plus de 2 clients et un taux de satisfaction de 100%! Notre point fort est notre versatilité. En ayant un compte avec nous, vous serez en mesure d'effectuer des virements, de payer vos factures et de calculer des taux hypothécaires, le tout de manière sécuritaire. Tous nos services sont également offerts sur mobile.<p>
            <div class="button-savoirplus">
                <a href="https://mitb.tk/nouveaucompte.php"><b>Créer un compte</b></a>
            </div>
            <img src="img/work-from-home-3.jpg" alt="article-img">
        </article>
    
    <section>
        <table id="icons-table-desktop">
            <tr class="icons-rows-desktop">
                <th class="img-marc-cell-desktop"><img class="img-marc-table-desktop" src="img/photo_marc.jpg"></th>
                <th class="img-charles-cell-desktop"><img class="img-charles-table-desktop" src="img/photo_charles.jpg"></th>
                <th class="img-gab-cell-desktop"><img class="img-gab-table-desktop" src="img/photo_gab.jpg"></th>
            </tr>
            <tr class="icons-rows-desktop">
                <th class="text-cell-desktop">Marc-Antoine Couillard</th>
                <th class="text-cell-desktop">Charles Dion</th>
                <th class="text-cell-desktop">Gabriel Morin</th>
            </tr>
            <tr class="icons-rows-desktop">
                <th class="text-cell-desktop">J'ai toujours voulu travailler dans une banque mais quand j'ai réalisé que mon potentiel était énorme, j'ai décidé de créer ma propre banque.</th>
                <th class="text-cell-desktop">Mon but est de créer une banque simple d'utilisation et accessible à tout le monde. Si vous cherchez la simplicité, choisissez MITB!</th>
                <th class="text-cell-desktop">Je suis un passionné du web. Ce qui devait être seulement un projet scolaire est devenu mon plus grand projet de vie, et j'en suis fier!</th>
            </tr>
        </table>
    </section>
    
    <footer class="page-footer font-small blue pt-4">
        
      <div class="container-fluid text-center text-md-left">
          
            <div class="row">
                
              <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">Liens</h5>
                <ul class="list-unstyled">
                  <li>
                    <p>
                      <a href="https://mitb.tk/">Accueil</a>
                    </p>
                  </li>
                  <li>
                    <p>
                      <a href="https://mitb.tk/apropos.php">À Propos</a>
                    </p>
                  </li>
                  <li>
                    <p>
                      <a href="https://mitb.tk/contact.php">Nous Contacter</a>
                    </p>
                  </li>
                  <li>
                    <p>
                      <a href="https://mitb.tk/connection.php" id="comptelinkfooter">Se Connecter</a>
                    </p>
                  </li>
                </ul>
              </div>
                
              <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">Nous Rejoindre</h5>
                <ul class="list-unstyled">
                  <li>
                    <p>475 rue du Cégep,</p>
                    <p>Sherbrooke, QC, CA, J1A 4K1</p>
                  </li>
                  <li>
                    <p>mitb@mitb.tk</p>
                  </li>
                </ul>
              </div>
              
            </div>
      </div>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mitb.tk/"> mitb.tk</a>
        </div>
        
    </footer>
</body>
<script>

    var menuhamb = document.getElementById("menu-hamburger");

    function showMenu() {
        if (menuhamb.style.display === "block") {
            menuhamb.style.display = "none";
        } else {
            menuhamb.style.display = "block";
        }
    }
    
    
    function changeButton() {
        let connecte = "<?php echo ($_SESSION["EstConnecte"]) ?>";
            if (connecte == "1") {
                document.getElementById("comptelinkheader").innerHTML = "Mon Compte";
                document.getElementById("comptelinkheader").setAttribute('href', "https://mitb.tk/compte.php");
                document.getElementById("comptelinkfooter").innerHTML = "Mon Compte";
                document.getElementById("comptelinkfooter").setAttribute('href', "https://mitb.tk/compte.php");
            }
        }
</script>
</html>