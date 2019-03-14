
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
        <div class="marge justify-content-center row" >
            <h1 class="mt-5 text common">PERGUNTAS FREQUENTES</h1>
            
        </div>
        <hr noshade class="faq-line afast">
        <!-- LOGIN E CADASTRO -->
        <div class="row justify-content-center ">
        <div class="">
            <div class="row ">
                <div class="accordion " id="accordionExample">
                    
                    <div class="cardy">
                        <div class="" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h5 class="text">1- O MICROEMPREENDEDOR INDIVIDUAL - MEI</h5>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <!-- ----ACCORDION INSIDE---- -->
                            <div class="accordion ml-4" id="accordionmode">
                                <div class="cardy">
                                    <div class="" id="headingOne1">
                                        <h5 class="mb-0">
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
                                        <h5 class="mb-0">
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
                                        <h5 class="mb-0">
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
                                        <h5 class="mb-0">
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
                    <div class="">
                        <div class="" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h5 class="text">2- INFORME-SE ANTES DE FORMALIZAR</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- ----ACCORDION INSIDE---- -->
                                <div class="accordion ml-4" id="accordionmode2">
                                    <div class="cardy">
                                        <div class="" id="headingOne2">
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix2" aria-expanded="false" aria-controls="collapseSix1">
                                                    <h6 class="text">2.6- O Microempreendedor Individual pode se formalizar no mesmo endereço de outro MEI?<br> O Microempreendedor Individual pode dividir o mesmo espaço físico onde realiza a atividade com outro MEI?</h5>
                                                    <h6 class="text"></h6>
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen2" aria-expanded="false" aria-controls="collapseTen2">
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
                    <div class="">
                        <div class="" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h5 class="text">3- FORMALIZAÇÃO COMO MEI</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode3">

                                    <div class="cardy">
                                        <div class="" id="headingOne3">
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
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
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen3" aria-expanded="false" aria-controls="collapseTen3">
                                                    <h6 class="text">3.10- Qual o faturamento anual  do Microempreendedor Individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen3" class="collapse" aria-labelledby="headingTen3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p>
                                                <p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p>
                                                <p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven3">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven3" aria-expanded="false" aria-controls="collapseEleven3">
                                                    <h6 class="text">3.11- Qual o faturamento anual  do Microempreendedor Individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven3" class="collapse" aria-labelledby="headingEleven3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p>
                                                <p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p>
                                                <p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve3">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve3" aria-expanded="false" aria-controls="collapseTwelve3">
                                                    <h6 class="text">3.12- Qual o faturamento anual  do Microempreendedor Individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve3" class="collapse" aria-labelledby="headingTwelve3" data-parent="#accordionmode3">
                                            <div class="card-body">
                                                <p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p>
                                                <p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p>
                                                <p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen3">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen3" aria-expanded="false" aria-controls="collapseThirteen3">
                                                    <h6 class="text">3.13- Qual o faturamento anual  do Microempreendedor Individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen3" class="collapse" aria-labelledby="headingThirteen3" data-parent="#accordionmode3">
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
                    </div>
                    <!-- ACCORDION 4 -->
                    <div class="">
                        <div class="" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h5 class="text">4- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode4">

                                    <div class="cardy">
                                        <div class="" id="headingOne4">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne4" data-parent="#accordionmode4">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo4">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo4" data-parent="#accordionmode4">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree4">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree4" class="collapse" aria-labelledby="headingThree4" data-parent="#accordionmode4">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 5 -->
                    <div class="">
                        <div class="" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <h5 class="text">5- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode5">

                                    <div class="cardy">
                                        <div class="" id="headingOne5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                                                    <h6 class="text">5.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne5" class="collapse show" aria-labelledby="headingOne5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5">
                                                    <h6 class="text">5.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree5" class="collapse" aria-labelledby="headingThree5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour5" aria-expanded="false" aria-controls="collapseFour5">
                                                    <h6 class="text">5.4- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour5" class="collapse" aria-labelledby="headingFour5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.5- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour5" class="collapse" aria-labelledby="headingFour5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.6- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour5" class="collapse" aria-labelledby="headingFour5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive5" aria-expanded="false" aria-controls="collapseFive5">
                                                    <h6 class="text">5.7- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive5" class="collapse" aria-labelledby="headingFive5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.8- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix5" class="collapse" aria-labelledby="headingSix5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.9- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven5" class="collapse" aria-labelledby="headingSeven5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight5" aria-expanded="false" aria-controls="collapseThree5">
                                                    <h6 class="text">5.10- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight5" class="collapse" aria-labelledby="headingEight5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine5" aria-expanded="false" aria-controls="collapseNine5">
                                                    <h6 class="text">5.11- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine5" class="collapse" aria-labelledby="headingNine5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen5" aria-expanded="false" aria-controls="collapseTen5">
                                                    <h6 class="text">5.12- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen5" class="collapse" aria-labelledby="headingTen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven5" aria-expanded="false" aria-controls="collapseEleven5">
                                                    <h6 class="text">5.13- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven5" class="collapse" aria-labelledby="headingEleven5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve5" aria-expanded="false" aria-controls="collapseTwelve5">
                                                    <h6 class="text">5.14- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve5" class="collapse" aria-labelledby="headingTwelve5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen5" aria-expanded="false" aria-controls="collapseThirteen5">
                                                    <h6 class="text">5.15- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen5" class="collapse" aria-labelledby="headingThirteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen5" aria-expanded="false" aria-controls="collapseFourteen5">
                                                    <h6 class="text">5.16- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen5" class="collapse" aria-labelledby="headingFourteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen5" aria-expanded="false" aria-controls="collapseFifteen5">
                                                    <h6 class="text">5.17- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen5" class="collapse" aria-labelledby="headingFifteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen5" aria-expanded="false" aria-controls="collapseSixteen5">
                                                    <h6 class="text">5.18- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen5" class="collapse" aria-labelledby="headingSixteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeventeen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen5" aria-expanded="false" aria-controls="collapseSeventeen5">
                                                    <h6 class="text">5.19- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeventeen5" class="collapse" aria-labelledby="headingSeventeen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEighteen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen5" aria-expanded="false" aria-controls="collapseEighteen5">
                                                    <h6 class="text">5.20- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEighteen5" class="collapse" aria-labelledby="headingEighteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNineteen5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNineteen5" aria-expanded="false" aria-controls="collapseNineteen5">
                                                    <h6 class="text">5.21- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNineteen5" class="collapse" aria-labelledby="headingNineteen5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwenty5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwenty5" aria-expanded="false" aria-controls="collapseTwenty5">
                                                    <h6 class="text">5.22- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwenty5" class="collapse" aria-labelledby="headingTwenty5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyOne5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyOne5" aria-expanded="false" aria-controls="collapseTwentyOne5">
                                                    <h6 class="text">5.23- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyOne5" class="collapse" aria-labelledby="headingTwentyOne5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyTwo5">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyTwo5" aria-expanded="false" aria-controls="collapseTwentyTwo5">
                                                    <h6 class="text">5.23- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyTwo5" class="collapse" aria-labelledby="headingTwentyTwo5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyThree" aria-expanded="false" aria-controls="collapseTwentyThree">
                                                    <h6 class="text">5.23- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyThree" class="collapse" aria-labelledby="headingTwentyOne5" data-parent="#accordionmode5">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 6 -->
                    <div class="">
                        <div class="" id="headingSix">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <h5 class="text">6- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode6">

                                    <div class="cardy">
                                        <div class="" id="headingOne6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
                                                    <h6 class="text">6.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne6" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="false" aria-controls="collapseTwo6">
                                                    <h6 class="text">6.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6">
                                                    <h6 class="text">6.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree6" class="collapse" aria-labelledby="headingThree6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour6" aria-expanded="false" aria-controls="collapseFour6">
                                                    <h6 class="text">6.4- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour6" class="collapse" aria-labelledby="headingFour6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive6" aria-expanded="false" aria-controls="collapseFive6">
                                                    <h6 class="text">6.5- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive6" class="collapse" aria-labelledby="headingFive6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix6" aria-expanded="false" aria-controls="collapseSix6">
                                                    <h6 class="text">6.6- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix6" class="collapse" aria-labelledby="headingSix6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven6" aria-expanded="false" aria-controls="collapseSeven6">
                                                    <h6 class="text">6.7- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven6" class="collapse" aria-labelledby="headingSeven6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight6" aria-expanded="false" aria-controls="collapseEight6">
                                                    <h6 class="text">6.8- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight6" class="collapse" aria-labelledby="headingEight6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine6" aria-expanded="false" aria-controls="collapseNine6">
                                                    <h6 class="text">6.9- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine6" class="collapse" aria-labelledby="headingNine6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen6" aria-expanded="false" aria-controls="collapseTen6">
                                                    <h6 class="text">6.10- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen6" class="collapse" aria-labelledby="headingTen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven6" aria-expanded="false" aria-controls="collapseEleven6">
                                                    <h6 class="text">6.11- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven6" class="collapse" aria-labelledby="headingEleven6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve6" aria-expanded="false" aria-controls="collapseTwelve6">
                                                    <h6 class="text">6.12- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve6" class="collapse" aria-labelledby="headingTwelve6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen6" aria-expanded="false" aria-controls="collapseThirteen6">
                                                    <h6 class="text">6.13- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen6" class="collapse" aria-labelledby="headingThirteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen6" aria-expanded="false" aria-controls="collapseFourteen6">
                                                    <h6 class="text">6.14- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen6" class="collapse" aria-labelledby="headingFourteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen6" aria-expanded="false" aria-controls="collapseFifteen6">
                                                    <h6 class="text">6.15- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen6" class="collapse" aria-labelledby="headingFifteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen6" aria-expanded="false" aria-controls="collapseSixteen6">
                                                    <h6 class="text">6.16- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen6" class="collapse" aria-labelledby="headingSixteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeventeen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen6" aria-expanded="false" aria-controls="collapseSeventeen6">
                                                    <h6 class="text">6.17- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeventeen6" class="collapse" aria-labelledby="headingSeventeen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEighteen6">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen6" aria-expanded="false" aria-controls="collapseEighteen6">
                                                    <h6 class="text">6.18- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEighteen6" class="collapse" aria-labelledby="headingEighteen6" data-parent="#accordionmode6">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 7 -->
                    <div class="">
                        <div class="" id="headingSeven">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <h5 class="text">7- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode7">

                                    <div class="cardy">
                                        <div class="" id="headingOne7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="true" aria-controls="collapseOne7">
                                                    <h6 class="text">7.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne7" class="collapse show" aria-labelledby="headingOne7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo7" aria-expanded="false" aria-controls="collapseTwo7">
                                                    <h6 class="text">7.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo7" class="collapse" aria-labelledby="headingTwo7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree7" aria-expanded="false" aria-controls="collapseThree7">
                                                    <h6 class="text">7.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree7" class="collapse" aria-labelledby="headingThree7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour7" aria-expanded="false" aria-controls="collapseFour7">
                                                    <h6 class="text">7.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour7" class="collapse" aria-labelledby="headingFour7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive7" aria-expanded="false" aria-controls="collapseFive7">
                                                    <h6 class="text">7.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive7" class="collapse" aria-labelledby="headingFive7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix7" aria-expanded="false" aria-controls="collapseSix7">
                                                    <h6 class="text">7.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix7" class="collapse" aria-labelledby="headingSix7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven7">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven7" aria-expanded="false" aria-controls="collapseSeven7">
                                                    <h6 class="text">7.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven7" class="collapse" aria-labelledby="headingSeven7" data-parent="#accordionmode7">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 8 -->
                    <div class="">
                        <div class="" id="headingEight">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <h5 class="text">8- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode8">

                                    <div class="cardy">
                                        <div class="" id="headingOne8">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="true" aria-controls="collapseOne8">
                                                    <h6 class="text">8.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne8" class="collapse show" aria-labelledby="headingOne8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo8">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo8" aria-expanded="false" aria-controls="collapseTwo8">
                                                    <h6 class="text">8.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo8" class="collapse" aria-labelledby="headingTwo8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree8">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree8" aria-expanded="false" aria-controls="collapseThree8">
                                                    <h6 class="text">8.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree8" class="collapse" aria-labelledby="headingThree8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour8">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour8" aria-expanded="false" aria-controls="collapseFour8">
                                                    <h6 class="text">8.4- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour8" class="collapse" aria-labelledby="headingFour8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive8">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive8" aria-expanded="false" aria-controls="collapseFive8">
                                                    <h6 class="text">8.5- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive8" class="collapse" aria-labelledby="headingFive8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix8">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix8" aria-expanded="false" aria-controls="collapseSix8">
                                                    <h6 class="text">8.6- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix8" class="collapse" aria-labelledby="headingSix8" data-parent="#accordionmode8">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 9 -->
                    <div class="">
                        <div class="" id="headingNine">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            <h5 class="text">9- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode9">

                                    <div class="cardy">
                                        <div class="" id="headingOne9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne9" aria-expanded="true" aria-controls="collapseOne9">
                                                    <h6 class="text">9.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne9" class="collapse show" aria-labelledby="headingOne9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo9" aria-expanded="false" aria-controls="collapseTwo9">
                                                    <h6 class="text">9.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo9" class="collapse" aria-labelledby="headingTwo9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree9" aria-expanded="false" aria-controls="collapseThree9">
                                                    <h6 class="text">9.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree9" class="collapse" aria-labelledby="headingThree9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour9" aria-expanded="false" aria-controls="collapseFour9">
                                                    <h6 class="text">9.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour9" class="collapse" aria-labelledby="headingFour9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive9" aria-expanded="false" aria-controls="collapseFive9">
                                                    <h6 class="text">9.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive9" class="collapse" aria-labelledby="headingFive9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix9" aria-expanded="false" aria-controls="collapseSix9">
                                                    <h6 class="text">9.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix9" class="collapse" aria-labelledby="headingSix9" data-parent="#accordionmode9">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 10 -->
                    <div class="">
                        <div class="" id="headingTen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            <h5 class="text">10- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode10">

                                    <div class="cardy">
                                        <div class="" id="headingOne10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne10" aria-expanded="true" aria-controls="collapseOne10">
                                                    <h6 class="text">10.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne10" class="collapse show" aria-labelledby="headingOne10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo10" aria-expanded="false" aria-controls="collapseTwo10">
                                                    <h6 class="text">10.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo10" class="collapse" aria-labelledby="headingTwo10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree10" aria-expanded="false" aria-controls="collapseThree10">
                                                    <h6 class="text">10.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree10" class="collapse" aria-labelledby="headingThree10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour10" aria-expanded="false" aria-controls="collapseFour10">
                                                    <h6 class="text">10.4- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour10" class="collapse" aria-labelledby="headingFour10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive10" aria-expanded="false" aria-controls="collapseFive10">
                                                    <h6 class="text">10.5- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive10" class="collapse" aria-labelledby="headingFive10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix10" aria-expanded="false" aria-controls="collapseSix10">
                                                    <h6 class="text">10.6- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix10" class="collapse" aria-labelledby="headingSix10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven10">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven10" aria-expanded="false" aria-controls="collapseSeven10">
                                                    <h6 class="text">10.7- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven10" class="collapse" aria-labelledby="headingSeven10" data-parent="#accordionmode10">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 11 -->
                    <div class="">
                        <div class="" id="headingEleven">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            <h5 class="text">11- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode11">

                                    <div class="cardy">
                                        <div class="" id="headingOne11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne11" aria-expanded="true" aria-controls="collapseOne11">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne11" class="collapse show" aria-labelledby="headingOne11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo11" aria-expanded="false" aria-controls="collapseTwo11">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo11" class="collapse" aria-labelledby="headingTwo11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree11" class="collapse" aria-labelledby="headingThree11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour11" aria-expanded="false" aria-controls="collapseFour11">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour11" class="collapse" aria-labelledby="headingFour11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive11" aria-expanded="false" aria-controls="collapseFive11">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive11" class="collapse" aria-labelledby="headingFive11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix11" aria-expanded="false" aria-controls="collapseSix11">
                                                    <h6 class="text">11.6- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix11" class="collapse" aria-labelledby="headingSix11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven11" aria-expanded="false" aria-controls="collapseSeven11">
                                                    <h6 class="text">11.7- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven11" class="collapse" aria-labelledby="headingSeven11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight11">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight11" aria-expanded="false" aria-controls="collapseEight11">
                                                    <h6 class="text">11.8- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight11" class="collapse" aria-labelledby="headingEight11" data-parent="#accordionmode11">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 12 -->
                    <div class="">
                        <div class="" id="headingTwelve">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            <h5 class="text">12- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode12">

                                    <div class="cardy">
                                        <div class="" id="headingOne12">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne12" aria-expanded="true" aria-controls="collapseOne12">
                                                    <h6 class="text">12.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne12" class="collapse show" aria-labelledby="headingOne12" data-parent="#accordionmode12">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>    
                            </div>
                        </div>
                    </div>
                        <!-- ACCORDION 13 -->
                    <div class="">
                        <div class="" id="headingThirteen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                            <h5 class="text">13- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode13">

                                    <div class="cardy">
                                        <div class="" id="headingOne13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne13" aria-expanded="true" aria-controls="collapseOne13">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne13" class="collapse show" aria-labelledby="headingOne13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo13" aria-expanded="false" aria-controls="collapseTwo13">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo13" class="collapse" aria-labelledby="headingTwo13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree13" aria-expanded="false" aria-controls="collapseThree13">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree13" class="collapse" aria-labelledby="headingThree13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen13" aria-expanded="false" aria-controls="collapseFourteen13">
                                                    <h6 class="text">5.16- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen13" class="collapse" aria-labelledby="headingFourteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen13" aria-expanded="false" aria-controls="collapseFifteen13">
                                                    <h6 class="text">5.17- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen13" class="collapse" aria-labelledby="headingFifteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen13" aria-expanded="false" aria-controls="collapseSixteen13">
                                                    <h6 class="text">5.18- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen13" class="collapse" aria-labelledby="headingSixteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeventeen13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen13" aria-expanded="false" aria-controls="collapseSeventeen13">
                                                    <h6 class="text">5.19- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeventeen13" class="collapse" aria-labelledby="headingSeventeen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEighteen13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEighteen13" aria-expanded="false" aria-controls="collapseEighteen13">
                                                    <h6 class="text">5.20- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEighteen13" class="collapse" aria-labelledby="headingEighteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNineteen13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNineteen13" aria-expanded="false" aria-controls="collapseNineteen13">
                                                    <h6 class="text">5.21- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNineteen13" class="collapse" aria-labelledby="headingNineteen13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwenty13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwenty13" aria-expanded="false" aria-controls="collapseTwenty13">
                                                    <h6 class="text">5.22- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwenty13" class="collapse" aria-labelledby="headingTwenty13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyOne13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyOne13" aria-expanded="false" aria-controls="collapseTwentyOne13">
                                                    <h6 class="text">5.23- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyOne13" class="collapse" aria-labelledby="headingTwentyOne13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyTwo13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyTwo13" aria-expanded="false" aria-controls="collapseTwentyTwo13">
                                                    <h6 class="text">5.23- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyTwo13" class="collapse" aria-labelledby="headingTwentyTwo13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwentyThree13">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyThree13" aria-expanded="false" aria-controls="collapseTwentyThree13">
                                                    <h6 class="text">5.23- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwentyThree13" class="collapse" aria-labelledby="headingTwentyOne13" data-parent="#accordionmode13">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 14 -->
                    <div class="">
                        <div class="" id="headingFourteen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                            <h5 class="text">14- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode14">

                                    <div class="cardy">
                                        <div class="" id="headingOne14">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne14" aria-expanded="true" aria-controls="collapseOne14">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne14" class="collapse show" aria-labelledby="headingOne14" data-parent="#accordionmode14">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo14">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo14" aria-expanded="false" aria-controls="collapseTwo14">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo14" class="collapse" aria-labelledby="headingTwo14" data-parent="#accordionmode14">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 15 -->
                    <div class="">
                        <div class="" id="headingFifteen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                            <h5 class="text">15- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode15">

                                    <div class="cardy">
                                        <div class="" id="headingOne15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne15" aria-expanded="true" aria-controls="collapseOne15">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne15" class="collapse show" aria-labelledby="headingOne15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo15" aria-expanded="false" aria-controls="collapseTwo15">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo15" class="collapse" aria-labelledby="headingTwo15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree15" aria-expanded="false" aria-controls="collapseThree15">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree15" class="collapse" aria-labelledby="headingThree15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour15" aria-expanded="false" aria-controls="collapseFour15">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour15" class="collapse" aria-labelledby="headingFour15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive15" aria-expanded="false" aria-controls="collapseFive15">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive15" class="collapse" aria-labelledby="headingFive15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix15" aria-expanded="false" aria-controls="collapseSix15">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix15" class="collapse" aria-labelledby="headingSix15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven15" aria-expanded="false" aria-controls="collapseSeven15">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven15" class="collapse" aria-labelledby="headingSeven15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight15">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight15" aria-expanded="false" aria-controls="collapseEight15">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight15" class="collapse" aria-labelledby="headingEight15" data-parent="#accordionmode15">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 16 -->
                    <div class="">
                        <div class="" id="headingSixteen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                            <h5 class="text">16- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode16">

                                    <div class="cardy">
                                        <div class="" id="headingOne16">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne16" aria-expanded="true" aria-controls="collapseOne16">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne16" class="collapse show" aria-labelledby="headingOne16" data-parent="#accordionmode16">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 17 -->
                    <div class="">
                        <div class="" id="headingSeventeen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                            <h5 class="text">17- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode17">

                                    <div class="cardy">
                                        <div class="" id="headingOne17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne17" aria-expanded="true" aria-controls="collapseOne17">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne17" class="collapse show" aria-labelledby="headingOne17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo17" aria-expanded="false" aria-controls="collapseTwo17">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo17" class="collapse" aria-labelledby="headingTwo17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree17" aria-expanded="false" aria-controls="collapseThree17">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree17" class="collapse" aria-labelledby="headingThree17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour17" aria-expanded="false" aria-controls="collapseFour17">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour17" class="collapse" aria-labelledby="headingFour17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive17" aria-expanded="false" aria-controls="collapseFive17">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive17" class="collapse" aria-labelledby="headingFive17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix17" aria-expanded="false" aria-controls="collapseSix17">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix17" class="collapse" aria-labelledby="headingSix17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven17" aria-expanded="false" aria-controls="collapseSeven17">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven17" class="collapse" aria-labelledby="headingSeven17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight17">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight17" aria-expanded="false" aria-controls="collapseEight17">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight17" class="collapse" aria-labelledby="headingEight17" data-parent="#accordionmode17">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 18 -->
                    <div class="">
                        <div class="" id="headingEight">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <h5 class="text">18- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode18">

                                    <div class="cardy">
                                        <div class="" id="headingOne18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne18" aria-expanded="true" aria-controls="collapseOne18">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne18" class="collapse show" aria-labelledby="headingOne18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo18" aria-expanded="false" aria-controls="collapseTwo18">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo18" class="collapse" aria-labelledby="headingTwo18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree18" aria-expanded="false" aria-controls="collapseThree18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree18" class="collapse" aria-labelledby="headingThree18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour18" aria-expanded="false" aria-controls="collapseFour18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour18" class="collapse" aria-labelledby="headingFour18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive18" aria-expanded="false" aria-controls="collapseFive18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive18" class="collapse" aria-labelledby="headingFive18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix18" aria-expanded="false" aria-controls="collapseSix18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix18" class="collapse" aria-labelledby="headingSix18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven18" aria-expanded="false" aria-controls="collapseSeven18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven18" class="collapse" aria-labelledby="headingSeven18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight18" aria-expanded="false" aria-controls="collapseEight18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight18" class="collapse" aria-labelledby="headingEight18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine18" aria-expanded="false" aria-controls="collapseNine18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine18" class="collapse" aria-labelledby="headingNine18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen18">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen18" aria-expanded="false" aria-controls="collapseTen18">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen18" class="collapse" aria-labelledby="headingTen18" data-parent="#accordionmode18">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 19 -->
                    <div class="">  
                        <div class="" id="headingNineteen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen">
                            <h5 class="text">19- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseNineteen" class="collapse" aria-labelledby="headingNineteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode19">

                                    <div class="cardy">
                                        <div class="" id="headingOne19">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne19" aria-expanded="true" aria-controls="collapseOne19">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne19" class="collapse show" aria-labelledby="headingOne19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo19">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo19" aria-expanded="false" aria-controls="collapseTwo19">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo19" class="collapse" aria-labelledby="headingTwo19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree19">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree19" aria-expanded="false" aria-controls="collapseThree19">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree19" class="collapse" aria-labelledby="headingThree19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour19">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour19" aria-expanded="false" aria-controls="collapseFour19">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour19" class="collapse" aria-labelledby="headingFour19" data-parent="#accordionmode19">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 20 -->
                    <div class="">
                        <div class="" id="headingTwenty">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty">
                            <h5 class="text">20- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwenty" class="collapse" aria-labelledby="headingTwenty" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode20">

                                    <div class="cardy">
                                        <div class="" id="headingOne20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne20" aria-expanded="true" aria-controls="collapseOne20">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne20" class="collapse show" aria-labelledby="headingOne20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo20" aria-expanded="false" aria-controls="collapseTwo20">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo20" class="collapse" aria-labelledby="headingTwo20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree20" aria-expanded="false" aria-controls="collapseThree20">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree20" class="collapse" aria-labelledby="headingThree20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour20" aria-expanded="false" aria-controls="collapseFour20">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour20" class="collapse" aria-labelledby="headingFour20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive20" aria-expanded="false" aria-controls="collapseFive20">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive20" class="collapse" aria-labelledby="headingFive20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix20" aria-expanded="false" aria-controls="collapseSix20">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix20" class="collapse" aria-labelledby="headingSix20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven20">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven20" aria-expanded="false" aria-controls="collapseSeven20">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven20" class="collapse" aria-labelledby="headingSeven20" data-parent="#accordionmode20">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 21 -->
                    <div class="">
                        <div class="" id="headingTwentyOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyOne" aria-expanded="false" aria-controls="collapseTwentyOne">
                            <h5 class="text">21- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwentyOne" class="collapse" aria-labelledby="headingTwentyOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode21">

                                    <div class="cardy">
                                        <div class="" id="headingOne21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne21" aria-expanded="true" aria-controls="collapseOne21">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne21" class="collapse show" aria-labelledby="headingOne21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo21" aria-expanded="false" aria-controls="collapseTwo21">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo21" class="collapse" aria-labelledby="headingTwo21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree21" aria-expanded="false" aria-controls="collapseThree21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree21" class="collapse" aria-labelledby="headingThree21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour21" aria-expanded="false" aria-controls="collapseFour21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour21" class="collapse" aria-labelledby="headingFour21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive21" aria-expanded="false" aria-controls="collapseFive21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive21" class="collapse" aria-labelledby="headingFive21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix21" aria-expanded="false" aria-controls="collapseSix21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix21" class="collapse" aria-labelledby="headingSix21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven21" aria-expanded="false" aria-controls="collapseSeven21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven21" class="collapse" aria-labelledby="headingSeven21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight21" aria-expanded="false" aria-controls="collapseEight21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight21" class="collapse" aria-labelledby="headingEight21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine21" aria-expanded="false" aria-controls="collapseNine21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine21" class="collapse" aria-labelledby="headingNine21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen21" aria-expanded="false" aria-controls="collapseTen21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen21" class="collapse" aria-labelledby="headingTen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven21" aria-expanded="false" aria-controls="collapseEleven21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven21" class="collapse" aria-labelledby="headingEleven21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve21" aria-expanded="false" aria-controls="collapseTwelve21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve21" class="collapse" aria-labelledby="headingTwelve21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen21" aria-expanded="false" aria-controls="collapseThirteen21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen21" class="collapse" aria-labelledby="headingThirteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen21" aria-expanded="false" aria-controls="collapseFourteen21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen21" class="collapse" aria-labelledby="headingFourteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFifteen21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFifteen21" aria-expanded="false" aria-controls="collapseFifteen21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFifteen21" class="collapse" aria-labelledby="headingFifteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSixteen21">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen21" aria-expanded="false" aria-controls="collapseSixteen21">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSixteen21" class="collapse" aria-labelledby="headingSixteen21" data-parent="#accordionmode21">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>                               
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- ACCORDION 22 -->
                    <div class="">
                        <div class="" id="headingTwentyTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwentyTwo" aria-expanded="false" aria-controls="collapseTwentyTwo">
                            <h5 class="text">22- NOTA FISCAL (Inscrição Estadual e/ou Municipal)</h5>  
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwentyTwo" class="collapse" aria-labelledby="headingTwentyTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="accordion ml-4" id="accordionmode22">

                                    <div class="cardy">
                                        <div class="" id="headingOne22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne22" aria-expanded="true" aria-controls="collapseOne22">
                                                    <h6 class="text">3.1- O que é o MEI - Microempreendedor Individual?</h6>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne22" class="collapse show" aria-labelledby="headingOne22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                <p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>
                                                <p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&idAto=92278" target="blank">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwo22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo22" aria-expanded="false" aria-controls="collapseTwo22">
                                                    <h6 class="text">3.2- Qual é a lei que instituiu o Microempreendedor individual?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo22" class="collapse" aria-labelledby="headingTwo22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThree22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree22" aria-expanded="false" aria-controls="collapseThree22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree22" class="collapse" aria-labelledby="headingThree22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFour22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour22" aria-expanded="false" aria-controls="collapseFour22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour22" class="collapse" aria-labelledby="headingFour22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFive22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive22" aria-expanded="false" aria-controls="collapseFive22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFive22" class="collapse" aria-labelledby="headingFive22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSix22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix22" aria-expanded="false" aria-controls="collapseSix22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix22" class="collapse" aria-labelledby="headingSix22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingSeven22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven22" aria-expanded="false" aria-controls="collapseSeven22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven22" class="collapse" aria-labelledby="headingSeven22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEight22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight22" aria-expanded="false" aria-controls="collapseEight22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight22" class="collapse" aria-labelledby="headingEight22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingNine22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine22" aria-expanded="false" aria-controls="collapseNine22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine22" class="collapse" aria-labelledby="headingNine22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTen22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen22" aria-expanded="false" aria-controls="collapseTen22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen22" class="collapse" aria-labelledby="headingTen22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingEleven22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven22" aria-expanded="false" aria-controls="collapseEleven22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEleven22" class="collapse" aria-labelledby="headingEleven22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingTwelve22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve22" aria-expanded="false" aria-controls="collapseTwelve22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve22" class="collapse" aria-labelledby="headingTwelve22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingThirteen22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen22" aria-expanded="false" aria-controls="collapseThirteen22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen22" class="collapse" aria-labelledby="headingThirteen22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="" id="headingFourteen22">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen22" aria-expanded="false" aria-controls="collapseFourteen22">
                                                    <h6 class="text">3.3- A legislação do Microempreendedor Individual já está em vigor?</h5>  
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen22" class="collapse" aria-labelledby="headingFourteen22" data-parent="#accordionmode22">
                                            <div class="card-body">
                                                Sim, entrou em vigor em 01/07/2009.
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="col-md-7 acorde ">
                <!-----------ACCORDION------------->
                <!-- <div class="accordion " id="accordionExample">
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
                </div> -->
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
<!-- <div class=""><div class="" id="headingFour"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFive"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSix"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSeven"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingEight"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingNine"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingEleven"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwelve"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingThirteen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFourteen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingFifteen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSixteen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingSeventeen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingEighteen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseEighteen" class="collapse" aria-labelledby="headingEighteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingNineteen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseNineteen" class="collapse" aria-labelledby="headingNineteen" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwenty"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwenty" class="collapse" aria-labelledby="headingTwenty" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwentyOne"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwentyOne" aria-expanded="false" aria-controls="collapseTwentyOne"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwentyOne" class="collapse" aria-labelledby="headingTwentyOne" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwentyTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwentyTwo" aria-expanded="false" aria-controls="collapseTwentyTwo"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwentyTwo" class="collapse" aria-labelledby="headingTwentyTwo" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->
<!-- <div class=""><div class="" id="headingTwentyThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwentyThree" aria-expanded="false" aria-controls="collapseTwentyThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseTwentyThree" class="collapse" aria-labelledby="headingTwentyThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div> -->

    <script>
        function funcao1() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">1.1- O que é o MEI - Microempreendedor Individual?</h4></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><p>O MEI é o pequeno empresário individual que atende as condições abaixo relacionadas:</p>a) tenha faturamento limitado a R$ 81.000,00 por ano;<br>b) Que não participe como sócio, administrador ou titular de outra empresa;<br>c) Contrate no máximo um empregado;<br>d) Exerça uma das atividades econômicas previstas no Anexo XI, da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278">Resolução CGSN nº 140, de 2018</a>,o qual relaciona todas as atividades permitidas ao MEI.<p>  </div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">1.2- Qual é a lei que instituiu o Microempreendedor individual?</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"><p>A Lei Complementar nº 128/2008 que alterou a Lei Geral da Micro e Pequena Empresa (Lei Complementar nº 123/2006) cria a figura do Microempreendedor Individual.</p></div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">1.3- A legislação do Microempreendedor Individual já está em vigor?</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p>Sim, entrou em vigor em 01/07/2009.</p></div></div><div class=""><div class="" id="headingFour"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">1.4- Qual o faturamento anual  do Microempreendedor Individual?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>De até R$ 81.000,00 por ano, de janeiro a dezembro.</p><p>O Microempreendedor Individual que se formalizar durante o ano em curso, tem seu limite de faturamento proporcional a R$ 6.750,00, por mês, até 31 de dezembro do mesmo ano.</p><p><b>Exemplo:</b> O MEI que se formalizar em junho, terá o limite de faturamento de R$ 47.250,00 (7 meses x R$ 6.750,00), neste ano.</p></div></div></div>';
        }
        function funcao2() {
            document.getElementById("accordionExample").innerHTML = '<div id="accordion"><div class=""><div class="" id="headingOne"><h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><h5 class="text">2.1- Pontos de atenção antes da formalização:</h5></button></h5></div><div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><p><b>1-</b> Verificar se recebe algum benefício previdenciário (Exemplo: Aposentadoria por invalidez, Auxílio Doença, Seguro Desemprego, etc).</p><p><b>2-</b> Procurar a prefeitura para verificar se a atividade pode ser exercida no local desejado. </p><p><b>3-</b> Verificar se as atividades escolhidas podem ser registradas como MEI. (Consultar questão 2.6)</p></div></div></div><div class=""><div class="" id="headingTwo"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><h5 class="text">2.2- Situações que NÃO permitem a formalização como MEI:</h5></button></h5></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body"><p><b>1- Pensionista e Servidor Público</b> Federal em atividade. Servidores públicos estaduais e municipais devem observar os critérios da respectiva legislação, que podem variar conforme o estado ou município.<p><p><b>2-</b> Pessoa que seja <b>titular, sócio ou administrador de outra empresa</b>.<p> </div></div><div class=""><div class="" id="headingThree"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><h5 class="text">2.3- Situações que permitem a formalização como MEI, com ressalvas:</h5></button></h5></div><div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion"><div class="card-body"><p><b>1-</b>  Pessoa que recebe o <strong>Seguro Desemprego</strong>: pode ser formalizada, mas poderá ter a suspensão do benefício. Em caso de suspensão deverá recorrer nos postos de atendimento do Ministério do Trabalho.</p><p><b>2 - </b>Pessoa que trabalha <strong>re</strong><strong>gistrada no regime CLT</strong>: pode ser formalizada, mas, em caso de demissão sem justa causa, não terá direito ao Seguro Desemprego.</p></div></div><div class=""><div class="" id="headingFour"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><h5 class="text">2.4- O que é a Consulta Prévia de endereço e atividade? Onde fazer a consulta prévia?</h5></button></h5></div><div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion"><div class="card-body"><p>A consulta prévia é uma pesquisa realizada junto à Prefeitura (ou Administração Regional) para o cidadão verificar e confirmar se o endereço ou local desejado para estabelecer o seu negócio é passível de instalação de atividade da empresa ou não.</p><p>O órgão responsável para responder a consulta prévia é a prefeitura municipal ou Administração Regional, no caso do DF. É ela que determinará se o endereço indicado para estabelecer a sua empresa é passível ou não de instalação da atividade comercial. Para fazer a consulta prévia, consulte a página da Prefeitura na internet, se houver. Lembre-se: antes de efetuar a sua formalização no Portal do Empreendedor, procure se informar perante a Prefeitura ou Administração sobre o local e atividade que pretende exercer. Isso evita problemas na formalização, tais como o cancelamento do registro.</p></div></div><div class=""><div class="" id="headingFive"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><h5 class="text">2.5- Quais documentos ou dados são necessários para me formalizar como MEI? Após a formalização, o que devo fazer?</h5></button></h5></div><div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion"><div class="card-body"><p>Para se formalizar, se faz necessário informar o número do CPF e datade nascimento do titular, o número do título de eleitor ou o número doúltimo recibo de entrega da Declaração Anual de Imposto de RendaPessoa Física – DIRPF, caso esteja obrigado a entregar a DIRPF.</p><p>Lembre-se também, de que é necessário conhecer as normas daPrefeitura ou Administração para o funcionamento de seu negócio, sejaele qual for.</p><p><b>Após a formalização no Portal do Empreendedor,recomendamos:</b><br><b>a)</b><br><b>a)</b>Imprimir os <a href="" target="blank">DAS</a> para recolhimento das contribuições ao INSS,ISS e/ou ICMS para o ano;<br> <b>b)</b> Imprimir o <a class="internal-link" href="resolveuid/7661c73442db415c94034565b2030a57" target="_self" title="">Certificado de Microempreendedor Individual –CCMEI;</a> <br> <b>c) </b>Imprimir o <a href="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp">Cartão do CNPJ</a> no site da Receita Federal;<br><strong>d)</strong> Imprimir e preencher todo mês o Relatório de Receitas Brutas, disponível no Portal do Empreendedor/Obrigações.</p></div></div><div class=""><div class="" id="headingSix"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><h5 class="text">2.6- O Microempreendedor Individual pode se formalizar no mesmo endereço de outro MEI? O Microempreendedor Individual pode dividir o mesmo espaço físico onde realiza a atividade com outro MEI?</h5></button></h5></div><div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion"><div class="card-body"><p>Como cada Prefeitura tem sua legislação, normas e procedimentos próprios conforme Códigos de Zoneamento Urbano e de Posturas Municipais,  recomendamos realizar uma consulta prévia junto à Prefeitura antes de efetuar a formalização no Portal do Empreendedor para que possa verificar a possibilidade de funcionamento de duas atividades em um mesmo endereço.</p></div></div><div class=""><div class="" id="headingSeven"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"><h5 class="text">2.7- É possível solicitar a inscrição como MEI e manter vínculo empregatício com carteira assinada?</h5></button></h5></div><div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion"><div class="card-body"><p>Sim. Não há impedimento de um empregado, com carteira assinada exercer atividade econômica como MEI nas horas vagas.</p></div></div><div class=""><div class="" id="headingEight"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"><h5 class="text">2.8- Quais atividades podem ser enquadradas como Microempreendedor Individual?</h5></button></h5></div><div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion"><div class="card-body"><p>As Atividades Permitidas ao MEI são aquelas determinadas segundo o Comitê Gestor do Simples Nacional - CGSN, anexo XI da <a href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="blank">Resolução CGSN n.140 2018</a>. Acesse o Portal do Empreendedor e consulte a listagem das ocupações permitidas para o MEI.</p></div></div><div class=""><div class="" id="headingNine"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"><h5 class="text">2.9- Minha ocupação não consta no Portal. Como faço para me formalizar?</h5></button></h5></div><div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion"><div class="card-body"><p>Só pode se formalizar como MEI quem exerce ocupação descrita na lista de atividades permitidas constante do Anexo XI da <a class="external-link" href="http://normas.receita.fazenda.gov.br/sijut2consulta/link.action?visao=anotado&amp;idAto=92278" target="_blank" title=""> Resolução CGSN nº 140, de 22 de maio de 2018.</a></p><p>Desta forma, recomenda-se que antes de iniciar o processo de formalização, o empreendedor verifique se sua atividade consta na lista do anexo citado acima ou no Portal do Empreendedor.</p></div></div><div class=""><div class="" id="headingTen"><h5 class="mb-0 text"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"><h5 class="text">2.10- A pessoa física que possui débitos comerciais ou dívidas junto a instituições financeiras, bem como, restrição cadastral nos órgãos de proteção de crédito, poderá se formalizar como MEI?</h5></button></h5></div><div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion"><div class="card-body"><p>Sim. Não existem impedimentos para que a pessoa física com débitos, dívidas comerciais ou bancárias, bem como, com restrição cadastral junto às instituições de proteção ao crédito se formalize como MEI.</p></div></div></div>';
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
