<?php

    require_once '../Config/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Histórico de Compras</title>
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
        <h1>Histórico de Compras</h1>

        <table cellpadding="10">
            <tr>
                <th>Nº NFe-c</th><th>Nome do Cliente</th><th>Nome do Produto</th><th>Quantidade</th><th>Data da Compra</th>
            </tr>
            <?php

            $stmt = $con->prepare("select compras.nro_nfc, clientes.nomec, produtos.nomep, compras.qtd, compras.data_compra 
                                            from clientes
                                            inner join compras on compras.id_cliente=clientes.id
                                            inner join produtos on compras.id_produto=produtos.idp
                                            order by nomec asc");
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach ($results as $row) {
                ?>
                <tr>
                    <td><?= $row['nro_nfc']; ?></td>
                    <td><?= $row['nomec']; ?></td>
                    <td><?= $row['nomep']; ?></td>
                    <td><?= $row['qtd']; ?></td>
                    <td><?= date("d/m/Y",strtotime($row['data_compra']));?></td>
                </tr>
                <?php
            }
            ?>
        </table>

    </fieldset>
</body>
</html>