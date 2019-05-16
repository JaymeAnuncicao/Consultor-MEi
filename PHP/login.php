<?php
    session_start();
    $_SESSION['usuario'] = '';
    $_SESSION['email'] = ''; 
    $_SESSION['senha'] = '';
    $_SESSION['authenticateUser']= false;
    $_SESSION['authenticateADM']= false;

    require_once 'init.php';
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
            header("location: ../examples/dashboard.html");
        }elseif (strcmp($lenha,$dados[0]['senha']) == 0 && strcmp($login,$dados[0]['email']) == 0){
            $_SESSION['usuario'] = $name;
            $_SESSION['email'] = $login;
            $_SESSION['authenticateUser'] = true;
            header('location: Usuario.php');
            exit();
        }else{
            $_SESSION['authenticateADM'] = false;
            $_SESSION['authenticateUser'] = false;
            header('location: ../index.php');
        }
        
    }    

   


?>