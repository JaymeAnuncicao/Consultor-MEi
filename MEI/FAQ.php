
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
        <div class="row justify-content-center mt-6">
            <h1 class="mt-5 text common">PERGUNTAS FREQUENTES</h1>
            <hr noshade class="faq-line afast">
        </div>
        <!-- LOGIN E CADASTRO -->
        <div class="row faq-ground justify-content-center ">
        <div class="">
            <div class="row ">
                <div class="accordion" id="accordionExample">
                    <!-- ITEM 1 -->
                    <div class="cardy mb-2">
                        <div class="" id="headingOne">
                            <h5 class="mb-0 flyiner">
                                <button class="btn btn-link btn-mode" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h5 class="text">1- O MICROEMPREENDEDOR INDIVIDUAL - MEI</h5>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <!-- ----ACCORDION INSIDE---- -->
                            <div class="accordion" id="accordionmode">
                                <div class="cardy">
                                    <div class="" id="headingOne1">
                                        <h5 class="mb-0 flyiner">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                                <h6 class="text">1.1- O que é o MEI - Microempreendedor Individual?</h6>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1" data-parent="#accordionmode">
                                        <div class="card-body">
                                            <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                            <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="" id="headingTwo1">
                                        <h5 class="mb-0 flyiner">
                                            <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                                <h6 class="text">1.2- Qual é a lei que instituiu o Microempreendedor individual?</h6>  
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionmode">
                                        <div class="card-body">
                                            A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="" id="headingThree1">
                                        <h5 class="mb-0 flyiner">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                                <h6 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h6>  
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionmode">
                                        <div class="card-body">
                                            Sim, entrou em vigor em 01/07/2009.
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="" id="headingFour1">
                                        <h5 class="mb-0 flyiner">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour1" aria-expanded="false" aria-controls="collapseFour1">
                                                <h6 class="text">1.4- Qual o faturamento anual  do Microempreendedor Individual?</h6>  
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour1" class="collapse" aria-labelledby="headingFour1" data-parent="#accordionmode">
                                        <div class="card-body">
                                            <p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p>
                                            <p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p>
                                            <p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ------ITEM 2----- -->
                    <div class="mb-2">
                        <div class="" id="headingTwo">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h5 class="text">2- INFORME-SE ANTES DE FORMALIZAR</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- ----ACCORDION INSIDE---- -->
                                <div class="accordion " id="accordionmode2">
                                    <div class="cardy">
                                        <div class="" id="headingOne2">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                                    <h6 class="text">2.1- Pontos de atenção antes da formalização:</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p><b>1- </b>Verificar se recebe algum benefício previdenciário (Exemplo: Aposentadoria por invalidez, Auxílio Doença, Seguro Desemprego, etc).</p>
                                                <p><b>2 -</b>Procurar a prefeitura para verificar se a atividade pode ser exercida no local desejado.</p>
                                                <p><b>3 - </b>Verificar se as atividades escolhidas podem ser registradas como MEI. (Consultar questão 2.6)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo2">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                    <h6 class="text">2.2- Situações que NÃO permitem a formalização como MEI:</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p><b>1- </b><b>Pensionista e Servidor Público</b> Federal em atividade. Servidores públicos estaduais e municipais devem observar os critérios da respectiva legislação, que podem variar conforme o estado ou município.</p>
                                                <p><b>2-</b> Pessoa que seja <b>titular, sócio ou administrador de outra empresa</b>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree2">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                                    <h6 class="text">2.3- Situações que permitem a formalização como MEI, com ressalvas:</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p><b>1- </b>Pessoa que recebe o <strong>Seguro Desemprego</strong>: pode ser formalizada, mas poderá ter a suspensão do benefício. Em caso de suspensão deverá recorrer nos postos de atendimento do Ministério do Trabalho.</p>
                                                <p><b>2- </b>Pessoa que trabalha <b>registrada no regime CLT:</b> pode ser formalizada, mas, em caso de demissão sem justa causa, não terá direito ao Seguro Desemprego.</p>
                                                <p><b>3- </b>Pessoa que recebe <b>Auxílio Doença:</b> pode ser formalizada, mas perde o beneficio a partir do  mês da formalização.</p>
                                                <p><b>4- </b> Pessoa que recebe aposentadoria <b>por invalidez</b> e o <b>pensionista inválido;</b></p>
                                                <p><b>5- Benefício de Prestação Continuada da Assistência Social (BPC-LOAS):</b><br>O beneficiário do BPC-LOAS que se formalizar como Microempreendedor Individual-MEI não perderá o benefício de imediato, mas poderá acontecer avaliação do Serviço Social que, ao identificar o aumento da renda familiar, comprove que não há necessidade de prorrogar o benefício ao portador de necessidades.</p>
                                                <p><b>6- Pessoas que recebem Bolsa Família:</b>o registro no MEI não causa o cancelamento do programa Bolsa Família, a não ser que haja aumento na renda familiar acima do limite do programa. Mesmo assim, o cancelamento do benefício não é imediato, só será efetuado no ano de atualização cadastral.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour2">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour2" aria-expanded="false" aria-controls="collapseFour1">
                                                    <h6 class="text">2.4- O que é a Consulta Prévia de endereço e atividade? Onde fazer a consulta prévia?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour2" class="collapse" aria-labelledby="headingFour2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>A consulta prévia é uma pesquisa realizada junto à Prefeitura (ou Administração Regional) para o cidadão verificar e confirmar se o endereço ou local desejado para estabelecer o seu negócio é passível de instalação de atividade da empresa ou não.</p>
                                                <p>O órgão responsável para responder a consulta prévia é a prefeitura municipal ou Administração Regional, no caso do DF. É ela que determinará se o endereço indicado para estabelecer a sua empresa é passível ou não de instalação da atividade comercial. Para fazer a consulta prévia, consulte a página da Prefeitura na internet, se houver. Lembre-se: antes de efetuar a sua formalização no Portal do Empreendedor, procure se informar perante a Prefeitura ou Administração sobre o local e atividade que pretende exercer. Isso evita problemas na formalização, tais como o cancelamento do registro.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive2">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive2" aria-expanded="false" aria-controls="collapseFour1">
                                                    <h6 class="text">2.5- Quais documentos ou dados são necessários para me formalizar como MEI? Após a formalização, o que devo fazer?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive2" class="collapse" aria-labelledby="headingFour2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>Para se formalizar, se faz necessário informar o número do CPF e datade nascimento do titular, o número do título de eleitor ou o número doúltimo recibo de entrega da Declaração Anual de Imposto de RendaPessoa Física – DIRPF, caso esteja obrigado a entregar a DIRPF.</p>
                                                <p>Lembre-se também, de que é necessário conhecer as normas daPrefeitura ou Administração para o funcionamento de seu negócio, sejaele qual for.</p>
                                                <p><b>Após a formalização no Portal do Empreendedor,recomendamos:</b></p>
                                                <p><b>a) </b>Imprimir os <a class="internal-link" href="resolveuid/d2b19bffaf5d471fb8dde8cedb432084" target="_blank" title="">DAS</a> para recolhimento das contribuições ao INSS,ISS e/ou ICMS para o ano;</p>
                                                <p><b>b) </b>>Imprimir o <a class="internal-link" href="resolveuid/7661c73442db415c94034565b2030a57" target="_blank" title="">Certificado de Microempreendedor Individual –CCMEI;</p>
                                                <p><b>c) </b>Imprimir o <a href="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp" target="_blank">Cartão do CNPJ</a> no site da Receita Federal;</p>
                                                <p><b>d) </b>Imprimir e preencher todo mês o Relatório de Receitas Brutas, disponível no Portal do Empreendedor/Obrigações.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix2">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseSix2" aria-expanded="false" aria-controls="collapseSix1">
                                                    <h6 class="text">2.6- O Microempreendedor Individual pode se formalizar no mesmo endereço de outro MEI?<br> O Microempreendedor Individual pode dividir o mesmo espaço físico onde realiza a atividade com outro MEI?</h5>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix2" class="collapse" aria-labelledby="headingSix1" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>Como cada Prefeitura tem sua legislação, normas e procedimentos próprios conforme Códigos de Zoneamento Urbano e de Posturas Municipais,  recomendamos realizar uma consulta prévia junto à Prefeitura antes de efetuar a formalização no Portal do Empreendedor para que possa verificar a possibilidade de funcionamento de duas atividades em um mesmo endereço.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven2">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven2" aria-expanded="false" aria-controls="collapseFour1">
                                                    <h6 class="text">2.7- É possível solicitar a inscrição como MEI e manter vínculo empregatício com carteira assinada?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven2" class="collapse" aria-labelledby="headingSeven2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>Sim. Não há impedimento de um empregado, com carteira assinada exercer atividade econômica como MEI nas horas vagas.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight2">
                                            <h5 class="mb-0 flyiner ">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight2" aria-expanded="false" aria-controls="collapseEight2">
                                                    <h6 class="text">2.8- Quais atividades podem ser enquadradas como Microempreendedor Individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight2" class="collapse" aria-labelledby="headingEight2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>As Atividades Permitidas ao MEI são aquelas determinadas segundo o Comitê Gestor do Simples Nacional - CGSN, anexo XI da <a class="external-link" href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank" title="">Resolução CGSN n.140 2018</a>. Acesse o Portal do Empreendedor e consulte a listagem das ocupações permitidas para o MEI.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine2">
                                            <h5 class="mb-0 flyiner ">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine2" aria-expanded="false" aria-controls="collapseNine2">
                                                    <h6 class="text">2.9- Minha ocupação não consta no Portal. Como faço para me formalizar?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine2" class="collapse" aria-labelledby="headingNine2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>Só pode se formalizar como MEI quem exerce ocupação descrita na lista de atividades permitidas constante do Anexo XI da <a class="external-link" href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank" title="">Resolução CGSN nº 140, de 22 de maio de 2018.</a></p>
                                                <p>Desta forma, recomenda-se que antes de iniciar o processo de formalização, o empreendedor verifique se sua atividade consta na lista do anexo citado acima ou no Portal do Empreendedor.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen2">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseTen2" aria-expanded="false" aria-controls="collapseTen2">
                                                    <h6 class="text">2.10- A pessoa física que possui débitos comerciais ou dívidas junto a instituições financeiras, bem como,<br> restrição cadastral nos órgãos de proteção de crédito, poderá se formalizar como MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen2" class="collapse" aria-labelledby="headingTen2" data-parent="#accordionmode2">
                                            <div class="card-body">
                                                <p>Sim. Não existem impedimentos para que a pessoa física com débitos, dívidas comerciais ou bancárias, bem como, com restrição cadastral junto às instituições de proteção ao crédito se formalize como MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 3 -->
                    <div class="mb-2">
                        <div class="" id="headingThree">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h5 class="text">3- FORMALIZAÇÃO COMO MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode3">

                                    <div class="cardy">
                                        <div class="" id="headingOne3">
                                            <h5 class="mb-0 flyiner ">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                                                    <h6 class="text">3.1- O que é, como, onde posso me formalizar e quais são as vantagens de me formalizar?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>A formalização é o procedimento que dá vida à empresa, ou seja, é o registro empresarial que consiste na regularização da situação da pessoa que exerce atividade econômica frente aos órgãos do Governo, como Junta Comercial, Receita Federal, Prefeitura e órgãos responsáveis por eventuais licenciamentos, quando necessários.</p>
                                                <p>A formalização é gratuita e deve ser feita pelo Portal do Empreendedor no endereço <a class="external-link" href="http://www.portaldoempreendedor.gov.br./" target="_blank" title="">www.portaldoempreendedor.gov.br.</a><br>O SEBRAE oferece orientação gratuita sobre a formalização. Para saber qual a unidade do SEBRAE mais próxima acesse:  <a class="external-link" href="http://www.sebrae.com.br/sites/PortalSebrae/Contato" target="_blank" title="">http://www.sebrae.com.br/sites/PortalSebrae/Contato</a>.</p>
                                                <p>É necessário atentar que, após a regularização, deve-se recolher mensalmente as  contribuições de R$ 49,90 (ao INSS), acrescido de R$ 5,00 (para Prestadores de Serviço) ou R$ 1,00 (para Comércio e Indústria) por meio de carnê emitido através do Portal do Empreendedor. Essas despesas são legalmente estabelecidas e garantem àquele que exerce a atividade o direito à aposentadoria, ao auxílio doença, licença maternidade, entre outros benefícios.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                                    <h6 class="text">3.2- Quanto tempo demora para me formalizar?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>A formalização é feita pela internet! O CNPJ, a inscrição na Junta Comercial, no INSS e o Alvará Provisório de Funcionamento são obtidos imediatamente, gerando um documento único, que é o <a class="internal-link" href="resolveuid/7661c73442db415c94034565b2030a57" target="_self" title="">Certificado da Condição de Microempreendedor Individual - CCMEI</a>. Não há a necessidade de assinaturas ou envio de documentos e cópias. Tudo é feito eletronicamente.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                                    <h6 class="text">3.3- Posso me formalizar a qualquer tempo?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                               <p>Sim, a formalização pode ser feita em qualquer época de forma gratuita <b>no </b><a href="resolveuid/2fb1dcab3d6055adab0a44a88700c0ca"><b>Portal do Empreendedor</b></a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour3" aria-expanded="false" aria-controls="collapseFour3">
                                                    <h6 class="text">3.4- Qual o custo da formalização do Microempreendedor Individual- MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour3" class="collapse" aria-labelledby="headingFour3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>O ato de formalização está isento de qualquer tarifa ou taxa, todavia, após a formalização é necessário o pagamento mensal dos tributos de R$ 49,90 (INSS), acrescido de R$ 5,00 (para Prestadores de Serviço) ou R$ 1,00 (para Comércio e Indústria) por meio do DAS (carnê) emitido através do Portal do Empreendedor ou pela opção de Débito automático e Pagamento online.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive3" aria-expanded="false" aria-controls="collapseFive3">
                                                    <h6 class="text">3.5- Preciso levar algum documento para a Junta Comercial? Quais? A Junta Comercial precisa aprovar meu pedido de formalização como MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive3" class="collapse" aria-labelledby="headingFive2" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>Não é necessário encaminhar nenhum documento à Junta Comercial. Após o cadastramento, o CNPJ, a inscrição na Junta Comercial, no INSS e o Alvará Provisório de Funcionamento são obtidos imediatamente, gerando um documento único, que é o Certificado da Condição de Microempreendedor Individual - CCMEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix3" aria-expanded="false" aria-controls="collapseSix3">
                                                    <h6 class="text">3.6- Qual a idade mínima para poder me formalizar como MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix3" class="collapse" aria-labelledby="headingSix3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>A idade mínima é de 18 anos, porém, poderão registrar-se como MEI as pessoas maiores de 16 anos e menores de 18 anos legalmente emancipadas. Nesse último caso, é obrigatório, ao se inscrever no Portal do Empreendedor, o preenchimento eletrônico da Declaração de Capacidade, com o seguinte texto: "<b>Declaro, sob as penas da Lei, ser legalmente emancipado</b>".</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven3" aria-expanded="false" aria-controls="collapseSeven3">
                                                    <h6 class="text">3.7- Será feita alguma fiscalização após o registro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven3" class="collapse" aria-labelledby="headingSeven3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>Sim, poderão ser realizadas fiscalizações. A Secretaria da Receita Federal, as Secretarias de Fazenda dos Estados e as Secretarias Municipais de Finanças poderão fiscalizar o cumprimento das obrigações fiscais.</p>
                                                <p>Além das fiscalizações tributárias, também poderão ser realizadas fiscalizações trabalhistas, sanitárias, ambientais, metrológicas e de segurança contra incêndio, sendo estas, obrigatoriamente orientadoras na primeira visita, conforme prevê o artigo 55 da Lei Complementar 123/2006.</p>
                                                <p>Também poderá ocorrer fiscalização orientadora quanto ao uso e ocupação do solo, conforme prevê a Lei Complementar n. 147/2014.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight3" aria-expanded="false" aria-controls="collapseEight3">
                                                    <h6 class="text">3.8- O Microempreendedor Individual - MEI tem Contrato Social? O MEI pode ter sócio?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight3" class="collapse" aria-labelledby="headingEight3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>O MEI não tem contrato social e não pode ter sócio. O MEI é um Empresário Individual, que exerce atividade econômica em nome próprio.</p>
                                                <p>O <a class="internal-link" href="resolveuid/7661c73442db415c94034565b2030a57" target="_self" title="">Certificado da Condição de Microempreendedor Individual – CCMEI</a>, é o documento comprobatório do registro como MEI, conforme previsto na Resolução CGSIM n. 48, de 11 de outubro de 2018, e substitui o Requerimento de Empresário para todos os fins.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine3" aria-expanded="false" aria-controls="collapseNine3">
                                                    <h6 class="text">3.9- Posso cadastrar um nome fantasia? Como devo proceder?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine3" class="collapse" aria-labelledby="headingNine3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>Sim, a qualquer momento o MEI pode cadastrar um nome fantasia. O nome fantasia é cadastrado através do <a href="http://www.portaldoempreendedor.gov.br/duvidas-frequentes/resolveuid/1826aa9fc6f346868c3d3a9f476fabd5" target="_blank">Portal do Empreendedor</a>, no card, "Atualize seus dados", na opção "<a href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/alterar-dados-mei/alterar-dados" target="_blank">Alterar Dados</a>". Importante atentar-se para as regras do Instituto Nacional da Propriedade Intelectual - INPI, que é o órgão que faz o registro de marcas. O simples cadastro do nome fantasia na Junta Comercial NÃO dá direito ao uso do mesmo caso seja registrado como marca por outra empresa. Caso o MEI queira registrar o nome fantasia que usa como marca acesse o site do INPI: <a href="http://www.inpi.gov.br/" target="_blank">http://www.inpi.gov.br</a> para maiores informações.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen3" aria-expanded="false" aria-controls="collapseTen3">
                                                    <h6 class="text">3.10- Como tenho certeza que consegui concluir minha formalização como Microempreendedor Individual- MEI? O que comprova o registro do MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen3" class="collapse" aria-labelledby="headingTen3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>O processo de formalização do MEI será considerado devidamente concluído com a emissão automática, pelo Portal do Empreendedor, do <a class="internal-link" href="resolveuid/7661c73442db415c94034565b2030a57" target="_blank" title="">Certificado da Condição de Microempreendedor Individual – CCMEI</a>, que é o documento comprobatório do registro como MEI.</p>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven3">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven3" aria-expanded="false" aria-controls="collapseEleven3">
                                                    <h6 class="text">3.11- Ao iniciar minha formalização no Portal do Empreendedor,<br> o formulário eletrônico apresenta informações erradas nos campos de "Identificação", como devo proceder?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven3" class="collapse" aria-labelledby="headingEleven3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>Erros de dados cadastrais podem ocorrer principalmente em relação ao nome. Esses erros estão na base de dados da Receita Federal do Brasil, pois os dados cadastrais são vinculados ao CPF. Nestes casos é melhor corrigir os erros identificados antes de proceder com a formalização. Assim, ocorrendo a constatação de existência de erros dos dados cadastrais informados, a exemplo de erro no seu nome, sugere-se não completar a formalização. Dirija-se, a uma unidade dos Correios, ao Banco do Brasil ou Caixa Econômica Federal, munido dos documentos pessoais que comprovem o erro e proceda à retificação dos dados incorretos. Após efetuar a correção e verificar que os dados cadastrais estão corretos volte ao Portal do Empreendedor e faça sua formalização.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve3" aria-expanded="false" aria-controls="collapseTwelve3">
                                                    <h6 class="text">3.12- O que fazer quando o sistema aponta impedimento do titular no ato da formalização?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve3" class="collapse" aria-labelledby="headingTwelve3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>No momento da formalização o MEI não pode ser titular, sócio ou administrador de outra empresa, pois isso constitui impedimento para o seu cadastramento. Qualquer dúvida procure um posto de atendimento da Receita Federal do Brasil, para consulta e certificação da sua situação cadastral. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen3">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen3" aria-expanded="false" aria-controls="collapseThirteen3">
                                                    <h6 class="text">3.13- O MEI pode ter mais do que uma ocupação ou atividade econômica conforme a Classificação Nacional de Atividades Econômicas (CNAE)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen3" class="collapse" aria-labelledby="headingThirteen3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>Sim. Além da atividade principal, o MEI pode registrar até 15 (quinze) ocupações para suas atividades secundárias, as quais serão vinculadas ao código de Classificação Nacional de Atividades Econômicas - CNAE.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 4 -->
                    <div class="mb-2">
                        <div class="" id="headingFour">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h5 class="text">4- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode4">

                                    <div class="cardy">
                                        <div class="" id="headingOne4">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                                                    <h6 class="text">4.1-  O Microempreendedor Individual/MEI é obrigado a emitir nota fiscal?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne4" data-parent="#accordionmode4">
                                            <div class="card-body">
                                                <p>O MEI estará dispensado de emitir nota fiscal para consumidor pessoa física, porém, estará obrigado à emissão quando o destinatário da mercadoria ou serviço for outra empresa, salvo quando esse destinatário emitir nota fiscal de entrada.</p>
                                                <p>O MEI não tem a obrigação de emitir a Nota Fiscal Eletrônica – NF-e, mesmo se realizar vendas interestaduais, exceto se desejar e por opção. (§ 1º do artigo 106, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank"> Resolução CGSN nº 140, de 2018</a>).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo4">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                                    <h6 class="text">4.2- Presto serviços apenas para uma empresa, posso ser Microempreendedor Individual e emitir nota fiscal apenas para essa empresa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo4" data-parent="#accordionmode4">
                                            <div class="card-body">
                                               <p>Sim. É permitido que o Microempreendedor Individual- MEI, no seu ramo de negócio venha a ser fornecedor ou prestador de serviço para pessoas físicas, para uma ou mais empresas, emitindo, nestes casos, as notas fiscais correspondentes.</p>
                                               <p>Mas lembre-se: não é permitido substituir o vínculo empregatício, isto é, o emprego com carteira assinada, pela condição de MEI. O MEI prestador de serviço para empresas não pode ter com elas relação de pessoalidade, subordinação e habitualidade.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree4">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                                                    <h6 class="text">4.3- Tenho que ter algum controle do meu faturamento/ receita e notas fiscais emitidas?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree4" class="collapse" aria-labelledby="headingThree4" data-parent="#accordionmode4">
                                            <div class="card-body">
                                            <p>Sim. O empreendedor deverá registrar, mensalmente, em formulário simplificado, o total das suas receitas. Para tanto, deverá imprimir e preencher todo mês o <a href="http://www.portaldoempreendedor.gov.br/public/docs/RELATORIO_MENSAL_DAS_RECEITAS_BRUTAS.doc">Relatório de Receitas Brutas Mensais</a>, conforme modelo disponível no Portal do Empreendedor.</p><p><b><u>O MEI deverá manter as notas fiscais de suas compras e vendas, arquivadas pelo prazo de 05 anos, a contar da data de sua emissão.</u></b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 5 -->
                    <div class="mb-2">
                        <div class="" id="headingFive">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <h5 class="text">5- PREVIDÊNCIA E DEMAIS BENEFÍCIOS</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion" id="accordionmode5">

                                    <div class="cardy">
                                        <div class="" id="headingOne5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                                                    <h6 class="text">5.1- Quais os benefícios previdenciários do MEI?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne5" class="collapse show" aria-labelledby="headingOne5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Ao se formalizar, o MEI passa a ter cobertura previdenciária para si e seus dependentes, com os seguintes benefícios.</p>
                                                <p><strong>PARA O EMPREENDEDOR:</strong></p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                                <p><b>PARA OS DEPENDENTES:</b></p>
                                                <p>Pensão por morte e auxílio reclusão: esses dois benefícios têm duração variável, conforme a idade e o tipo do beneficiário.</p>
                                                <p><b>• Duração de 4 meses a contar da data do óbito para o cônjuge: </b><br>-Se o óbito ocorrer sem que o segurado tenha realizado 18 contribuições mensais à Previdência ou;<br>-Se o casamento ou união estável tenha iniciado há menos de 2 anos antes do falecimento do segurado;</p>
                                                <p><b>• Duração variável conforme a tabela abaixo para o cônjuge: </b><br>-Se o óbito ocorrer depois de realizadas 18 contribuições mensais pelo segurado e pelo menos 2 anos após o início do casamento ou da união estável; ou</p>
                                                <table style="width:100%">
                                                    <tr>
                                                        <th>Idade do cônjuge na data do óbito</th>
                                                        <th>Duração máxima do benefício</th>
                                                    </tr>
                                                    <tr>
                                                        <td>menos de 21 anos</td>
                                                        <td>3 anos</td>
                                                    </tr>
                                                    <tr>
                                                        <td>entre 21 e 26 anos</td>
                                                        <td>6 anos</td>
                                                    </tr>
                                                    <tr>
                                                        <td>entre 27 e 29 anos</td>
                                                        <td>10 anos</td>
                                                    </tr>
                                                    <tr>
                                                        <td>entre 30 e 40 anos</td>
                                                        <td>15 anos</td>
                                                    </tr>
                                                    <tr>
                                                        <td>entre 41 e 43 anos</td>
                                                        <td>20 anos</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a partir de 44 anos</td>
                                                        <td>Vitalício</td>
                                                    </tr>
                                                </table>
                                                <p><b>• O benefício é devido até os 21 anos de idade, salvo em caso de invalidez ou deficiência.</b></p>
                                                <p>Para os benefícios que exigem carência mínima (quantidade de  contribuições), as contribuições não precisam ser seguidas, desde que o segurado não fique muito tempo sem contribuir, ou seja, não ocorra a perda da qualidade de segurado entre as contribuições. O MEI mantém a qualidade de segurado (vínculo com a previdência social, e direito aos seus benefícios) em regra, até 12 meses após a última contribuição.</p>
                                                <p><b>Observação: </b><i>O calculo dos benefícios é efetuado com base nas contribuições realizadas pelo segurado desde 7/1994. Assim, ainda que esteja contribuindo como MEI (que é com base em um salário mínimo), o valor do benefício pode ser superior a 01 salário mínimo. Se não houver outras contribuições além de MEI, o benefício será no valor de salario mínimo.</i></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5">
                                                    <h6 class="text">5.2- O empregado de uma empresa privada pode se inscrever como MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            Sim, não há vedação à inscrição de empregado de empresa privada como MEI.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.3- O MEI pode contratar como empregado o cônjuge ou o companheiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree5" class="collapse" aria-labelledby="headingThree5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            Não, o MEI não pode contratar o próprio cônjuge como empregado. Somente será admitida a filiação do cônjuge ou companheiro como empregado quando contratado por sociedade em nome coletivo em que participe o outro cônjuge ou companheiro como sócio, desde que comprovado o efetivo exercício de atividade remunerada, nos termos do § 2º do art. 8º da Instrução Normativa INSS/PRES nº 77/2015 INSS.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour5" aria-expanded="false" aria-controls="collapseFour5">
                                                    <h6 class="text">5.4- O MEI pode contribuir de forma adicional para receber benefício superior a um salário mínimo?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour5" class="collapse" aria-labelledby="headingFour5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            <p>Não, pois conforme o art.21, § 2º, da Lei nº 8.212, de 1991, a alíquota de contribuição do MEI incide sobre o valor do salário mínimo. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive5">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseFive5" aria-expanded="false" aria-controls="collapseFive5">
                                                    <h6 class="text">5.5- O período de contribuição como Microempreendedor Individual <br> poderá ser somado a outros períodos de contribuição para a Previdência Social?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive5" class="collapse" aria-labelledby="headingFive5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Sim, o tempo de contribuição pode ser contado para concessão de aposentadoria por idade, assim como para o cumprimento de carência para auxílio-doença, salário-maternidade e aposentadoria por invalidez, desde que devidamente recolhidos.</p>
                                                <p>No entanto, para que o período de contribuição do MEI conte para a aposentadoria por tempo de contribuição, o MEI deverá complementar a contribuição mensal mediante recolhimento, sobre o valor correspondente ao limite mínimo mensal do salário de contribuição em vigor na competência a ser complementada, da diferença entre o percentual pago e o de 20%, acrescido de juros moratórios (§ 3º do art. 21 da Lei nº8.212, de 1991).</p>
                                                <p>Para informações sobre esses procedimentos, recomenda-se entrar em contato diretamente com a Central 135 do INSS.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix5">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseSix5" aria-expanded="false" aria-controls="collapseSix5">
                                                    <h6 class="text">5.6- No caso do MEI estar inadimplente com os pagamentos (DAS),<br> qual é o prejuízo ou penalidade que o MEI terá junto ao INSS/Previdência Social?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix5" class="collapse" aria-labelledby="headingSix5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>São dois grandes prejuízos para o trabalhador:</p>
                                                <p>Primeiro, não terá esse tempo inadimplente contado para nenhum benefício da previdência social.</p>
                                                <p>Segundo, caso necessite de algum benefício não programado, como auxílio doença, pensão por morte ou salário maternidade, por exemplo, poderá não ter direito a esses.</p>
                                                <p>Além disso, quando for recolher as contribuições atrasadas, terá que calcular os valores acrescidos de multa e juros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven5" aria-expanded="false" aria-controls="collapseSeven5">
                                                    <h6 class="text">5.7- O MEI que estiver recebendo auxílio-doença ou salário maternidade deve pagar o DAS?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven5" class="collapse" aria-labelledby="headingSeven5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Sim, quando o ICMS ou ISS acumularem R$ 10,00. Isto porque, em caso de gozo de benefício de auxílio-doença ou de salário-maternidade, não é devido o recolhimento da contribuição do MEI relativamente à Previdência Social, desde que o período do benefício englobe o mês inteiro, mas permanecem devidos os tributos ICMS e ISS.</p>
                                                <p>Caso o início do gozo do auxílio-doença e do salário-maternidade transcorra dentro do mês, será devido o recolhimento da contribuição do MEI relativo àquele mês.</p>
                                                <p>Exemplo: Se o benefício vai do dia primeiro ao último dia do mês (1º a 31), a parcela do INSS não é devida. Mas se o benefício tem início ou fim previsto dentro do mês, o DAS deve ser pago relativo a esse mês.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight5" aria-expanded="false" aria-controls="collapseEight5">
                                                    <h6 class="text">5.8- Como MEI, se eu engravidar, como farei para dar entrada no salário-maternidade?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight5" class="collapse" aria-labelledby="headingEight5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>A segurada poderá agendar o requerimento de salário-maternidade pela Central de Atendimento 135 ou através da página da Previdência Social na Internet, selecionando a opção "Requerimento de Salário Maternidade".</p>
                                                <p>O salário-maternidade da Microempreendedora Individual será pago diretamente pelo Instituto Nacional do Seguro Social – INSS e a contribuição previdenciária devida pela MEI durante o recebimento do salário maternidade será descontada automaticamente do valor deste beneficio, referente ao mês inteiro em que ficar em benefício.</p>
                                                <p>Também podem ter direito ao salário-maternidade o MEI do sexo masculino, nos casos de falecimento da mãe (gestante), adoção ou guarda judicial para fins de adoção ocorrida a partir de 25/10/2013 (data da publicação da Lei nº 12.873/2013), e a segurada, nas hipóteses de parto natimorto, adoção e aborto não criminoso.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine5" aria-expanded="false" aria-controls="collapseNine5">
                                                    <h6 class="text">5.9- Como será pago o Salário - Maternidade à empregada do MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine5" class="collapse" aria-labelledby="headingNine5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                O INSS pagará diretamente o salário-maternidade à empregada do MEI.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen5" aria-expanded="false" aria-controls="collapseTen5">
                                                    <h6 class="text">5.10- Já sou aposentado, como MEI o que ganharei ao contribuir para o INSS?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen5" class="collapse" aria-labelledby="headingTen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>A contribuição previdenciária do MEI que já for aposentado não dá direito a uma segunda aposentadoria, porém o segurado tem direito a salário-maternidade e acesso ao serviço de reabilitação profissional do INSS.</p>
                                                <p>É importante ressaltar que os benefícios previdenciários não são as únicas vantagens decorrentes da formalização, tendo em vista o tratamento empresarial diferenciado dispensado ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven5" aria-expanded="false" aria-controls="collapseEleven5">
                                                    <h6 class="text">5.11- Sou aposentado por invalidez, se eu me formalizar como Microempreendedor Individual - MEI perderei a aposentadoria?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven5" class="collapse" aria-labelledby="headingEleven5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim. O aposentado por invalidez que retorna ao trabalho como MEI ou realizando qualquer outra atividade é considerado recuperado e apto ao trabalho, portanto, deixará de receber o benefício por invalidez.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve5" aria-expanded="false" aria-controls="collapseTwelve5">
                                                    <h6 class="text">5.12- O MEI que se aposenta por invalidez deve dar baixa em sua inscrição como MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve5" class="collapse" aria-labelledby="headingTwelve5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            A concessão da aposentadoria por invalidez está condicionada ao afastamento da atividade como MEI, dessa forma o MEI deverá realizar a baixa de sua inscrição, uma vez que a inscrição ativa indica a continuidade da atividade remunerada.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen5" aria-expanded="false" aria-controls="collapseThirteen5">
                                                    <h6 class="text">5.13- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen5" class="collapse" aria-labelledby="headingThirteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Sim. A percepção do salário-maternidade está condicionada ao afastamento da atividade desempenhada, sob pena de suspensão do benefício.</p>
                                                <p>Portanto, a formalização como MEI, e o respectivo exercício dessa atividade, poderá ensejar a suspensão do salário-maternidade.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen5">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen5" aria-expanded="false" aria-controls="collapseFourteen5">
                                                    <h6 class="text">5.14- Sou tutor e administro uma pensão por morte de um órfão menor de idade. <br> Caso me registre como MEI, o menor perderá o benefício previdenciário?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen5" class="collapse" aria-labelledby="headingFourteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Não, o órfão menor não perde o benefício previdenciário da pensão por morte a que tem direito pelos atos praticados pelo tutor.</p>
                                                <p>Na dúvida sobre a natureza do benefício recebido pelo menor, entre em contato com a Previdência Social.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen5" aria-expanded="false" aria-controls="collapseFifteen5">
                                                    <h6 class="text">5.15- Qual o prazo para o MEI solicitar o auxílio doença?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen5" class="collapse" aria-labelledby="headingFifteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>O auxilio doença (para o próprio MEI) poderá ser solicitado a partir do primeiro dia em que o MEI ficar incapacitado de exercer suas atividades. O pagamento será devido a contar da data do início incapacidade, quando requerido em até 30 dias do afastamento.</p>
                                                <p>Para requerer qualquer benefício perante o INSS/previdência, o segurado deve ligar para Central telefônica 135 para agendar seu atendimento, eletronicamente através da página da Previdência Social na Internet, ou em qualquer agência do INSS/Previdência Social.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen5" aria-expanded="false" aria-controls="collapseSixteen5">
                                                    <h6 class="text">5.16- Para o MEI que também trabalha como empregado, qual o prazo para solicitar o auxilio doença?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen5" class="collapse" aria-labelledby="headingSixteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>O auxílio-doença para o próprio MEI  poderá ser solicitado a partir do primeiro dia em que o MEI ficar incapacitado de exercer suas atividades.</p>
                                                <p>Como empregado de uma empresa privada, o auxílio-doença é devido ao trabalhador que ficar incapacitado para o seu trabalho ou para a sua atividade habitual por mais de 15 (quinze) dias consecutivos.</p>
                                                <p>Se o trabalhador tiver dois vínculos com a previdência social (como MEI e empregado de empresa privada) poderá, se ficar incapacitado para as duas atividades, requerer o auxílio-doença para ambas as atividades.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeventeen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen5" aria-expanded="false" aria-controls="collapseSeventeen5">
                                                    <h6 class="text">5.17- O MEI pode receber Seguro-Desemprego?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeventeen5" class="collapse" aria-labelledby="headingSeventeen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            <p>Sim, desde que não tenha auferido renda mensal igual ou superior a 1 (um) salário mínimo no período de pagamento do benefício. Para mais informações, procure os postos de atendimento do Ministério do Trabalho.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEighteen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen5" aria-expanded="false" aria-controls="collapseEighteen5">
                                                    <h6 class="text">5.18- Se eu ficar sem contribuir durante um período, posso retomar as contribuições?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEighteen5" class="collapse" aria-labelledby="headingEighteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Sim, nesse caso o segurado deve retomar as contribuições assim que possível, para reconquistar a condição de filiado da Previdência Social.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNineteen5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNineteen5" aria-expanded="false" aria-controls="collapseNineteen5">
                                                    <h6 class="text">5.19- Caso o MEI decida encerrar sua atividade, pode continuar contribuindo para o INSS?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNineteen5" class="collapse" aria-labelledby="headingNineteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, pode continuar contribuindo na categoria de segurado facultativo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwenty5">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseTwenty5" aria-expanded="false" aria-controls="collapseTwenty5">
                                                    <h6 class="text">5.20- Uma pessoa de 60 anos, que nunca contribuiu para o INSS, e se registra como MEI. Como é necessário ter 180 <br> contribuições mensais, isso significa que só poderá se aposentar por idade aos 75 anos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwenty5" class="collapse" aria-labelledby="headingTwenty5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            <p>Sim. A aposentadoria por idade exige, além da idade mínima, 180 contribuições mensais. É importante saber que existem casos em que o trabalhador teve vínculo empregatício no passado, momento em que o empregador fez o recolhimento em nome do trabalhador. Ligue para central da Previdência Social nº 135, ou verifique sua carteira de trabalho, para saber se há registro de contribuição previdenciária antiga.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyOne5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyOne5" aria-expanded="false" aria-controls="collapseTwentyOne5">
                                                    <h6 class="text">5.21- Se uma pessoa aposentada por invalidez se tornar MEI, perde o benefício?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyOne5" class="collapse" aria-labelledby="headingTwentyOne5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                            <p>Sim. O aposentado por invalidez que retorna ao trabalho como MEI é considerado recuperado e apto ao trabalho. Portanto, deixará de receber o benefício por invalidez.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyTwo5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyTwo5" aria-expanded="false" aria-controls="collapseTwentyTwo5">
                                                    <h6 class="text">5.22- Quais os requisitos para uma aposentadoria por idade urbana?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyTwo5" class="collapse" aria-labelledby="headingTwentyTwo5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>Os requisitos são os seguintes:</p>
                                                <ul>
                                                    <li>Mulher aos 60 anos de idade;</li>
                                                    <li>Homem aos 65 idade;</li>
                                                    <li>180 (cento e oitenta) contribuições mensais (15 anos).</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyThree5">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyThree5" aria-expanded="false" aria-controls="collapseTwentyThree5">
                                                    <h6 class="text">5.23- Quais são os critérios para a aposentadoria por tempo de contribuição?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyThree5" class="collapse" aria-labelledby="headingTwentyThree5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Não se existe idade mínima. É necessário 30 anos de contribuição para mulheres e de 35 anos de contribuição para homens. Além disso, no caso do MEI, deverá complementar a contribuição mensal mediante recolhimento, sobre o valor correspondente ao salário mínimo em vigor na competência a ser complementada, da diferença entre o percentual pago e o de 20%, acrescido dos juros moratórios.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 6 -->
                    <div class="mb-2">
                        <div class="" id="headingSix">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <h5 class="text">6- PAGAMENTO DE OBRIGAÇÕES MENSAIS</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode6">

                                    <div class="cardy">
                                        <div class="" id="headingOne6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
                                                    <h6 class="text">6.1- O Carnê da Cidadania será enviado para endereço do MEI em 2019?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne6" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>NÃO. O Carnê da Cidadania <b>não</b> será emitido pelo governo federal e demais órgãos e instituições (SEMPE; SEBRAE; RFB; INSS...).</p>
                                                <p>Para gerar a guia do Documentos de Arrecadação do Simples Nacional – DAS - acesse o Portal do Empreendedor em<strong>  </strong>“Pague sua contribuição Mensal ”.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="false" aria-controls="collapseTwo6">
                                                    <h6 class="text">6.2- Qual o valor das contribuições mensais (Carnê do MEI - DAS) para o ano de 2019?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>A Contribuição do <strong>MEI - Microempreendedor Individual</strong>, para 2019 será de:</p>
                                                <table>
                                                    <tr>

                                                    </tr>
                                                </table>
                                                <p>O valor do Salário Mínimo é de <strong>R$ 998,00</strong> (novecentos e cinquenta e quatro reais), por mês, conforme <strong>Decreto nº 9.961, de 1° de janeiro 2019.</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6">
                                                    <h6 class="text">6.3- Como o MEI deve fazer para recolher as suas contribuições mensais (Carnê do MEI - DAS) e fazer seus pagamentos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree6" class="collapse" aria-labelledby="headingThree6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Para o MEI formalizado ou que se formalizou, deverá acessar o Portal do Empreendedor e acessar o card: “Pague sua contribuição mensal”. O empreendedor poderá realizar uma das opções disponíveis:<span> </span><a href="https://www8.receita.fazenda.gov.br/SimplesNacional/Servicos/Grupo.aspx?grp=16" target="_blank">debito automático</a>, <a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/pgmei.app/Identificacao" target="_blank">pagamento on-line</a> ou <a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/pgmei.app/Identificacao" target="_blank">boleto de pagamento</a>.</p>
                                                <p>No caso do boleto de pagamento, o empreendedor deverá imprimir as Guias para recolhimento das suas contribuições e fazer o pagamento nos bancos conveniados,  casas lotéricas e/ou agências dos correios (Banco Postal).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour6" aria-expanded="false" aria-controls="collapseFour6">
                                                    <h6 class="text">6.4- Para o MEI que não pagou o boleto mensal no vencimento, é possível recalcular a guia para pagamento em atraso?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour6" class="collapse" aria-labelledby="headingFour6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Não. É necessário imprimir uma nova guia para recolhimento em atraso, acessando Portal do Empreendedor na aba<span> </span><a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/pgmei.app/Identificacao" target="_blank">Boleto de Pagamento</a>, no card: <span>“Pague sua contribuição mensal</span><span>”. </span></p>
                                                <p>Os boletos de pagamentos serão gerados novamente e impressos, acrescidos com multas e juros para recolhimento até último dia útil do mês. Não é necessário procurar nenhuma instituição.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive6" aria-expanded="false" aria-controls="collapseFive6">
                                                    <h6 class="text">6.5- Se o MEI durante o ano alterar, incluir ou excluir atividades do registro, o valor do DAS será alterado?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive6" class="collapse" aria-labelledby="headingFive6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Quando o MEI, altera, incluiu ou excluiu atividades durante o ano, o valor do DAS (boletos) não sofre alteração até o encerramento do ano, em Dezembro.</p>
                                                <p>Assim, o MEI deve continuar a recolher os boletos mensais do carnê, com o mesmo valor. Não será emitido outro carnê da cidadania. Para o próximo ano o MEI receberá o carnê com os valores já alterados.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix6" aria-expanded="false" aria-controls="collapseSix6">
                                                    <h6 class="text">6.6- O MEI sem movimento (Inativo), como deve proceder para não gerar novos débitos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix6" class="collapse" aria-labelledby="headingSix6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>O MEI deverá quitar os débitos pendentes, acessando o Portal do Empreendedor, opção “<a class="internal-link" href="resolveuid/d2b19bffaf5d471fb8dde8cedb432084" target="_self" title="">CARNÊ MEI - DAS</a>” e, após, solicitar o encerramento (baixa) do registro como MEI através do Portal do Empreendedor, na aba MEI - Microempreendedor Individual e após clicar em “<a class="internal-link" href="resolveuid/339d5f3fe1bb4004ba46fe34bdf200d7" target="_blank" title="">Solicitação de Baixa</a>”, gratuitamente.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven6">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven6" aria-expanded="false" aria-controls="collapseSeven6">
                                                    <h6 class="text">6.7- O Microempreendedor Individual tem que pagar algum boleto de cobrança que chega pelo correio, e-mail ou SMS <br> relativo a seu negócio para  instituições privadas como associações e sindicatos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven6" class="collapse" aria-labelledby="headingSeven6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Não. O MEI, <b>NÃO</b> é obrigado a se filiar a nenhuma instituição ou pagar boletos <b>enviados pelo correio, e-mail ou SMS por instituições, associações e/ou sindicatos</b>. Sendo assim, caso receba este tipo de cobrança, NÃO efetue o pagamento, vez que, é indevida.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight6" aria-expanded="false" aria-controls="collapseEight6">
                                                    <h6 class="text">6.8- Quais impostos devem ser pagos pelo Microempreendedor Individual- MEI? Quais são os valores e os vencimentos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight6" class="collapse" aria-labelledby="headingEight6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                            <p>Com o registro, o MEI passa a ter a obrigação de contribuir para o INSS/Previdência Social, sendo de 5% sobre o valor do Salário Mínimo, mais R$ 1,00 de ICMS para o Estado (atividades de indústria, comércio e transportes de cargas interestadual) e/ou R$ 5,00 ISS para o município (atividades de Prestação de Serviços e Transportes Municipal).</p>
                                            <p>>A vantagem para o MEI é o direito aos benefícios previdenciários, tais como, aposentadoria por idade, licença maternidade, auxílio-doença, entre outros, após obedecidos os prazos de carência. A contribuição ao INSS é reajustada sempre que houver o aumento do salário mínimo. O benefício previdenciário também é aumentado sempre que houver aumento do salário mínimo.</p>
                                            <p>O vencimento dos impostos (DAS) é até o <b>dia 20 de cada mês</b>, passando para o dia útil seguinte caso incida em final de semana ou feriado.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine6" aria-expanded="false" aria-controls="collapseNine6">
                                                    <h6 class="text">6.9- Como faço o pagamento dos impostos devidos pelo Microempreendedor Individual- MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine6" class="collapse" aria-labelledby="headingNine6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>O MEI poderá fazer o pagamento dos impostos e contribuições através da guia de pagamento (DAS), disponibilizada no Portal do Empreendedor na opção “CARNÊ MEI - DAS”. Para impressão, informe apenas o número do CNPJ. O MEI tem a opção de imprimir todos os DAS mensais (de janeiro a dezembro) para realizar os recolhimentos durante o ano.</p>
                                                <p>O MEI pode efetuar o pagamento em qualquer agência da Caixa Econômica Federal, Banco do Brasil, Bancos Estaduais, Casas Lotéricas e/ou Bancos Conveniados. O vencimento da Guia DAS é dia 20 de cada mês, passando para o dia útil seguinte, caso o dia 20 seja final de semana ou feriado.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen6" aria-expanded="false" aria-controls="collapseTen6">
                                                    <h6 class="text">6.10- Qual será o procedimento em caso de atraso nos pagamentos dos impostos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen6" class="collapse" aria-labelledby="headingTen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Após o vencimento do carnê ou da guia DAS, o MEI deverá gerar um novo DAS, acessando a opção “<a class="internal-link" href="resolveuid/d2b19bffaf5d471fb8dde8cedb432084" target="_blank" title="">CARNÊ MEI - DAS</a>”. O DAS será impresso com multa e juros, atualizado para a data informada para pagamento.</p>
                                                <p>A multa será de 0,33% por dia de atraso limitado a 20% e os juros serão calculados com base na taxa SELIC para títulos federais, acumulada mensalmente, calculados a partir do mês subsequente ao da consolidação até o mês anterior ao do pagamento, e de 1% (um por cento) relativamente ao mês em que o pagamento estiver sendo efetuado.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven6" aria-expanded="false" aria-controls="collapseEleven6">
                                                    <h6 class="text">6.11- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven6" class="collapse" aria-labelledby="headingEleven6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>MEI efetuou o pagamento de seu DAS em duplicidade, como proceder?</p>
                                                <ul>
                                                    <li>Contribuição Previdenciária (competência federal);</li>
                                                    <li>ICMS (competência estadual);</li>
                                                    <li>ISS (competência municipal).</li>
                                                </ul>
                                                <p>O MEI poderá solicitar a restituição do DAS pago indevidamente, até 5 anos após a data do seu recolhimento, diretamente ao respectivo órgão público federado, conforme citamos acima e observada a respectiva competência tributária.</p>
                                                <p>Exemplo: MEI com atividade de comércio e serviços recolhe um DAS indevidamente. Nesse caso, deverá solicitar a restituição da Contribuição Previdenciária na unidade da Receita Federal do Brasil; do valor de ICMS perante a Secretaria de Fazenda Estadual; e com relação ao ISS na Administração Tributária Municipal.</p>
                                                <p>Como os procedimentos e documentos a serem apresentados podem variar, o MEI deve procurar maiores informações diretamente nos respectivos órgãos.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve6" aria-expanded="false" aria-controls="collapseTwelve6">
                                                    <h6 class="text">6.12- O que acontece quando o MEI NÃO faz sua declaração anual – DASN/SIMEI ou a entrega com atraso?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve6" class="collapse" aria-labelledby="headingTwelve6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Quando o MEI entrega a Declaração Anual do Simples Nacional do MEI (DASN/SIMEI), em atraso, fica sujeito ao pagamento de multa, no valor mínimo de R$ 50,00 (cinquenta reais), ou de 2% (dois por cento) ao mês-calendário ou fração, incidentes sobre o montante dos tributos decorrentes das informações prestadas na DASN-SIMEI, ainda que integralmente pago, limitada a 20% (vinte por cento).</p>
                                                <p>Após a entrega da DASN-SIMEI em atraso, a notificação do lançamento, bem como os dados do DARF para pagamento da multa serão gerados automaticamente, e constarão ao final do recibo de entrega. Caso o pagamento seja feito em até 30 dias, a multa será reduzida em 50%, totalizando R$ 25,00.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen6">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen6" aria-expanded="false" aria-controls="collapseThirteen6">
                                                    <h6 class="text">6.13- O MEI que realizou a Declaração Anual do MEI – DASN-SIMEI de forma errada (como situação especial) não terá acesso a declaração retificadora, <br> portanto não terá como alterar a falha, como ele poderá corrigir o erro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen6" class="collapse" aria-labelledby="headingThirteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Não é possível cancelar DASN-Simei de extinção (situação especial) entregue indevidamente durante o próprio ano-calendário. Não é possível mudar de situação especial para NORMAL. Desta forma, somente no ano seguinte, quando então estará disponível a DASN-Simei, do próximo ano-calendário - situação "Normal", será possível apresentar a declaração do tipo RETIFICADORA, sem marcar "Situação Especial", corrigindo definitivamente a situação.</p>
                                                <p>A entrega indevida da DASN-Simei de extinção não gera a exclusão da empresa do Simples Nacional e também não bloqueia o PGMEI, sendo permitida a emissão de DAS de meses posteriores à data do evento informada na declaração.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen6" aria-expanded="false" aria-controls="collapseFourteen6">
                                                    <h6 class="text">6.14- O Microempreendedor Individual é obrigado a pagar Contribuição Sindical, mesmo não sendo filiado a Sindicato?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen6" class="collapse" aria-labelledby="headingFourteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Não. O MEI <b><u>não é obrigado a recolher contribuição Sindical Patronal</u></b>, com base no artigo 13, caput e § 3º da Lei Complementar nº 123/2006, observadas as alterações promovidas pela Lei Complementar nº 127/2007 e pela Lei Complementar nº 128/2008.</p>
                                                <p>Assim, a contribuição sindical, na condição de tributo instituído pela União, <b>não é devida</b> pelo MEI, na forma da Lei Complementar nº 123/2006.</p>
                                                <p>Entendimento dado também pela<i> </i>Coordenação Geral de Relações do Trabalho do MTE, através da <a href="http://www.normaslegais.com.br/legislacao/mtecgrtsrt02_2008.htm" target="_blank"><b>Nota Técnica CGRT/SRT 02/2008</b></a> e pela Instrução Normativa nº 608/2006, da Receita Federal do Brasil.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen6" aria-expanded="false" aria-controls="collapseFifteen6">
                                                    <h6 class="text">6.15- O MEI tem a obrigação de recolher taxas para associações?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen6" class="collapse" aria-labelledby="headingFifteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>A contribuição ou recolhimento de taxas, a qualquer associação não é obrigatória. Assim, o MEI poderá desconsiderar qualquer tipo de cobrança de associação, exceto se estiver associado como contribuinte <b>voluntário.</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen6" aria-expanded="false" aria-controls="collapseSixteen6">
                                                    <h6 class="text">6.16- O MEI que nunca pagou DAS poderá ter o seu registro cancelado?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen6" class="collapse" aria-labelledby="headingSixteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Sim. O cancelamento pode ocorrer caso não haja o pagamento das contribuições de 12 meses consecutivos, de acordo com a regulamentação. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeventeen6">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen6" aria-expanded="false" aria-controls="collapseSeventeen6">
                                                    <h6 class="text">6.17- O MEI que está inadimplente com o pagamento do DAS pode parcelar esta dívida? <br> Qual órgão fará o parcelamento? Quais as condições do parcelamento (valor mínimo da prestação)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeventeen6" class="collapse" aria-labelledby="headingSeventeen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>A princípio não poderá fazer parcelamento no que diz respeito à contribuição previdenciária. Em relação ao ICMS e ISS, devidos, o contribuinte deve verificar a possibilidade de parcelamento junto as Secretarias de Fazendas Estaduais (ICMS) e/ou Municipais (ISS).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEighteen6">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen6" aria-expanded="false" aria-controls="collapseEighteen6">
                                                    <h6 class="text">6.18- A inadimplência do MEI referente às guias do DAS é passível de dívida ativa no CNPJ da empresa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEighteen6" class="collapse" aria-labelledby="headingEighteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>Sim, os débitos do MEI são passíveis de inscrição em dívida ativa. A RFB envia o débito para a Procuradoria Geral da Fazenda Nacional - PGFN, que poderá inscrever os débitos em dívida ativa e realizar a cobrança a qualquer tempo.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 7 -->
                    <div class="mb-2">
                        <div class="" id="headingSeven">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <h5 class="text">7- LICENCIAMENTO DEFINITIVO e ALVARÁ DE FUNCIONAMENTO</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode7">

                                    <div class="cardy">
                                        <div class="" id="headingOne7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="true" aria-controls="collapseOne7">
                                                    <h6 class="text">7.1- O Alvará de Funcionamento Provisório é gratuito para o Microempreendedor Individual - MEI?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>Sim. Ao realizar a inscrição no Portal do Empreendedor é gerado o CNPJ e as  inscrições na Junta Comercial, no INSS e ainda é liberado o Alvará de Funcionamento Provisório, para as atividades de baixo risco. Tudo em um único documento único, que é o <a href="http://www.portaldoempreendedor.gov.br/duvidas-frequentes/resolveuid/7661c73442db415c94034565b2030a57" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/duvidas-frequentes/resolveuid/7661c73442db415c94034565b2030a57">Certificado da Condição de Microempreendedor Individual - CCMEI</a>, exibido no Portal e que deverá ser impresso pelo MEI.</p>
                                                <p>Tanto a Prefeitura como os demais órgãos municipais, responsáveis pela emissão dos licenciamentos, deverão ter procedimento simplificado para abertura, registro, alteração e baixa de MPEs. Ademais, não poderão cobrar qualquer taxa ou emolumento para concessão de Alvarás ou Licenças e Cadastros para funcionamento relativos à abertura do registro como MEI.  As renovações do Alvará, Licença e Cadastros para funcionamento também são gratuitas. A previsão legal para impossibilidade de cobrança de taxas e emolumentos é estabelecida pela Complementar nº 123/2006 e suas alterações posteriores, § 3º do artigo 4º.</p>
                                                <p><b>Observação: </b><a class="internal-link" href="resolveuid/e25788b5ff644583bf85b7e704409524" target="_blank" title="">Nota informativa nº 12 de 2018</a>, referente à aplicação do § 3º do artigo 4º da Lei Complementar 123, de 14 de dezembro de 2017.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo7" aria-expanded="false" aria-controls="collapseTwo7">
                                                    <h6 class="text">7.2- Como é concedido o Alvará de Funcionamento definitivo?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo7" class="collapse" aria-labelledby="headingTwo7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>A concessão do Alvará de Localização e Funcionamento depende da observância das normas contidas nos Códigos de Zoneamento Urbano e de Posturas Municipais, ou seja, é de responsabilidade das Prefeituras. A concessão deve ser feita em até 180 dias após a formalização do MEI, sob pena de conversão do alvará provisório em definitivo.</p>
                                                <p>Os municípios devem manter o serviço de consulta prévia de endereço para o empreendedor verificar se o local escolhido para estabelecer a sua empresa está de acordo com essas normas.</p>
                                                <p>Além disso, outras normas deverão ser seguidas, como as sanitárias, por exemplo, para quem manuseia alimentos. Dessa forma, antes de qualquer procedimento, o microempreendedor deve consultar as normas municipais para saber se existe ou não restrição para exercer a sua atividade no local escolhido, além de outras obrigações básicas a serem cumpridas.</p>
                                                <p>No Portal do Empreendedor, o MEI em trâmite de regularização declarará que está cumprindo a legislação municipal, motivo pelo qual é fundamental que ele consulte essas normas e declare, de forma verdadeira, que entende a legislação e a obedecerá, sob pena de ter o seu empreendimento considerado irregular.</p>
                                                <p>O ambulante ou quem trabalha em lugar fixo deverá conhecer as regras municipais antes de fazer o registro, com relação ao tipo de atividade e ao local onde irá trabalhar.</p>
                                                <p>Apesar de o Portal do Empreendedor emitir documento que autoriza o funcionamento imediato do empreendimento, mediante Alvará Provisório, as declarações do empresário de que observa as normas e posturas municipais, são obrigatórias para que não haja prejuízo à coletividade e ao próprio microempreendedor. Aquele MEI que não seja fiel ao cumprimento das normas tal qual declarou estará sujeito a multas, apreensões e até mesmo ao fechamento do empreendimento e cancelamento de seu registro.</p>
                                                <p>Caso o microempreendedor tenha dúvidas em como proceder, recomenda-se expressamente que ele não finalize o registro. O SEBRAE, os escritórios de contabilidade e a própria administração municipal estão aptos a prestar as informações necessárias.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree7" aria-expanded="false" aria-controls="collapseThree7">
                                                    <h6 class="text">7.3- Após os 180 dias utilizando o alvará provisório, o Microempreendedor Individual - MEI obterá o alvará definitivo automaticamente ou precisa ir a Prefeitura?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree7" class="collapse" aria-labelledby="headingThree7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                Após o prazo de 180 dias, não havendo manifestação da Prefeitura Municipal quanto à correção do endereço onde está estabelecido o MEI e quanto à possibilidade de exercer a atividade empresarial no local desejado, o Termo de Ciência e Responsabilidade com Efeito de Alvará de Licença e Funcionamento Provisório se converterá automaticamente em Alvará de Funcionamento definitivo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour7" aria-expanded="false" aria-controls="collapseFour7">
                                                    <h6 class="text">7.4- O Microempreendedor Individual - MEI poderá trabalhar na própria residência?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour7" class="collapse" aria-labelledby="headingFour7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>>Antes de se formalizar, o MEI deve verificar junto à Prefeitura se no endereço residencial poderá ser instalado seu negócio, conforme Legislação Municipal.</p>
                                                <p>Conforme prevê o artigo nº 11 da Resolução nº16/2006 do CGSIM - Comitê para Gestão da Rede Nacional para a Simplificação do Registro e da Legalização de Empresas e Negócios, o Município poderá conceder Alvará de Funcionamento Provisório para o Microempreendedor Individual que exerça atividades de baixo risco, quando: <br><b> I</b>- instalado em áreas desprovidas de regulação fundiária legal ou com regulamentação precária;<br><b> II</b>- em residência do Microempreendedor Individual, na hipótese em que a atividade não gere grande circulação de pessoas.</p>
                                                <p>No caso de atividades consideradas de baixo risco, poderá o Município dispensar o Microempreendedor Individual do alvará quando o endereço registrado for residencial e na hipótese da atividade ser exercida fora de estabelecimento, conforme prevê parágrafo único do artigo 11º da Resolução 16/2009 do CGSN.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive7" aria-expanded="false" aria-controls="collapseFive7">
                                                    <h6 class="text">7.5- A Prefeitura e órgãos estaduais e municipais poderão realizar vistorias para emissão do Alvará, Licença ou Autorizações de Funcionamento?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive7" class="collapse" aria-labelledby="headingFive7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>Sim. Somente quando a atividade do MEI for considerada de Alto Risco. Sendo a atividade de baixo risco, as vistorias necessárias à emissão de licenças e de autorizações de funcionamento somente deverão ser realizadas após o início de operação da atividade do Microempreendedor Individual. </p>
                                                <p>As vistorias de interesse dos órgãos fazendários deverão ser realizadas a partir do início de operação da atividade do Microempreendedor Individual.  (Resolução CGSIM nº 16/2009, art. 14 e art. 15 ).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix7" aria-expanded="false" aria-controls="collapseSix7">
                                                    <h6 class="text">7.6- Caso o MEI se formalize no seu endereço residencial, o valor do IPTU pode sofrer aumento para IPTU comercial?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix7" class="collapse" aria-labelledby="headingSix7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>A tributação municipal do imposto sobre imóveis prediais urbanos deverá assegurar tratamento mais favorecido ao MEI para realização de sua atividade no mesmo local em que residir,mediante aplicação da menor alíquota vigente para aquela localidade, seja residencial ou comercial, nos termos da lei, sem prejuízo de eventual isenção ou imunidade existente.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven7">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven7" aria-expanded="false" aria-controls="collapseSeven7">
                                                    <h6 class="text">7.7- O MEI tem de obter a licença de funcionamento junto ao Corpo de Bombeiros  Militares dos Estados e do Distrito Federal?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven7" class="collapse" aria-labelledby="headingSeven7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>A princípio não. Se a atividade for considerada de baixo risco, e de acordo com legislação estadual dos Corpos de Bombeiros Militares, o MEI poderá iniciar suas atividades, desde que conheça e cumpra as exigências legais para funcionamento. </p>
                                                <p>O procedimento para o MEI que exerce atividade de baixo risco deverá ser simplificado e pelo Portal do Empreendedor, baseado em declarações assinadas pelo empreendedor onde se responsabiliza pelo cumprimento das medidas de segurança indicadas pelos Bombeiros. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 8 -->
                    <div class="mb-2">
                        <div class="" id="headingEight">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <h5 class="text">8- EMPREGADO DO MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode8">

                                    <div class="cardy">
                                        <div class="" id="headingOne8">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="true" aria-controls="collapseOne8">
                                                    <h6 class="text">8.1- Quantos empregados o Microempreendedor Individual- MEI pode contratar?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne8" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>O MEI pode contratar até 01 (um) empregado com remuneração de um salário mínimo ou piso salarial da categoria, que pode ser consultada no Portal do Empreendedor, clicando no link <a href="http://www.mte.gov.br./" target="_blank">portal do Ministério do Trabalho e Emprego</a> - Mte.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo8">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo8" aria-expanded="false" aria-controls="collapseTwo8">
                                                    <h6 class="text">8.2- Quais os procedimentos que o MEI deve tomar para caracterizar o afastamento do único empregado?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo8" class="collapse" aria-labelledby="headingTwo8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>A partir do atendimento da condição legal do afastamento, o empregador Microempreendedor Individual (MEI) pode contratar outro empregado, e o contrato desse novo empregado perdurará durante o tempo em que o contrato do outro empregado estiver interrompido ou suspenso. </p>
                                                <p>Exemplo: a licença maternidade é caracterizada a partir do momento em que o empregador é notificado pela empregada mediante a entrega do atestado médico ou da certidão de nascimento do filho.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree8">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree8" aria-expanded="false" aria-controls="collapseThree8">
                                                    <h6 class="text">8.3- Para contratação de empregado o MEI precisa de um contador?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree8" class="collapse" aria-labelledby="headingThree8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>Não há necessidade de ter um contador para a contratação de um empregado pelo MEI. Se preferir, o MEI pode utilizar-se do auxílio de um profissional da contabilidade a fim de obter mais detalhes e orientação para a contratação de um empregado. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour8">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour8" aria-expanded="false" aria-controls="collapseFour8">
                                                    <h6 class="text">8.4- Qual o custo para contratação de um empregado?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour8" class="collapse" aria-labelledby="headingFour8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>Os valores podem alterar caso o piso salarial da categoria profissional seja superior ao salário-mínimo. Como exemplo, para salário igual ao valor do salário mínimo, o custo previdenciário, recolhido em GPS - Guia da Previdência Social, é de R$ 104,94(correspondentes a 11% do salário mínimo vigente), sendo R$ 28,62 (3% do salário mínimo) de responsabilidade do empregador (MEI) e R$ 76,32 (8% ou conforme tabela de contribuição mensal ao INSS <b><sup>(1)</sup></b>) descontado do empregado. A alíquota de 3% a cargo do empregador não se altera.</p>
                                                <p>Além do encargo previdenciário de 3% de responsabilidade do empregador, o MEI também deve depositar o FGTS, calculado à alíquota de 8% sobre o salário do empregado. Sendo assim, o custo total da contratação de um empregado pelo MEI é de 11% sobre o valor total da folha de salários (3% de INSS mais 8% de FGTS).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive8">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive8" aria-expanded="false" aria-controls="collapseFive8">
                                                    <h6 class="text">8.5- O MEI quando contratar empregado deverá fazer a guia do FGTS (GFIP) e informar ao órgão competente?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive8" class="collapse" aria-labelledby="headingFive8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>Sim. Caso tenha um empregado, o MEI deve recolher mensalmente o FGTS com alíquota de 8% sobre o valor do salário pago, preencher e entregar a Guia de Recolhimento do FGTS e Informações à Previdência Social (GFIP) à Caixa Econômica Federal até o dia 7 do mês seguinte àquele em que a remuneração foi paga. Caso não haja expediente bancário no dia 7, a entrega deverá ser antecipada para o dia de expediente bancário imediatamente anterior.</p>
                                                <p>O MEI que não contratou funcionário ou não possui funcionário não é obrigado a elaborar e entregar mensalmente a GFIP - Guia de Recolhimento do Fundo de Garantia por Tempo de Serviço e Informações à Previdência Social – e mesmo assim   obterá a Certidão de Regularidade Fiscal junto ao FGTS expedida pela Caixa Econômica Federal.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix8">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix8" aria-expanded="false" aria-controls="collapseSix8">
                                                    <h6 class="text">8.6- O MEI que não contratou funcionário durante o ano, está obrigado a elaboração e entrega da RAIS?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix8" class="collapse" aria-labelledby="headingSix8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>Não. O MEI que não contratou funcionário durante o ano <b>não é obrigado a apresentar a RAIS</b> - Relação Anual de Informações Sociais, conforme previsto no inciso II do Artigo 108, da<a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank"> Resolução CGSN nº 140, de 2018.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 9 -->
                    <div class="mb-2">
                        <div class="" id="headingNine">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            <h5 class="text">9- ALTERAÇÃO DE DADOS CADASTRAIS</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode9">

                                    <div class="cardy">
                                        <div class="" id="headingOne9">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne9" aria-expanded="true" aria-controls="collapseOne9">
                                                    <h6 class="text">9.1- Quanto tempo após efetivar a formalização como MEI é possível alterar as atividades econômicas – CNAE?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne9" class="collapse show" aria-labelledby="headingOne9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>A qualquer momento é possível fazer, gratuitamente, alteração das atividades econômicas (principais e secundárias) no cadastro do MEI, através do Portal do Empreendedor, no card "Atualize seus Dados", na opção "<a href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/alterar-dados-mei/alterar-dados" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/alterar-dados-mei/alterar-dados">Alterar Dados</a>".</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo9">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo9" aria-expanded="false" aria-controls="collapseTwo9">
                                                    <h6 class="text">9.2- Posso alterar quaisquer dados cadastrais após a formalização do MEI no Portal do Empreendedor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo9" class="collapse" aria-labelledby="headingTwo9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>Depois de efetivada a formalização o MEI poderá realizar alteração de dados diretamente no Portal do Empreendedor, sem qualquer custo. Para realizar a Alteração de Dados Cadastrais, acesseo card "Atualize seus Dados", a opção "<a href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/alterar-dados-mei/alterar-dados" style="text-align: left; " target="_blank">Alterar Dados</a>".</p>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree9">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree9" aria-expanded="false" aria-controls="collapseThree9">
                                                    <h6 class="text">9.3- Como o MEI com sede em um Estado deve proceder para transferir seu registro para outras unidades da federação?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree9" class="collapse" aria-labelledby="headingThree9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>O MEI com sede em um estado poderá se transferir para outro, através de um processo de alteração de dados pelo <a href="resolveuid/1826aa9fc6f346868c3d3a9f476fabd5" target="_blank">Portal do Empreendedor</a>. O MEI, antes de realizar sua transferência de UF/Município, deve realizar uma consulta prévia, para verificar se suas atividades possuem alguma exigência para o novo endereço, pois a regulamentação de Uso e Ocupação de Solo é diferente para cada município.</p>
                                                <p>Quanto ao número do CNPJ (Cadastro Nacional da Pessoa Jurídica), em todo o processo de alteração, não existe mudança de numeração, permanecendo o mesmo.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour9">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour9" aria-expanded="false" aria-controls="collapseFour9">
                                                    <h6 class="text">9.4- Que procedimento deve ser realizado pelo optante do SIMEI quando sua atividade é excluída daquelas que são permitidas?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour9" class="collapse" aria-labelledby="headingFour9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>Em caso de determinada atividade deixar de ser considerada permitida ao SIMEI, o empreendedor optante que a exerça deverá efetuar o seu desenquadramento do referido sistema. Caso o empreendedor não o realize, o desenquadramento será realizado de oficio pelo exercício de ocupação não permitida poderá ser realizado com efeitos a partir do segundo exercício subsequente à supressão da referida ocupação.</p>
                                                <p>Outra hipótese a considerar é a decisão do MEI parar de exercer a atividade que passou a ser impedida, com desejo de mudar para alguma outra atividade permitida no rol das ocupações do MEI, acessadas no<span> </span><a href="http://www.portaldoempreendedor.gov.br/temas/quero-ser/formalize-se/atividades-permitidas" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/temas/quero-ser/formalize-se/atividades-permitidas">Portal do Empreendedor</a>. Neste caso deverá providenciar uma alteração para excluir a atividade impedida e incluir a nova atividade permitida, por meio do Portal do Empreendedor no card "Atualize seus Dados", na opção "<a href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/alterar-dados-mei/alterar-dados" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/alterar-dados-mei/alterar-dados">Alterar Dados</a>".</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive9">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive9" aria-expanded="false" aria-controls="collapseFive9">
                                                    <h6 class="text">9.5- Ao inserir o CEP do meu endereço, aparece que o CEP é inexistente ou não corresponde ao meu endereço, como devo proceder?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive9" class="collapse" aria-labelledby="headingFive9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>O Portal do Empreendedor utiliza a base oficial de Códigos de Endereçamento Postal dos Correios. Assim, diante de eventual diferença entre o CEP informado pelo Portal e o endereço cadastrado no formulário eletrônico, recomenda-se que o Empreendedor verifique o CEP correspondente ao seu endereço no Portal do Empreendedor, clicando no link portal dos <a href="http://www.correios.com.br/" target="_blank">Correios</a> ou poderá dirigir-se junto ao posto dos Correios mais próximo.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix9">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix9" aria-expanded="false" aria-controls="collapseSix9">
                                                    <h6 class="text">9.6- O CEP do meu Município é único para toda a cidade. Como faço para informar meu endereço?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix9" class="collapse" aria-labelledby="headingSix9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>Nesses casos, o formulário de inscrição vai preencher, automaticamente, o bairro, o município e a UF e vai solicitar ao usuário que preencha os demais campos referentes ao endereço, como o complemento, ponto de referência e um telefone de contato, ao qual o empreendedor deverá informar corretamente. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 10 -->
                    <div class="mb-2">
                        <div class="" id="headingTen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            <h5 class="text">10- QUERO DEIXAR DE SER MEI -(BAIXA)?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode10">

                                    <div class="cardy">
                                        <div class="" id="headingOne10">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne10" aria-expanded="true" aria-controls="collapseOne10">
                                                    <h6 class="text">10.1- Como solicitar o encerramento da minha empresa como MEI?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne10" class="collapse show" aria-labelledby="headingOne10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                <p>Para cancelar a inscrição como MEI, basta acessar o <a class="internal-link" href="resolveuid/339d5f3fe1bb4004ba46fe34bdf200d7" target="_self" title="">Portal do Empreendedor</a> e solicitar a baixa do registro.  Após realizar a baixa no Portal do Empreendedor, o MEI deverá preencher a Declaração Anual para o MEI - <b>DASN-SIMEI de Extinção – Encerramento,</b> acessando o Portal do Empreendedor e clicando no link <a href="http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=8">Portal do Simples Nacional</a>. </p>
                                                <p>Com base no artigo 9º da LC nº 123,a baixa do MEI ocorrerá independentemente da regularidade de seus obrigações tributárias, previdenciárias ou trabalhistas, principais ou acessórias,  sem prejuízo de suas responsabilidades por tais obrigações.</p>
                                                <p>A baixa do registro, sem quitação dos débitos, não impede que posteriormente sejam lançados ou cobrados do titular os impostos, contribuições e respectivas penalidades decorrentes da simples falta de recolhimento ou da prática comprovada e apurada em processo administrativo ou judicial de outras irregularidades praticadas.</p>
                                                <p>Caso tenha dificuldade para realizar os procedimentos de baixa do registro, sugerimos que procure um posto do SEBRAE.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo10">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo10" aria-expanded="false" aria-controls="collapseTwo10">
                                                    <h6 class="text">10.2- O MEI que deu baixa no CNPJ pode reabrir a mesma empresa depois de fechada? Qual o procedimento?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo10" class="collapse" aria-labelledby="headingTwo10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Não. O MEI poderá abrir outra empresa, com outro CNPJ.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree10">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree10" aria-expanded="false" aria-controls="collapseThree10">
                                                    <h6 class="text">10.3- O MEI com débitos mensais (DAS) e anuais (DASN-SIMEI) poderá fazer a baixa da empresa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree10" class="collapse" aria-labelledby="headingThree10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                <p>Sim. Mesmo estando com débitos, o contribuinte pode dar baixa e pagar a dívida em nome da pessoa física.</p>
                                                <p>A baixa do registro, sem quitação dos débitos, não impede que posteriormente sejam lançados ou cobrados do titular os impostos, contribuições e respectivas penalidades decorrentes da simples falta de recolhimento ou da prática comprovada e apurada em processo administrativo ou judicial de outras irregularidades praticadas.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour10">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseFour10" aria-expanded="false" aria-controls="collapseFour10">
                                                    <h6 class="text">10.4- Caso a baixa do MEI seja no último dia do mês (ex.:31 de março),<br> será necessário pagar o boleto que vencerá no mês subsequente (ex.: em 20 de abril)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour10" class="collapse" aria-labelledby="headingFour10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, será necessário pagar o boleto (DAS) que vencerá no próximo mês. 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive10">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseFive10" aria-expanded="false" aria-controls="collapseFive10">
                                                    <h6 class="text">10.5- Se a baixa for no primeiro dia do mês (ex.: 01 de abril) é necessário pagar o boleto que vencerá <br> no mesmo mês (ex.: dia 20/04)? E o boleto que vence no mês seguinte (ex.: dia 20/05)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive10" class="collapse" aria-labelledby="headingFive10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, o MEI deve pagar o boleto referente ao mês de Abril, que vence no mês seguinte (no Exemplo, 20/05).
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix10">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix10" aria-expanded="false" aria-controls="collapseSix10">
                                                    <h6 class="text">10.6- Após a baixa do MEI é necessário entregar a Declaração de Extinção – DASN-SIMEI - Extinção? Se positivo qual o prazo da entrega?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix10" class="collapse" aria-labelledby="headingSix10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                <p>Sim. No caso de extinção do MEI, a entrega da declaração deve ocorrer <b>até o último dia do mês:</b></p>
                                                <p><b>a) De Junho</b>, na hipótese da extinção ocorrer entre janeiro e abril de cada ano;<br><b>b) Subsequente ao mês da extinção</b>, quando a extinção ocorrer entre maio e dezembro de cada ano.</p>
                                                <p>Para fazer a declaração acesse o Portal do Empreendedor e clique no link Portal do Simples Nacional.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven10">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven10" aria-expanded="false" aria-controls="collapseSeven10">
                                                    <h6 class="text">10.7- Após a realização da baixa e ao fazer a declaração de extinção em atraso é cobrada uma <br> multa com o motivo “entrega da declaração fora do prazo”? Esta multa realmente procede?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven10" class="collapse" aria-labelledby="headingSeven10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                <p>Sim. A notificação de lançamento da multa por atraso na entrega da declaração - MAED é gerada no momento da transmissão da declaração e estará disponível para pagamento quando da impressão do recibo de entrega da DASN- Simei.Será gerada uma guia (DARF) para recolhimento da multa.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 11 -->
                    <div class="mb-2">
                        <div class="" id="headingEleven">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            <h5 class="text">11- DESENQUADRAMENTO</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode11">

                                    <div class="cardy">
                                        <div class="" id="headingOne11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne11" aria-expanded="true" aria-controls="collapseOne11">
                                                    <h6 class="text">11.1- O que é desenquadramento para o MEI ?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne11" class="collapse show" aria-labelledby="headingOne11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>É deixar de atender quaisquer das condições exigidas e impostas para optar como Microempreendedor Individual, a exemplo, ultrapassar limite de faturamento anual para o MEI, ou seja, R$ 81.000,00, ao ano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo11" aria-expanded="false" aria-controls="collapseTwo11">
                                                    <h6 class="text">11.2- Posso efetuar o desenquadramento por opção a qualquer tempo?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo11" class="collapse" aria-labelledby="headingTwo11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                O desenquadramento por opção poderá ser realizado a qualquer tempo, produzindo efeitos a partir de 1º de janeiro do ano-calendário subsequente, salvo quando a comunicação for feita no mês de janeiro, quando os efeitos do desenquadramento dar-se-ão nesse mesmo ano-calendário.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
                                                    <h6 class="text">11.3- Como efetuar o desenquadramento como MEI ?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree11" class="collapse" aria-labelledby="headingThree11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>O desenquadramento poderá ser realizado por meio do serviço <b>“Desequadramento do SIMEI”</b> disponibilizado no <a href="http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=t&amp;area=2" target="_blank">Portal do Simples Nacional</a>.</p>
                                                <p>O MEI deverá, antes de efetuar a solicitação de desenquadramento, gerar um código de acesso, conforme instruções disponíveis no <a href="http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=t&amp;area=2" target="_blank">Portal do Simples Nacional</a>. Após digitar o código de acesso, o contribuinte deverá selecionar o motivo e a data em que ocorreu o fato motivador do desenquadramento.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour11" aria-expanded="false" aria-controls="collapseFour11">
                                                    <h6 class="text">11.4- Qual o prazo para o MEI comunicar seu desenquadramento obrigatório e quais os efeitos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour11" class="collapse" aria-labelledby="headingFour11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p> O MEI deverá comunicar seu desenquadramento obrigatório quando:</p>
                                                <p>● Exceder no ano o limite de faturamento bruto de R$ 81.000,00, devendo a comunicação ser efetuada até o último dia útil do mês posterior àquele em que tenha ocorrido o excesso, produzindo efeitos:</p>
                                                <p><b>a)</b> A partir de 1º de janeiro do ano-calendário subsequente ao da ocorrência do excesso, na hipótese de não ter ultrapassado o referido limite em mais de 20%;<br><b>b)</b> retroativamente a 1º de janeiro do ano-calendário da ocorrência do excesso, na hipótese de ter ultrapassado o referido limite em mais de 20%.</p>
                                                <p>● Deixar de atender qualquer das condições previstas nos incisos de I a IV do caput do art. 100, da Resolução CGSN nº 140/2018, para condição de MEI, devendo a comunicação ser efetuada até o último dia útil do mês posterior àquele em que ocorrida situação de vedação, produzindo efeitos a partir do mês subsequente ao da ocorrência da situação impeditiva.</p>
                                                <p>● Incorrer em alguma das situações previstas para a exclusão do Simples Nacional, ficando o desenquadramento sujeito às regras do art. 81 da<a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank"> Resolução CGSN nº 140, de 2018.</a></p>
                                                <p><b>Nota</b>: No caso de início de atividade, deverá ser observado o limite proporcional ao limite de faturamento anual (R$ 81.000,00), multiplicados pelo número de meses compreendido entre o início da atividade e o final do respectivo ano, consideradas as frações de meses como um mês inteiro.</p>
                                                <p>Exemplo: Para o MEI que efetuou o registro em Julho/2018, o seu limite de faturamento para o ano será R$ 40.500,00 (R$ 6.750,00 x 6 meses = R$ 40.500,000). (Resolução CGSN nº 140/2018,art. 100, §1º ).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive11" aria-expanded="false" aria-controls="collapseFive11">
                                                    <h6 class="text">11.5- A partir de que data estarei desenquadrado com MEI no caso de exceder o limite de receita bruta?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive11" class="collapse" aria-labelledby="headingFive11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>A data dos efeitos do desenquadramento dependerá de dois fatores:</p>
                                                <p>●   Se a empresa está no ano de início de atividade;</p>
                                                <p>  ●   Se o limite de receita bruta foi ultrapassado em mais de 20%, conforme quadro abaixo:</p>
                                                <table>
                                                    <tr>
                                                        <th><b>Exemplo</b></th>
                                                        <th><b>Situação</b></th>
                                                        <th><b>Data dos efeitos do Desenquadramento</b></th>
                                                    </tr>
                                                    <tr>
                                                        <td>- data de abertura: 09/12/2012 <br>- receita bruta em 12/2012: R$ 6.000,00 <br>- data efeito desenquadramento: 09/12/2012</td>
                                                        <td>Receita bruta que tenha ultrapassado o limite proporcional em mais de 20%, no ano-calendário de início de atividades.</td>
                                                        <td>Data de abertura da empresa(desenquadramento retroativo).</td>
                                                    </tr>
                                                    <tr>
                                                        <td>- data de abertura: 09/12/2012 <br>- receita bruta em 12/2012: R$ 5.300,00 <br> - data efeito desenquadramento: 01/01/2013</td>
                                                        <td>Receita bruta que NÃO tenha ultrapassado o limite proporcional em mais de 20%, no ano-calendário de início de atividades.</td>
                                                        <td>1º de janeiro do ano-calendário subsequente ao da ocorrência do excesso de receita.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>- data de abertura: 18/11/2011 <br>- receita acumulada em 2012: R$ 75.000,00 <br>- data efeito desenquadramento: 01/01/2012</td>
                                                        <td>Receita bruta que tenha ultrapassado o limite em mais de 20%, fora do ano-calendário de início de atividades.</td>
                                                        <td>1º de janeiro do ano-calendário em que ocorreu o excesso de receita(desenquadramento retroativo).</td>
                                                    </tr>
                                                    <tr>
                                                        <td>- data de abertura: 18/11/2011 <br>- receita acumulada em 2012: R$ 66.000,00 <br>- data efeito desenquadramento: 01/01/2013</td>
                                                        <td>Receita bruta que NÃO tenha ultrapassado o limite em mais de 20%, fora do ano-calendário de início de atividades.</td>
                                                        <td>1º de janeiro do ano-calendário subsequente ao da ocorrência do excesso de receita.</td>
                                                    </tr>
                                                </table>
                                                <p>Nota: Na hipótese de a receita bruta auferida no ano-calendário não exceder em mais de 20% (vinte por cento) os limites de que tratam os parágrafos 1º e 2º do art. 18-A da<a href="http://www.planalto.gov.br/ccivil_03/leis/LCP/Lcp123.htm" style="text-align: left; " target="_blank" data-cke-saved-href="http://www.planalto.gov.br/ccivil_03/leis/LCP/Lcp123.htm">Lei Complementar nº 123/2006</a>, o contribuinte deverá recolher a diferença, sem acréscimos, no vencimento estipulado para o pagamento dos tributos abrangidos pelo Simples Nacional relativos ao mês de janeiro do ano-calendário subsequente, aplicando-se as alíquotas previstas nos Anexos da<a href="http://www.planalto.gov.br/ccivil_03/leis/LCP/Lcp123.htm" style="text-align: left; " target="_blank" data-cke-saved-href="http://www.planalto.gov.br/ccivil_03/leis/LCP/Lcp123.htm">Lei Complementar nº 123, de 2006</a>, observando-se, com relação à inclusão dos percentuais relativos ao ICMS e ao ISS, as tabelas constantes do Anexo XI da <span> Anexo XI da</span><a class="external-link" href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank" title=""> Resolução CGSN nº 140, de 2018.</a>. Este cálculo deve ser realizado utilizando-se o envio da DASN-SIMEI, disponível no Portal do Empreendedor, na opção<a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx" style="text-align: left; " target="_blank" data-cke-saved-href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx">Entregar Declaração</a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix11" aria-expanded="false" aria-controls="collapseSix11">
                                                    <h6 class="text">11.6- O desenquadramento do MEI, implica, necessariamente, exclusão do Simples Nacional?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix11" class="collapse" aria-labelledby="headingSix11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>Não. O contribuinte desenquadrado como MEI passará, a partir da data de início dos efeitos do desenquadramento, a recolher os tributos devidos pela regra geral do Simples Nacional, como Microempresa ou Empresa de Pequeno Porte, exceto se incorrer em alguma das situações previstas para exclusão do Simples Nacional.</p>
                                                <p>Para recolher os tributos pela regra do Simples Nacional, o contribuinte deverá utilizar o aplicativo<span> </span><a href="http://www8.receita.fazenda.gov.br/simplesnacional/servicos/grupo.aspx?grp=5" target="_blank" data-cke-saved-href="http://www8.receita.fazenda.gov.br/simplesnacional/servicos/grupo.aspx?grp=5">PGDAS</a>, disponível no POrtal do Simples Nacional, para cálculo do valor devido e geração da guia de recolhimento (DAS).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven11">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven11" aria-expanded="false" aria-controls="collapseSeven11">
                                                    <h6 class="text">11.7- Em que situações ocorrerá o desenquadramento automático como MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven11" class="collapse" aria-labelledby="headingSeven11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>Será desenquadrado automaticamente como MEI o Microempreendedor Individual que promover a alteração de dados no CNPJ que importem em:</p>
                                                <p><b>a) </b>Alteração para natureza jurídica distinta de empresário individual a que se refere o art. 966 da Lei nº 10.406, de 10 de janeiro de 2002 (Código Civil);</p>
                                                <p><b>b) </b> Inclusão de atividade econômica não permitida pelo CGSN (ver Anexo XI - Atividades Permitidas ao MEI - <span></span><a class="external-link" href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank" title="">Resolução CGSN nº 140, de 2018</a>);</p>
                                                <p><b>c)</b> Abertura de filial.</p>
                                                <p><b>Notas:</b><br><b>1.</b>Os efeitos do desenquadramento dar-se-ão a partir do mês posterior ao da ocorrência da situação impeditiva.<br><b>2.</b> O contribuinte pode confirmar o desenquadramento acessando o serviço consulta de optantes disponível no <a href="http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=t&amp;area=2">portal do Simples Nacional</a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight11">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode text collapsed " type="button" data-toggle="collapse" data-target="#collapseEight11" aria-expanded="false" aria-controls="collapseEight11">
                                                   <h6 class="text">11.8- O que fazer caso seja feito o desenquadramento e o MEI não tiver solicitado,<br>
                                                     mesmo exercendo atividades e com faturamento que permitem manter a condição de MEI?</h6>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight11" class="collapse" aria-labelledby="headingEight11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>Caso o MEI seja desenquadrado do SIMEI sem sua solicitação espontânea, por não ter excedido o limite de faturamento ou outro motivo previsto em Lei, deverá procurar um posto de atendimento da Receita Federal do Brasil, em seu município ou região e verificar o(s) motivo(s) pelo desenquadramento de ofício.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 12 -->
                    <div class="mb-2">
                        <div class="" id="headingTwelve">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            <h5 class="text">12- QUERO CRESCER, NÃO SOU MAIS MEI, E AGORA?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode12">

                                    <div class="cardy">
                                        <div class="" id="headingOne12">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne12" aria-expanded="true" aria-controls="collapseOne12">
                                                    <h6 class="text">12.1- O que ocorre com a pessoa que estiver enquadrada na lei do MEI e estourar o faturamento de 81 mil anual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne12" class="collapse show" aria-labelledby="headingOne12" data-parent="#accordionmode12">
                                            <div class="card-body">
                                                <p>Ao estourar o limite de R$ 81.000,00, o MEI passará à condição de MICROEMPRESA, tendo duas situações:</p>
                                                <p><b>1º)</b>Se o faturamento foi maior que R$ 81.000,00, porém não ultrapassou R$ 97.200,00 (menor que 20% de R$ 97.200,00), o MEI deverá recolher os DAS na condição de MEI até o mês de dezembro e recolher um DAS complementar, pelo excesso de faturamento, no vencimento estipulado para o pagamento dos tributos abrangidos no Simples Nacional relativo ao mês de janeiro do ano subsequente (em regra geral no dia 20 de fevereiro). Este DAS será gerado quando da transmissão da Declaração Anual do MEI (DASN-SIMEI).</p>
                                                <p>A partir do mês de janeiro, passa a recolher o imposto SIMPLES NACIONAL como MICROEMPRESA, com percentuais iniciais de 4%, 4,5% ou 6% sobre o faturamento do mês, conforme as atividades econômicas exercidas - Comércio, Indústria e/ou Serviços - (item, 1, alínea “a”, do Inciso II, do §º2º, do artigo 115 da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank"> Resolução CGSN nº 140, de 2018).</a></p>
                                                <p><b>2º)</b>Se o faturamento foi superior a R$ 97.200,00 (maior que 20% de R$ 97.200,00), e inferior ao limite de opção/permanência no Simples Nacional (R$ 4.800.000,00), o MEI passa à condição de MICROEMPRESA (se o faturamento foi de até R$ 360.000,00) ou de EMPRESA DE PEQUENO PORTE (caso o faturamento seja entre R$ 360.000,00 a R$ 4.800.000,00), retroativo ao mês janeiro ou ao mês da inscrição (formalização), caso o excesso da receita bruta tenha ocorrido durante o próprio ano-calendário da formalização, passa a recolher os tributos devidos na forma do SIMPLES NACIONAL com percentuais iniciais de 4%, 4,5% ou 6% sobre o faturamento, conforme as atividades econômicas exercidas - Comércio, Indústria e/ou Serviços. <br>Exemplo: Se ultrapassou os R$ 97.200,00, em julho, e não ultrapassou R$ 360.000,00, passará a condição de Microempresa, retroagindo ao mês de janeiro.  (item, 2, alínea “a”, do Inciso II, do §º2º e §9°do artigo 115 e da<a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank"> Resolução CGSN nº 140, de 2018.</a></p>
                                                <p>Nas duas situações acima, o MEI deverá solicitar obrigatoriamente o desenquadramento como MEI no <a href="http://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/Servicos/Grupo.aspx?grp=t&amp;area=2">Portal do Simples Nacional</a> no site da Receita Federal do Brasil (Artigo 115 da<a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank"> Resolução CGSN nº 140, de 2018)</a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>    
                            </div>
                        </div>
                    </div>
                        <!-- ACCORDION 13 -->
                    <div class="mb-2">
                        <div class="" id="headingThirteen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                            <h5 class="text">13- OUTROS ASSUNTOS?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode13">

                                    <div class="cardy">
                                        <div class="" id="headingOne13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne13" aria-expanded="true" aria-controls="collapseOne13">
                                                    <h6 class="text">13.1- Onde o MEI pode solicitar informações ou registrar suas reclamações e sugestões?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne13" class="collapse show" aria-labelledby="headingOne13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <table>
                                                    <tr>
                                                        <th><b>INFORMAÇÕES/DÚVIDAS OU SUGESTÕES</b></th>
                                                        <th><b>ÓRGÃO / ENTIDADE</b></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Portal do Empreendedor</td>
                                                        <td><a href="https://sistema.ouvidorias.gov.br/">Fale conosco do Portal do Empreendedor</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dúvidas sobre o INSS/Previdência Social</td>
                                                        <td>Ligue 135 ou <a href="http://www.previdencia.gov.br/perguntas-frequentes/">Perguntas Frequentes do INSS</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dúvidas DAS (PGMEI), DASN-SIMEI e Simples Nacional Canal de Atendimento ao Contribuinte – CAC</td>
                                                        <td><a href="https://www8.receita.fazenda.gov.br/SIMPLESNACIONAL/FaleConosco.aspx">Fale conosco da Receita Federal/MF</a><br>Delegacias da Receita Federal</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sebrae</td>
                                                        <td>Unidade de Atendimento ou ligue no 0800-570-0800 ou acesse <a class="external-link" href="http://www.sebrae.com.br/sites/PortalSebrae/Contato" target="_blank" title="">http://www.sebrae.com.br/sites/PortalSebrae/Contato</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Secretaria de Estado dos Estados</td>
                                                        <td>Atendimento ao Contribuinte</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prefeituras Municipais</td>
                                                        <td>Atendimento ao cidadão/contribuinte</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo13">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo13" aria-expanded="false" aria-controls="collapseTwo13">
                                                    <h6 class="text">13.2- Quando ocorre a migração de Microempresa – ME para Microempreendedor Individual – MEI, é possível emitir o <br> Certificado na Condição de Microempreendedor Individual – CCMEI pelo Portal do Empreendedor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo13" class="collapse" aria-labelledby="headingTwo13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p><b>Não é possível.</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree13" aria-expanded="false" aria-controls="collapseThree13">
                                                    <h6 class="text">13.3- O MEI é obrigado a adquirir um Certificado Digital?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree13" class="collapse" aria-labelledby="headingThree13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Não, EXCETO se optar em emitir Nota Fiscal Eletrônica, de acordo com as legislações tributárias estadual e municipal.</p>
                                                <p>O certificado digital é um documento eletrônico (cartão magnético, token, pen drive ou arquivo) que permite qualquer pessoa física ou jurídica realizar transações pela internet de forma segura, protegendo as transações online e a troca virtual de documentos, mensagens e dados.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour13" aria-expanded="false" aria-controls="collapseFour13">
                                                    <h6 class="text">13.4- O que fazer quando alguma instituição não reconhece o Certificado de Registro de Microempreendedor Individual - CCMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour13" class="collapse" aria-labelledby="headingFour13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Registre o fato na ouvidoria da Secretaria da Micro e Pequena Empresa, por meio do Portal do Empreendedor, no link fale conosco. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive13" aria-expanded="false" aria-controls="collapseFive13">
                                                    <h6 class="text">13.5- Qual o prazo para o MEI elaborar e entregar a Declaração Anual para o MEI – DASN-SIMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive13" class="collapse" aria-labelledby="headingFive13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>O Prazo para entrega da DASN-SIMEI é até às 23:59 h do 31 de maio de cada ano. Para elaborar e entregar a DASN-SIMEI, acesse<a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx" style="text-align: left; " target="_blank" data-cke-saved-href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx"> Portal do Empreendedor</a>, no card "Faça sua Declaração Anual de Faturamento (DASN-SIMEI).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix13" aria-expanded="false" aria-controls="collapseSix13">
                                                    <h6 class="text">13.6- O MEI que não teve faturamento no ano ou estava sem movimento, tem de entregar a Declaração Anual para o MEI- DASN-SIMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix13" class="collapse" aria-labelledby="headingSix13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Sim. O MEI que durante o ano não teve faturamento ou ficou sem movimento, está obrigado a elaborar e entregar a <a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx" style="text-align: left; " target="_blank" data-cke-saved-href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx">Declaração Anual de Faturamento - DASN-SIMEI</a> relativa às informações do ano anterior. Neste caso, informando R$ 0,00 (sem faturamento), nos campos das Receitas Brutas Vendas e/ou Serviços.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven13" aria-expanded="false" aria-controls="collapseSeven13">
                                                    <h6 class="text">13.7- Como MEI deve proceder para gerar um novo DARF referente a multa expedida pelo atraso na entrega da DASN -SIMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven13" class="collapse" aria-labelledby="headingSeven13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>O MEI deverá acessar o Portal do Empreendedor onde poderá imprimir o DARF por meio do aplicativo <a href="http://www.receita.fazenda.gov.br/Aplicacoes/ATSPO/SicalcWeb/default.asp?TipTributo=2&amp;FormaPagto=1">SICALCWeb</a>. Os dados para o preenchimento do DARF podem ser encontrados na notificação do lançamento, disponível ao final do recibo de entrega da DASN-SIMEI, ou comparecendo pessoalmente em um posto de atendimento da Receita Federal e solicitar impressão da multa (DARF) para recolhimento.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight13" aria-expanded="false" aria-controls="collapseEight13">
                                                    <h6 class="text">13.8- Preciso ter contabilidade?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight13" class="collapse" aria-labelledby="headingEight13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Não. O MEI não é obrigado contratar um contador ou manter a contabilidade formal. Também não é preciso ter livro caixa.</p>
                                                <p>No entanto, o MEI deverá registrar, mensalmente, em formulário simplificado, o total das suas receitas. Para tanto, deverá imprimir e preencher todo mês o <a href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/declaracao-anual-mei-dasn/RELATORIO_MENSAL_DAS_RECEITAS_BRUTAS.doc/view" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/temas/ja-sou/servicos/declaracao-anual-mei-dasn/RELATORIO_MENSAL_DAS_RECEITAS_BRUTAS.doc/view">Relatório Mensal das Receitas Brutas</a>, conforme modelo disponível no Portal do Empreendedor.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine13" aria-expanded="false" aria-controls="collapseNine13">
                                                    <h6 class="text">13.9- Preciso informar algum órgão federal, estadual ou municipal sobre meu faturamento?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine13" class="collapse" aria-labelledby="headingNine13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Sim, para a Receita Federal do Brasil. O MEI deverá informar faturamento anual, para fazê-lo acesso o Portal do Empreendedor, no card "Faça sua Declaração Anual de Faturamento, na opção "<a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx" target="_blank" data-cke-saved-href="http://www8.receita.fazenda.gov.br/SimplesNacional/Aplicacoes/ATSPO/dasnsimei.app/Default.aspx">Enviar Declaração</a>", até às 23:59 h do dia 31 de maio de cada ano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen13" aria-expanded="false" aria-controls="collapseTen13">
                                                    <h6 class="text">13.10- É possível transferir o CNPJ do MEI para outra pessoa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen13" class="collapse" aria-labelledby="headingTen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Não. O CCMEI - Certificado da Condição de Microempreendedor Individual é um registro pessoal e intransferível.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven13" aria-expanded="false" aria-controls="collapseEleven13">
                                                    <h6 class="text">13.11- Quais os escritórios de contabilidade do meu município que atendem ao Microempreendedor Individual- MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven13" class="collapse" aria-labelledby="headingEleven13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>A relação de escritórios de contabilidade para atendimento ao MEI está disponível no Portal do Empreendedor. Para visualizar a relação, acesse o Portal Empreendedor no item <a href="http://www.portaldoempreendedor.gov.br/contato" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/contato">Fale Conosco</a> ou clique em "<a href="http://www.fenacon.org.br/atuacao/microempreendedor-individual-mei-3" target="_blank" data-cke-saved-href="http://www.fenacon.org.br/atuacao/microempreendedor-individual-mei-3">Escritórios de Contabilidade para o MEI</a>”. Estes escritórios estão obrigados a efetuar, gratuitamente, a formalização do MEI e entrega da primeira declaração apenas.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve13" aria-expanded="false" aria-controls="collapseTwelve13">
                                                    <h6 class="text">13.12- Quais obrigações acessórias estão previstas para o Microempreendedor Individual (MEI)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve13" class="collapse" aria-labelledby="headingTwelve13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>●   Emitir documento fiscal quando o destinatário for empresa, salvo se o destinatário emitir nota fiscal de entrada de mercadorias.</p>
                                                <p>●   Manter Relatório Mensal de Receitas Brutas para comprovação das receitas, onde deverão ser anexadas as notas fiscais de entrada de mercadorias e serviços tomados, bem como as notas fiscais de vendas ou prestação de serviços emitidas.</p>
                                                <p>●   Apresentar Declaração Anual para o MEI - DASN-SIMEI.</p>
                                                <p>●   Prestar informações de seus empregados nos casos de admissão e demissão.</p>
                                                <p><b>Nota:</b> O MEI fica dispensado da escrituração dos livros fiscais e contábeis, da Declaração Eletrônica de Serviços e da emissão da Nota Fiscal Eletrônica (NF-e).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen13" aria-expanded="false" aria-controls="collapseThirteen13">
                                                    <h6 class="text">13.13-  MEI deve registrar o seu Faturamento Bruto ou o Lucro no relatório de Receitas Brutas Mensal?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen13" class="collapse" aria-labelledby="headingThirteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>O MEI deve sempre registrar a sua Receita Brutal total, ou seja, todo o faturamento e NÃO o lucro (Lei Complementar nº 123/2006, § 1º do Artigo 18-A).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen13">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen13" aria-expanded="false" aria-controls="collapseFourteen13">
                                                    <h6 class="text">13.14- O MEI que presta serviços, ao preencher o Relatório Mensal de Receitas Brutas, deverá informar somente o valor dos Serviços Prestados,<br> ou informar também o material comprado e aplicado para execução dos Serviços?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen13" class="collapse" aria-labelledby="headingFourteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Ao preencher o Relatório Mensal de Receitas Brutas, o MEI deve informar somente o valor dos serviços prestados, campos VII, VIII, IX e X, do formulário, sem incluir materiais, pois já estão inclusos no preço cobrado pelos trabalhos executados. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen13">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen13" aria-expanded="false" aria-controls="collapseFifteen13">
                                                    <h6 class="text">13.15-  O MEI que vende a prazo (cartão de crédito, cheque pós-datado), deverá registrar a sua receita <br> no relatório de receitas brutas mensais no mês que ocorre a venda ou mês do recebimento?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen13" class="collapse" aria-labelledby="headingFifteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                As vendas a prazo devem ser registradas como receita no relatório no mês em que ocorre a venda.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen13" aria-expanded="false" aria-controls="collapseSixteen13">
                                                    <h6 class="text">13.16- O MEI, no relatório mensal de receitas brutas, deve informar as vendas e serviços considerando qual período de faturamento?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen13" class="collapse" aria-labelledby="headingSixteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                O MEI deve registrar as vendas ou serviços prestados realizados entre o primeiro e o último dia de cada mês.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeventeen13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen13" aria-expanded="false" aria-controls="collapseSeventeen13">
                                                    <h6 class="text">13.17- Qual o limite para compras de mercadorias para revenda e/ou insumos para o MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeventeen13" class="collapse" aria-labelledby="headingSeventeen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                O limite máximo que o MEI poderá efetuar de compras de mercadorias é de até 80% (oitenta por cento) do valor bruto de suas receitas.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEighteen13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen13" aria-expanded="false" aria-controls="collapseEighteen13">
                                                    <h6 class="text">13.18- O MEI está obrigado a abrir uma conta corrente de Pessoa Jurídica, para registro das suas movimentações bancarias?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEighteen13" class="collapse" aria-labelledby="headingEighteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Não. Para realizar movimentações bancárias das receitas e despesas como MEI e usufruir dos benefícios de acesso ao crédito não é obrigatório abrir uma conta corrente de Pessoa Jurídica. No entanto, a boa administração da empresa começa a partir da separação daquilo que é patrimônio pessoal e o que é patrimônio da empresa.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNineteen13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNineteen13" aria-expanded="false" aria-controls="collapseNineteen13">
                                                    <h6 class="text">13.19- O Microempreendedor Individual pode instalar máquina de cartão de crédito e/ou débito? O que precisa fazer?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNineteen13" class="collapse" aria-labelledby="headingNineteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Sim, para o MEI implantar máquinas de cartão de débito/crédito, deve procurar diretamente as administradoras de cartão e/ou os bancos conveniados.</p>
                                                <p>Alguns Estados exigem também o cumprimento de alguns requisitos quando da instalação máquinas de cartão crédito e/ou débito. Dessa forma, o MEI deve procurar também a Secretaria de Fazenda Estadual ou Municipal para verificar as exigências da legislação tributária em seu Estado. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwenty13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwenty13" aria-expanded="false" aria-controls="collapseTwenty13">
                                                    <h6 class="text">13.20- É permitido ao Microempreendedor Individual emitir boletos para efetuar cobrança através de uma instituição bancária?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwenty13" class="collapse" aria-labelledby="headingTwenty13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, desde que autorizado pelo banco. Não há impedimentos para o MEI emitir boletos e efetivar a sua cobrança/recebimentos através de instituições bancárias.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyOne13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyOne13" aria-expanded="false" aria-controls="collapseTwentyOne13">
                                                    <h6 class="text">13.21- É possível o MEI adquirir um veículo ou outro bem através do CNPJ, à vista ou financiado?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyOne13" class="collapse" aria-labelledby="headingTwentyOne13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Sim. Não existem restrições ou impedimentos para que o MEI possa comprar veículos ou outros bens duráveis, seja a vista ou através de financiamentos. <b>Entretanto, consulte a legislação tributária de seu Estado para verificar se existem restrições. </b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyTwo13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyTwo13" aria-expanded="false" aria-controls="collapseTwentyTwo13">
                                                    <h6 class="text">13.22- O Microempreendedor Individual poderá realizar importação de produtos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyTwo13" class="collapse" aria-labelledby="headingTwentyTwo13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Sim. Não existem impedimentos para que o MEI realize a importação de produtos por conta própria através de comercial trading (trading company) e/ou correios (importa fácil), desde que os produtos comercializados sejam revendidos diretamente para o consumidor final (comércio varejista) e a atividade esteja contemplada no rol das ocupações permitidas, disponíveis no <a href="http://www.portaldoempreendedor.gov.br/temas/quero-ser/formalize-se/atividades-permitidas" target="_blank" data-cke-saved-href="http://www.portaldoempreendedor.gov.br/temas/quero-ser/formalize-se/atividades-permitidas">Portal do Empreendedor</a>.Para maiores informações acesse o site da Receita Federal <a href="http://idg.receita.fazenda.gov.br/orientacao/aduaneira/manuais/despacho-de-importacao/sistemas/siscomex-importacao-web/siscomex-importacao" target="_blank" data-cke-saved-href="http://idg.receita.fazenda.gov.br/orientacao/aduaneira/manuais/despacho-de-importacao/sistemas/siscomex-importacao-web/siscomex-importacao">Siscomex Importação</a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyThree13">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyThree13" aria-expanded="false" aria-controls="collapseTwentyThree13">
                                                    <h6 class="text">13.23- O Microempreendedor Individual poderá realizar exportação de produtos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyThree13" class="collapse" aria-labelledby="headingTwentyOne13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>Sim, é possível, a não ser que exerça atividades atacadistas:</p>
                                                <p><b>a)</b> cigarros, cigarrilhas, charutos, filtros para cigarros, armas de fogo, munições, explosivos e detonantes;</p>
                                                <p><b>b)</b> bebidas a seguir descritas: <br>1 – alcoólicas;<br>2 – refrigerantes, inclusive águas saborizadas gaseificadas;<br>3 – preparações compostas, não alcoólicas (extratos concentrados ou sabores concentrados), para elaboração de bebida refrigerante, com capacidade de diluição de até 10 (dez) partes da bebida para cada parte do concentrado;<br>4 – cervejas sem álcool.</p>
                                                <p> (Artigo 17, inciso X da LC 128/2008). </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 14 -->
                    <div class="mb-2">
                        <div class="" id="headingFourteen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                            <h5 class="text">14- COMO POSSO APRENDER MAIS?</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode14">

                                    <div class="cardy">
                                        <div class="" id="headingOne14">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne14" aria-expanded="true" aria-controls="collapseOne14">
                                                    <h6 class="text">14.1- Existem cursos de capacitação específicos para o Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne14" class="collapse show" aria-labelledby="headingOne14" data-parent="#accordionmode14">
                                            <div class="card-body">
                                                <p>1)      SEI – Comprar;</p>
                                                <p>2)      SEI – Vender;</p>
                                                <p>3)      SEI – Empreender;</p>
                                                <p>4)      SEI – Controlar meu Dinheiro;</p>
                                                <p>5)      SEI – Planejar;</p>
                                                <p>6)      SEI – Unir forças para melhorar;</p>
                                                <p>7)      SEI – Administrar;</p>
                                                <p>8)      SEI - Formar preço;</p>
                                                <p>9)      SEI - Clicar;</p>
                                                <p>10)    SEI - Inovar.</p>
                                                <p>Esses cursos são oferecidos presencialmente e pela internet gratuitamente, acessando,<a class="external-link" href="http://www.sebrae.com.br/sites/PortalSebrae/ead" target="_self" title=""> http://www.sebrae.com.br/sites/PortalSebrae/ead</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo14">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo14" aria-expanded="false" aria-controls="collapseTwo14">
                                                    <h6 class="text">14.2- O Sebrae possui cursos sobre as normas e procedimentos exigidos pelas Vigilâncias Sanitárias?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo14" class="collapse" aria-labelledby="headingTwo14" data-parent="#accordionmode14">
                                            <div class="card-body">
                                                <p>O Sebrae oferece o curso <b>BPSA – Boas práticas nos Serviços de Alimentação, </b>desenvolvido para atender os proprietários e funcionários que atuam no setor de serviços de alimentação (padarias, bares, cantinas, lanchonetes, bufês, confeitarias, restaurantes, comissárias, cozinhas industriais e cozinhas institucionais), com vistas à orientação e capacitação quanto aos procedimentos de higienização e manipulação de alimentos e aos documentos legais relacionados a essa prática.</p>
                                                <P>O curso é oferecido de forma presencial ou através da internet, acessando o site do SEBRAE em <a class="external-link" href="http://www.sebrae.com.br/sites/PortalSebrae/ead/boas-praticas-nos-servicos-de-alimentacao,d7e24bbfa8c98510VgnVCM1000004c00210aRCRD" target="_blank" title="">http://www.sebrae.com.br/sites/PortalSebrae/ead/boas-praticas-nos-servicos-de-alimentacao,d7e24bbfa8c98510VgnVCM1000004c00210aRCRD</a></P>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 15 -->
                    <div class="mb-2">
                        <div class="" id="headingFifteen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                            <h5 class="text">15- DÉBITO AUTOMÁTICO/PAGAMENTO ONLINE</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode15">

                                    <div class="cardy">
                                        <div class="" id="headingOne15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne15" aria-expanded="true" aria-controls="collapseOne15">
                                                    <h6 class="text">15.1- O que é Débito Automático do MEI?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne15" class="collapse show" aria-labelledby="headingOne15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>É uma funcionalidade desenvolvida no Portal do Simples Nacional que permite ao Microempreendedor Individual – MEI pagar os valores mensais apurados no SIMEI (INSS, ICMS, ISS), de forma automática, debitando de sua conta-corrente Pessoa Física ou Jurídica.<br><br>Essa opção pode ser acessada em “Simei Serviços &gt; Débito Automático”, e serão necessários o CNPJ, o CPF e o Código de Acesso.</p>
                                                <p>Clique aqui para consultar o <a class="internal-link" href="resolveuid/f0b5abc9f46d4d17ab40d1c370959923" target="_self" title="">passo a passo</a>.</p>
                                                <p>O MEI deve ter conta-corrente em algum dos bancos da rede arrecadadora a seguir:</p>
                                                <p>001 - Banco do Brasil;<br>003 - Banco da Amazônia S/A;<br>004 – Banco do Nordeste do Brasil S/A;<br>008 - Banco Santander (Brasil) S/A;<br>021 - Banco Banestes S/A;<br>041 - Banco do Estado do Rio Grande do Sul S/A;<br>070 - Banco de Brasília S/A;<br>104 - Caixa Econômica Federal;<br>237 - Banco Bradesco S/A;<br>389 - Banco Mercantil do Brasil S/A;<br>748 - Banco Cooperativo Sicredi S/A;<br>756 - Banco Cooperativo do Brasil S/A.</p>
                                                <p>Notas:</p>
                                                <p>1. A responsabilidade por confirmar a realização do débito na conta-corrente, ou seja, o efetivo pagamento do DASMEI é do MEI.</p>
                                                <p>2. A opção pelo débito automático é válida até que o MEI faça a desativação.</p>
                                                <p>3. O Débito Automático do MEI só será realizado enquanto o CNPJ estiver ativo e optante pelo SIMEI.</p>
                                                <p>4. O MEI, em gozo de benefício previdenciário, não deve fazer a opção pelo débito automático no ano em que gozou de benefício previdenciário. Por esse motivo, DESATIVE sua opção pelo Débito Automático do MEI e só REATIVE após o dia 10 de Janeiro do ano seguinte,  caso não esteja mais em gozo de benefício previdenciário.</p>
                                                <p>5. O MEI que passar a usufruir de benefício previdenciário deve solicitar a DESATIVAÇÃO do débito automático. Nova opção só deverá ser feita no ano seguinte, após o dia 10 de Janeiro, caso não esteja mais em gozo de benefício previdenciário.</p>
                                                <p>6. Inclusão / Alteração / Desativação realizada até o dia 10 surtirá efeito no dia 20 do mês corrente (PA anterior). Inclusão / Alteração / Desativação realizada após o dia 10 surtirá efeitos no dia 20 do mês seguinte (PA atual).</p>
                                                <p>7. A geração de DAS para pagamento, fora do Débito Automático do MEI, deve ser feita utilizando-se o PGMEI, APP MEI ou Totem Sebrae, mas, no caso de o MEI estar em gozo de benefício previdenciário, a geração deve ser feita exclusivamente pelo PGMEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo15" aria-expanded="false" aria-controls="collapseTwo15">
                                                    <h6 class="text">15.2- Como o MEI pode fazer a opção pelo Débito Automático?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo15" class="collapse" aria-labelledby="headingTwo15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>Para fazer a opção pelo Débito Automático, o MEI deverá entrar na opção “Simei Serviços > Débito Automático”. Serão necessários o CNPJ, o CPF e o Código de Acesso, além dos dados de sua Conta Bancária (Banco, Agência e Conta Corrente).</p>
                                                <p>Caso o contribuinte não possua código de acesso, poderá gerar o código no momento que for acessar o serviço Débito Automático do MEI.</p>
                                                <p>Notas:</p>
                                                <p>1. O início do Débito Automático do MEI ocorrerá da seguinte forma:</p>
                                                <p>- Opções realizadas até o dia 10 surtirão efeito no dia 20 do mês corrente, ou dia útil posterior, e quitarão tributos do mês anterior. <br>- Opções após o dia 10 surtirão efeitos no dia 20 do mês seguinte, ou dia útil posterior, e quitarão tributos do mês em curso.</p>
                                                <p>2. Caso a opção seja feita após o dia 10 do mês em curso, o pagamento dos tributos do mês anterior deverá ser feito da forma convencional, com a emissão do DAS pelo PGMEI, APP MEI ou Totem Sebrae.</p>
                                                <p>Exemplo 1: <br>Dia da opção pelo Débito Automático do MEI: 10 de Maio de 2017; <br>Efeito: O DAS referente ao mês (PA) de Abril de 2017 serão debitados da conta-corrente do MEI no dia 22 de maio de 2017 (dia 20 é sábado).</p>
                                                <p>Exemplo 2: <br>Dia da opção pelo Débito Automático do MEI: 11 de Julho de 2017; <br>Efeito: O DAS referente ao mês (PA) de Julho de 2017 serão debitados da conta-corrente do MEI no dia 21 de Agosto de 2017 (dia 20 é Domingo). Neste caso, <br>até o dia 20 de julho de 2017 o MEI deverá pagar normalmente o DAS do mês (PA) Junho de 2017.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree15" aria-expanded="false" aria-controls="collapseThree15">
                                                    <h6 class="text">15.3- Como o MEI deve proceder caso tenha optado pelo Débito Automático e passe a usufruir de benefício previdenciário?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree15" class="collapse" aria-labelledby="headingThree15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>Caso o MEI esteja usufruindo de benefício previdenciário ele não deverá fazer a Opção pelo Débito Automático do MEI. O contribuinte deverá continuar pagando os seus tributos gerando o DAS por meio do PGMEI. Nova opção só deverá ser feita no ano seguinte, após o dia 10 de Janeiro, caso não esteja mais em gozo de benefício previdenciário.</p>
                                                <p>Nota: A geração do DAS em caso de benefício previdenciário deve ser feita unicamente por meio do PGMEI, não devendo ser utilizado o APP MEI ou Totem SEBRAE.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour15" aria-expanded="false" aria-controls="collapseFour15">
                                                    <h6 class="text">15.4- Como o MEI deve proceder caso tenha optado pelo Débito Automático e passe a usufruir de benefício previdenciário?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour15" class="collapse" aria-labelledby="headingFour15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>Caso o MEI esteja usufruindo de benefício previdenciário ele não deverá fazer a Opção pelo Débito Automático do MEI. O contribuinte deverá continuar pagando os seus tributos gerando o DAS por meio do PGMEI. Nova opção só deverá ser feita no ano seguinte, após o dia 10 de Janeiro, caso não esteja mais em gozo de benefício previdenciário.</p>
                                                <p>Nova opção só poderá ser feita no ano seguinte, após o dia 10 de Janeiro, caso não esteja mais usufruindo de benefício previdenciário.</p>
                                                <p>Nota: A geração do DAS em caso de benefício previdenciário deve ser feito unicamente por meio do PGMEI, não devendo ser utilizado o APP MEI ou Totem SEBRAE.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive15" aria-expanded="false" aria-controls="collapseFive15">
                                                    <h6 class="text">15.5- Como o MEI pode Consultar/ Alterar/ Desativar sua opção pelo Débito Automático do MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive15" class="collapse" aria-labelledby="headingFive15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>Deve acessar “SIMEI Serviços > Débito Automático do MEI > Débito Automático" e selecionar a opção correspondente (Consulta, Alteração ou Desativação).</p>
                                                <p>Notas:</p>
                                                <p>1. Alterações/ Cancelamentos realizados até o dia 10 do mês corrente surtirão efeito a partir do dia 20 do mês corrente.</p>
                                                <p>2. Alterações/ Cancelamentos realizados após o dia 10 surtirão efeito a partir do débito a ser realizado no dia 20 do mês seguinte.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix15" aria-expanded="false" aria-controls="collapseSix15">
                                                    <h6 class="text">15.6- O que é o pagamento online?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix15" class="collapse" aria-labelledby="headingSix15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>É uma forma de pagamento via débito em conta-corrente dos DAS do Simples Nacional. Mais informações na notícia publicada no <a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Noticias/NoticiaCompleta.aspx?id=34242a99-e6aa-496d-a3ef-05fb0093a558" target="_blank"> Portal do Simples Nacional</a>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven15" aria-expanded="false" aria-controls="collapseSeven15">
                                                    <h6 class="text">15.7- Posso pagar online mais de um DAS por ano-calendário?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven15" class="collapse" aria-labelledby="headingSeven15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>Sim. Você irá selecionar um Período de Apuração, pagar o DAS online e retornar para selecionar outro Período de Apuração, sempre um de cada vez. Não é possível selecionar vários documentos para pagamento online de uma só vez.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight15">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight15" aria-expanded="false" aria-controls="collapseEight15">
                                                    <h6 class="text">15.8- Posso pagar online se estiver recebendo benefício do INSS?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight15" class="collapse" aria-labelledby="headingEight15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>Não. Se você informar que está recebendo um Benefício do INSS, o sistema automaticamente irá selecionar todas as competências para a impressão dos DAS e irá desabilitar a opção “Pagar Online”, pois, para esta opção, só é possível pagar um documento de cada vez.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 16 -->
                    <div class="mb-2">
                        <div class="" id="headingSixteen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                            <h5 class="text">16- Papel do Município em relação ao MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode16">

                                    <div class="cardy">
                                        <div class="" id="headingOne16">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne16" aria-expanded="true" aria-controls="collapseOne16">
                                                    <h6 class="text">16.1- Papel do Município em relação ao MEI</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne16" class="collapse show" aria-labelledby="headingOne16" data-parent="#accordionmode16">
                                            <div class="card-body">
                                                <p>Acesse a <a href="http://www.cnm.org.br/areastecnicas/perguntas_e_respostas/financas" target="_blank">FAQ da Confederação Nacional de Municípios</a> ou <a href="http://www.cnm.org.br/areastecnicas/perguntas_e_respostas/financas" target="_blank">- CNM </a></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 17 -->
                    <div class="mb-2">
                        <div class="" id="headingSeventeen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                            <h5 class="text">17- Restituição do MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode17">

                                    <div class="cardy">
                                        <div class="" id="headingOne17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne17" aria-expanded="true" aria-controls="collapseOne17">
                                                    <h6 class="text">17.1- Como devo proceder para solicitar restituição de valor recolhido indevidamente ou a maior em documento de arrecadação (DAS)?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne17" class="collapse show" aria-labelledby="headingOne17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                <p>A restituição da contribuição previdenciária (INSS), recolhida em DAS, é solicitada por meio do aplicativo Pedido Eletrônico de Restituição, disponível neste portal, no menu Simei-Serviços ou no portal e-CAC da RFB.</p>
                                                <p>A restituição do ICMS e do ISS deverá ser solicitada, respectivamente, junto ao Estado/DF e Município, de acordo com as orientações de cada ente federado.</p>
                                                <p>O Manual do aplicativo de restituição está disponível neste portal, em Manuais > Manual da Restituição.</p>
                                                <p>Nota: <br>Para o MEI, as situações mais comuns de pagamento indevido em DAS são:<br>- Pagamento em duplicidade para o mesmo período de apuração (PA);<br>- Pagamento de INSS efetuado em DASMEI para um PA em que o MEI esteve em gozo de benefício de salário-maternidade, auxílio-doença ou auxílio-reclusão, e desde que o benefício tenha abrangido o mês inteiro (do primeiro ao último dia).<br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo17" aria-expanded="false" aria-controls="collapseTwo17">
                                                    <h6 class="text">17.2- Após solicitar a restituição por meio do aplicativo, é necessário comparecer a alguma unidade da Receita Federal?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo17" class="collapse" aria-labelledby="headingTwo17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                <p>Não. Todo o processo é feito de forma eletrônica, desde o pedido até a efetivação do pagamento da restituição na conta bancária. Em casos regulares, em que o contribuinte não apresenta débitos e os dados bancários informados estão consistentes, o prazo médio para o pagamento da restituição será de 60 dias.</p>
                                                <p>Nota:<br>No aplicativo Pedido Eletrônico de Restituição, o MEI poderá:<br>- Solicitar a Restituição do valor da contribuição previdenciária (INSS) recolhida indevidamente ou a maior em DAS;<br>- Consultar a situação dos pedidos de restituição efetuados;<br>- Alterar dados bancários para crédito da restituição.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree17" aria-expanded="false" aria-controls="collapseThree17">
                                                    <h6 class="text">17.3- Para solicitar a restituição é necessário informar a conta bancária? A conta bancária tem que ser da pessoa jurídica?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree17" class="collapse" aria-labelledby="headingThree17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                <p>É obrigatória a informação da conta bancária para solicitar a restituição por meio do aplicativo Pedido Eletrônico de Restituição. Para o MEI, poderá ser utilizada conta Pessoa Jurídica, associada ao CNPJ, caso possua, ou conta Pessoa Física, associada ao CPF do responsável pelo CNPJ.</p>
                                                <p>Não é necessário informar o número do CPF do responsável, pois esse dado é recuperado do cadastro CNPJ.<br>Pode ser utilizada tanto uma conta corrente quanto uma conta de poupança.<br>No aplicativo, o MEI também pode alterar os dados bancários para crédito da restituição.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour17" aria-expanded="false" aria-controls="collapseFour17">
                                                    <h6 class="text">17.4- Tenho prazo para solicitar a restituição?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour17" class="collapse" aria-labelledby="headingFour17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim. A restituição deve ser solicitada em, no máximo, 5 anos, contados da data do pagamento.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive17" aria-expanded="false" aria-controls="collapseFive17">
                                                    <h6 class="text">17.5- O valor a ser restituído sofre alguma atualização?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive17" class="collapse" aria-labelledby="headingFive17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                <p>Sim. O valor a ser restituído será acrescido de juros obtidos pela aplicação da taxa Selic, acumulada mensalmente, a partir do mês subsequente ao do pagamento indevido até o mês anterior ao da restituição, e de 1% (um por cento) relativamente ao mês em que estiver sendo efetuada.</p>
                                                <p>Nota:</p>
                                                <p>No momento do pedido, o aplicativo apresenta os valores originais. A atualização do valor, com aplicação da taxa Selic acumulada, somente ocorrerá quando da efetivação do pagamento da restituição.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix17">
                                            <h5 class="mb-0 flyiner btn-mode">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseSix17" aria-expanded="false" aria-controls="collapseSix17">
                                                    <h6 class="text">17.6-  Não sou mais optante pelo SIMEI, mas quero fazer o pedido de restituição de um pagamento indevido de MEI. <br> Posso utilizar o aplicativo Pedido Eletrônico de Restituição?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix17" class="collapse" aria-labelledby="headingSix17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim. No entanto, não poderá ser informada uma conta bancária de pessoa física, devendo ser informada uma conta de titularidade da pessoa jurídica.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven17" aria-expanded="false" aria-controls="collapseSeven17">
                                                    <h6 class="text">17.7- Paguei um DAS em duplicidade. Posso compensar esse crédito com o valor devido no mês seguinte?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven17" class="collapse" aria-labelledby="headingSeven17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Não há compensação a pedido para o MEI, que poderá solicitar a restituição do valor pago em duplicidade ou a maior.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight17">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight17" aria-expanded="false" aria-controls="collapseEight17">
                                                    <h6 class="text">17.8- Posso cancelar um pedido eletrônico de restituição?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight17" class="collapse" aria-labelledby="headingEight17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim. No entanto, o pedido de cancelamento só poderá ser realizado na unidade de atendimento da RFB.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 18 -->
                    <div class="mb-2">
                        <div class="" id="headingEighteen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen">
                            <h5 class="text">18- Parcelamento do MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseEighteen" class="collapse" aria-labelledby="headingEighteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode18">

                                    <div class="cardy">
                                        <div class="" id="headingOne18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne18" aria-expanded="true" aria-controls="collapseOne18">
                                                    <h6 class="text">18.1- Posso parcelar os débitos apurados pelo Simei (INSS, ISS e ICMS)?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne18" class="collapse show" aria-labelledby="headingOne18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>Sim. Com o advento da Lei Complementar nº 155, de 27 de outubro de 2016, é permitido parcelar os débitos do MEI. Existem duas modalidades de parcelamento: o convencional, que pode ser solicitado a qualquer tempo, e o especial, que pode ser solicitado até o dia 09/07/2018.</p>
                                                <p>Nota: Somente serão parcelados débitos já vencidos e declarados por meio da DASN SIMEI na data do pedido de parcelamento.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo18" aria-expanded="false" aria-controls="collapseTwo18">
                                                    <h6 class="text">18.2- Como solicitar o parcelamento dos débitos do MEI em cobrança na Receita Federal do Brasil (RFB)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo18" class="collapse" aria-labelledby="headingTwo18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>O pedido de parcelamento, convencional ou especial, pode ser feito no Portal do Simples Nacional ou no Portal e-CAC da RFB, nos serviços "Parcelamento - Microempreendedor Individual" ou "Parcelamento Especial - Microempreendedor Individual ".<br>O acesso ao Portal do Simples Nacional e ao Portal e-CAC é feito com certificado digital ou código de acesso.</p>
                                                <p>Nota: O código de acesso gerado no Portal do Simples Nacional não é válido para acesso ao Portal e-CAC da RFB, e vice-versa.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree18" aria-expanded="false" aria-controls="collapseThree18">
                                                    <h6 class="text">18.3- É permitido fazer um parcelamento especial e um convencional?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree18" class="collapse" aria-labelledby="headingThree18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>MEI poderá optar:</p>
                                                <p>- por um parcelamento convencional, com débitos vencidos até 12/2016;<br>- ou por um especial desde que tenha somente débitos até 05/2016;<br>- ou por um especial e um convencional, hipótese em que estará obrigado ao pagamento de duas parcelas e, ainda, do DAS MEI mensal.</p>
                                                <p>Assim, tendo em vista os prováveis montantes de débitos consolidados do MEI, o parcelamento convencional poderá ser mais adequado as suas necessidades.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour18" aria-expanded="false" aria-controls="collapseFour18">
                                                    <h6 class="text">18.4- Como é feita a consolidação do parcelamento dos débitos do MEI na RFB?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour18" class="collapse" aria-labelledby="headingFour18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>No parcelamento convencional, no momento da consolidação, são considerados todos os débitos apurados pelo Simei (INSS, ISS e ISS) em cobrança na RFB.</p>
                                                <p>No parcelamento especial, são considerados os débitos apurados pelo Simei em cobrança na RFB, até a competência maio de 2016.</p>
                                                <p>O saldo devedor é atualizado com os devidos acréscimos legais até a data da consolidação.</p>
                                                <p>O valor de cada parcela é obtido mediante a divisão do valor da dívida pela quantidade de parcelas, observado o valor mínimo de R$ 50,00 (cinquenta reais).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive18" aria-expanded="false" aria-controls="collapseFive18">
                                                    <h6 class="text">18.5- Em quantas parcelas posso parcelar os débitos do MEI na RFB?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive18" class="collapse" aria-labelledby="headingFive18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>No parcelamento convencional, o número máximo de parcelas é 60 (sessenta), e no parcelamento especial, o número máximo de parcelas é 120 (cento e vinte).</p>
                                                <p>Em ambos, o valor mínimo de cada parcela é de R$ 50,00 (cinquenta reais).</p>
                                                <p>O aplicativo calcula a quantidade de parcelas de forma automática, considerando o maior número de parcelas possível, respeitado o valor da parcela mínima.</p>
                                                <p>Nota: Não é permitido ao contribuinte escolher o número de parcelas.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix18" aria-expanded="false" aria-controls="collapseSix18">
                                                    <h6 class="text">18.6- Qual é o prazo para pagamento da 1ª (primeira) parcela e das subsequentes?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix18" class="collapse" aria-labelledby="headingSix18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>Para que o parcelamento seja validado, o Documento de Arrecadação do Simples Nacional (DAS) da primeira parcela deverá ser pago até a data de vencimento constante no documento.</p>
                                                <p>As demais parcelas devem ser pagas, mensalmente, até o último dia útil de cada mês.</p>
                                                <p>Nota: Se não houver o pagamento tempestivo da 1ª (primeira) parcela, o pedido de parcelamento será considerado sem efeito e o aplicativo permitirá nova solicitação no mesmo ano-calendário.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven18" aria-expanded="false" aria-controls="collapseSeven18">
                                                    <h6 class="text">18.7- Posso desistir do parcelamento?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven18" class="collapse" aria-labelledby="headingSeven18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                O contribuinte pode desistir do parcelamento a qualquer tempo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight18" aria-expanded="false" aria-controls="collapseEight18">
                                                    <h6 class="text">18.8- Já tenho um pedido de parcelamento, posso fazer um outro pedido para incluir novos débitos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight18" class="collapse" aria-labelledby="headingEight18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>Somente é possível incluir novos débitos no parcelamento convencional. Para tanto, é necessário efetuar a desistência do parcelamento em andamento, e, na sequência, solicitar um novo parcelamento, observando o limite de um pedido de parcelamento validado por ano-calendário.</p>
                                                <p>Esse novo parcelamento consolidará o saldo do parcelamento anterior e os novos débitos.</p>
                                                <p>No parcelamento especial não será possível incluir novos débitos, pois será admitido apenas um pedido.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine18" aria-expanded="false" aria-controls="collapseNine18">
                                                    <h6 class="text">18.9- O parcelamento pode ser rescindido? Em quais situações?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine18" class="collapse" aria-labelledby="headingNine18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>O parcelamento será rescindido quando houver:</p>
                                                <p>- a falta de pagamento de 3 (três) parcelas, consecutivas ou não;<br>- a existência de saldo devedor, após a data de vencimento da última parcela do parcelamento.<br></p>
                                                <p>Nota: É considerada inadimplente a parcela parcialmente paga.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen18">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen18" aria-expanded="false" aria-controls="collapseTen18">
                                                    <h6 class="text">18.10- Onde posso obter informações sobre o PERT-MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen18" class="collapse" aria-labelledby="headingTen18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Para obter informações sobre o aplicativo para adesão ao Programa Especial de Regularização Tributária, o contribuinte deverá acessar o "<a href="http://www8.receita.fazenda.gov.br/SimplesNacional/Arquivos/manual/Manual_PERT.pdf" target="_blank" title="Manual do PERT">Manual do PERT</a>" que se encontra em "Manuais" na área pública deste portal.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 19 -->
                    <div class="mb-2">  
                        <div class="" id="headingNineteen">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen">
                            <h5 class="text">19- Cancelamento da inscrição de MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseNineteen" class="collapse" aria-labelledby="headingNineteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode19">

                                    <div class="cardy">
                                        <div class="" id="headingOne19">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne19" aria-expanded="true" aria-controls="collapseOne19">
                                                    <h6 class="text">19.1- O que é cancelamento e suspensão do MEI?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne19" class="collapse show" aria-labelledby="headingOne19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                <p>O cancelamento de MEI está previsto no Estatuto da Microempresa e da Empresa de Pequeno Porte, no parágrafo 15-B, do artigo 18-A. O CGSIM - Comitê para Gestão da Rede Nacional para Simplificação do Registro e da Legalização de Empresas e Negócios - criado para tratar do processo de registro e de legalização de empresários e de pessoas jurídicas, realizou a regulamentação por meio da Resolução n° 36/2016, alterada pela Resolução n° 39/2017, que estabelece o cancelamento da inscrição do MEI que não cumpre nenhuma de suas obrigações fiscais.</p>
                                                <p>A Resolução publicada prevê que antes do cancelamento efetivo, o MEI terá seu CNPJ suspenso por 95 dias e só depois deste prazo, caso ainda continue inadimplente, a baixa acontecerá definitivamente.</p>
                                                <p>A relação dos MEIs que tiverem suas inscrições no CNPJ suspensas ou canceladas serão publicadas no Portal do Empreendedor.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo19">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo19" aria-expanded="false" aria-controls="collapseTwo19">
                                                    <h6 class="text">19.2- Quais os efeitos do cancelamento do MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo19" class="collapse" aria-labelledby="headingTwo19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                <p>A inscrição de MEI cancelada terá os seguintes efeitos:</p>
                                                <p>• Baixa da inscrição do MEI no Cadastro Nacional de Pessoas Jurídicas (CNPJ);<br>• Baixa das inscrições do MEI nas administrações tributárias estadual e municipal;<br>• Cancelamento das licenças e dos alvarás concedidos.</p>
                                                <p>Dessa forma, o cancelamento não pode ser revertido. O empreendedor terá que se formalizar novamente caso queira realizar atividade econômica como MEI. Portanto, caso opte por nova formalização como MEI, não poderá manter o mesmo número do CNPJ cancelado.</p>
                                                <p>Sobre os aspectos previdenciários, as contribuições mensais efetivamente pagas (Guia DAS-MEI) nesse período continuam válidas para o Regime Geral de Previdência Social (RGPS) e poderão ser consideradas para a concessão de eventuais benefícios previdenciários, inclusive na contagem para aposentadoria, nos termos da legislação previdenciária.</p>
                                                <p>Importante saber que cancelamento do registro, sem quitação dos débitos, não impede que posteriormente sejam lançados ou cobrados do titular do CNPJ cancelado os impostos, contribuições e respectivas penalidades decorrentes da falta de recolhimento ou da prática comprovada e apurada em processo administrativo ou judicial de outras irregularidades praticadas. Neste caso, os débitos que permanecerem após o cancelamento poderão ser também ser parcelados. Para saber mais sobre o parcelamento de débitos, <a class="external-link" href="http://www8.receita.fazenda.gov.br/SimplesNacional/Servicos/Grupo.aspx?grp=19" target="_blank" title="">clique aqui</a><a class="external-link" href="http://http//www8.receita.fazenda.gov.br/SimplesNacional/Servicos/Grupo.aspx?grp=19" target="_blank" title="">.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree19">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree19" aria-expanded="false" aria-controls="collapseThree19">
                                                    <h6 class="text">19.3- Haverá alguma comunicação que minha inscrição será cancelada?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree19" class="collapse" aria-labelledby="headingThree19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                <p>A norma prevê que antes do cancelamento definitivo, o MEI terá seu CNPJ suspenso por 90 dias e só depois deste prazo, caso ainda continue inadimplente, a baixa acontecerá definitivamente.</p>
                                                <p>A relação dos MEIs que tiverem suas inscrições no CNPJ suspensas ou canceladas serão publicadas no Portal do Empreendedor.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour19">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour19" aria-expanded="false" aria-controls="collapseFour19">
                                                    <h6 class="text">19.4- Depois do cancelamento consigo emitir o CCMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour19" class="collapse" aria-labelledby="headingFour19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                <p>O CCMEI será emitido com a condição de “baixado”, perdendo o seu efeito de alvará.</p>
                                                <p>Importante esclarecer que após CCMEI cancelado, o MEI poderá transmitir as declarações em atraso.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 20 -->
                    <div class="mb-2">
                        <div class="" id="headingTwenty">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty">
                            <h5 class="text">20- MEI RURAL</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwenty" class="collapse" aria-labelledby="headingTwenty" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode20">

                                    <div class="cardy">
                                        <div class="" id="headingOne20">
                                            <h5 class="mb-0 flyiner ">
                                                <button class="btn btn-link btn-mode" type="button" data-toggle="collapse" data-target="#collapseOne20" aria-expanded="true" aria-controls="collapseOne20">
                                                    <h6 class="text">20.1- O segurado especial que se formalizar como MEI terá que se submeter ao limite de faturamento anual de R$ 81.000,00, ou poderá ter uma <br> atividade complementar como MEI com esse limite, além das suas outras atividades como segurado especial? Contextualização: segurado <br> especial produz milho e com parte do milho industrializa fubá. Para a indústria de fubá poderá abrir MEI com limite de R$ 81 mil e poderá,<br> adicionalmente, vender sua produção rural sem observar esse limite? Em suma: a soma das receitas brutas das atividades do empreendedor <br> poderá superar R$ 81 mil?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne20" class="collapse show" aria-labelledby="headingOne20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                <p>O limite de faturamento para fins de enquadramento como MEI deve considerar toda a receita do segurado especial. Se o segurado especial se formaliza como MEI, essa formalização deverá abranger toda a sua atividade rural e não apenas parte dela. Sendo assim, o total das receitas do grupo familiar não poderá ultrapassar R$ 81.000,00/ano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo20">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link text-justify collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo20" aria-expanded="false" aria-controls="collapseTwo20">
                                                    <h6 class="text">20.2- O segurado especial, ao se formalizar como MEI, terá que pagar o carnê – valor fixo mensal. Quando vender sua produção rural, terá que <br> pagar as contribuições sobre a venda da produção? Incidirá também o SENAR na venda dessa produção? Há alguma diferença nesse tratamento <br> entre a venda do “objeto do MEI” (a exemplo do fubá industrializado) e a venda da produção rural “não objeto do MEI”?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo20" class="collapse" aria-labelledby="headingTwo20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                <p>O disposto no § 7º do art. 18-E da LC 123/2006 estabelece que o empreendedor manterá todas as suas obrigações relativas à condição de produtor rural ou de agricultor familiar. Assim, o art. 25 da Lei nº 8.212/1991 continua sendo aplicado para toda a receita da comercialização da produção rural.</p>
                                                <p>No entanto, não estará obrigado ao pagamento do SENAR sobre a venda dessa produção, em face do disposto no § 3º do art. 13 da LC 123/2006. A contribuição sobre a venda da produção incidirá sobre o total comercializado pelo grupo familiar, seja ou não industrializado.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree20">
                                            <h5 class="mb-0 flyiner ">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseThree20" aria-expanded="false" aria-controls="collapseThree20">
                                                    <h6 class="text">20.3- Há limites diferenciados quanto à contratação de empregado (s) entre o MEI e o segurado especial. O MEI pode contratar um empregado <br> permanente com remuneração de até 1 salário-mínimo (ou o piso da categoria).     a)	Ele poderá contratar o empregado como MEI e,<br> adicionalmente, os demais que a legislação da previdência permite ao segurado especial?  b) Ele poderá contratar o empregado como MEI para a <br> atividade “objeto do MEI” e, adicionalmente, outros como segurado especial na atividade “não objeto do MEI”?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree20" class="collapse" aria-labelledby="headingThree20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                <p>a)Não. Cada regime, seu requisito; cada descumprimento, sua respectiva sanção. A contratação de empregados pelo segurado especial é vedada pela própria CF/88, em seu art. 195, § 8º: § 8º O produtor, o parceiro, o meeiro e o arrendatário rurais e o pescador artesanal, bem como os respectivos cônjuges, que exerçam suas atividades em regime de economia familiar, sem empregados permanentes, contribuirão para a seguridade social mediante a aplicação de uma alíquota sobre o resultado da comercialização da produção e farão jus aos benefícios nos termos da lei. Logo, segurado especial não pode ter empregado permanente, pois se tiver, deixa de ser segurado especial. As regras do MEI permitem a contratação de 1 empregado permanente. Resumindo: - Se contratar 3 empregados por 40 dias (ou 2 empregados por 60 dias), permanece segurado especial, mas NÃO PODERÁ SER MEI; - Se contratar 1 empregado por mais de 120 dias, poderá ser MEI, mas NÃO PODERÁ SER SEGURADO ESPECIAL; - A única possibilidade de acumular as duas situações (MEI e Segurado Especial) é: contratar 1 empregado por até 120 dias/ano.</p>
                                                <p>b)Não. Considera-se sempre o grupo familiar.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour20">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour20" aria-expanded="false" aria-controls="collapseFour20">
                                                    <h6 class="text">20.4- Poderá haver mais de 1 (um) MEI em um mesmo grupo familiar?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour20" class="collapse" aria-labelledby="headingFour20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                <p>Não</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive20">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive20" aria-expanded="false" aria-controls="collapseFive20">
                                                    <h6 class="text">20.5-  Um MEI prestador de serviços poderá manter a condição de segurado especial?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive20" class="collapse" aria-labelledby="headingFive20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Poderá, desde que respeite o limite de prestação de serviços para terceiros constante da legislação previdenciária (120 dias/ano).
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix20">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix20" aria-expanded="false" aria-controls="collapseSix20">
                                                    <h6 class="text">20.6- Um MEI que industrialize seus produtos poderá ser segurado especial, mesmo que a industrialização não seja rudimentar?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix20" class="collapse" aria-labelledby="headingSix20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Sim, de acordo com o § 5º do art. 18-E da LC 123/2006; inciso VII do § 9º e § 14 do art. 12 da Lei nº 8.212/1991.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven20">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven20" aria-expanded="false" aria-controls="collapseSeven20">
                                                    <h6 class="text">20.7- Um MEI pode ser sócio de cooperativa de produção?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven20" class="collapse" aria-labelledby="headingSeven20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Não, de acordo com o inciso VII do § 4º do art. 3º da LC 123/2006. De acordo com o § 5º do mesmo artigo, ele poderá participar de cooperativa de crédito. 
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 21 -->
                    <div class="mb-2">
                        <div class="" id="headingTwentyOne">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyOne" aria-expanded="false" aria-controls="collapseTwentyOne">
                            <h5 class="text">21- SALÃO PARCEIRO-PROFISSIONAL PARCEIRO</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwentyOne" class="collapse" aria-labelledby="headingTwentyOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode21">

                                    <div class="cardy">
                                        <div class="" id="headingOne21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne21" aria-expanded="true" aria-controls="collapseOne21">
                                                    <h6 class="text">21.1- Quais são os benefícios do novo sistema de trabalho e os maiores desafios no processo de transição?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne21" class="collapse show" aria-labelledby="headingOne21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>O maior benefício é propor avanços na relação contratual. Cada profissional de beleza poderá continuar atuando para receber uma comissão de acordo com os valores de mercado. Em contrapartida, o dono do salão tem a segurança na questão tributária e trabalhista.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo21" aria-expanded="false" aria-controls="collapseTwo21">
                                                    <h6 class="text">21.2- Quais ocupações estão previstas para profissional-parceiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo21" class="collapse" aria-labelledby="headingTwo21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Cabeleireiros, barbeiros, esteticistas, manicures, pedicures, depiladores e maquiadores.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree21" aria-expanded="false" aria-controls="collapseThree21">
                                                    <h6 class="text">21.3- Em que situações a relação de parceria poderá ser interpretada como relação de emprego?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree21" class="collapse" aria-labelledby="headingThree21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Quando não existir contrato de parceria formalizado na forma descrita na Lei ou quando o profissional-parceiro desempenhar funções diferentes das descritas no contrato de parceria. Importante reforçar que se houver pessoalidade, subordinação e assiduidade, poderá ser caracterizada uma relação de vínculo empregatício.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour21" aria-expanded="false" aria-controls="collapseFour21">
                                                    <h6 class="text">21.4- Há modelos de contrato de parceria para salões de beleza?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour21" class="collapse" aria-labelledby="headingFour21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Sim. Algumas entidades representativas do setor podem fornecer aos seus associados. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive21" aria-expanded="false" aria-controls="collapseFive21">
                                                    <h6 class="text">21.5- Quais são as cláusulas obrigatórias do contrato de parceria (parágrafo 10 - Lei nº 13.352/2016)?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive21" class="collapse" aria-labelledby="headingFive21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>São as seguintes cláusulas:</p>
                                                <p>I - percentual das retenções pelo salão-parceiro dos valores recebidos por cada serviço prestado pelo profissional-parceiro;<br>II - obrigação, por parte do salão-parceiro, de retenção e de recolhimento dos tributos e contribuições sociais e previdenciárias devidos pelo profissional-parceiro em decorrência da atividade deste na parceria;<br>III - condições e periodicidade do pagamento do profissional-parceiro, por tipo de serviço oferecido;<br>IV - direitos do profissional-parceiro quanto ao uso de bens materiais necessários ao desempenho das atividades profissionais, bem como sobre o acesso e circulação nas dependências do estabelecimento;<br>V - possibilidade de rescisão unilateral do contrato, no caso de não subsistir interesse na sua continuidade, mediante aviso prévio de, no mínimo, trinta dias;<br>VI - responsabilidades de ambas as partes com a manutenção e higiene de materiais e equipamentos, das condições de funcionamento do negócio e do bom atendimento dos clientes;<br>VII - obrigação, por parte do profissional-parceiro, de manutenção da regularidade de sua inscrição perante as autoridades fazendárias.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix21" aria-expanded="false" aria-controls="collapseSix21">
                                                    <h6 class="text">21.6- Quem é responsável pela centralização de pagamentos e recebimentos?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix21" class="collapse" aria-labelledby="headingSix21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>O salão-parceiro realizará a retenção de sua parte, conforme contrato de parceria, e fará o recolhimento de tributos e contribuições sociais e previdenciárias incidentes sobre a parte do profissional-parceiro.</p>
                                                <p>Para fins tributários, a parte retida pelo salão-parceiro deve ser declarada como RECEITA DE PRESTAÇÃO DE SERVIÇOS. No Simples Nacional não tem validade o § 4º do art. 1º-A da Lei nº 12.592/2012, na redação dada pela Lei nº 13.352/2016. De acordo com o § 18 do art. 25-A da Resolução CGSN nº 140/2018:</p>
                                                <p>§ 19. A receita obtida pelo salão-parceiro e pelo profissional-parceiro de que trata a Lei nº 12.592, de 2012, deverá ser tributada: (Lei Complementar nº 123, de 2006, art. 3º, §§ 1º e 16; art. 18, § 4º)</p>
                                                <p>I - na forma prevista no Anexo III desta Resolução, quanto aos serviços e produtos neles empregados; <br>II - na forma prevista no Anexo I desta Resolução, quanto aos produtos e mercadorias comercializados.</p>
                                                <p>A parte destinada ao profissional-parceiro ocorrerá também a título de atividades de prestação de serviços de beleza.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven21" aria-expanded="false" aria-controls="collapseSeven21">
                                                    <h6 class="text">21.7- Quem é responsável pela preservação e manutenção das condições de trabalho?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven21" class="collapse" aria-labelledby="headingSeven21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>O salão-parceiro. Especialmente quanto aos seus equipamentos e instalações, possibilitando as condições adequadas ao cumprimento das normas de segurança e saúde.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight21" aria-expanded="false" aria-controls="collapseEight21">
                                                    <h6 class="text">21.8- Como a lei é aplicada e deve ser seguida em caso de franquias?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight21" class="collapse" aria-labelledby="headingEight21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Com relação às questões fiscais, funciona da mesma maneira. O gestor e os funcionários escolhem se vão seguir o sistema celetista ou parceria. Em questões trabalhistas, os franqueados devem sempre seguir as orientações da matriz.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine21" aria-expanded="false" aria-controls="collapseNine21">
                                                    <h6 class="text">21.9- Quais os benefícios para quem é salão-parceiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine21" class="collapse" aria-labelledby="headingNine21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Pela nova lei, os salões de beleza poderão firmar contratos de parceria com profissionais cabeleireiros, barbeiros, esteticistas, manicures, depiladores e maquiadores, que atuarão como autônomos, sem vínculo empregatício, desde que respeitadas as condições da parceria estabelecidas no contrato. Os demais empregados dos salões de beleza que atuam em áreas de apoio como recepção, gestão e serviços gerais continuam com contratos regidos pela CLT.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen21" aria-expanded="false" aria-controls="collapseTen21">
                                                    <h6 class="text">21.10- O salão-parceiro pode ser MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen21" class="collapse" aria-labelledby="headingTen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Não, porque as atividades que são atribuídas ao Salão Parceiro não estão contempladas nas atividades permitidas ao Microempreendedor Individual.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven21" aria-expanded="false" aria-controls="collapseEleven21">
                                                    <h6 class="text">21.11- O salão-parceiro pode ter uma relação de subordinação com o profissional-parceiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven21" class="collapse" aria-labelledby="headingEleven21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Não. O profissional-parceiro não terá relação de emprego ou de sociedade com o salão-parceiro enquanto perdurar a relação de parceria tratada na Lei nº 13.352/2016. Caso haja elementos como a cobrança de assiduidade ou relação de subordinação, pode caracterizar uma relação trabalhista e não de parceria.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve21" aria-expanded="false" aria-controls="collapseTwelve21">
                                                    <h6 class="text">21.12- Como se dá a emissão da nota fiscal pelo salão-parceiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve21" class="collapse" aria-labelledby="headingTwelve21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>O salão-parceiro deverá emitir ao consumidor documento fiscal unificado relativo às receitas de serviços e produtos neles empregados, discriminando-se a parte do salão-parceiro e do profissional-parceiro. O profissional-parceiro emitirá documento fiscal destinado ao salão-parceiro relativamente ao valor da parte recebida. A receita obtida pelo salão-parceiro e pelo profissional-parceiro deverá ser tributada na forma prevista no Anexo III da Resolução CGSN 140/2011, quanto aos serviços e produtos neles empregados, e no Anexo I da Resolução CGSN nº 140/2011, quanto aos produtos e mercadorias comercializados. Será considerada como receita auferida pelo MEI que atue como profissional-parceiro a totalidade da parte recebida do salão-parceiro.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen21" aria-expanded="false" aria-controls="collapseThirteen21">
                                                    <h6 class="text">21.13- Como se dá o pagamento de comissão e impostos já que as máquinas de cartão são do salão-parceiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen21" class="collapse" aria-labelledby="headingThirteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>A lei prevê que o salão é responsável pela centralização dos pagamentos. O cliente paga no caixa e o salão desconta os tributos, previdência social e paga a parte do serviço prestado que cabe ao profissional. O salão é responsável para que, no ato do pagamento, já sejam realizados os descontos necessários.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen21" aria-expanded="false" aria-controls="collapseFourteen21">
                                                    <h6 class="text">21.14- O profissional-parceiro pode ser MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen21" class="collapse" aria-labelledby="headingFourteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Incentivo ao empreendedorismo, a melhoria da segurança jurídica entre o salão e o profissional e a possibilidade do aumento de renda.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen21" aria-expanded="false" aria-controls="collapseFifteen21">
                                                    <h6 class="text">21.15- Quais os benefícios para quem é profissional-parceiro?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen21" class="collapse" aria-labelledby="headingFifteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Sim, mesmo que inscrito como pessoa jurídica, ele será assistido pelo sindicato da sua categoria profissional e, na ausência desse, pelo órgão local competente do Ministério do Trabalho.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen21">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen21" aria-expanded="false" aria-controls="collapseSixteen21">
                                                    <h6 class="text">21.16- O profissional-parceiro tem assistência sindical?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen21" class="collapse" aria-labelledby="headingSixteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>Sim, mesmo que inscrito como pessoa jurídica, ele será assistido pelo sindicato da sua categoria profissional e, na ausência desse, pelo órgão local competente do Ministério do Trabalho.</p>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 22 -->
                    <div class="mb-2">
                        <div class="" id="headingTwentyTwo">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyTwo" aria-expanded="false" aria-controls="collapseTwentyTwo">
                            <h5 class="text">22- Programa CREDMEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwentyTwo" class="collapse" aria-labelledby="headingTwentyTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion " id="accordionmode22">

                                    <div class="cardy">
                                        <div class="" id="headingOne22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne22" aria-expanded="true" aria-controls="collapseOne22">
                                                    <h6 class="text">22.1- O que é o Progrma CREDMEI?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne22" class="collapse show" aria-labelledby="headingOne22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>O CREDMEI é um programa do governo federal que busca simplificar o processo de obtenção de produtos e serviços financeiros junto aos bancos em operação no País. É um programa de desburocratização da relação entre o microempreendedor individual e o sistema bancário.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo22" aria-expanded="false" aria-controls="collapseTwo22">
                                                    <h6 class="text">22.2- Como o empreendedor pode se beneficiar do Programa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo22" class="collapse" aria-labelledby="headingTwo22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>Por meio do CREDMEI, o empreendedor pode entrar em contato e realizar solicitações para diversas instituições financeiras simultaneamente, usando apenas o seu computador ou smartphone. O empreendedor apenas precisará ir ao banco para realizar a assinatura de um contrato, caso receba alguma proposta compatível com suas necessidades. Com isso o empreendedor economiza tempo e dinheiro e pode se dedicar ao dedicar ao seu negócio.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree22" aria-expanded="false" aria-controls="collapseThree22">
                                                    <h6 class="text">22.3- Quais empreendedores podem se beneficiar do Programa CREDMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree22" class="collapse" aria-labelledby="headingThree22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>O programa é destinado aos microempreendedores individuais, ou seja, os empreendedores formalizados por meio do Portal do Empreendedor. Para participar, o empreendedor deve estar com o cadastro atualizado e exercer suas atividades em um dos munícipios contemplados na fase piloto do Programa: Brasília-DF, Manaus-AM, Fortaleza-CE, Vitória-ES e Curitiba-PR.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour22" aria-expanded="false" aria-controls="collapseFour22">
                                                    <h6 class="text">22.4- Como o Programa funciona?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour22" class="collapse" aria-labelledby="headingFour22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>Por meio do Portal do Empreendedor, o MEI elabora uma solicitação de produtos e serviços financeiros, indicando que tipo de solução precisa para seu negócio.. Esta solicitação é encaminhada eletronicamente para as instituições financeiras selecionadas pelo empreendedor. Junto à solicitação, a instituição financeira também receberá os dados e documentos do empreendedor, que facilitarão e agilizarão o processo de análise do pedido. Se a solicitação for aprovada, a instituição entra em contato diretamente com o empreendedor, com as orientações para a assinatura do contrato.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive22" aria-expanded="false" aria-controls="collapseFive22">
                                                    <h6 class="text">22.5- Quais são instituições financeiras participantes do Programa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive22" class="collapse" aria-labelledby="headingFive22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>A participação de instituições financeiras no Programa se dá por meio de um processo simplificado de credenciamento. Todas as instituições financeiras e as instituições de pagamento em funcionamento regular no País podem se credenciar gratuitamente no Programa. </p>
                                                <p>Neste momento, estão credenciadas no Programa  as seguintes instituições:</p>
                                                <p>AGÊNCIA DE FOMENTO DO PARANÁ S/A<br>CAIXA ECONÔMICA FEDERAL - CEF<br>CENTRAL COOPERATIVA DE CRÉDITO NO ESTADO DO ESPÍRITO SANTO - CECOOP<br>HSCM - SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix22" aria-expanded="false" aria-controls="collapseSix22">
                                                    <h6 class="text">22.6- O que é a fase piloto do Programa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix22" class="collapse" aria-labelledby="headingSix22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>É a fase inicial de implantação do Programa em que a solicitação de produtos e serviços financeiros está disponível apenas em cidades pré-selecionadas. Estas cidades são: Brasília-DF, Manaus-AM, Fortaleza-CE, Vitória-ES e Curitiba-PR. A fase piloto tem como objetivo testar a ferramenta de solicitação disponibilizada no Portal do Empreendedor e também definir conjuntamente com as instituições financeira participantes o modelo de atendimento dos usuários do serviço.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven22" aria-expanded="false" aria-controls="collapseSeven22">
                                                    <h6 class="text">22.7- O CREDMEI conta com alguma linha de crédito específica para o MEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven22" class="collapse" aria-labelledby="headingSeven22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>Não. O programa CREDMEI não é um programa de concessão de crédito, mas de facilitação do acesso aos serviços oferecidos pelas instituições financeiras. Por meio do CREDMEI, o empreendedor chega mais facilmente ao banco, porém a concessão de determinada linha de crédito, específica ou não, será uma decisão exclusiva do banco, tomada de acordo com sua política de crédito.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight22" aria-expanded="false" aria-controls="collapseEight22">
                                                    <h6 class="text">22.8- Preciso pagar alguma taxa para usar o CREDIMEI?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight22" class="collapse" aria-labelledby="headingEight22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>Não. O CREDMEI é totalmente gratuito, tanto para empreendedores quanto para instituições financeiras.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine22" aria-expanded="false" aria-controls="collapseNine22">
                                                    <h6 class="text">22.9- Preciso de algum documento para fazer minha solicitação?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine22" class="collapse" aria-labelledby="headingNine22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>Sim. Para fazer a solicitação, o empreendedor deve ter em mãos um documento de identidade e um comprovante de residência, os quais deverão ser digitalizados para inserção no formulário de solicitação. Além disso, o empreendedor deve manter o cadastro CNPJ atualizado.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link btn-mode collapsed" type="button" data-toggle="collapse" data-target="#collapseTen22" aria-expanded="false" aria-controls="collapseTen22">
                                                    <h6 class="text">22.10- Ao clicar em CREDMEI no Portal do Empreendedor, fui direcionado para o site do Brasil Cidadão. <br> O que é isso? Preciso me cadastrar neste site?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen22" class="collapse" aria-labelledby="headingTen22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>>O Brasil Cidadão é o serviço do governo federal que realiza a identificação digital do cidadão. Com esta identificação digital única, é possível acessar diversos serviços públicos disponíveis na plataforma de serviços do governo federal (<a href="https://correio.mdic.gov.br/owa/redir.aspx?REF=2hq1rMEOfZLajTvPA5f_hfqR0dxJNQeZpucJ--AgjTtYr8pgHqbWCAFodHRwOi8vd3d3LnNlcnZpY29zLmdvdi5icg.." rel="noopener noreferrer" target="_blank"><span class="Hyperlink__Char">www.servicos.gov.br</span></a>). O Brasil Cidadão foi criado pelo Decreto nº. 8.936, de 19 de dezembro de 2016, e sua adoção no âmbito dos serviços públicos digitais é obrigatória. Assim, o MEI que desejar realizar uma solicitação por meio do CREDMEI deverá realizar seu cadastro no Brasil Cidadão.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven22" aria-expanded="false" aria-controls="collapseEleven22">
                                                    <h6 class="text">22.11- Qual o prazo para a instituição responder a solicitação?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven22" class="collapse" aria-labelledby="headingEleven22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>A instituição não tem um prazo pré-estabelecido para responder as solicitações de produtos e serviços financeiros. O compromisso assumido no âmbito do Programa é que as instituições analisem e respondam a solicitação o mais rápido o possível. Para fara facilitar o processo de análise, é importante que o cadastro esteja atualizado e que as cópias do documento de identidade e do comprovante de residência sejam legíveis.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve22" aria-expanded="false" aria-controls="collapseTwelve22">
                                                    <h6 class="text">22.12- O que devo fazer para acompanhar o andamento da solicitação?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve22" class="collapse" aria-labelledby="headingTwelve22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>A instituição financeira que recebeu a solicitação ficará responsável informar o andamento da proposta. Isso será feito por meio de contato telefônico ou via e-mail. Por isso é importante que os dados de contato estejam sempre atualizados.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen22">
                                            <h5 class="mb-0 flyiner">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen22" aria-expanded="false" aria-controls="collapseThirteen22">
                                                    <h6 class="text">22.13- Estou em uma cidade que não faz parte da fase piloto do Programa. Quando poderei utilizar o Programa?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen22" class="collapse" aria-labelledby="headingThirteen22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>Conforme normativos do Programa, a fase piloto durará inicialmente até maio/2019. A partir desta data, o Programa estará disponível para outras cidades.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="" id="headingGlossary">
                        <h5 class="mb-0 flyiner flyiner">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseGlossary" aria-expanded="false" aria-controls="collapseGlossary">
                            <h5 class="text">GLOSSÁRIO DAS SIGLAS E ABREVIAÇÕES</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseGlossary" class="collapse" aria-labelledby="headingGlossary" data-parent="#accordionExample">
                            <div class="card-body">
                                <p><b>CNAE</b> é a Classificação Nacional de Atividade Econômica, serve para determinar a área de atuação da atividade empresarial, ou seja, é um código que atribui um conjunto de atividades desempenhadas pelo Empresário. <br><b>NIT</b> é o número de Identificação do Trabalhador, fornecido pelo INSS que confirma a inscrição do Trabalhador na Previdência Social.</p>
                                <h2>CONHEÇA OUTRAS SIGLAS IMPORTANTES</h2>
                                <p><b>MEI:</b> Microempreendedor Individual.</p>
                                <p><b>DAS ou DAS-MEI:</b> Documento de Arrecadação do Simples Nacional.</p>
                                <p><b>DASN-SIMEI:</b> Declaração Anual do Simples Nacional do MEI.</p>
                                <p><b>Resolução do CGSN:</b> Comitê Gestor do Simples Nacional.</p>
                                <p><b>CGSIM </b> - Comitê para Gestão da Rede Nacional para a Simplificação do Registro e da Legalização de Empresas e Negócios</p>
                                <p><b>CPP:</b> Contribuição Patronal Previdenciária.</p>
                                <p><b>CCMEI:</b> Certificado da Condição de Microempreendedor Individual.</p>
                                <p><b>DIRPF:</b> Declaração Anual de Imposto de Renda Pessoa Física.</p>
                                <p><b>INSS:</b> Instituto Nacional do Seguro Social.</p>
                                <p><b>CPF:</b> Cadastro de Pessoas Físicas.</p>
                                <p><b>CTPS:</b> Carteira de Trabalho e Previdência Social.</p>
                                <p><b>GPS:</b> Guia da Previdência Social.</p>
                                <p><b>PIS:</b> Programa de Integração Social.</p>
                                <p><b>GFIP:</b> Guia de Recolhimento do FGTS e Informações à Previdência Social.</p>
                                <p><b>RAIS:</b> Relação Anual de Informações Sociais.</p>
                                <p><b>PGMEI:</b> Programa Gerador de DAS do Microempreendedor Individual.</p>
                                <p><b>PBF:</b> Programa Bolsa Família</p>
                                <p><b>NF-e:</b> Nota Fiscal Eletrônica.</p>
                                <p><b>PGDAS-D:</b> Programa Gerador do Documento de Arrecadação do Simples Nacional – Declaratório.</p>
                                <p><b>RFB:</b> Receita Federal do Brasil.</p>
                                <p><b>CLT:</b> Consolidação das Leis do Trabalho.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                <form class="text-center primary-color-dark p-5" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">                  
                    <input type="text" required name="nomeEmpresa" class="z-depth-1  mb-3 input1 texto" placeholder="Nome da Empresa">
                    <input type="text" required name="nomeResponsavel" class="z-depth-1  mb-3 input1 texto" placeholder="Nome do Responsavel">
                    <input type="email" required name="email" class="z-depth-1  mb-3 input1 texto" placeholder="E-mail">
                    <input type="password" required name="senha" class="z-depth-1  mb-3 input texto" placeholder="Senha">
                    <input type="text"  required name="estado" class="z-depth-1  mb-3 input texto" placeholder="Estado">
                    <input type="text" required name="CNPJ" class="z-depth-1  mb-3 input texto" id="cnpj" onKeyPress="MascaraCNPJ(form1.cnpj);" placeholder="CNPJ" maxlength="18">
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
<!-- <div class=""><div class="" id="headingThree"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFour"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFive"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSix"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSeven"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingEight"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingNine"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingEleven"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwelve"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingThirteen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFourteen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFifteen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSixteen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSeventeen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingEighteen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseEighteen" class="collapse" aria-labelledby="headingEighteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingNineteen"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseNineteen" class="collapse" aria-labelledby="headingNineteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwenty"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwenty" class="collapse" aria-labelledby="headingTwenty" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwentyOne"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwentyOne" aria-expanded="false" aria-controls="collapseTwentyOne"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwentyOne" class="collapse" aria-labelledby="headingTwentyOne" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwentyTwo"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwentyTwo" aria-expanded="false" aria-controls="collapseTwentyTwo"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwentyTwo" class="collapse" aria-labelledby="headingTwentyTwo" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwentyThree"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwentyThree" aria-expanded="false" aria-controls="collapseTwentyThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwentyThree" class="collapse" aria-labelledby="headingTwentyThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->

    <script>
        function funcao1() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0 flyiner"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">1.1- O que é o MEI - Microempreendedor Individual?</h4></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.<p>  </div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">1.2- Qual é a lei que instituiu o Microempreendedor individual?</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"><p>A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.</p></div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div><div class=""><div class="" id="headingFour"><h5 class="mb-0 flyiner text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">1.4- Qual o faturamento anual  do Microempreendedor Individual?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p><p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p><p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p></div></div></div>';
        }
        function funcao2() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0 flyiner"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">2.1- Pontos de atenção antes da formalização:</h5></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><p><b>1-</b> Verificar se recebe algum benefício previdenciário (Exemplo: Aposentadoria por invalidez, Auxílio Doença, Seguro Desemprego, etc).</p><p><b>2-</b> Procurar a prefeitura para verificar se a atividade pode ser exercida no local desejado. </p><p><b>3-</b> Verificar se as atividades escolhidas podem ser registradas como MEI. (Consultar questão 2.6)</p></div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">2.2- Situações que NÃO permitem a formalização como MEI:</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"><p><b>1- Pensionista e Servidor Público</b> Federal em atividade. Servidores públicos estaduais e municipais devem observar os critérios da respectiva legislação, que podem variar conforme o estado ou município.<p><p><b>2-</b> Pessoa que seja <b>titular, sócio ou administrador de outra empresa</b>.<p> </div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">2.3- Situações que permitem a formalização como MEI, com ressalvas:</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p><b>1-</b>  Pessoa que recebe o <strong>Seguro Desemprego</strong>: pode ser formalizada, mas poderá ter a suspensão do benefício. Em caso de suspensão deverá recorrer nos postos de atendimento do Ministério do Trabalho.</p><p><b>2 - </b>Pessoa que trabalha <strong>re</strong><strong>gistrada no regime CLT</strong>: pode ser formalizada, mas, em caso de demissão sem justa causa, não terá direito ao Seguro Desemprego.</p></div></div><div class=""><div class="" id="headingFour"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">2.4- O que é a Consulta Prévia de endereço e atividade? Onde fazer a consulta prévia?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>A consulta prévia é uma pesquisa realizada junto à Prefeitura (ou Administração Regional) para o cidadão verificar e confirmar se o endereço ou local desejado para estabelecer o seu negócio é passível de instalação de atividade da empresa ou não.</p><p>O órgão responsável para responder a consulta prévia é a prefeitura municipal ou Administração Regional, no caso do DF. É ela que determinará se o endereço indicado para estabelecer a sua empresa é passível ou não de instalação da atividade comercial. Para fazer a consulta prévia, consulte a página da Prefeitura na internet, se houver. Lembre-se: antes de efetuar a sua formalização no Portal do Empreendedor, procure se informar perante a Prefeitura ou Administração sobre o local e atividade que pretende exercer. Isso evita problemas na formalização, tais como o cancelamento do registro.</p></div></div><div class=""><div class="" id="headingFive"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><h5 class="text">2.5- Quais documentos ou dados são necessários para me formalizar como MEI? Após a formalização, o que devo fazer?</h5></button></h5></div><div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion"><div class="card-body"><p>Para se formalizar, se faz necessário informar o número do CPF e datade nascimento do titular, o número do título de eleitor ou o número doúltimo recibo de entrega da Declaração Anual de Imposto de RendaPessoa Física – DIRPF, caso esteja obrigado a entregar a DIRPF.</p><p>Lembre-se também, de que é necessário conhecer as normas daPrefeitura ou Administração para o funcionamento de seu negócio, sejaele qual for.</p><p><b>Após a formalização no Portal do Empreendedor,recomendamos:</b><br><b>a)</b><br><b>a)</b>Imprimir os <a href="" target="blank">DAS</a> para recolhimento das contribuições ao INSS,ISS e/ou ICMS para o ano;<br> <b>b)</b> Imprimir o <a class="internal-link" href="resolveuid/7661c73442db415c94034565b2030a57" target="_self" title="">Certificado de Microempreendedor Individual –CCMEI;</a> <br> <b>c) </b>Imprimir o <a href="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp">Cartão do CNPJ</a> no site da Receita Federal;<br><strong>d)</strong> Imprimir e preencher todo mês o Relatório de Receitas Brutas, disponível no Portal do Empreendedor/Obrigações.</p></div></div><div class=""><div class="" id="headingSix"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><h5 class="text">2.6- O Microempreendedor Individual pode se formalizar no mesmo endereço de outro MEI? O Microempreendedor Individual pode dividir o mesmo espaço físico onde realiza a atividade com outro MEI?</h5></button></h5></div><div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion"><div class="card-body"><p>Como cada Prefeitura tem sua legislação, normas e procedimentos próprios conforme Códigos de Zoneamento Urbano e de Posturas Municipais,  recomendamos realizar uma consulta prévia junto à Prefeitura antes de efetuar a formalização no Portal do Empreendedor para que possa verificar a possibilidade de funcionamento de duas atividades em um mesmo endereço.</p></div></div><div class=""><div class="" id="headingSeven"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"><h5 class="text">2.7- É possível solicitar a inscrição como MEI e manter vínculo empregatício com carteira assinada?</h5></button></h5></div><div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion"><div class="card-body"><p>Sim. Não há impedimento de um empregado, com carteira assinada exercer atividade econômica como MEI nas horas vagas.</p></div></div><div class=""><div class="" id="headingEight"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"><h5 class="text">2.8- Quais atividades podem ser enquadradas como Microempreendedor Individual?</h5></button></h5></div><div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion"><div class="card-body"><p>As Atividades Permitidas ao MEI são aquelas determinadas segundo o Comitê Gestor do Simples Nacional - CGSN, anexo XI da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="blank">Resolução CGSN n.140 2018</a>. Acesse o Portal do Empreendedor e consulte a listagem das ocupações permitidas para o MEI.</p></div></div><div class=""><div class="" id="headingNine"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"><h5 class="text">2.9- Minha ocupação não consta no Portal. Como faço para me formalizar?</h5></button></h5></div><div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion"><div class="card-body"><p>Só pode se formalizar como MEI quem exerce ocupação descrita na lista de atividades permitidas constante do Anexo XI da <a class="external-link" href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank" title=""> Resolução CGSN nº 140, de 22 de maio de 2018.</a></p><p>Desta forma, recomenda-se que antes de iniciar o processo de formalização, o empreendedor verifique se sua atividade consta na lista do anexo citado acima ou no Portal do Empreendedor.</p></div></div><div class=""><div class="" id="headingTen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"><h5 class="text">2.10- A pessoa física que possui débitos comerciais ou dívidas junto a instituições financeiras, bem como, restrição cadastral nos órgãos de proteção de crédito, poderá se formalizar como MEI?</h5></button></h5></div><div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion"><div class="card-body"><p>Sim. Não existem impedimentos para que a pessoa física com débitos, dívidas comerciais ou bancárias, bem como, com restrição cadastral junto às instituições de proteção ao crédito se formalize como MEI.</p></div></div></div>';
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
    <script type="text/javascript" src="Js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="Js/wow.min.js"></script>
    <script type="text/javascript" src="Js/mascara.js"></script>
</body>
</html>
