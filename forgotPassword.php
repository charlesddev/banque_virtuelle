<?php session_start();
include "dbConnect.php";


if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error .= "<p>L'adresse courriel entrée n'est pas valide. Veuillez entrer une adresse courriel valide!.</p>";
    } else {
        $sel_query = "SELECT * FROM `Utilisateur` WHERE courriel='" . $email . "'";
        $results = mysqli_query($conn, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "<p>Aucun utilisateur n'est enregistré avec cette adresse courriel.</p>";
        }
    }
    if($error!=""){
       echo "<div class='error'>".$error."</div>
       <br /><a href='javascript:history.go(-1)'>Go Back</a>";
       }else{
       $expFormat = mktime(
       date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
       );
       $expDate = date("Y-m-d H:i:s",$expFormat);
       $key = md5(2418*2+$email);
       $addKey = substr(md5(uniqid(rand(),1)),3,10);
       $key = $key . $addKey;
        // Insert Temp Table
        $sql = "INSERT INTO password_reset_temp (email, token, expDate)
        VALUES ('$email', '$key', '$expDate' )";
        
        if ($conn->query($sql) === TRUE) {
            
            $output = '<p>Cher utilisateur,</p>';
            $output .= '<p>Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe.</p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p><a href="https://www.mitb.tk/reset-password.php?token='.$key.'&email='.$email.'&action=reset" target="_blank">https://www.mitb.tk/reset-password.php?</a></p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p>Le lien va expirer après 24 heures pour des raisons de sécurité.</p>';
            $output .= '<p>Merci,</p>';
            $output .= '<p>Votre Banque, MITB</p>';
            $body = $output;
            $subject = "Réinitialisation du mot de passe - mitb.tk";
            
            $email_to = $email;
            $fromserver = "noreply@mitb.tk";
            require("PHPMailer/PHPMailerAutoload.php");
            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail->IsSMTP();
            $mail->Host = "mail.mitb.tk"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "noreply@mitb.tk"; // Enter your email here
            $mail->Password = "xxexrmCtx3HT"; //Enter your password here
            $mail->Port = 25;
            $mail->IsHTML(true);
            $mail->From = "noreply@mitb.tk";
            $mail->FromName = "MITB";
            $mail->Sender = $fromserver; // indicates ReturnPath header
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($email_to);
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "<head>
                        <meta charset='UTF-8'>
                        <title>Mot de passe oublié</title>
                        <link rel='stylesheet' href='css/styles.css'>
                        <link rel='icon' href='img/favicon.png'>
                    </head>

                    <body class='page_forgot_psw'>
                        <div class='error' style='text-align:center;margin-top: 10px'>
                            <h2 style='margin-top: 10px;'>Vous receverez sous peu un courriel avec les instructions vous indiquant comment réinitialiser votre mot passe.</h2>
                            <h2 style='margin-top: 10px;'>Soyez patient cela peu prendre jusqu'à 5 minutes. Merci! </h2>
                            <h1 style='margin-top: 10px;'><a href='https://mitb.tk/index.php'>Retour à l'accueil</a></h1>
                        </div>
                    </body>";
            }
        }
        $conn->close();
    }
} else {
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="css/style-accueil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.png">
</head>

<body class="page_forgot_psw" onload="changeButton()">
    
    <form method="post" name="reset"><br /><br />
        <label><h1>Entrez l'adresse courriel associée à votre compte:</h1></label><br /><br />
        <input type="email" name="email" placeholder="username@email.com" />
        <br /><br />
        <input id="button-forgot-mdp" type="submit" value="Réinitialiser le mot de passe" />
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
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
                document.getElementById("comptelinkfooter").innerHTML = "Mon Compte";
                document.getElementById("comptelinkfooter").setAttribute('href', "https://mitb.tk/compte.php");
            }
        }
</script>
<?php }
?>
