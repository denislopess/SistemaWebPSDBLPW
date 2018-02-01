<?php

    require_once '../Config/connection.php';

    if(isset($_POST['btn_cadastro'])){

        $codigo = $_POST['codigoproduto'];
        $nomep = $_POST['nomeproduto'];
        $precop = $_POST['precoproduto'];
        $pesop = $_POST['pesoproduto'];

        if(!empty($codigo)){
            try{
                //insert query
                $stmt = $con->prepare("INSERT INTO produtos (cod, nomep, preco, peso) VALUES
            (:codp, :nomep, :precop, :pesop)");

                $stmt->execute(array(':codp'=>$codigo, ':nomep'=>$nomep, ':precop'=>$precop, ':pesop'=>$pesop));
                header('Location:produtos_cadastrados.php');
            }catch (PDOException $exc){
                echo $exc->getMessage();
            }
        }else{
            echo "Campo Vazio";
        }


    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos no Sistema</title>
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
        <legend>Cadastro:</legend>
        <form action="#" method="post">

            Código do Produto:<br>
            <label>
                <input type="text" name="codigoproduto">
            </label>
            <br><br>

            Nome do Produto:<br>
            <label>
                <input type="text" name="nomeproduto">
            </label>
            <br><br>

            Preço do Produto:<br>
            <label>
                <input type="number" name="precoproduto">
            </label>
            <br><br>

            Peso do produto em Gramas:<br>
            <label>
                <input type="number" name="pesoproduto">
            </label>
            <br><br>

            <input type="submit" name="btn_cadastro" value="Cadastrar">
            <input type="reset" value="Limpar">
            <input type="button" value="Ver Cadastrados" onclick="location.href='produtos_cadastrados.php'">

        </form>
    </fieldset>

</body>
</html>