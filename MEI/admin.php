
<?php
    session_start();
    if($_SESSION['authenticateADM'] == false){
        session_destroy();
        header("Location: redirect.php");
    }
    require_once 'PHP/init.php';

    if(isset($_POST['assunto'],$_POST['numero'],$_POST['titulo'])){
        $assunto = $_POST['assunto'];
        $myid = $_POST['numero'];
        $titulo = $_POST['titulo'];
        $imagem = $_POST['img-url'];

        $conec = db_connect();
        $sql = "UPDATE noticias SET assunto = '$assunto' ,titulo  = '$titulo' ,imagem='$imagem' WHERE id = '$myid' ;";
        $stmt = $conec->prepare($sql);
        $stmt->execute(); 
    }



?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-----TITLE---->
     <title>MEI-Admin</title>
    <!-------FONTS------>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-----PLUGINS CSS---->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    
    
</head>
<body>
    <section class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="row mb-3">
                        <h6>Notícia a ser atualizada:</h6><select name="numero" class="adm-placy ml-3">
                            <option value="6">1°</option>
                            <option value="5">2°</option>
                            <option value="4">3°</option>
                            <option value="3">4°</option>
                            <option value="2">5°</option>
                            <option value="1">6°</option>
                        </select>
                    </div>  
                    <div class="row mb-3">
                        <h6>Título da Notícia:</h6><input type="text" class="ml-1 adm-place" name="assunto" placeholder="Título">
                    </div>
                    <div class="row mb-3">
                        <h6>Link da imagem:</h6><input type="text" name="img-url" class="ml-2 adm-place" placeholder="Link da imagem">
                    </div>
                    <div class="row">
                        <h6>Texto da notícia:</h6><textarea name="titulo" class="adm-text"  placeholder="Titulo"></textarea>
                    </div>
                    <div class="row justify-content-center">   
                        <input type="submit" value="Atualizar" class="btn btn-success btn-lg col-4 mt-5 mr-5">
                        <a href="logout.php" class="btn btn-danger btn-lg col-4 mr-5 mt-5 ">Sair</a>
                    </div>
                </form> 
            </div>
        </div>
    </section>





    <script type="text/javascript" src="Js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="Js/wow.min.js"></script>
    <script type="text/javascript" src="Js/app.js"></script>
</body>
</html>