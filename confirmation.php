<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Merci!</title>
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script>
    function showMenu() {
        var menuhamb = document.getElementById("menu-hamburger");
        if (menuhamb.style.display === "block") {
            menuhamb.style.display = "none";
        } else {
            menuhamb.style.display = "block";
        }
    }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
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
                    <li id="button-connec"><a href="https://mitb.tk/connection.php" id="comptelinkheader">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    
    <div id="confirmation_merci">
        <h1 id="confirmation_text">Merci pour votre commentaire, <?php echo $_POST['nom'] ?></h1>
        <div class="button-savoirplus">
            <a href="index.php">Retourner à l'accueil.</a>
        </div>
    </div>
    
    <footer class="page-footer font-small blue pt-4">
        
      <div class="container-fluid text-center text-md-left">
          
            <div class="row">
                
              <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">Liens</h5>
                    <p><a href="https://mitb.tk/">Accueil</a></p>
                    <p><a href="https://mitb.tk/apropos.php">À Propos</a></p>
                    <p><a href="https://mitb.tk/contact.php">Nous Contacter</a></p>
                    <p><a href="https://mitb.tk/connection.php" id="comptelinkfooter">Se Connecter</a></p>
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