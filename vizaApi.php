<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$banque = 'Money in the bank';
$codesecret = 'bWl0YjpTaGVyYnJvb2tlMjAyMCE=';
$url = 'https://api.interax.ca/factures.json';
 
 //create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = ["banque" => $banque, "codesecret" => $codesecret];

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

?>