<?php

    session_start();
    $_SESSION['usuario'] = '';
    $_SESSION['email'] = ''; 
    $_SESSION['senha'] = '';
    $_SESSION['authenticateUser']= false;
    $_SESSION['authenticateADM']= false;

    require_once 'PHP/init.php';
    $conex = db_connect(); 
    // $query1= "SELECT id,assunto,titulo,imagem FROM noticias ORDER BY id DESC LIMIT 7;";
    // $stmt= $conex->prepare($query1);
    // $stmt->execute();
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
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TITLE -->
    <title>Sobre MEi e suas Funcionalidades</title>

    <!-------FONTS------>
    <link rel="icon" href="Media/img/logo-icon.ico">
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
<header>
        <nav class="navbar navbar-expand-lg bg-primary fixed-top" id="Navbar">
            <a class="navbar-brand" href="#home"><img src="Media/img/logo_new.png" width="60" height="60" id="nav-Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-3 ">
                    <li class="nav-item active efect ">
                        <a class="nav-link nav-item text-white mt-3 " href="index.php#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item efect"  id="ourenterprise">
                        <a class="nav-link text-white mt-3" href="index.php#enterprise">Nossa Empresa</a>
                    </li>
                    <li class="nav-item efect" id="functions">
                        <a class="nav-link text-white mt-3" href="index.php#funcion">Funcionalidades</a>
                    </li>
                    <li class="nav-item efect" id="plans">
                        <a class="nav-link text-white mt-3" href="index.php#planos">Planos</a>
                    </li>
                    <li class="nav-item efect" id="notice">
                        <a class="nav-link text-white mt-3" href="index.php#noticias">Notícias</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" href="#">FAQ</a>
                    </li>
                    <li class="nav-item efect" id="contacts">
                        <a class="nav-link text-white mt-3" href="index.php#contatos">Contatos</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" href="#">Blog</a>
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
    <section class="margeament container-fluid justify-content-center parallax" id="page-info">
            <div class=" row black-bj">
                <div class="row container-fluid justify-content-center mb-5 mt-5">
                    <h2 class="text-white" id="funcion">Sobre o consultor MEI</h2>
                </div>
                <!-------------NOSSA EMPRESA----------->
                <div class="row container-fluid justify-content-center mt-5" id="fun1">
                    <div class="col-md-8 col-sm-8">
                    <div class="row container justify-content-center"><h4 class="text-white">Nossa Empresa</h4></div>
                    <hr noshade class="func2">
                    <div class="row container text-justify">
                        <p class="text-white">O Consultor MEi, é uma Plataforma Web, do grupo Maximo’s Tecnologia.
                            Com um projeto inovador, o Consultor MEi, chega aos Micro empreendedores individuais (MEi) e aos Micro empresários (ME) com uma proposta ousada de responder as suas duvidas, orientar seus próximos passos , informar as novidades de suas áreas de atuação, criar uma economia paralela voltada aos Mei’s e as ME’s(Cartão MEi) e para os que desejarem, poderão contratar o <strong>Serviços Web de Consultoria</strong>, pois o conhecimento vai fazer sua empresa chegar onde você quer. <br>O consultor mei veio para cobrir uma lacuna entre o desejo do micro empreendedor individual e do micro empresário pelo conhecimento.
                            Trabalhamos dando consultoria em varias áreas com o intuito de solucionar suas duvidas e lhe mostrar um caminho para o crescimento do seu negocio.
                            Com uma ferramenta ampla e moderna estamos podendo oferecer consultoria a qualquer MEI (Micro empreendedor individual) ou ME (Micro empresário) do território brasileiro, pois todos merecem a oportunidade de ter apoio quando precisa.

                            </p>
                    </div>
                    </div>
                </div>
                <div class="row justify-content-center container-fluid pl-5">
                    <!----------MISSÃO-------->
                    <div class="col-md-4 col-sm-3">
                        <div class="row container justify-content-center"><h4 class="text-white">Missão</h4></div>
                        <hr noshade class="func1">
                        <div class="row container text-justify">
                            <p class="text-white">Colaborar, informar e ajudar o empreendedor a vencer as dificuldades e os desafios, com dados uteis e relatórios qualificados. </p>
                        </div>
                    </div>
                    <!--------------VISÃO---------->
                    <div class="col-md-4 col-sm-3">
                        <div class="row container justify-content-center"><h4 class="text-white">Visão</h4></div>
                        <hr noshade class="func1">
                        <div class="row container text-justify">
                            <p class="text-white">Ser reconhecido pelos resultados alcançados e assim, tornar-se referencia nacional em consultoria e informações importantes para MEI’s (Micro Empreendedores Individuais  e ME’s (Micro empresários).</p>
                        </div>
                    </div>
                    <!-----------VALORES----------->
                    <div class="col-md-4 col-sm-3">
                        <div class="row container justify-content-center"><h4 class="text-white">Valores</h4></div>
                        <hr noshade class="func1">
                        <div class="row container text-justify">
                            <p class="text-white"><strong>Nossos Clientes:</strong>  Atende-los com se eles fosse os nossos melhores amigos.<br>
                            <strong> Nossa Equipe:</strong> Respeito, valorizaçãopelo mérito e trabalho em equipe, garante uma performance equilibrada entre todos, fortalecendo as pessoas e seus resultados coletivos e individuais.<br></p>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center mt-5 mb-5 container-fluid pl-5">
                    <!--------------NÓS E A SOCIEDADE------------>
                    <div class="col-md-6 col-sm-4">
                        <div class="row container justify-content-center"><h4 class="text-white">Nós e a sociedade</h4></div>
                        <hr noshade class="func3">
                        <div class="row container text-justify">
                            <p class="text-white">A consciência social é o primeiro caminho a entender as diferenças e buscar intimamente uma sociedade mais justa e fraterna. <strong>(Somos doadores de parte das receitas, de consultoria, a entidades sem fins lucrativos)</strong></p>
                        </div>   
                    </div>
                    <!----------------O PLANETA------------>
                    <div class="col-md-6 col-sm-4">
                        <div class="row container justify-content-center"><h4 class="text-white">O Planeta e todos nós</h4></div>
                        <hr noshade class="func3">
                        <div class="row container text-justify">
                            <p class="text-white">Fazer a nossa parte, é dar o nosso exemplo e esperar que no mundo de cada uma pessoa inicie uma mudança no mundo de todos nós. <strong>(Uso sustentável de todos os recursos disponíveis, renováveis ou não renovável)</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5 mb-5 container-fluid pl-5">
                    <div class="col-md-6 col-sm-4">
                            <div class="row container justify-content-center"><h4 class="text-white">Sobre os planos</h4></div>
                            <hr noshade class="func3">
                            <div class="row container text-justify">
                                <p class="text-white">Os “planos do consultor mei” refletem os “valores” da empresa.</p>
                                <p class="text-white">- A plataforma tem áreas gratuitas</p>
                                <p class="text-white">- O valor do serviço é Baixo, para poder atender o maior numero de empreendedores.</p>
                                <p class="text-white">- Ate sendo Baixo, do valor cobrado nos doamos uma pequena parte para entidades sem fins lucrativos.</p>
                                <p class="text-white">- Informamos os custos dos impostos no valor do serviço. </p>
                                <p class="text-white">- informamos o valor liquido mensal e semestral que será recebido.</p>
                                <p class="text-white">- E o mais importante, nada disso reduz a qualidade dos serviços que iremos lhe oferecer.</p> 
                                <p class="text-white"><strong>P.S. cobramos os seis meses de uma so vez para reduzir os custos com boletos e com as taxas do cartão de debito ou credito.</strong></p>                               
                            </div>
                    </div>
                </div>

            </div>
    </section>  
    <section class="container-fluid justify-content-center" id="func-info">
        <div class="row container-fluid justify-content-center mt-5 mb-5">
            <h2 class="texto" id="funcion">Funcionalidades</h2>
        </div>
        <div class="row justify-content-center pl-3">
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 1</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 2</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 3</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 4</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pl-3">
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 5</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 6</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 7</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row container justify-content-center"><h4 class="texto">Fucionalidade 8</h4></div>
                <hr noshade class="func">
                <div class="row container text-justify">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A id nam aut praesentium possimus iste assumenda dignissimos doloremque officiis sunt! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et unde voluptatibus libero quas beatae, corporis sit optio assumenda voluptatum, quisquam nam nesciunt porro nulla doloremque! Qui nesciunt omnis amet laborum odio saepe mollitia dicta, voluptatem deserunt eius? Quibusdam, libero sed nostrum ullam esse soluta voluptate veritatis eos laboriosam.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="bluest"></div>
    <footer id="footer" class="container-fluid">
        <div class="row justify-content-center aling-itens-center text-white ml-5">
            <div class="com-md-3"><img class="mt-5 mr-5" src="Media/img/logo_new.png"width="125" ></div>
            <div class="col-md-3 mt-2">
                <div class="row mt-3 "><a href="Consultor_MEi_Termos_De_Uso.pdf" class="termos"><h6>Termo de uso</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Consultor MEi</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Cadastre-se</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Maximo´s Tecnologia Ltda</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>CNPJ N. 11.063.128/0001-10</h6></a></div>
            </div>
            <div class="col-md-3 mt-2 ">
                <div class="row mt-3 "><a href="#" class="termos" ><h6>FAQ</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Planos</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Novidades</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>Politica de privacidade</h6></a></div>
                <div class="row mt-3 "><a href="#" class="termos"><h6>contato@consultormei.com.br</h6></a></div>
            </div>
            <div class="col-md-3">
                <div class="row  "><a href="#" class="termos"><h6>Rede socias</h6></a></div>
                <div class="row"><a href="#" class="termos"><img src="Media/img/face-icon.png" width="35"></a><a href="#"><img class="ml-4" src="Media/img/insta-icon.png" width="35"></a></div>
            </div>
        </div>
        <div class="row justify-content-center creditos mt-5 text-white"><h6 class="  mt-3">© Desenvolvido por Praxis - Empresa Jr.2019.Todos os direitos reservados</h6> </div>
    </footer>

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

    <script type="text/javascript" src="Js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="Js/wow.min.js"></script>
    <script src="Js/owl.carousel.min.js"></script>
</body>
</html>