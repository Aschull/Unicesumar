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


	$consulta = $pdo->prepare("SELECT nome,rg,cpf,endereco,email,telefone, nivel, estatus FROM tbl_usuario where cpf = :cpf;");
	$consulta->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
	$consulta->execute();
	$linha = $consulta->fetch(PDO::FETCH_ASSOC);




	$pdo = null;

?>
<!--Vetor $linha para imprimir nome então $linha na posição Nome print_r($linha[nome])-->

<div id="background_campo">
    <div id="campo">
     <form method="POST" action="alterar.php">

        <input type="text"          name="nome"     id="nome"      placeholder="Nome"     value="<?php print_r($linha['nome']);?>" maxlength="50">     <br><br>
        <input type="number_format" name="rg"       id="rg"        placeholder="RG"       value="<?php print_r($linha['rg']);?>" maxlength="9">       <br><br>
        <input type="number_format" name="cpf"      id="cpf"       placeholder="CPF"      value="<?php print_r($linha['cpf']);?>" maxlength="11">      <br><br>
        <input type="text"          name="endereco" id="endereco"  placeholder="Endereço" value="<?php print_r($linha['endereco']);?>" maxlength="70"> <br><br>
        <input type="email"         name="email"    id="email"     placeholder="E-mail"   value="<?php print_r($linha['email']);?>" maxlength="40">    <br><br>
        <input type="number_format" name="telefone" id="telefone"  placeholder="Telefone" value="<?php print_r($linha['telefone']);?>" maxlength="13"> <br><br>


       
        
        
      <div id="radio">
        
         Administrador<input type="radio" name="nivel" value="Administrador" <?php echo ($linha['nivel'] == "Administrador") ? "checked" : null; ?>/>
         <br><br>    
         Visitante<input type="radio" name="nivel" value="Visitante" <?php echo ($linha['nivel'] == "Visitante") ? "checked" : null; ?>/>
         <br><br>
        
         Ativado<input type="radio" name="estatus" value="Ativado" <?php echo ($linha['estatus'] == "Ativado") ? "checked" : null; ?>/>
         <br><br>    
         Desativado<input type="radio" name="estatus" value="Desativado" <?php echo ($linha['estatus'] == "Desativado") ? "checked" : null; ?>/>
         <br><br>          
        
         
      </div>

        <input type="submit"  name="salvar" id="salvar" value="Salvar Alterações" ><br><br>
        

     </form>
    </div>
   </div>


</body>
</html>
