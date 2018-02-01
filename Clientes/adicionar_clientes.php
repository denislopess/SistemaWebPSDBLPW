<?php

require_once ('../Config/connection.php');

if(isset($_POST['btn_cadastro'])){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $fone = $_POST['fone'];
    $status = $_POST['status'];

    if(!empty($nome)){
        try{
            //insert query
            $stmt = $con->prepare("INSERT INTO clientes (nomec, enderecoc, fonec, statusc) VALUES
            (:nomec, :enderecoc, :fonec, :statusc)");

            $stmt->execute(array(':nomec'=>$nome, ':enderecoc'=>$endereco, ':fonec'=>$fone, ':statusc'=>$status));
            header('Location:clientes_cadastrados.php');
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
    <title>Cadastro de Clientes</title>
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
        <legend>Cadastro</legend>
    <form action="#" method="post" id="formulario">

        Nome:<br>
        <label>
            <input type="text" name="nome" size="65">
        </label>
        <br><br>

        Endereço:<br>
        <label>
            <input type="text" name="endereco" size="65">
        </label>
        <br><br>

        Telefone:<br>
        <label>
            <input type="number" name="fone">
        </label>
        <br><br>

        Status:<br>
        <label>
            <select name="status">
                <option value="Ruim">Ruim</option>
                <option value="Bom">Bom</option>
                <option value="Ótimo">Ótimo</option>
            </select>
        </label>
        <br><br>

        <input type="submit" value="Cadastrar" name="btn_cadastro">
        <input type="reset" value="Limpar">
        <input type="button" value="Ver Cadastrados" onclick="location.href='clientes_cadastrados.php'">

    </form>
    </fieldset>


</body>
</html>