<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="_css/_menuIndex.css" rel="stylesheet">
    <title></title>
</head>

<body>
<?php

	$username = "root";
    $password = "root";

    $nome      = $_POST["nome"];
    $rg        = $_POST["rg"];
    $cpf       = $_POST["cpf"];
    $endereco  = $_POST["endereco"];
    $email     = $_POST["email"];
    $telefone  = $_POST["telefone"];
    $nivel     = $_POST["nivel"];
    $estatus   = $_POST["estatus"];


    try {
  		$pdo = new PDO('mysql:host=localhost;dbname=cicerone', $username, $password);
  		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  		$stmt = $pdo->prepare('INSERT INTO tbl_usuario (nome, rg, cpf, endereco, email, telefone, nivel, estatus) VALUES (:nome, :rg, :cpf, :endereco, :email, :telefone, :nivel, :estatus)');

  		$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
  		$stmt->bindParam(':rg', $rg, PDO::PARAM_STR);
  		$stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  		$stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
  		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
  		$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
  		$stmt->bindParam(':nivel', $nivel, PDO::PARAM_STR);
  		$stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);

  		$stmt->execute();

  		echo $stmt->rowCount();
		}

		catch(PDOException $e) {
  		echo 'Error: ' . $e->getMessage();

        }

    $pdo = null;

?>
    <div id="bloco">
    	<div id="menupos">
       	 <ul class="menuvertical">
        	    <li><a href="Index.html">Cadastrado com sucesso</a></li>
       	 </ul>
   	</div>
   	</div>

</body>
</html>
