<?php
session_start();
include "dbConnect.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$stmt = $conn->prepare('SELECT * FROM Historique');

$stmt->execute();
$result = $stmt->get_result();
$rows = array();

while($r = mysqli_fetch_assoc($result)){
    $rows['historique'][] = $r;
}

print json_encode($rows);
?>