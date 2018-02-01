<?php

require_once '../Config/connection.php';


$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM clientes WHERE nomec ilike :search OR enderecoc ilike :search OR fonec ilike :search OR statusc ilike :search";

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
        <li><a href="adicionar_clientes.php">Cadastro de Clientes</a></li>
        <li><a href="buscar_clientes.php">Consulta</a></li>
        <li><a href="clientes_cadastrados.php">Clientes Cadastrados</a></li>
        <li><a href="../index.php">Home</a></li>
    </ul>
</div>

<fieldset>
<h1>Resultado da busca</h1>

<?php
    if($resultado>=1) {

        echo "Resultado(s) encontrado(s): ".$resultado."<br/><br/>";

        while ($res = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo "Nome: " . $res->nomec . "</br>";
            echo "Endereço: " . $res->enderecoc . "</br>";
            echo "Telefone: " . $res->fonec . "</br>";
            echo "Status: " . $res->statusc . "</br><br>";

            echo "<hr>";

        }
    }else{
        echo 'Nenhum resultado encontrado.';
    }


?>
</fieldset>

</body>
</html>
