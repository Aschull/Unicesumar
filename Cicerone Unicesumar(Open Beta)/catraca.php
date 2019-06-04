<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="_css/_cadastro.css" rel="stylesheet">
    <title></title>
</head>

<body>

  <nav id="menu">
	<ul>
		<li><a href="Index.html">Voltar</a></li>
	</ul>
  </nav>
  
<?php


	$username = "root";
	$password = "root";

	$cpf = $_POST["cpf"];

	$pdo = new PDO('mysql:host=localhost;dbname=cicerone', $username, $password);
  	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$consulta = $pdo->prepare("SELECT cpf, estatus FROM tbl_usuario where cpf = :cpf;");
	$consulta->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
	$consulta->execute();
	$linha = $consulta->fetch(PDO::FETCH_ASSOC);


    if($linha['estatus'] == 'Ativado'){
        $acesso = "Acesso Liberado";
    }
    else {
        $acesso = "Acesso Bloqueado";
    }

	$pdo = null;

?>
<!--Vetor $linha para imprimir nome então $linha na posição Nome print_r($linha[nome])-->

<div id="background_campo">
    <div id="campo">
     <form method="POST" action="alterar.php">

        <input type="number_format" name="acesso" id="acesso" placeholder="Acesso" value="<?php print_r($acesso);?>">      <br><br>
        
     </form>
    </div>
   </div>


</body>
</html>