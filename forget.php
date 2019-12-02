<?php include("head.php"); ?>
    <head> 
        <link rel="stylesheet" type="text/css" media="screen" href="register.css" />
    </head>

    <?php include("header.php"); ?>
    <body>
    <body style="background-color: #3e3d3d;">

<?php
    if(!empty($_POST) && !empty($_POST['email']))
{
    require_once 'functions.php';
    $req = $db->prepare('SELECT * FROM users WHERE email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
        if($user)
    {
        session_start();
        $reset_token = str_random(60);
        $db->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
        $_SESSION['flash']['success'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';

        $message.='<html> <body style="background-color : white">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" height="300px">
            <tbody>
                <tr>
                    <h1>
                        <center> Bonjour ! Vous avez demandé une réinitialisation de votre mot de passe ! </center>
                    </h1>
                    <h2>
                        <center>Cliquez sur le lien ci dessous pour changer votre mot de passe!</center>
                    </h2>
                    <center>
                        <a href="localhost/confirm.php?id='.urlencode($user_id).'&token='.urlencode($token).'" target=blank_>
                            localhost/confirm.php?id='.urlencode($user_id).'&token='.urlencode($token).'
                        </a>
                    </center>
                </tr>
            </tbody>
        </table>
        </body>
        </html>
        ';

        mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', $message);
        print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,10000);</script>");
        exit();
    }
        else
    {
            $_SESSION['flash']['danger'] = 'Aucun compte ne correspond à cet adresse';
    }
}
?>

<div class="form-wrap">
    <form action="" method="POST">
        <h1>Mot de passe oublier :</h1>
        <input type="email" name="email" placeholder="Email" required></br></br>
        <input type="submit" value="Se connecter" name="submit">
    </form>
</div>
</body>
</html>
