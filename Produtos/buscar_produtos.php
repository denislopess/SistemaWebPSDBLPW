<?php

require_once '../Config/connection.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Busca de Produtos</title>
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
    <h1>Sistema de Busca:</h1>
    <p>- Buscas por código do produto, ou nome do produto -</p>
    <form action="search.php">
        <label for="search">Busca: </label>
        <input type="text" name="search" id="search" placeholder="Busca...">


        <input type="submit" value="Buscar">

    </form>
</fieldset>
</body>
</html>
