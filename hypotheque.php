<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Calculatrice Hypothécaire</title>
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
    <script type='text/javascript'>
  
    function showMenu() {
        var menuhamb = document.getElementById("menu-hamburger");
        if (menuhamb.style.display === "block") {
            menuhamb.style.display = "none";
        } else {
            menuhamb.style.display = "block";
        }
    }
        
    </script>

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
    
    <h4 id='titre_hypotheque'>Calculatrice de prêt Hypothécaire</h4>
    
    <section id='hypotheque'>
        
        <div class='hypotheque_calculateur'>
            <form onsubmit="return false">
                <label for='prix'>Prix de la propriété</label>
                <br>
                <input type='number' id='prix' name='prix' min='0'>$
                <br>
                <label for='taux'>Taux d'intérêt</label>
                <br>
                <input type='number' id='taux' name='taux' step='0.01' min='0'>%
                <br>
                
                <div  id='amortissement_container'>
                <label for ='amortissement'>Période d'amortissement :</label>
                <br>
                <select name='amortissement' id='amortissement'>
                    <option value="12">1 an</option>
                    <option value="60">5 ans</option>
                    <option value="120">10 ans</option>
                    <option value="240">20 ans</option>
                    <option value="300">25 ans</option>
                </select>
                </div>
                <button onclick=calculInteret() id='soumission_hypo'>Calculer</button>
            </form>
            
            <h2 id="montantHypotheque"></h2>
        </div>
        
    </section>
    
    
   <script>
      
    function calculInteret(){ 
        var amount = String(document.getElementById("prix").value);
        var duration = String(document.getElementById("amortissement").value);
        var rate = String(document.getElementById("taux").value);
        var xhr = new XMLHttpRequest();
        
        var amount2 = String(amount);
        console.log(amount, duration, rate);
       
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){;
                var obj = JSON.parse(this.responseText);
                document.getElementById('montantHypotheque').innerHTML = obj.payment + "$ à payer chaque mois.";
            }
        };
       
        xhr.open("POST", "https://api.interax.ca/interet.json", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("amount="+amount+"&duration="+duration+"&rate="+rate);
    }
   </script>
   
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