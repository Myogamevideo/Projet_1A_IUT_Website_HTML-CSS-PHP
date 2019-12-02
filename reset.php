<?php include("head.php"); ?>
<?php include("header.php"); ?>
<?php require_once "functions.php"; ?>
<?php
    if(isset($_GET['id']) && isset($_GET['token']))
{
    $req = $db->prepare('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if($user)
    {
            if(!empty($_POST))
        {
                if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm'])
            {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $db->prepare('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
                session_start();
                $_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié';
                $_SESSION['auth'] = $user;
                print("<script type=\"text/javascript\">setTimeout('location=(\"account.php\")' ,10);</script>");
                exit();
            }
        }
    }
        else
    {
        $_SESSION['flash']['error'] = "Ce token n'est pas valide";
        print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,10);</script>");
        exit();
    }
}
    else
{
    print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,10);</script>");
    exit();
}
?>
<body style="background-color: #3e3d3d;">
	<form action="" method="POST">
		<div class="form-wrap">
			<h1>Changement de votre mot de passe :</h1>
			<input type="password" name="password"  placeholder="Password" required/></br></br>
			<input type="password" name="password_confirm" placeholder="Confirm Password" required/></br></br></br></br>
			<input type="submit" value="Rénitialiser">
	</div>
	</form>
</body>   
<?php include("footer.php"); ?>
</html>