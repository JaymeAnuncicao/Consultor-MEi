<?php
 session_start();
 if($_SESSION['authenticateUser'] == false){
     session_destroy();
     header("Location: redirect.php");
 }
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Olá,<?php echo ucfirst($_SESSION['usuario']).'.';?></h1>
</body>
</html>