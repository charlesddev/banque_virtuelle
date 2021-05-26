<?php session_start(); 
include "dbConnect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$utilisateur = $_SESSION['ID_utilisateur'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Viza</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/favicon.png">
    
    <!--<script>-->
        
    <!--    function test(){-->

    <!--    var xhttp = new XMLHttpRequest();-->
    <!--    xhttp.onreadystatechange = function(){-->
    <!--        if(this.readyState == 4 && this.status == 200) {-->
    <!--            var obj = JSON.parse(this.responseText);-->
    <!--            console.log(obj);-->
    <!--        }-->
            
    <!--    }-->
        
    <!--    xhttp.open('POST', 'https://api.interax.ca/Viza/auth=bWl0YjpTaGVyYnJvb2tlMjAyMCE=', true);-->
    <!--    xhttp.setRequestHeader('Authorization', 'Basic bWl0YjpTaGVyYnJvb2tlMjAyMCE=');-->
    <!--    xhttp.send();-->
    <!--    }-->
        
    <!--</script>-->
</head>

<body id="page_accueil" onload="changeButton()">
    <header id="header-acc">
        <img class="image_header" src="img/toronto-crop.jpg" alt="image_header">
        <div class="transparent">
            <img src="img/logo_transparent.png" alt="Logo Mitb">
        </div>

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
    
    <form onsubmit="return false">
        
        <label for='typeTransaction'>Type de transaction</label>
        <select name='typeTransaction' id='typeTransaction'>
            <option>Faire un achat</option>
            <option>Demander un retour</option>
            <option>Solde de la carte</option>
        </select>
        <br>
        <label for ='numCarte'>Numéro de la carte</label>
        <select name='numCarte' id='numCarte'>
            <option>4111111111111111</option>
            <option>4111111111111112</option>
            <option>4111111111111113</option>
        </select>
        <br>
        <label for='montant' id='montant'>Montant</label>
        <input type='number' name='montant'>
        <input type='submit'>
       

    </form>
    
    <?php 

   /* $banque = 'Money in the bank';
    $codesecret = 'bWl0YjpTaGVyYnJvb2tlMjAyMCE=';
    $url = 'https://api.interax.ca/Viza/auth';
 
    //create a new cURL resource
    $ch = curl_init();

    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_URL, $url);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Basic '.$codesecret));
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);
    
    $result_encode = json_decode($result);
    
    $token = $result_encode->token;
    
    
    $doc = "4111111111111111";
    
    $data = ["token" => $token, "carte" => $doc];
    
    $payload = json_encode($data);
    
    var_dump($payload);
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, 'https://api.interax.ca/Viza/getbalance');
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload);
    
    curl_setopt($ch2, CURLOPT_POST, true);

    
    $result2 = curl_exec($ch2);

    
    //close cURL resource
    curl_close($ch); */
    
    
    
    ?>
    
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