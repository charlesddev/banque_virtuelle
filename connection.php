<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
</head>

<body id="page_connection" onload="changeButton()">
    <header>
        
        <img class="image_header" src="img/toronto-crop.jpg" alt="image_header">
        <nav>
            <ul>
                <li><a href="https://mitb.tk/index.php">Accueil</a></li>
                <li><a href="https://mitb.tk/contact.php">Nous contacter</a></li>
                <li><a href="https://mitb.tk/connection.php" id="comptelinkheader">Connexion</a></li>
            </ul>
        </nav>
        
        <div class="transparent">
            <img src="img/logo_transparent.png" alt="Logo Mitb">
        </div>

    </header>

    <div class='connection_container'>

        <div class="connection_upper">
            <img src="img/logo_transparent.png" alt="Logo Mitb">

        </div>
    

        <div class="connection_down">
            <div class='connection'>
            
                <form method="POST" action="login.php">
                    <h1>Ouvrir Une Session</h1>
                    <input type="email" placeholder="Courriel" id='courriel' name='courriel' required oninvalid="this.setCustomValidity('Veuillez entrer une adresse courriel valide.')" oninput="this.setCustomValidity('')">
                    <input type="password" placeholder="Mot de passe" id='password' name='password' required oninvalid="this.setCustomValidity('Veuillez entrer un mot de passe.')" oninput="this.setCustomValidity('')" >
                    <button type="submit">Entrer</button>
                    
                    <div id="msg-erreur">
                        <?php
                            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                                echo "<h3 style='color: red; margin-top: 5%;'>Veuillez entrer un courriel et un mot de passe valide.<h3>";
                            }
                        ?>
                    </div>
                    
                    <p><a href='nouveaucompte.php'>Vous n'avez pas de compte? <br> Créez un compte!</a></p>
                    <p><a href='forgotPassword.php'>Mot de passe oublié?</a></p>
                </form>
                
            
            
            </div>
      
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