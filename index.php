<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>MITB</title>
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
    <div id="question-compte">
        <h4>Vous n'avez pas encore de compte ?</h4>
    </div>
    <div id="button-create-account">
        <a href="https://mitb.tk/nouveaucompte.php"><b>Créer un compte</b></a>
    </div>

    <section>
        <table id="icons-table">
            <tr class="icons-rows">
                <th class="img-cell"><img class="img-table" src="img/transfert.png" alt="icone-tranfert"></th>
                <th class="text-cell">Virements Simples et Rapides</th>
            </tr>
            <tr class="icons-rows">
                <th class="img-cell"><img class="img-table" src="img/dollarsign.png" alt="icone-dollar"></th>
                <th class="text-cell">Compte Épargne à Intérêts Élevés</th>
            </tr>
            <tr class="icons-rows">
                <th class="img-cell"><img class="img-table" src="img/account.png" alt="icone-account"></th>
                <th class="text-cell">Enregistrement Rapide et Gratuit</th>
            </tr>
        </table>
        
        
        
    </section>

    <section>
        <table id="icons-table-desktop">
            <tr class="icons-rows-desktop">
                <th class="img-cell-desktop"><img class="img-table-desktop" src="img/transfert.png" alt="icone-tranfert"></th>
                <th class="img-cell-desktop"><img class="img-table-desktop" src="img/dollarsign.png" alt="icone-dollar"></th>
                <th class="img-cell-desktop"><img class="img-table-desktop" src="img/account.png" alt="icone-account"></th>
            </tr>
            <tr class="icons-rows-desktop">
                <th class="text-cell-desktop">Virements Simples et Rapides</th>
                <th class="text-cell-desktop">Compte Épargne à Intérêts Élevés</th>
                <th class="text-cell-desktop">Enregistrement Rapide et Gratuit</th>
            </tr>
        </table>
    </section>

    <article id="ensavoirplus">
        <b>Chez MITB, nous avons vos finances à coeur!</b>
        <p>C'est pourquoi nous offrons le meilleur service de banque en ligne du pays. Découvrez ce qui fait de nous les meilleurs!</p>
        <div class="button-savoirplus">
            <a href="https://mitb.tk/apropos.php">En savoir plus</a>
        </div>
        <img src="img/woman-writing.jpg" alt="article-img">
        
        <div class="button-savoirplus">
            <a href= "hypotheque.php" class='center'>Calculez votre prêt hypothécaire!</a>
        </div>
    </article>
    
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