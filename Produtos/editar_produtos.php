<?php

require_once '../Config/connection.php';

if(isset($_POST['btn_cadastro'])){
    $idp = $_POST['txt_idp'];
    $codigo = $_POST['codigoproduto'];
    $nomep = $_POST['nomeproduto'];
    $precop = $_POST['precoproduto'];
    $pesop = $_POST['pesoproduto'];

    if(!empty($codigo)){
        try{
            //insert query
            $stmt = $con->prepare("UPDATE produtos SET cod = :cod,
                                                                 nomep = :nomep,
                                                                 preco = :preco,
                                                                peso = :peso 
                                                                WHERE idp = :idp");

            $stmt->execute(array(':cod'=>$codigo, ':nomep'=>$nomep, ':preco'=>$precop, ':peso'=>$pesop, ':idp'=>$idp));
            if($stmt){
                header('Location:produtos_cadastrados.php');
            }
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }else{
        echo "Campo Vazio";
    }
}
    $idp = 0;
    $codigo = '';
    $nomep = '';
    $precop = '';
    $pesop = '';

    if(isset($_GET['id'])){
        $idp = $_GET['id'];

        $stmt = $con->prepare("SELECT cod, nomep, preco, peso FROM produtos WHERE idp = :idp");
        $stmt->execute(array(':idp'=>$idp));
        $row = $stmt->fetch();
        $codigo = $row['cod'];
        $nomep = $row['nomep'];
        $precop = $row['preco'];
        $pesop = $row['peso'];

    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Produtos no Sistema</title>
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
    <legend>Editar Produto:</legend>
    <form action="#" method="post">

        Código do Produto:<br>
        <input type="text" name="codigoproduto" value="<?=$codigo;?>">
        <br><br>

        Nome do Produto:<br>
        <input type="text" name="nomeproduto" value="<?=$nomep;?>">
        <br><br>

        Preço do Produto:<br>
        <input type="number" name="precoproduto" value="<?=$precop;?>">
        <br><br>

        Peso do produto em Gramas:<br>
        <input type="number" name="pesoproduto" value="<?=$pesop;?>">
        <br><br>

        <input type="submit" name="btn_cadastro" value="Atualizar">
        <input type="hidden" name="txt_idp" value="<?=$idp;?>">

    </form>
</fieldset>

</body>
</html>