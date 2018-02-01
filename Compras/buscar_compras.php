<?php

require_once '../Config/connection.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Busca relacionada as compras</title>
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
    <h1>Sistema de Busca:</h1>
    <form action="search_compras.php">
        <label for="search">Busca: </label>
        <input type="text" name="search" id="search" placeholder="Busca...">


        <input type="submit" value="Buscar" name="btn_busca">

    </form>
</fieldset>
</body>
</html>