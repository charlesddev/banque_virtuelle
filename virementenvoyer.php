<?php
session_start();

 $indent = $_SESSION["ID_utilisateur"];
 $courriel = $_POST["courriel"];
 $tel = $_POST["tel"];
 $compte = $_POST["compte"];
 $destinataire = $_POST["destinataire"];
 $montant = $_POST["montant"];
 $question = $_POST["question"];
 $reponse = $_POST["reponse"];
 
 $typecompte = "compte_" . $compte;
 
 $typebalance = "balance_" . $compte;
 
 
$url = 'http://api.interax.ca/interax.json';
 
 //create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = ["nom" => $destinataire, "email" => $courriel, "question" => $question,"password" => $reponse, "montant" => $montant, "tel" => $tel];

$payload = json_encode($data);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_POST, true);

//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);


$servername = 'localhost';
$username = 'mitb_projetfinal';
$password = 'Source.04';
$db_name = 'mitb_banque';

$connection = mysqli_connect($servername, $username, $password, $db_name);

if(!$connection){
    die('Connection failed '. mysqli_connect_error());
}

$stmt = $connection->prepare("SELECT $typebalance FROM $typecompte WHERE ID_utilisateur = ?");
$stmt->bind_param('s', $indent);


$stmt->execute();
$result = $stmt->get_result();
$montantAvant = mysqli_fetch_assoc($result);
$stmt->close();

$stmt2 = $connection->prepare("UPDATE $typecompte SET $typebalance = $typebalance - ? WHERE ID_utilisateur = ?");
$stmt2->bind_param('ss', $montant , $indent);

$stmt2->execute();
$stmt2->close();

$montantApres = $montantAvant["balance_" . $compte] - $montant;

$date = date("Y-m-d");
$typeTransaction = "Virement";

$stmt3 = $connection->prepare("INSERT INTO Historique (id_utilisateur, date_transaction, type_transaction, montant_transaction, balance_avant, balance_apres, type_compte) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt3->bind_param('issssss', $indent, $date , $typeTransaction, $montant , $montantAvant["balance_" . $compte], $montantApres, $typecompte);

$stmt3->execute();
$stmt3->close();


?>
