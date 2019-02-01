<?php   
    if (isset($_POST['Contnome'],$_POST['Contemail'],$_POST['telefone'],$_POST['motivo'])) {
  
    //Variaveis de POST, Alterar somente se necessário 
    //====================================================
    $nome = $_POST['Contnome'];
    $email = $_POST['Contemail'];
    $telefone = $_POST['telefone']; 
    $motivo = $_POST['motivo'];
    //====================================================
    
    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //==================================================== 
    $email_remetente = $email; // deve ser uma conta de email do seu dominio 
    //====================================================
    
    //Configurações do email, ajustar conforme necessidade
    //==================================================== 
    $email_destinatario = "jaymeoficial123@gmail.com"; // pode ser qualquer email que receberá as mensagens
    $email_reply = "$email"; 
    $email_assunto = "Contato formmail"; // Este será o assunto da mensagem
    //====================================================
    
    //Monta o Corpo da Mensagem
    //====================================================
    $email_conteudo = "Nome = $nome \n"; 
    $email_conteudo .= "Email = $email \n";
    $email_conteudo .= "Telefone = $telefone \n"; 
    $email_conteudo .= "Motivo = $motivo \n"; 
    //====================================================
    
    //Seta os Headers (Alterar somente caso necessario) 
    //==================================================== 
    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
    //====================================================
    
    //Enviando o email 
    //==================================================== 
    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
            echo "</b>E-Mail enviado com sucesso!</b>"; 
            } 
        else{ 
            echo "</b>Falha no envio do E-Mail!</b>"; } 
    //====================================================
  } 
  ?>
    