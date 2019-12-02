<?php include("head.php"); ?>
	<head> 
		<link rel="stylesheet" type="text/css" media="screen" href="register.css" />
	</head>

<?php
$useradmin = 'Admin';
$passwordadmin='123456789';
	if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
		if($username&&$password)
	{
			if($username==$useradmin&&$password==$passwordadmin)
		{
			$_SESSION['username']=$username;
			print("<script type=\"text/javascript\">setTimeout('location=(\"admin.php\")' ,1000);</script>");
		}
	}
}
	if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password']))
{
	$req = $db->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL');
	$req->execute(['username' => $_POST['username']]);
	$user = $req->fetch();
		if($user == null)
	{
		$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
		print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,1000);</script>");
	}
		elseif(password_verify($_POST['password'], $user->password))
	{
        $_SESSION['auth'] = $user;
		$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
		print("<script type=\"text/javascript\">setTimeout('location=(\"account.php\")' ,1000);</script>");
        exit();
	}
		else
	{
		$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
		print("<script type=\"text/javascript\">setTimeout('location=(\"connexion.php\")' ,1000);</script>");
    }
}
?>

<body>

<?php include("header.php"); ?>
<body style="background-color: #3e3d3d;">
<div class="form-wrap">
	<form action="" method="POST">
		<h1>Admininistration - Connexion :</h1>
		<input type="text" name="username" placeholder="Username or email" required></br></br>
		<input type="password" name="password" placeholder="Password" required>
		<input type="submit" value="Se connecter" name="submit">
		<a href="forget.php" style="color: rgb(0, 179, 255);">J'ai oublié mon mot de passe</a>
	</form>
</div>
</body>
</html>