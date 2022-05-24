<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content align-center">
        <form action="Controller/seConnecter.php">
            <input type="email" name="email" id="email" placeholder="Email" value="">
            <input type="password" name="password" id="password" placeholder="Mot de passe" value="">
            <input type="button" sub>
        </form>
    </div>
</body>
</html>