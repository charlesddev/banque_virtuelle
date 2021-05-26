<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Nous Contacter</title>
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
</head>

<body id="page_accueil" onload=changeButton()>
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
    
    <div class='contact_container'>
    
      <div class="contact">

        <h3>Contactez-nous!</h3>
        <h6>Si vous avez des questions ou commentaires, n'hésitez pas à nous les envoyer via les coordonnées que vous trouverez ci-dessous. Nous vous répondrons d'ici 2 à 6 jours ouvrables.</h6>
        
        <p id='telephone'>Téléphonez-nous au (123) 456-7890 ou envoyez-nous votre questions ou commentaire via le formulaire ci-dessous.</p>
        
        <form id='contact_formulaire' method='POST' action='confirmation.php'>
            <div id='contact_left'>
                <input type='text' name='nom' id='nom' placeholder = 'John Doe' required oninvalid="this.setCustomValidity('Veuillez entrer votre nom complet.')" oninput="this.setCustomValidity('')">
                <input type='email' name='email' id='email' placeholder = 'adresse@courriel.com' required oninvalid="this.setCustomValidity('Veuillez entrer une adresse courriel valide.')" oninput="this.setCustomValidity('')">
                <input type='tel' name='telephone' id='telephone' placeholder = '123-456-7890' pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}|[0-9]{3}[0-9]{3}[0-9]{4}" required oninvalid="this.setCustomValidity('Veuillez entrer votre numéro de téléphone.)" oninput="this.setCustomValidity('')">
            </div>
            <div id='contact_right'>
                <textarea id='commentaire' name='commentaire' placeholder='Veuillez écrire vos questions/commentaires.' rows='5' column='300' required oninvalid="this.setCustomValidity('Ce champs est requis.')" oninput="this.setCustomValidity('')"></textarea>
                <input type='submit' id='submit' name='submit' value='Envoyer'>
            </div>
        </form>

        </div>
            
        <div id='map'>
            <h4>Si vous préférez venir nous rencontrer en personne, voici la location de notre succursale :</h4>
            <div id="myMap" style="position:relative;width:100%;height:400px;"></div>
        </div>
    
    </div>
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
<script type='text/javascript'>
    function GetMap() {
        var map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AgkwjWRHXdGFP1hGhhLYKlFuOi1KMyhookwbtvGNmLoK04y0g2-bXpB83LlhXuPx',
            center: new Microsoft.Maps.Location(45.411276, -71.886782)
        });

        var center = map.getCenter();

        //Create custom Pushpin
        var pin = new Microsoft.Maps.Pushpin(center, {
            title: 'Money in the Bank',
            subTitle: 'MITB',
            text: '1'
        });

        //Add the pushpin to the map
        map.entities.push(pin);
    }
    

    function showMenu() {
        var menuhamb = document.getElementById("menu-hamburger");
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