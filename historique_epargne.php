<?php session_start(); 
include "dbConnect.php";

$utilisateur = $_SESSION['ID_utilisateur'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Historique</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/favicon.png">
    
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
    
    <section id="section_historique">
        
            <?php 
                echo "<table id='table_historique'>
                        <tr class='tr_historique'>
                            <th class='th_historique'>Date de la transaction</th>
                            <th class='th_historique'>Type de la transaction</th>                                
                            <th class='th_historique'>Montant de la transaction</th>
                            <th class='th_historique'>Balance avant</th>
                            <th class='th_historique'>Balance après</th>
                        </tr>";
                        
                $stmt = $conn->prepare("SELECT date_transaction AS 'date de la transaction',
                                       type_transaction AS 'Type de la transaction',
                                       montant_transaction AS 'Montant de la transaction',
                                       balance_avant AS 'Balance avant',
                                       balance_apres AS 'Balance après'
                                       FROM `Historique`
                                       WHERE id_utilisateur = ? AND type_compte = 'compte_epargne'
                                       ORDER BY date_transaction DESC");
                                       
                $stmt ->bind_param('i', $utilisateur);
                $stmt->execute();
                
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='tr_historique'>
                                <td class = 'td_historique'>". $row["date de la transaction"]. "</td>
                                <td class = 'td_historique'>". $row["Type de la transaction"]. "</td>
                                <td class = 'td_historique'>". $row["Montant de la transaction"]. "</td>
                                <td class = 'td_historique'>". $row["Balance avant"]. "</td>
                                <td class = 'td_historique'>". $row["Balance après"]. "</td>
                            </tr>";
                            
                        
                    }
                }
                
                echo "<tr><td class = 'td_historique'><button id='retour_cheque'><a href='compte.php'>Retour</a></button></td></tr></table>";
            ?>
        
    </section>
    
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