<?php
session_start();
setcookie('remember', NULL, -1);
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
header('Location: index.php');

unset($_SESSION['username']);
$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';
header('Location: index.php');