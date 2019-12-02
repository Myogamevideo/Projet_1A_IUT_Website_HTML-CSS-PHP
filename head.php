<?php 
if(session_status() == PHP_SESSION_NONE)
{
    session_start();    
}
try
    {
        $db = new PDO('mysql:host=localhost;dbname=myogame', 'root', '');
        $db ->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }
    catch (Exception $e)
    {
        echo 'Une erreur est survenue';
        die();
    } 
?> 

<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HBCM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="shortcut icon" type="image/png" href="img/logo.jpg" />
</head>

