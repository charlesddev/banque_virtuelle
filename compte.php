<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "dbConnect.php";
if ($_SESSION["EstConnecte"]!==true){
header("location: connection.php?msg=failed");
}

$utilisateur = $_SESSION['ID_utilisateur'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonjour <?php echo $_SESSION["prenom"]." ".$_SESSION["nom"] ?> </title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
    <script>
        let connecte = "<?php echo ($_SESSION["EstConnecte"]) ?>";
        console.log(connecte);
    </script>
</head>

<body id="page_compte">
    <header>

        <img class="image_header" src="img/toronto-crop.jpg" alt="image_header">
        <nav>
            <ul>
                <li><a href="https://mitb.tk/index.php">Accueil</a></li>
                <li><a href="https://mitb.tk/contact.php">Nous contacter</a></li>
                <li><a href="https://mitb.tk/deconnection.php">Déconnexion</a></li>
            </ul>
        </nav>

        <div class="transparent">
            <img src="img/logo_transparent.png" alt="Logo Mitb">
        </div>

    </header>


    <div class="compte_container">

        <div class="compte_left">

            <div class="compte">

                <div class="compte_nomClient">
                    <p>Bonjour, <b><?php echo $_SESSION["prenom"]." ".$_SESSION["nom"] ?>!</b></p>
                </div>
                <h2 id='compte_hidden'>Vos Comptes</h2>
                <div class="comptes">
                    <table>
                        <tr>
                            <th>Informations de votre profil</th>
                        </tr>

                        <tr>
                             <td class="solde">Numéro de compte : <?php echo $utilisateur   ?></td>
                        </tr>

                        <tr>
                            <td class='solde'>Numéro de transit : 456</td>
                        </tr>
                    </table>
                </div>
                <div class="comptes">
                    <table>
                        <tr>
                            <th>Compte Chèque</th>
                        </tr>

                        <tr>
                             <td class="solde">Solde : <?php $stmt = $conn->prepare("SELECT balance_cheque FROM Utilisateur u, compte_cheque c WHERE u.ID_utilisateur = c.ID_utilisateur AND u.ID_utilisateur = ?");
                                                        $stmt->bind_param('i', $utilisateur);
                                                        $stmt -> execute();
                                                        
                                                        $result1 = $stmt->get_result();
                                                        if ($result1->num_rows==1){
                                                            $row = $result1->fetch_assoc();
                                                            
                                                            echo $row['balance_cheque']. "$";
                                                        }
                                                         
                                                        ?></td>
                        </tr>

                        <tr>
                            <td class='compte_last'><a href="historique_cheque.php">Historique</a></td>
                        </tr>
                    </table>
                </div>

                <div class="comptes">
                    <table>
                        <tr>
                            <th>Compte Épargne</th>
                        </tr>

                        <tr>
                            <td class="solde">Solde : <?php $stmt = $conn->prepare("SELECT balance_epargne FROM Utilisateur u, compte_epargne e WHERE u.ID_utilisateur = e.ID_utilisateur AND u.ID_utilisateur = ?");
                                                        $stmt->bind_param('i', $utilisateur);
                                                        $stmt -> execute();
                                                        
                                                        $result2 = $stmt->get_result();
                                                        if ($result2->num_rows==1){
                                                            $row = $result2->fetch_assoc();
                                                            
                                                            echo $row['balance_epargne']. "$";
                                                        }
                                                         
                                                        ?></td>
                        </tr>

                        <tr>
                            <td class='compte_last'><a href='historique_epargne.php'>Historique</a></td>
                        </tr>
                    </table>
                </div>
                <h2 id='compte_hidden'>Vos Cartes</h2>
                <div class="comptes">
                    <table>
                        <tr>
                            <th>Carte de Crédit VIZA</th>
                        </tr>

                        <tr>
                            <td class="solde">Solde : </td>
                        </tr>

                        <tr>
                            <td class='compte_last'><a href='viza.php'>Afficher les cartes</a></td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>

        <div class="compte_right">
            <div class="comptes">
                <table class='compte_action'>
                    <tr>
                        <th>Actions</th>
                    </tr>

                    <tr>
                        <td class='compte_premier'><a href='paiement.php'>Effectuer un paiement</a></td>
                    </tr>

                    <tr>
                        <td class='compte_last'><a href='virement.php'>Effectuer un virement</a></td>
                    </tr>
                </table>
            </div>
        </div>


    </div>
</body>
</html>

<!--SELECT nom, prenom, balance1, balance2-->
<!--  FROM Utilisateur u, compte_epargne e, compte_cheque c-->
<!--  WHERE u.ID_utilisateur = e.ID_utilisateur-->
<!--  AND u.ID_utilisateur = c.ID_utilisateur-->