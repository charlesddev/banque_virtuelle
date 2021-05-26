<?php
session_start();
include "dbConnect.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Un Compte</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
    
    <script>
        
        function confirmPassword(){
            var motdepasse = document.getElementById('motdepasse').value;
            var confirm_motdepasse = document.getElementById('motdepasse_confirm').value;
            var confirmation = document.getElementById('confirmation');
            var button = document.getElementById('submit');
            
            if (motdepasse == confirm_motdepasse){
                confirmation.innerHTML = '';
                button.disabled = false;
                button.style.background = '#044C54'
                confirmation.style.color = '#044C54'
            }else{
                confirmation.innerHTML = 'Les mots de passe doivent être identique.';
                button.disabled = true;
                button.style.background = '#5F5F5F';
            }
        }
   
    </script>
    
</head>

<body id="page_nouveaucompte" onload="changeButton()">
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

    <div class='nouveaucompte_container'>

        <div class="nouveaucompte_upper">
            <img src="img/logo_transparent.png" alt="Logo Mitb">

        </div>
    

        <div class="nouveaucompte_down">
            <div class='nouveaucompte'>
            
                <form method="POST" action="addUser.php">
                    <h1>Créer Un Compte</h1>
                    <input type="email" placeholder="Courriel" id='courriel' name= 'courriel' required oninvalid="this.setCustomValidity('Veuillez entrer une adresse courriel valide.')" oninput="this.setCustomValidity('')">
                    <input type="text" placeholder="Prénom" id='prenom' name='prenom' required oninvalid="this.setCustomValidity('Veuillez entrer votre prénom.')" oninput="this.setCustomValidity('')">
                    <input type="text" placeholder="Nom" id='nom' name='nom' required oninvalid="this.setCustomValidity('Veuillez entrer votre nom.')" oninput="this.setCustomValidity('')">
                    <input type="text" placeholder="Numero de téléphone" id='telephone' name='telephone' pattern='^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$' required oninvalid="this.setCustomValidity('Veuillez entrer votre numéro de téléphone.')" oninput="this.setCustomValidity('')">
                    <input type="text" placeholder="Adresse" id='adresse' name='adresse' required oninvalid="this.setCustomValidity('Veuillez entrer votre adresse.')" onvalid="this.setCustomValidity('')">
                    <input onchange='confirmPassword()' type="password" placeholder="Mot de Passe" id='motdepasse' name='motdepasse' required oninvalid="this.setCustomValidity('Veuillez entrer un mot de passe.')" oninput="this.setCustomValidity('')">
                    <input onkeyup='confirmPassword()' type="password" placeholder="Confirmer Mot de Passe" id='motdepasse_confirm' name='motdepasse_confirm' required oninvalid="this.setCustomValidity('Veuillez entrer un mot de passe.')" oninput="this.setCustomValidity('')">
                    <span id='confirmation'></span>
                    <button id='submit' type="submit">Créer</button>
                    <div id="msg-erreur">
                        <?php
                            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                                echo "<h3 style='color: red; margin-top: 5%;'>L'adresse email entrée est déjà associée à un compte.<h3>";
                            }
                        ?>
                    </div>
                    <p><a href='connection.php'>Vous avez déjà un compte? <br> Connectez-vous!</a></p>
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