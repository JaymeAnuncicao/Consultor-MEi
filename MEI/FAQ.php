
<!--1-4 -->
<!--2-10 -->
<!--3-13  -->
<!--4-3  -->
<!--5-23  -->
<!--6-18  -->
<!--7-7 -->
<!--8-6  -->
<!--9-6  -->
<!--10-7  -->
<!--11-8  -->
<!--12-1  -->
<!--13-23  -->
<!--14-2  -->
<!--15-8  -->
<!--16-1  -->
<!--17-8  -->
<!--18-10  -->
<!--19-4  -->
<!--20-7  -->
<!--21-18  -->
<!--22-14  -->
<!--23- um textão -->

<?php
    require_once 'PHP/init.php';
    if(isset($_POST['titulo'], $_POST['assunto'])){
        $titulo = $_POST['titulo'];
        $assunto = $_POST['assunto'];

        $connec = db_connect();

        $query = 'INSERT INTO noticias (assunto,titulo) VALUES (:assunto, :titulo);';
        $stmt = $connec->prepare($query);
        $stmt->bindValue(':assunto', $assunto);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->execute();
    }
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consultor MEi-FAQ</title>
    <link rel="icon" href="Media/img/logo-icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/faq.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/responsive.css" />

    <!-- LINK TEMPORARIO -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
     <!---------------------NAVBAR : INICIO-------------->
     <header>
     <nav class="navbar navbar-expand-lg  navbar-dark bg-primary fixed-top" id="Navbar">
            <a class="navbar-brand" href="#home"><img src="Media/img/logo_new.png" width="60" height="60" id="navLogo"></a>
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
                        <a class="nav-link text-white mt-3" href="index.php#funcionalidades">Funcionalidades</a>
                    </li>
                    <li class="nav-item efect" id="plans">
                        <a class="nav-link text-white mt-3" href="index.php#planos">Planos</a>
                    </li>
                    <li class="nav-item efect" id="notice">
                        <a class="nav-link text-white mt-3" href="index.php#noticias">Notícias</a>
                    </li>
                    <li class="nav-item efect">
                        <a class="nav-link text-white mt-3" href="FAQ.php">FAQ</a>
                    </li>
                    <li class="nav-item efect" id="contacts">
                        <a class="nav-link text-white mt-3" href="index.php#contatos">Contatos</a>
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
    <!-----------------NAVBAR : FIM--------------->
    <section class="container-fluid" id="FAQ">
        <div class="marge afast" >
            <h1 class="mt-5 text common">PERGUNTAS FREQUENTES</h1>
            <hr noshade class="faq-line afast">
        </div>
        <!-- LOGIN E CADASTRO -->
        <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="">
                    <div class="row afas">
                        <div class="col-md-3">
                            <button class="button-normal button button-faq text-left" onclick="funcao1()">O microempreendedor individual-MEI <i class="fas fa-chevron-right float-right"></i></button>
                            <button class="button-respon button button-faq text-left" onclick="funcao5()">Login e Cadastro <i class="fas fa-chevron-right float-right"></i></button>      
                        </div>
                    </div>
                </div>
            </div>
            <div id="faq-login"></div>
            <!-- PLANOS -->
            <div class="row">
                <div class="">    
                    <div class="row afas">
                        <div class="col-md-3">  
                            <button class="button-normal button button-faq text-left" onclick="funcao2()">Planos	<i class="fas fa-chevron-right float-right"></i></button>
                            <button class="button-respon button button-faq text-left" onclick="funcao6()">Planos	<i class="fas fa-chevron-right float-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="faq-planos"></div>
            <!-- POLITICA E PRIVACIDADE -->
            <div class="row">
                <div class="">
                    <div class="row afas">
                        <div class="col-md-3">
                            <button class="button-normal button button-faq text-left" onclick="funcao3()">Politica e privacidade	<i class="fas fa-chevron-right float-right"></i></button>
                            <button class="button-respon button button-faq text-left" onclick="funcao7()">Politica e privacidade	<i class="fas fa-chevron-right float-right"></i></button>   
                        </div>
                    </div>
                </div>
            </div>
            <div id="faq-privacidade"></div>
            <!-- POLITICA DA COMPRA -->
            <div class="row">
                <div class=""> 
                    <div class="row afas">
                        <div class="col-md-3">
                            <button class="button-normal button button-faq text-left"onclick="funcao4()">Politica de compra<i class="fas fa-chevron-right float-right"></i></button>   
                            <button class="button-respon button button-faq text-left"onclick="funcao8()">Politica de compra<i class="fas fa-chevron-right float-right"></i></button>   
                        </div>
                    </div>
                </div>
            </div>
            <div id="faq-compra"></div>
            
        </div>
        <div class="col-md-7 acorde ">
                <!-----------ACCORDION------------->
                <div class="accordion " id="accordionExample">
                    <div class="cardy">
                        <div class="" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="text">1.1- O que é o MEI - Microempreendedor Individual?</h5>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h5 class="text">1.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                            A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                            Sim, entrou em vigor em 01/07/2009.
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h5 class="text">1.4- Qual o faturamento anual  do Microempreendedor Individual?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p>
                                <p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p>
                                <p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-----------ACCORDION------------->
        </div>
        </div>
    </section>
    <footer id="footer" class="container-fluid">
        <div class="row justify-content-center aling-itens-center text-white ml-5">
            <div class="com-md-3"><img class="mt-5 mr-5" src="Media/img/logo_new.png"width="125" ></div>
            <div class="col-md-3 mt-2 box-foo1">
                <div class="row mt-3 "><a href="Consultor_MEi_Termos_De_Uso.pdf" class="termos"><h6>Termo de uso</h6></a></div>
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
                <div class="row"><a href="#" class="termos"><img src="Media/img/face-icon.png" width="35"></a><a href="#"><img class="ml-4" src="Media/img/insta-icon.png" width="35"></a></div>
            </div>
        </div>
        <div class="row justify-content-center creditos mt-5 text-white"><h6 class="  mt-3">© Desenvolvido por Praxis - Empresa Jr.2019.Todos os direitos reservados</h6> </div>
    </footer>
    <!-- <div class="col-md-6 mt-3 mb-5 mr-5 col-lg-4 float-right container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="z-depth-3 text-center rounded primary-color-dark p-5">
                <h4 class="modal-title text-white w-100 font-weight-bold">Adicionar Notícia</h4>
                <br>
                <input type="text"  name="assunto" class="form-control mb-4" placeholder="Assunto">
                <textarea name="titulo" id="campoMensagemNoticia" rows="10" class="form-control mb-4" placeholder="Titulo"></textarea>
            <button class="press press-round z-depth-1 press-black col-6">Enviar</button>
            </form>
    </div> -->
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
<!-- <div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
    <script>
        function funcao1() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">1.1- O que é o MEI - Microempreendedor Individual?</h4></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.<p>  </div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">1.2- Qual é a lei que instituiu o Microempreendedor individual?</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"><p>A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.</p></div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div><div class=""><div class="" id="headingFour"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">1.4- Qual o faturamento anual  do Microempreendedor Individual?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p><p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p><p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p></div></div></div>';
        }
        function funcao2() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">2.1- Pontos de atenção antes da formalização:</h5></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><p><b>1-</b> Verificar se recebe algum benefício previdenciário (Exemplo: Aposentadoria por invalidez, Auxílio Doença, Seguro Desemprego, etc).</p><p><b>2-</b> Procurar a prefeitura para verificar se a atividade pode ser exercida no local desejado. </p><p><b>3-</b> Verificar se as atividades escolhidas podem ser registradas como MEI. (Consultar questão 2.6)</p></div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">2.2- Situações que NÃO permitem a formalização como MEI:</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"><p><b>1- Pensionista e Servidor Público</b> Federal em atividade. Servidores públicos estaduais e municipais devem observar os critérios da respectiva legislação, que podem variar conforme o estado ou município.<p><p><b>2-</b> Pessoa que seja <b>titular, sócio ou administrador de outra empresa</b>.<p> </div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">2.3- Situações que permitem a formalização como MEI, com ressalvas:</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p><b>1-</b>  Pessoa que recebe o <strong>Seguro Desemprego</strong>: pode ser formalizada, mas poderá ter a suspensão do benefício. Em caso de suspensão deverá recorrer nos postos de atendimento do Ministério do Trabalho.</p><p><b>2 - </b>Pessoa que trabalha <strong>re</strong><strong>gistrada no regime CLT</strong>: pode ser formalizada, mas, em caso de demissão sem justa causa, não terá direito ao Seguro Desemprego.</p></div></div></div>';
        }
        function funcao3() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">3.1- O que é, como, onde posso me formalizar e quais são as vantagens de me formalizar?</h4></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body">  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">Tem para todas as empresas?</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div>';
        }
        function funcao4() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">4.1- O Microempreendedor Individual/MEI é obrigado a emitir nota fiscal?</h4></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body">  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">Tem para todas as empresas?</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div>';
        }

        function funcao5() {
            document.getElementById("faq-planos").innerHTML = '<div id="faq-planos"></div>';
            document.getElementById("faq-privacidade").innerHTML = '<div id="faq-privacidade"></div>';
            document.getElementById("faq-compra").innerHTML = '<div id="faq-compra"></div>';
            document.getElementById("faq-login").innerHTML = '<div class="respon" id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h6 class="text">Como fazer meu cadastro?</h6></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body text-justify">  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h6 class="text">Como eu troco de senha?</h6></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body text-justify"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div>';
        }
        function funcao6() {
            document.getElementById("faq-login").innerHTML = '<div id="faq-login"></div>';
            document.getElementById("faq-privacidade").innerHTML = '<div id="faq-privacidade"></div>';
            document.getElementById("faq-compra").innerHTML = '<div id="faq-compra"></div>';
            document.getElementById("faq-planos").innerHTML = '<div class="respon" id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h6 class="text">Quais são os planos?</h6></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body text-justify">  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h6 class="text">Tem para todas as empresas?</h6></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body text-justify"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div>';
        }
        function funcao7() {
            document.getElementById("faq-planos").innerHTML = '<div id="faq-planos"></div>';
            document.getElementById("faq-compra").innerHTML = '<div id="faq-compra"></div>';
            document.getElementById("faq-login").innerHTML = '<div id="faq-login"></div>';
            document.getElementById("faq-privacidade").innerHTML = '<div class="respon" id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h6 class="text">E sobre a privacidade?</h6></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body text-justify">  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h6 class="text">Tem para todas as empresas?</h6></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body text-justify"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h6 class="text">Collapsible Group Item #3</h6></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body text-justify"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div></div>';
        }
        function funcao8() {
            document.getElementById("faq-login").innerHTML = '<div id="faq-login"></div>';
            document.getElementById("faq-planos").innerHTML = '<div id="faq-planos"></div>';
            document.getElementById("faq-privacidade").innerHTML = '<div id="faq-privacidade"></div>';
            document.getElementById("faq-compra").innerHTML = '<div class="respon" id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h6 class="text">E os metodos de compra?</h6></button></h6></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body text-justify">  Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h6 class="text">Tem para todas as empresas?</h6></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body text-justify"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h6 class="text">Collapsible Group Item #3</h6></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body text-justify"> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.</div></div></div></div>';
        }
    </script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <!-- <script src="js/app.js"></script> -->
</body>
</html>
