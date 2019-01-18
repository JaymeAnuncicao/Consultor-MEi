<?php
    session_start();
    $_SESSION['usuario'] = '';
    $_SESSION['email'] = '';
    $_SESSION['senha'] = '';
    $_SESSION['authenticateUser']= false;
    $_SESSION['authenticateADM']= false;

    require_once 'PHP/init.php';
    $conex = db_connect();
    $query1= "SELECT id,assunto,titulo FROM noticias ORDER BY id DESC LIMIT 6;";
    $stmt= $conex->prepare($query1);
    $stmt->execute();
    if(isset($_POST['nomeEmpresa'],$_POST['nomeResponsavel'], $_POST['email'],$_POST['senha'],$_POST['estado'],$_POST['CNPJ'],$_POST['CNAE'])){
        $nomeEmpresa=$_POST['nomeEmpresa'];
        $nomeResponsavel=$_POST['nomeResponsavel'];
        $email=$_POST['email']; 
        $senha=sha1($_POST['senha']);
        $estado=$_POST['estado'];
        $CNPJ=$_POST['CNPJ'];
        $CNAE=$_POST['CNAE'];       
        $query3 = 'SELECT email FROM clientes WHERE email=:email';
        $stmt = $conex->prepare($query3);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(sizeof($array) == 0){
            $query2 = 'INSERT INTO clientes (nomeEmpresa,nomeResponsavel,email,senha,estado,CNPJ,CNAE) VALUES (:nomeEmpresa,:nomeResponsavel,:email,:senha,:estado,:CNPJ,:CNAE);';
            $stmt = $conex->prepare($query2);
            $stmt->bindValue(':nomeEmpresa', ucfirst($nomeEmpresa));
            $stmt->bindValue(':nomeResponsavel', ucfirst($nomeResponsavel));
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $senha);
            $stmt->bindValue(':estado', $estado);
            $stmt->bindValue(':CNPJ', $CNPJ);
            $stmt->bindValue(':CNAE', $CNAE);
            $stmt->execute();
            header("Location: index.php");
        }else {
            $err = 'Email já cadastrado';
            $cadastro = false;
        }
        
    }
    if(isset($_POST['loginemail'],$_POST['loginsenha'])){
        $login = $_POST['loginemail'];
        $lenha = sha1($_POST['loginsenha']);
        $sql = "SELECT nomeResponsavel, nomeEmpresa, senha, email FROM clientes WHERE email = :loginemail AND senha = :loginsenha;";
        $stmt = $conex->prepare($sql);
        
        $stmt->bindValue(':loginemail', $login);
        $stmt->bindValue(':loginsenha', $lenha);
        
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        $name = $dados[0]['nomeResponsavel'];
        
        if(strcmp($login,'admin@mail.com') == 0 && strcmp($lenha,'d033e22ae348aeb5660fc2140aec35850c4da997') == 0){
            $_SESSION['authenticateADM'] = true;
            header("location: admin.php");
        }elseif (strcmp($lenha,$dados[0]['senha']) == 0 && strcmp($login,$dados[0]['email']) == 0){
            $_SESSION['usuario'] = $name;
            $_SESSION['email'] = $login;
            $_SESSION['authenticateUser'] = true;
            header('location: Usuario.php');
            exit();
        }else{
            $_SESSION['authenticateADM'] = false;
            $_SESSION['authenticateUser'] = false;
            header('location: index.php');
        }
        
    }    

   


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-----TITLE---->
    <title>Consultoria MEI</title>
    <!-------FONTS------>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-----PLUGINS CSS---->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" href="css/teste.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="css/linearicons.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
</head>
<body>
    <!---------------------NAVBAR-------------->
    <header>
        <nav class="navbar navbar-expand-lg  fixed-top" id="Navbar">
            <a class="navbar-brand" href="#home"><img src="Media/img/logo_new.png" width="60" height="60" id="navLogo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-3 ">
                    <li class="nav-item active efect ">
                        <a class="nav-link nav-item text-white mt-3 " href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item efect"  id="ourenterprise">
                        <a class="nav-link text-white mt-3" href="#enterprise">Nossa Empresa</a>
                    </li>
                    <li class="nav-item efect" id="functions">
                        <a class="nav-link text-white mt-3" href="#funcionalidades">Funcionalidades</a>
                    </li>
                    <li class="nav-item efect" id="plans">
                        <a class="nav-link text-white mt-3" href="#planos">Planos</a>
                    </li>
                    <li class="nav-item efect" id="notice">
                        <a class="nav-link text-white mt-3" href="#noticias">Noticias</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" href="FAQ.php">FAQ</a>
                    </li>
                    <li class="nav-item efect" id="contacts">
                        <a class="nav-link text-white mt-3" href="#contatos">Contatos</a>
                    </li>
                    <li class="nav-item move"></li>
                    <li class="nav-item efect ">
                        <a class="nav-link active text-white mt-3 justify-content-end" data-toggle="modal" data-target="#ModalCadastro" href="#"><i class="far fa-user mr-2"></i>Cadastrar</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" data-toggle="modal" data-target="#ModalLogin" href="#"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <!----------------------HOME-------------------->
    <section id="home" class="container-fluid">
        <div class="row bg-luz">
            <div class="col-md-12 text-center margem">
                <img src="Media/img/logo.png" width="300" height="300" id="homeLogo">
                <h1 class="mt-5">A melhor resposta sua micro ou pequena empresa</h1>
                <h4 class="mt-3">Você tem dúvidas? Nós respondemos</h4>
                <a href="#"><button class="button button1 mt-5 hvr-grow">SAIBA MAIS</button></a>
            </div>
        </div>
    </section>
    <div class="marge"  id="anchorempresa"></div>
    <div class="marge" id="enterprise"></div>

    <!--------------------------------------NOSSA EMPRESA:INICIO------------------------------------------------>
    <section id="nossaempresa" class="container-fluid">
        <div class="row container-fluid justify-content-center alin" >
            <div class="col-md-4">
                <h2 class="texto ">Aprenda mais sobre a</h2>
                <p class="texto ipsum mt-5 text-justify">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica, permanecendo essencialmente  inalterado. Se popularizou na  década de 60, quando a Letraset  lançou decalques contendo Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor similique eius nihil dolorem voluptas facilis accusamus quasi nemo animi id esse enim, facere fugiat reiciendis consequuntur nisi. Blanditiis, repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores dolorum at fuga, ipsam numquam libero fugit quibusdam. </p>
            </div>
            <div class="col-md-6 ">
                <iframe class="iframe"   src="https://www.youtube.com/embed/fJ9rUzIMcZQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <div class="anchor"><hr noshade></div>
    <!--------------------------------------NOSSA EMPRESA:FIM----------------------------------------------->

    <div class="anchors" id="anchorfunction"></div>                
    <!-----------------------------FUNCINALIDADES:INICIO--------------------------->
    <section id="funcionalidades" class="container-fluid">
        <h3 class="texto text-center">FUNCIONALIDADES</h1>
        <hr noshade class="linha2  text-center">
     
        <div class="row justify-content-center ">
        <!--------------------------BLOCO 1:INICIO------------------------------>
            <div class="col-md-4 text-right ">
                <div class="row justify-content-end">   
                    <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 1</h5></a>
                        <hr noshade class="func">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 2</h5></a>
                        <hr noshade class="func ">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 3</h5></a>
                        <hr noshade class="func">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 4</h5></a>
                        <hr noshade class="func">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
            </div>
        <!----------------------------BLOCO 1:FIM------------------------>

        <!----------------------------IMG-IPHONE:INICIO------------------------>
            <div class="col-md-4 text-center iphone"><img src="Media/img/iphone.jpg" alt=""></div>
        <!----------------------------IMG-IPHONE:FIM------------------------>
        
        <!--------------------------BLOCO 2:INICIO------------------------------>
            <div class="col-md-4 ">
                <div class="row">
                    <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 5</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 6</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 7</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Funcionalidade 8</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Lorem Ipsum sobreviveu não só a cinco séculos, como também ao  salto para a editoração eletrônica</p>
                    </div>
                </div>
            </div>
        <!----------------------------BLOCO 2:FIM------------------------>    
        </div>
        <div class="row justify-content-center">
            <a href="#" class=""><button class="button button2 hvr-grow">SAIBA MAIS SOBRE TODOS ELES</button></a>
        </div>
    </section>
    <!-----------------------------FUNCINALIDADES:FIM--------------------------->
    <div class="anchors" id="anchorplanos"></div>

    <!----------------------------PLANOS:INICIO--------------------------------->
    <section class="price-area " id="planos">
				<div class="container">
					<div class="row section-gap">
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">01</h1>
								<h4>Econômico</h4>
								<p class="mt-10 mody">Individual</p>
							</div>
							<div class="package-list text-center">
								<ul>
									<li class="text-mody">Secure Online Transfer</li>
									<li class="text-mody">Unlimited Styles for interface</li>
									<li class="text-mody">Reliable Customer Service</li>
								</ul>
							</div>
							<div class="bottom-part">
								<h1>R$ 199.00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">02</h1>
								<h4>Business</h4>
								<p class="mt-10 mody">Individual</p>
							</div>
							<div class="package-list">
								<ul>
									<li class="text-mody">Secure Online Transfer</li>
									<li class="text-mody">Unlimited Styles for interface</li>
									<li class="text-mody">Reliable Customer Service</li>
								</ul>
							</div>
							<div class="bottom-part">
								<h1>R$ 299.00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">03</h1>
								<h4>Premium</h4>
								<p class="mt-10 mody">Individual</p>
							</div>
							<div class="package-list">
								<ul>
									<li class="text-mody">Secure Online Transfer</li>
									<li class="text-mody">Unlimited Styles for interface</li>
									<li class="text-mody">Reliable Customer Service</li>
								</ul>
							</div>
							<div class="bottom-part">
								<h1>R$ 399.00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">04</h1>
								<h4>Exclusivo</h4>
								<p class="mt-10 mody ">Individual</p>
							</div>
							<div class="package-list">
								<ul>
									<li class="text-mody ">Secure Online Transfer</li>
									<li class="text-mody">Unlimited Styles for interface</li>
									<li class="text-mody">Reliable Customer Service</li>
								</ul>
							</div>
							<div class="bottom-part">
								<h1>R$ 499.00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
    <!----------------------------PLANOS:FIM------------------------------------>



    <div class="anchors" id="anchorcard"></div>
    <!----------------------------------CARTÃO MEi:INICIO---------------------->
    <section id="cartao" class="container-fluid">
        <div class="row  justify-content-around  align-items-end">
            <div class="col-md-4 mt-5">
                <div class="row justify-content-center"><img src="Media/img/card-mei.jpeg" alt="" id="img-card" width="350" height="200"></div>
                <div class="row text-justify mt-4 text-modi">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex nemo, labore adipisci eveniet totam possimus delectus ab harum! Mollitia voluptatibus quam corporis maiores autem suscipit natus officiis vel atque dolor?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptas vel cupiditate dolores ratione, totam, corrupti officiis itaque, expedita praesentium quibusdam accusantium voluptatum molestiae vero voluptate suscipit pariatur laborum. Laudantium!
                </div>
            </div>
            <div class="col-md-4">
                <div class="row justify-content-center"><img src="Media/img/faq-icon.png" id="img-faq" width="350" height="200"></div>
                <div class="row text-justify mt-4 text-modi">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex nemo, labore adipisci eveniet totam possimus delectus ab harum! Mollitia voluptatibus quam corporis maiores autem suscipit natus officiis vel atque dolor?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptas vel cupiditate dolores ratione, totam, corrupti officiis itaque, expedita praesentium quibusdam accusantium voluptatum molestiae vero voluptate suscipit pariatur laborum. Laudantium!
                </div>
            </div>
        </div>
    </section>
    <!----------------------------------CARTÃO MEi:FIM-------------------------->

    <!---------------------------------DEPOIMENTOS: INICIO---------------------->
    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap container-fluid">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title  text-center">
                                <h1 class=" texto">Depoimentos</h1>
                                <hr noshade class="linha mb-5  text-center">
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="Media/img/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.		     
		                            </p>
		                            <h4>Cristiana Oliveira</h4>
		                            <p>Lorem ipsum dorlor</p>
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="Media/img/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		                            </p>
		                            <h4>Felipe Carvalho</h4>
		                            <p>Lorem ipsum dorlor</p>
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="Media/img/user3.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		                            </p>
		                            <h4>Carlos Ferreira</h4>
		                            <p>Lorem ipsum dorlor</p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
    <!---------------------------------DEPOIMENTOS: FIM---------------------->

    <div class="anchors" id="anchornews"></div>                


    <section id="noticias" class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="menu-content mt-5 col-lg-8">
                <div class="title  text-center">
                    <h1 class="texto">Noticias</h1>
                    <hr noshade class="linha mb-5  text-center">
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" container">
                <div class="active-news">
                    <div class="single-news item d-flex flex-row">
                        <div class="col-md-6 d-flex thumblr">
                            <img class="img-fluid img-news " src="Media/img/img-home.jpg" >
                        </div>
                        <div class="col-md-6 desc-news">
                            <!-- <h4>Seu dinheiro</h4>
                            <h6>Site mostra as melhores consultoras do ano</h6> -->
                            <?php
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <img class="img-fluid img-news" src="Media/img/img-home.jpg" width="300" height="150">
                        </div>
                        <div class="desc-news col-md-6">
                                <!-- <h4>Seu dinheiro</h4>
                                <h6>Site mostra as melhores consultoras do ano</h6> -->
                                <?php
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <img class="img-fluid img-news" src="Media/img/img-home.jpg" width="300" height="150">
                        </div>
                        <div class="desc-news col-md-6">
                            <!-- <h4>Seu dinheiro</h4>
                            <h6>Site mostra as melhores consultoras do ano</h6> -->
                            <?php
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <img class="img-fluid img-news" src="Media/img/img-home.jpg" width="300" height="150">
                        </div>
                        <div class="desc-news col-md-6">
                            <!-- <h4>Seu dinheiro</h4>
                            <h6>Site mostra as melhores consultoras do ano</h6> -->
                            <?php
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <img class="img-fluid img-news" src="Media/img/img-home.jpg" width="300" height="150">
                        </div>
                        <div class="desc-news col-md-6">
                            <!-- <h4>Seu dinheiro</h4>
                            <h6>Site mostra as melhores consultoras do ano</h6> -->
                            <?php
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <img class="img-fluid img-news" src="Media/img/img-home.jpg" width="300" height="150">
                        </div>
                        <div class="desc-news col-md-6">
                            <!-- <h4>Seu dinheiro</h4>
                            <h6>Site mostra as melhores consultoras do ano</h6> -->
                            <?php
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-------------------NOTICIAS:INICIO---------------------->
    
    <!--------------------NOTICIAS:FIM-------------------------------->

    <div class="anchors" id="anchorcontatos"></div>

    <!--------------------CONTATOS:INICIO-------------------------------->                                       
    <section id="contatos" class="container-fluid">
        <div class="row bg  align-itens-center">
            <div class="row justify-content-center container-fluid">
            <div class="col-12 col-md-4 mt-5 sendemail">
                <h2 class="text-white mt-5 mb-5 text-center">Entre em contato conosco</h1>
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="sendmail">
                    <input type="text" name="Contnome" class="z-depth-1  mb-3 conta1 texto" placeholder="Nome">                            
                    <input type="email" name="Contemail" class="z-depth-1  mb-3 mr-1 conta texto" id="cemail"placeholder="E-email">
                    <input type="text" name="telefone" class="z-depth-1  mb-3 conta texto" placeholder="Telefone">
                    <input type="text" name="motivo" class="z-depth-1  mb-3 conta1 texto" placeholder="Motivo do contato">
                    <textarea name="mensagem" placeholder="Mensagem..." id="mensage" cols="30" rows="10"></textarea>
                        
                </form>    
                <div class="row justify-content-center">
                    <input type="submit" value="Enviar" class="btn btn-success btn-lg col-3 mt-2 ">
                </div>                      
            </div>
            </div>
            <div class="row justify-content-end container-fluid ">
                <h6 class="text-white text-right uso">Links Úteis: <a href="#" class="termos"><i class="fas fa-paste"></i>Termos de uso</a>  <a href="#" class="termos"class="termos"><i class="far fa-folder-open"></i>Politica de privacidade</a></h6>
            </div>
        </div>
    </section>                                            
    <div class="blank"></div>
    <footer id="footer" class="container-fluid">
        
        <div class="row justify-content-center text-white">
            <h6 class="creditos">© Desenvolvido por Praxis - Empresa Jr.2018.Todos os direitos reservados</h6>
        </div>
     </footer>
   <!--------------------CONTATOS:FIM--------------------------------> 

<!---------------MODAL-CADASTRO:INICIO-------------->
    <div class="modal fade" id="ModalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-8 col-sm-4 text-right ml-4">
                        <h1 class="modal-title texto  mb-3 ml-5 mt-4" id="exampleModalCenterTitle">CADASTRO</h1>
                    </div>
                    <div class="col-md-3 col-sm-4 mt-1 ml-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>  
                <form class="text-center primary-color-dark p-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">                  
                    <input type="text" required name="nomeEmpresa" class="z-depth-1  mb-3 input1 texto" placeholder="Nome da Empresa">
                    <input type="text" required name="nomeResponsavel" class="z-depth-1  mb-3 input1 texto" placeholder="Nome do Responsavel">
                    <input type="email" required name="email" class="z-depth-1  mb-3 input1 texto" placeholder="E-mail">
                    <input type="password" required name="senha" class="z-depth-1  mb-3 input texto" placeholder="Senha">
                    <input type="text"  required name="estado" class="z-depth-1  mb-3 input texto" placeholder="Estado">
                    <input type="text" required name="CNPJ" class="z-depth-1  mb-3 input texto" placeholder="CNPJ">
                    <input type="text" required name="CNAE" class="z-depth-1  mb-3 input texto" placeholder="CNAE">
                    <input type="submit" value="Confirmar" class="btn btn-success btn-lg col-7 mt-5">
                </form>                               
            </div>
        </div>
    </div>
<!---------------MODAL-CADASTRO:FIM-------------->

<!--------------------MODAL-LOGIN:INICIO------------------->
    <div class="modal fade bd-example-modal-sm" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-7 col-sm-4 text-right ml-4">
                        <h1 class="modal-title texto mt-3 mb-5 ml-5" id="exampleModalCenterTitle">LOGIN</h1>
                    </div>
                    <div class="col-md-2 ml-5 mt-1">
                        <button type="button" class="close ml-5" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ml-5">&times;</span>
                        </button>
                    </div>
                </div>                                    
                <form class="text-center primary-color-dark p-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="email" required name="loginemail" class="z-depth-1  mb-5 input1 texto" placeholder="Usuario">
                    <input type="password" required name="loginsenha" class="z-depth-1  input1 texto" placeholder="Senha"> 
                    <input type="submit" value="Entrar" class="btn btn-success btn-lg col-6 mt-5">
                </form>                               
            </div>
        </div>
    </div>
<!--------------------MODAL-LOGIN:FIM------------------->
  
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>