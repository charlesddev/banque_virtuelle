<?php
include "dbConnect.php";

if (isset($_GET["token"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])) 
{
    $token = $_GET["token"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query(
        $conn,
        "SELECT * FROM password_reset_temp WHERE token='$token' and email='$email';"
    );
    $row = mysqli_num_rows($query);
    if ($row == "") {
        $error .= '<h2>Lien Invalide</h2>
        <p>Le lien est invalide ou expiré. Le token a probablement déjà été utilisé ou a expiré. Le lien a peut être été mal copié.</p>
        <p><a href="mitb.tk/forgotPassword.php">
        Cliquez ici pour réinitialiser votre mot de passe.</a></p>';
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
?>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Mot de passe oublié</title>
                <link rel="stylesheet" href="css/styles.css">
                <link rel="icon" href="img/favicon.png">
            </head>
            <body id="page-reset-psw">
                <form method="post" action="" name="update">
                    <input type="hidden" name="action" value="update" />
                    <br /><br />
                    <label><strong>Entrez le nouveau mot de passe:</strong></label><br />
                    <input type="password" name="pass1" required />
                    <br /><br />
                    <label><strong>Confirmez le nouveau mot de passe:</strong></label><br />
                    <input type="password" name="pass2" required />
                    <br /><br />
                    <input type="hidden" name="email" value="<?php echo $email; ?>" />
                    <input id="button-reset-psw" type="submit" value="Mettre à jour le mot de passe" />
                </form>
            </body>
<?php
        } else {
            $error .= "<h2>Lien Expiré</h2>
            <p>Le lien est expiré. Le lien que vous essayez d'utiliser était seulement valide pour 24 heures.<br /><br /></p>";
        }
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
} // isset email key validate end


if (
    isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"] == "update")
) {
    $error = "";
    $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1 != $pass2) {
        $error .= "<p>Les mots de passes ne correspondent pas, les deux mot de passes devraient être identiques.<br /><br /></p>";
    }
    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    } else {
        $pass1 = sha1($pass1);
        mysqli_query(
            $conn,
            "UPDATE Utilisateur SET Password ='$pass1' WHERE Courriel='$email';"
        );
          
        mysqli_query($conn, "DELETE FROM password_reset_temp WHERE email='$email';");
        
        echo "<head>
                <meta charset='UTF-8'>
                <title>Mot de passe oublié</title>
                <link rel='stylesheet' href='css/styles.css'>
                <link rel='icon' href='img/favicon.png'>
            </head>

            <body class='page_forgot_psw'>
                <div class='error'>
                    <p>Bravo! Votre mot de passe à été mis à jour avec succès.</p>
                    <p><a href='login.php'>Cliquez ici pour vous connecter.</a></p>
                </div>
            </body>";
    }
}
?>