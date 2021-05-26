<?php
session_start();
include "dbConnect.php";

$email = $_POST["courriel"];
$password = sha1($_POST['password']);

$stmt = $conn->prepare("SELECT * from Utilisateur where Courriel = ? and Password = (?)");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows==1){
    $row = $result->fetch_assoc();

  $_SESSION["EstConnecte"]=true;
  $_SESSION["prenom"]=$row["Prenom"];
  $_SESSION["nom"]=$row["Nom"];
  $_SESSION["courriel"]=$row["Courriel"];
  $_SESSION["password"]=$row["Password"];
  $_SESSION["address"]=$row["Adresse"];
  $_SESSION["ID_utilisateur"]=$row["ID_utilisateur"];

  header("Location: compte.php");
  exit();
}
else {
header("location: connection.php?msg=failed");
}
 ?>