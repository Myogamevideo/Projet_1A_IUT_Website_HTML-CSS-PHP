<?php include("head.php"); ?>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="header.css" />
</head>

<div class="nav">
    <div class="logo">
        <img src="img/logo.png">
    </div>
    <div class="menu">
        <ul>
            <li>
                    <a href="index.php">Home</a>
            </li>
            <li>
                <a href="market.php">Boutique</a>
            </li>
            <li>
                <a href="Inscription.php">Inscription</a>
            </li>
            <li class="dropdown">
                    <a href="#" class="dropbtn">Media</a>
                    <div class="dropdown-content">
                        <a href="video.php">Video</a>
                        <a href="#">Musique :</a>
                        <audio src="img/Tujamo.mp3" controls>Musique</audio>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Plus information</a>
                <div class="dropdown-content">
                    <a href="horaires.php">Horaires</a>
                    <a href="partenaire.php">Partenaire</a>
                    <a href="contact.php">Contact / Gymnase</a>
                </div>
            </li>
                 <?php if(isset($_SESSION['auth'])): ?>
				    <li><a href="account.php">Votre compte</a></li>
				    <li><a href="logout.php">Se déconnecter</a></li>
			    <?php elseif(isset($_SESSION['username'])): ?>
				    <li><a href="admin.php">Administration</a></li>
				    <li><a href="logout.php">Se déconnecter</a></li>
			    <?php else: ?>
				    <li><a href="register.php">Créer un compte</a></li>
				    <li><a href="connexion.php">Se connecter</a></li>
			    <?php endif; ?>
        </ul>
    </div>
</div>

    <?php if(isset($_SESSION['flash'])): ?>
    <?php foreach($_SESSION['flash']as $type => $message): ?>
        <div class='erreur'>
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>