<?php

$json = file_get_contents('php://input');
$data = json_decode($json);


$id = $data->compte;
$transit = $data->transit;
$montant = $data->montant;



$typecompte = "compte_cheque";
 
$typebalance = "balance_cheque";

$servername = 'localhost';
$username = 'mitb_projetfinal';
$password = 'Source.04';
$db_name = 'mitb_banque';

$connection = mysqli_connect($servername, $username, $password, $db_name);

if(!$connection){
    die('Connection failed '. mysqli_connect_error());
}


$stmt = $connection->prepare("SELECT $typebalance FROM $typecompte WHERE ID_utilisateur = ?");
$stmt->bind_param('s', $id);


$stmt->execute();



$result = $stmt->get_result();
$montantAvant = mysqli_fetch_assoc($result);


if ($result->num_rows > 0 and $transit == 456){   
    
    
    $stmt->close();
    
    $stmt2 = $connection->prepare("UPDATE $typecompte SET $typebalance = $typebalance + ? WHERE ID_utilisateur = ?");
    $stmt2->bind_param('ss', $montant , $id);
    
    $stmt2->execute();
    $stmt2->close();
    
    $montantApres = $montantAvant["balance_cheque"] + $montant;
    

    
    
    
    $date = date("Y-m-d");
    $typeTransaction = "Virement";
    
    $stmt3 = $connection->prepare("INSERT INTO Historique (id_utilisateur, date_transaction, type_transaction, montant_transaction, balance_avant, balance_apres, type_compte) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt3->bind_param("issssss", $id, $date, $typeTransaction, $montant , $montantAvant["balance_cheque"], $montantApres, $typecompte);
    
    $stmt3->execute();
    $stmt3->close();
    
    $status = "OK";
    
    echo $status;

} else {
      $status = "FAILURE";
    
      echo $status;  
}


?>