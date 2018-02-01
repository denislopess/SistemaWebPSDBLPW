<?php

require_once '../Config/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Produtos Cadastrados</title>
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
    <legend>Dados Cadastrados:</legend>

    <br>
    <table cellpadding="10">
        <tr>
            <th>Código</th><th>Nome do Produto</th><th>Preço</th><th>Peso (g)</th><th>Ação</th><th>Ação</th>
        </tr>
        <?php

        $stmt = $con->prepare("SELECT * FROM produtos ORDER BY nomep ASC");
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach ($results as $row) {
            ?>
            <tr>
                <td><?= $row['cod']; ?></td>
                <td><?= $row['nomep']; ?></td>
                <td><?= $row['preco']; ?></td>
                <td><?= $row['peso']; ?></td>
                <td><a href="editar_produtos.php?id=<?=$row['idp']?>"> Editar </a></td>
                <td><a href="excluir_produtos.php?id=<?=$row['idp']?>"> Deletar </a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</fieldset>
</body>
</html>