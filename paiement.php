<?php
session_start();

if ($_SESSION["EstConnecte"]!==true){
header("location: connection.php?msg=failed");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
</head>

<body class="pages_transaction" onload="changeButton()">
    <div>
        <h1>Paiement</h1>
    </div>
    <form>
        <div class="transac-input">
            <label for="fournis">Fournisseur</label> 
            <select id="fournisseur">
                <option value="videotron">Videotron S.E.N.C.</option>
                <option value="bell">Bell Canada Inc.</option>
                <option value="scotia">Visa Scotia</option>
                <option value="desjardins">Visa Desjardins</option>
                <option value="bmo">Mastercard BMO</option>
            </select>
        </div>
        <div class="transac-input">
            <label for="compte">Compte de Provenance</label>
            <select id="compte">
                <option value="cheque">MITB Chèque</option>
                <option value="epargne">MITB Épargne</option>
            </select>
        </div>
        <div class="transac-input">
                <label for="montant">Montant (CAD$)</label> <input type="number" step="0.01" id="montant">
        </div>
        </div>
        <div class="date-transaction">
            <span id="labeldate">Date</span> <span id="datedujour">*date du jour*</span>
        </div>

        <div id="end-buttons">
            <button class="retour-transac"><a href="https://mitb.tk/compte.php">Retour</a></button>
            <button onclick="envoyerPaiement()" class="envoyer-money" type="submit">Envoyer</button>
        </div>
    </form>
    <img src="img/logo_transparent.png" alt="logo">
    
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
    //Pour générer la date du jour
    n = new Date();
    y = n.getFullYear();
    j = n.getDate();
    const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"];
    document.getElementById("datedujour").innerHTML = j + " " + monthNames[n.getMonth()] + " " + y;
    


    function envoyerPaiement(){
    
        
            var fournisseur = document.getElementById("fournisseur").value;
            var compte = document.getElementById("compte").value;
            var montant = document.getElementById("montant").value;

    
            var xhttp = new XMLHttpRequest();
                
                xhttp.onreadystatechange = function() {
                    
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                    };
                };
            xhttp.open('POST', 'https://mitb.tk/paiementenvoyer.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("fournisseur="+fournisseur+"&compte="+compte+"&montant="+montant);
            
            alert("Paiement envoyer");
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