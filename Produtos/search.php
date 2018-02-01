<?php

require_once '../Config/connection.php';


$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM produtos WHERE cod like :search or nomep ilike :search";

$stmt = $con->prepare($sql);
$stmt->bindValue(':search', '%' . $search . '%');
$stmt->execute();

$resultado = $stmt->rowCount();




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Resultado da Busca: </title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div id="menu">
    <ul>
        <li><a href="adicionar_produtos.php">Cadastro de Produtos</a></li>
        <li><a href="buscar_produtos.php">Consulta</a></li>
        <li><a href="produtos_cadastrados.php">Produtos Cadastrados</a></li>
        <li><a href="../index.php">Home</a></li>
    </ul>
</div>

<fieldset>
    <h1>Resultado da busca</h1>

    <?php
    if($resultado>=1) {

        echo "Resultado(s) encontrado(s): ".$resultado."<br/><br/>";

        while ($res = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo "Código do Produto: " . $res->cod . "</br>";
            echo "Nome do Produto: " . $res->nomep . "</br>";
            echo "Preço: " . $res->preco . "</br>";
            echo "Peso do Produto em Gramas(g): " . $res->peso . "</br><br>";

            echo "<hr>";

        }
    }else{
        echo 'Nenhum resultado encontrado.';
    }


    ?>
</fieldset>

</body>
</html>