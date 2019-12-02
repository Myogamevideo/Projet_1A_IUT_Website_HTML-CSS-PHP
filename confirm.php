<?php include("head.php"); ?>
    <head> 
        <link rel="stylesheet" type="text/css" media="screen" href="register.css" />
    </head>

<?php include("header.php"); ?>
<body>

    <?php
        $user_id = $_GET['id'];
        $token = $_GET['token'];
        $req = $db->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute([$user_id]);
        $user = $req->fetch();
        session_start();
        if($user && $user->confirmation_token == $token )
        {
            $db->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
            $_SESSION['flash']['success'] = 'Votre compte a bien été validé';
            $_SESSION['auth'] = $user;
            print("<script type=\"text/javascript\">setTimeout('location=(\"account.php\")' ,10);</script>");
        }
        else
        {
            $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
            print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,10);</script>");
        }
    ?>

</body>

<?php include("footer.php"); ?>
</html>

