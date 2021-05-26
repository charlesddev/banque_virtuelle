<?php

include "dbConnect.php";

$email = $_POST['courriel'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$email = $_POST['courriel'];
$motdepasse = sha1($_POST['motdepasse']);
$num_transit = 456;

$stmt = $conn->prepare("SELECT * from Utilisateur where Courriel = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows<1){
    
    $stmt = $conn->prepare("INSERT INTO Utilisateur(Nom, Prenom, Telephone, Adresse, Courriel, Password, num_transit) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssss', $nom, $prenom, $telephone, $adresse, $email, $motdepasse, $num_transit);
    $stmt->execute();
    
    $stmt2 = $conn->prepare("SELECT ID_utilisateur FROM Utilisateur WHERE Courriel = ?");
    $stmt2->bind_param('s', $email);
    $stmt2->execute();
    $result = $stmt2 -> get_result();
    
    if ($result->num_rows==1){
        $row = $result->fetch_assoc();
        $user = $row['ID_utilisateur'];
    
        $stmt3 = $conn->prepare("INSERT INTO compte_cheque(ID_utilisateur, balance_cheque) VALUES (?, '10000')");
        $stmt3->bind_param('i', $user);
        $stmt3->execute();
        
        $stmt4 = $conn->prepare("INSERT INTO compte_epargne(ID_utilisateur, balance_epargne) VALUES (?, '5000')");
        $stmt4->bind_param('i', $user);
        $stmt4->execute();
    }
    
    header("Location: connection.php");
  exit();
}
else {
header("location: nouveaucompte.php?msg=failed");
}

?>