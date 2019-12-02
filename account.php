<?php include("head.php"); ?>
<?php include("header.php"); ?>
<?php require_once "functions.php"; ?>
<?php logged_only(); ?>

<?php

if(!empty($_POST)){
	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
		$_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
	}else{
		$user_id = $_SESSION['auth']->id;
		$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
		$db->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password,$user_id]);
		$_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
	}
}

?>

<body style="background-color: #3e3d3d;">
	<div class="form-wrap">
		<form action="" method="post">
			<h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
			<input type="password" name="password" placeholder="Changer de mot de passe"/>
			<input type="password" name="password_confirm" placeholder="Confirmation du mot de passe"/>
			<input type="submit" value="Changer mon mot de passe" name="submit">
		</form>
	</div>
</body>

<?php include("footer.php"); ?>
</html>