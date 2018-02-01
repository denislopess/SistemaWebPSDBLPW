<?php

require_once '../Config/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Compras</title>
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
    <form action="#" method="post">
    <h1>Sistema de Compras:</h1>

    <?php

    //gerando o numero da nota randômicamente
    $nronfc = mt_rand();

    //Pegando os clientes na tabela Clientes
    $stmt1 = $con->prepare("SELECT * FROM clientes");
    $stmt1->execute();

    //pegando os produtos na tabela Produtos
    $stmt = $con->prepare("SELECT * FROM produtos");
    $stmt->execute();

    ?>


    <label>Selecione o cliente:</label><br>
    <label>
        <select name="cliente">
            <option>Selecione...</option>
            <?php
            while($res = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $res['id']; ?>"><?php echo $res['nomec'] ?></option>
                <?php
            }
            ?>
        </select>
    </label>
    <br><br>



    <label>Escolha o Produto:</label><br>
    <label>
        <select name="produto">
            <option>Selecione...</option>
            <?php
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $res['idp'];?>"><?php echo $res['nomep']?></option>
                <?php
            }
            ?>
        </select>
    </label><br><br>


    <label>Quantidade:</label>
        <label>
            <input type="number" name="quantidade">
        </label>
        <br><br>

    <label>Data da Compra:</label>
        <label>
            <input type="date" name="data">
        </label>
        <br><br>

    <input type="submit" name="btn_comprar" value="Fazer Compras">
    <input type="reset" value="Limpar">



    </form>
</fieldset>

</body>
</html>

<?php

if(isset($_POST['btn_comprar'])){

    $idc = $_POST['cliente'];
    $idp = $_POST['produto'];
    $qtd = $_POST['quantidade'];
    $data = $_POST['data'];


    if(!empty($idc)){
        try{
            //insert query
            $query = $con->prepare("INSERT INTO compras (nro_nfc, id_cliente, id_produto, qtd, data_compra)
            VALUES(:nronfc, :idc, :idp, :qtd, :datac) ");

            $query->execute(array(':nronfc'=>$nronfc, ':idc'=>$idc, ':idp'=>$idp, ':qtd'=>$qtd,':datac'=>$data));
            header('Location:historico_compras.php');
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }else{
        echo "Campo Vazio";
    }
}



?>

