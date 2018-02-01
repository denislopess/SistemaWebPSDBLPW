<?php

require_once '../Config/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes Cadastrados</title>
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
    <legend>Dados Cadastrados:</legend>

    <br>
    <table cellpadding="10">
        <tr>
            <th>Nome</th><th>Endereço</th><th>Telefone</th><th>Status</th><th>Ação</th><th>Ação</th>
        </tr>
        <?php

        $stmt = $con->prepare("SELECT * FROM clientes ORDER BY nomec DESC");
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            ?>
            <tr>
                <td><?= $row['nomec']; ?></td>
                <td><?= $row['enderecoc']; ?></td>
                <td><?= $row['fonec']; ?></td>
                <td><?= $row['statusc']; ?></td>
                <td><a href="editar_clientes.php?id=<?=$row['id']?>"> Editar </a></td>
                <td><a href="excluir_clientes.php?id=<?=$row['id']?>"> Excluir </a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</fieldset>
</body>
</html>