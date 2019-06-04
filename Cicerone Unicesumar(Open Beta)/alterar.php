
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="_css/_menuIndex.css" rel="stylesheet">
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

if(!empty($_POST['cpf'])){
    try {
        $sql = "update tbl_usuario set nome = ?, rg = ?, cpf = ?, endereco = ?, email = ?, telefone =?, nivel =?, estatus =? where cpf = ?";

        $statement = $pdo->prepare($sql);

        $statement->bindParam(1, $_POST['nome']);
        $statement->bindParam(2, $_POST['rg']);
        $statement->bindParam(3, $_POST['cpf']);
        $statement->bindParam(4, $_POST['endereco']);
        $statement->bindParam(5, $_POST['email']);
        $statement->bindParam(6, $_POST['telefone']);
        $statement->bindParam(7, $_POST['nivel']);
        $statement->bindParam(8, $_POST['estatus']);
        $statement->bindParam(9, $_POST['cpf']);
        $statement->execute();


    } catch (PDOException $e) {
        print $e->getMessage();
    }
} else {
    echo "Desculpe-nos, mas não foi possível alterar este produto. Entre em contato com o suporte!";
}

?>

    <div id="bloco">
    	<div id="menupos">
       	 <ul class="menuvertical">
        	    <li><a href="Index.html">Alterado com sucesso</a></li>
       	 </ul>
   	</div>
   	</div>
   	

</body>
</html>


