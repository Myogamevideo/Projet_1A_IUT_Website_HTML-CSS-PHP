<?php include("head.php"); ?>
<head> 
    <link rel="stylesheet" type="text/css" media="screen" href="register.css" />
</head>

<?php require_once "functions.php"; ?>

<?php

    if(!empty($_POST))
{
	$errors = array();
        if(empty($_POST['username'])|| !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username']))
    {
		$errors['username']= "Vous pseudo n'est pas valide (alphanumérique)";?><?php
    }
        else
    {
		$req=$db->prepare('SELECT id FROM users WHERE username = ?');	
		$req->execute([$_POST['username']]);
		$user = $req->fetch();
            if($user)
        {
			    $errors['username']= "Ce pseudo est déjà pris";?><?php
	    }
	}

        if(empty($_POST['email'])|| !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
		$errors['email']= "Votre email n'est pas valide";?><?php
    }
    else
{
		$req=$db->prepare('SELECT id FROM users WHERE email=?');	
		$req->execute([$_POST['email']]);
		$user = $req->fetch();
            if($user)
        {
                    $errors['email']= "Cette email est déjà utilisé pour un autre compte";?><?php
        }
}

    if(empty($_POST['password'])|| $_POST['password'] != $_POST['password_confirm'])
{
		$errors['password']= "Votre mot de passe n'est pas valide";?><?php
}

        if(empty($errors))
    {
            $req = $db->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ? , categorie = ? , tel = ? , message = ? , sexe = ?");
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $categorie = $_POST['categorie'];
            $message = $_POST['message'];
            $sexe = $_POST['sexe'];
            
            $token = str_random(60);
            $req->execute([$_POST['username'], $password, $_POST['email'], $token, $categorie , $tel , $message, $sexe]);
            $user_id = $db->lastInsertId();

            $message.='<html> <body style="background-color: white">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" height="300px">
                <tbody>
                    <tr>
                        <h1>
                            <center> Bonjour ! Merci de vous êtes inscrit à Handball Clermont-Ferrand ! </center>
                        </h1>
                        <h2>
                            <center>Cliquez sur le lien ci dessous pour valider votre adresse mail !</center>
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
            mail($_POST['email'], 'Confirmation de votre compte', $message);
            $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
            print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,10);</script>");
            exit();
    }
}
?>

<body>
<?php include("header.php"); ?>
    <div style="background-color: #3e3d3d;">
        <form action="" method="POST">
            <div class="form-wrap">
            <h1>INSCRIPTION :</h1>
			<?php if(!empty($errors)): ?>
			<div class='erreur'>
				<p> Vous n'avez pas rempli le formulaire correctement</p>
				<ul>
				<?php foreach($errors as $error): ?>
					<li> <?= $error; ?> </li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
                <input type="text" name="username" placeholder="Nom d'utilisateur *" required autocomplete/>
                <input type="email" name="email" placeholder="Email *" required autocomplete/>
                <input type="tel" name="tel" placeholder="Num telephone" autocomplete/>
                Homme ou femme ?
                <div class="sexe">
                    <input type="radio" name="sexe" value="homme" id="homme">Homme
                    <input type="radio" name="sexe" value="femme" id="femme">Femme
                </div>
                <select name="categorie">
                    <option value="">------ Choisir ------</option>
                    <option value="Baby Hands">Baby Hands</option>
                    <option value="6 - 8 ans">6 - 8 ans</option>
                    <option value="9 - 11 ans">9 - 11 ans</option>
                    <option value="- 15 ans">- 15 ans</option>
                    <option value="- 18 ans">- 18 ans</option>
                    <option value="Seniors">Seniors</option>
                    <option value="Adulte Loisir">Adulte Loisir</option>
                </select>
                <textarea name="message" placeholder="Message facultatif" row="10" maxlength="150"></textarea>
                <input type="password" name="password" placeholder="Mot de passe *" required />
                <input type="password" name="password_confirm" placeholder="Confirmez votre mot de passe *" required />
                <input type="submit" value="S'enregistrer">
            </div>
        </form>
    </div>
</body>

</html>