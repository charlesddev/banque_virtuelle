<?php
$servername = "mitb.tk";
$username = "mitb";
$password = "9VVLek55kh";
$dbname = "mitb_banque";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
die("Connection failed: " . mysqli_connect_error());
}
?>
