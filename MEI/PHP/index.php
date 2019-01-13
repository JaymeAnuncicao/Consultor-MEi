
<?php 
	require_once 'init.php';

	$nome = $_POST['nome'];
	$data = $_POST['data'];
	$email = $_POST['email'];
	$CPF = $_POST['CPF'];

	$conx = db_connect(); 
	$query= 'insert INTO pessoa (nome,data,email,CPF) VALUES (:nome,:data,:email,:CPF);';

	$stmt = $conx->prepare($query);
	$stmt->bindValue(':nome',$nome);
	$stmt->bindValue(':data',$data);
	$stmt->bindValue(':email',$email);
	$stmt->bindValue(':CPF',$CPF);
	$stmt->execute();


 ?>
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php" method="post">
		<input type="text" name="nome" placeholder="Nome">
		<input type="date" name="data">
		<input type="email" name="email" placeholder="E-mail">
		<input type="text" name="CPF" placeholder="CPF">
		<input type="submit" name="enviar">
	</form>
</body>
</html>