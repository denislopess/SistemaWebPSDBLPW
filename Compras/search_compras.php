<?php

require_once '../Config/connection.php';


$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT clientes.nomec, produtos.nomep FROM clientes
inner join compras on compras.id_cliente=clientes.id
inner join produtos on compras.id_produto=produtos.idp
where nomec ilike :search or nomep ilike :search";

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
        <li><a href="realizar_compras.php">Carrinho</a></li>
        <li><a href="historico_compras.php">Histórico de Compras</a></li>
        <li><a href="buscar_compras.php">Consultar compras realizadas</a></li>
        <li><a href="../index.php">Home</a></li>
    </ul>
</div>

<fieldset>
    <h1>Resultado da busca</h1>

    <?php
    if($resultado>=1) {

        echo "Resultado(s) encontrado(s): ".$resultado."<br/><br/>";

        while ($res = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo "Nome do Cliente: " . $res->nomec . "</br>";
            echo "Nome do Produto: " . $res->nomep . "</br><br/>";

            echo "<hr>";

        }
    }else{
        echo 'Nenhum resultado encontrado.';
    }


    ?>
</fieldset>

</body>
</html>