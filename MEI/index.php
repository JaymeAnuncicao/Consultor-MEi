<?php
    session_start();
    $_SESSION['usuario'] = '';
    $_SESSION['email'] = ''; 
    $_SESSION['senha'] = '';
    $_SESSION['authenticateUser']= false;
    $_SESSION['authenticateADM']= false;

    require_once 'PHP/init.php';
    $conex = db_connect(); 
    $query1= "SELECT id,assunto,titulo,imagem FROM noticias ORDER BY id DESC LIMIT 7;";
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
    <meta name="author" content="Gabriel Souza - Jayme Anunciação - Praxis Jr">
	<meta name="description" content="Com um projeto inovador, o Consultor MEi, chega aos Micro empreendedores individuais (MEi) e aos Micro empresários (ME) com uma proposta ousada de responder as suas duvidas, orientar seus próximos passos , informar as novidades de suas áreas de atuação, criar uma economia paralela voltada aos Mei’s e as ME’s(Cartão MEi) e para os que desejarem, poderão contratar o Serviços Web de Consultoria, pois o conhecimento vai fazer sua empresa chegar onde você quer.">
    <meta name="keywords" content="Consultoria MEi microempresas microempresas individuais">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-----TITLE---->
    <title>Consultor MEi</title>
    <!-------FONTS------>
    <link rel="icon" href="Media/img/logo-icon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-----PLUGINS CSS---->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <!-- <link rel="stylesheet" href="css/teste.css"> -->
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
        <nav class="navbar navbar-expand-lg  navbar-dark bg-primary fixed-top" id="Navbar">
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
                        <a class="nav-link text-white mt-3" href="#noticias">Notícias</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" href="FAQ.php">FAQ</a>
                    </li>
                    <li class="nav-item efect" id="contacts">
                        <a class="nav-link text-white mt-3" href="#contatos">Contatos</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" href="https://praxisjr.com.br/" target="blank">Blog</a>
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
        <div class="row margem justify-content-center bg-luz">
            
          <div class="col-md-4 box-blank margen">
                <img src="Media/img/logo.png" width="280" height="280" id="homeLogo">
                <h1 class="mt-1 text-center apoio">Apoiando você e seu negocio</h1>
                <h4 class="mt-4 text-center dout">Cadastre-se gratuitamente e tenha respostas para as suas duvidas </h4> 
                <a href="funcionalidades.php"><button class="button button1 mt-5 hvr-grow"><h4>SAIBA MAIS</h5></button></a>
          </div>
        </div>
    </section>
    <div class="marge"  id="anchorempresa"></div>
    <div class="marge" id="enterprise"></div>

    <!--------------------------------------NOSSA EMPRESA:INICIO------------------------------------------------>
    <section id="nossaempresa" class="container-fluid">
        <div class="row container-fluid justify-content-center alin" >
            <div class="col-md-4">
                <h2 class="texto ">Objetivo do consultor MEi </h2>
                <p class="texto ipsum mt-5 text-justify">Com um projeto inovador, o Consultor MEi, chega aos Micro empreendedores individuais (MEi) e aos Micro empresários (ME) com uma proposta ousada de responder as suas duvidas, orientar seus próximos passos , informar as novidades de suas áreas de atuação, criar uma economia paralela voltada aos Mei’s e as ME’s(Cartão MEi) e para os que desejarem, poderão contratar o Serviços Web de Consultoria, pois o conhecimento vai fazer sua empresa chegar onde você quer.</p>
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
                        <a href="funcionalidades.php"><h5 class="texto ajust">Fiscal/tributário</h5></a>
                        <hr noshade class="func">
                        <p class="ajust">Impostos, Obrigações acessórias e fiscalizações, aqui no <strong>Consultor MEi</strong> vamos juntos encontrar o melhor caminho.</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Pessoal/RH</h5></a>
                        <hr noshade class="func ">
                        <p class="ajust">Aqui no <strong>consultor MEi</strong>, vamos descomplicar sua vida trabalhista e lhe ajudar a conseguir o melhor da sua equipe ou colaborador.</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Jurídico </h5></a>
                        <hr noshade class="func">
                        <p class="ajust">E agora? Aqui no <strong>Consultor MEi</strong> você terá apoio para entender o que fazer e informações para fazer certo.</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Treinamentos (link/produção)</h5></a>
                        <hr noshade class="func">
                        <p class="ajust">Nos do <strong>Consultor MEI</strong> vamos ajudar a lhe capacitar, para melhorar o desempenho e atender a expectativa cada vez maior do cliente.</p>
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
                        <a href=""><h5 class="texto ajust">Financeiro</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Cartão de credito a receber, Caixa, Conta bancaria, contas a pagar e a receber, linha de credito, taxas. Ufa. Nos do <strong>Consultor MEi</strong> , junto com você , Vamos descomplicar.</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Marketing/ Estratégia</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">A analise de mercado, a pesquisa e a ação vai ajudar o seu produto ou serviço ser conhecido, nos do <strong>Consultor MEi</strong> estamos aqui para orientar seu negocio para o caminho do sucesso.</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Inovação e criatividade</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Você quer inovar, criar ou melhorar algo em seu negocio, vem com agente, nós do <strong>Consultor MEi</strong> vamos ajudar.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <a href="#"><h5 class="texto ajust">Gestão e planejamento</h5></a>
                        <hr noshade class="func1">
                        <p class="ajust">Sem metas sua empresa não vai pra lugar nenhum, saiba como planejar e gerir melhor o seu negocio, nós do <strong>Consultor MEi</strong> ajudamos.</p>
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
								<p class="mt-10 mody">Individual (MEi)</p>
							</div>
							<div class="package-list text-center">
								<ul>
									<li class="text-mody">+1 Funcionalidade</li>
									<li class="text-mody">Plano de 6 meses</li>
									<li class="text-mody">R$ 6,00 serão doados</li>
								</ul>
							</div>
							<div class="bottom-part">
								<h6> <s style="color: red;">R$ 120,00</s> </h6><h1>R$ 60,00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">02</h1>
								<h4>Business</h4>
								<p class="mt-10 mody">Individual (MEi)</p>
							</div>
							<div class="package-list">
								<ul>
									<li class="text-mody">+1 Funcionalidade</li>
									<li class="text-mody">Plana de 6 meses</li>
									<li class="text-mody">R$ 12,00 serão doados</li>
								</ul>
							</div>
							<div class="bottom-part">
                                <h6><s style="color: red;">R$ 240,00</s> </h6><h1>R$ 120,00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">03</h1>
								<h4>Premium</h4>
								<p class="mt-10 mody">Individual (ME)</p>
							</div>
							<div class="package-list">
								<ul>
									<li class="text-mody">+1 Funcionalidade</li>
									<li class="text-mody">Plano de 6 meses</li>
									<li class="text-mody">R$ 18,00 serão doados</li>
								</ul>
							</div>
							<div class="bottom-part">
                                <h6><s style="color: red;">R$ 390,00</s> </h6><h1>R$ 195,00</h1>
								<a class="price-btn text-uppercase" href="#">Compre agora</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-price">
							<div class="top-part">
								<h1 class="package-no">04</h1>
								<h4>Exclusivo</h4>
								<p class="mt-10 mody ">Individual(ME)</p>
							</div>
							<div class="package-list">
								<ul>
									<li class="text-mody ">+1 Funcionalidade</li>
									<li class="text-mody">Plano de 6 meses</li>
									<li class="text-mody">R$ 24,00 serão doados</li>
								</ul>
							</div>
							<div class="bottom-part">
                                <h6><s style="color: red;">R$ 780,00</s> </h6><h1>R$ 390,00</h1>
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
        <div class="row  justify-content-around container-fluid align-items-end">
            <div class="col-md-4 mt-5">
                <div class="row justify-content-center"><img src="Media/img/card-mei.jpeg" id="img-card" width="350" height="200"></div>
                <div class="row text-justify mt-4 text-modi">
                    O Cartão MEi vem com uma proposta de estimular negócios entre os MEIs e os Mês associados, você pode , se quiser, ganhar descontos e ao mesmo tempo pode , se quiser, dar descontos em seus produtos ou serviços.
                </div>
            </div>
            <div class="col-md-4">
                <div class="row justify-content-center"><img src="Media/img/faq-icon.png" id="img-faq" width="350" height="200"></div>
                <div class="row text-justify mt-4 text-modi">
                    O Nosso FAQ, está preparado para lhe ajudar com as duvidas mais frequentes sobre ser MEI ou ME, obrigações, Benefícios, Direitos e Muito Mais.
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
                    <h1 class="texto">Notícias</h1>
                    <hr noshade class="linha mb-5  text-center">
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" container">
                <div class="active-news">
                    <div class="single-news item d-flex flex-row">
                        <div class="col-md-6 d-flex thumblr">
                           <?php 
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                $url = $user['imagem'];
                                if(isset($user['imagem'])){
                                    echo('<img class="img-fluid img-news" src="'.$url.'" width="300" height="150">');
                                }else{echo('Sem imagem');}
                           ?>
                        </div>
                        <div class="col-md-6 desc-news">
                            <?php
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                        <?php 
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            $id=$user['id'];
                            $url = $user['imagem'];
                            if(isset($user['imagem'])){
                                echo('<img class="img-fluid img-news" src="'.$url.'" width="300" height="150">');
                            }else{echo('Sem imagem');}
                           ?>
                        </div>
                        <div class="desc-news col-md-6">
                            <?php
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <?php 
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                $url = $user['imagem'];
                                if(isset($user['imagem'])){
                                    echo('<img class="img-fluid img-news" src="'.$url.'" width="300" height="150">');
                                }else{echo('Sem imagem');}
                           ?>
                        </div>
                        <div class="desc-news col-md-6">
                            <?php  
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <?php 
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                $url = $user['imagem'];
                                if(isset($user['imagem'])){
                                    echo('<img class="img-fluid img-news" src="'.$url.'" width="300" height="150">');
                                }else{echo('Sem imagem');}
                           ?>
                        </div>
                        <div class="desc-news col-md-6">
                            <?php 
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <?php 
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                $url = $user['imagem'];
                                if(isset($user['imagem'])){
                                    echo('<img class="img-fluid img-news" src="'.$url.'" width="300" height="150">');
                                }else{echo('Sem imagem');}
                           ?>
                        </div>
                        <div class="desc-news col-md-6"> 
                            <?php
                                if(isset($user['titulo'])){
                                    echo('<h4 class="text-danger">'.ucfirst($user['assunto']). '</h4>');  
                                    echo('<h6>'.ucfirst($user['titulo']). '</h6>');
                                }else{echo('Sem noticia.');}
                            ?>
                        </div>
                    </div>
                    <div class="single-news item d-flex flex-row">
                        <div class="thumblr col-md-6 d-flex">
                            <?php 
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $id=$user['id'];
                                $url = $user['imagem'];
                                if(isset($user['imagem'])){
                                    echo('<img class="img-fluid img-news" src="'.$url.'" width="300" height="150">');
                                }else{echo('Sem imagem');}
                           ?>
                        </div>
                        <div class="desc-news col-md-6">
                            <?php
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
            <div class="col-12 col-md-6 col-lg-4 col-sm-12 mt-5 sendemail">
                <h3 class="text-white mt-5 mb-5 text-center">Entre em contato conosco</h1>
                <form  action="PHP/sendmail.php" method="post" id="sendmail" class="text-center">
                    <input type="text" name="Contnome" class="z-depth-1  mb-3 conta1  texto" placeholder="Nome">                            
                    <input type="email" name="Contemail" class="z-depth-1  mb-3 mr-1 conta  texto" id="cemail"placeholder="E-email">
                    <input type="text" name="telefone" class="z-depth-1  mb-3 conta  texto" placeholder="Telefone">
                    <input type="text" name="motivo" class="z-depth-1  mb-3 conta1  texto" placeholder="Motivo do contato">
                    <textarea name="mensagem" placeholder="Mensagem..." id="mensage" cols="30" rows="10"></textarea>
                        
                </form>    
                <div class="row justify-content-center button-contatos">
                    <input type="submit" value="Enviar"  class="btn btn-success btn-lg col-3 col-sm-4 mt-2 ">
                </div>                      
            </div>
            </div>
        </div>
    </section>                                            
    <div class="bluest"></div>
    <footer id="footer" class="container-fluid">
        <div class="row justify-content-center aling-itens-center text-white ml-5">
            <div class="com-md-3"><img class="mt-5 mr-5" src="Media/img/logo_new.png"width="125" ></div>
            <div class="col-md-3 mt-2 box-foo1">
                <div class="row mt-3 "><a href="Consultor_MEi_Termos_De_Uso.pdf" download class="termos"><h6>Termo de uso</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Consultor MEi</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Cadastre-se</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Maximo´s Tecnologia Ltda</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>CNPJ N. 11.063.128/0001-10</h6></a></div>
            </div>
            <div class="col-md-3 mt-2 box-foo2">
                <div class="row mt-3 "><a href="#" class="termos" ><h6>FAQ</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Planos</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Novidades</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Politica de privacidade</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>contato@consultormei.com.br</h6></a></div>
            </div>
            <div class="col-md-3">
                <div class="row  "><a href="#" class="termos"><h6>Rede socias</h6></a></div>
                <div class="row"><a href="#" class="termos"><img src="Media/img/face-icon.png" alt="Facebook" width="35" id="face-icon"></a><a href="#"><img class="ml-4" src="Media/img/insta-icon.png" alt="Instagram" id="insta-icon" width="35"></a></div>
            </div>
        </div>
        <div class="row justify-content-center creditos mt-5 text-white"><h6 class="mt-3">© Desenvolvido por Praxis - Empresa Jr.2019.Todos os direitos reservados</h6> </div>
    </footer>
   <!--------------------CONTATOS:FIM--------------------------------> 

<!---------------MODAL-CADASTRO:INICIO-------------->
    <div class="modal fade" id="ModalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-8 col-sm-4 text-right">
                        <h1 class="modal-title texto  mb-3 title-margin" id="exampleModalCenterTitle">CADASTRO</h1>
                    </div>
                    <div class="col-md-3 col-sm-4 mt-1 ml-1 exit-margin">
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
            <div class="modal-content modal-login">
                <div class="row">
                    <div class="col-md-7 col-sm-4 text-right ml-4">
                        <h1 class="modal-title texto mt-3 login-margin" id="exampleModalCenterTitle">LOGIN</h1>
                    </div>
                    <div class="col-md-2 ml-5 mt-1">
                        <button type="button" class="close ml-5" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ml-5">&times;</span>
                        </button>
                    </div>
                </div>                                    
                <form class="text-center primary-color-dark p-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="email" required name="loginemail" class="z-depth-1  mb-5 input1 texto saiu" placeholder="Usuario">
                    <input type="password" required name="loginsenha" class="z-depth-1  input1 texto saiu" placeholder="Senha"> 
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