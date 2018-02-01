<?php

    require_once '../Config/connection.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Busca de clientes</title>
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
    <h1>Sistema de Busca:</h1>
    <form action="search.php">
        <label for="search">Busca: </label>
        <input type="text" name="search" id="search" placeholder="Busca...">


        <input type="submit" value="Buscar" name="btn_busca">

    </form>
    </fieldset>

</body>
</html>
