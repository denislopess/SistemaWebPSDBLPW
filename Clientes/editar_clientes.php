<?php

require_once ('../Config/connection.php');

if(isset($_POST['btn_cadastro'])) {
    $id = $_POST['txt_id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $fone = $_POST['fone'];
    $status = $_POST['status'];

    if (!empty($nome)) {
        try {
            //insert query
            $stmt = $con->prepare("UPDATE clientes set nomec = :nomec, 
                                                         enderecoc = :enderecoc, 
                                                                fonec = :fonec, 
                                                            statusc = :statusc
                                                            WHERE id = :id");

            $stmt->execute(array(':nomec' => $nome, ':enderecoc' => $endereco, ':fonec' => $fone, ':statusc' => $status, ':id'=>$id));
            if($stmt){
                header('Location:clientes_cadastrados.php');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    } else {
        echo "Campo Vazio";
    }

}
    $id = 0;
    $nome = '';
    $endereco = '';
    $fone = '';
    $status = '';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $stmt = $con->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->execute(array(':id'=>$id));
        $row = $stmt->fetch();
        $id = $row['id'];
        $nome = $row['nomec'];
        $endereco = $row['enderecoc'];
        $fone = $row['fonec'];
        $status = $row['statusc'];

    }



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Clientes</title>
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
    <legend>Editar:</legend>
    <form action="#" method="post">

        Nome:<br>
        <label>
            <input type="text" name="nome" value="<?=$nome;?>">
        </label>
        <br><br>

        Endereço:<br>
        <label>
            <input type="text" name="endereco" value="<?=$endereco;?>">
        </label>
        <br><br>

        Telefone:<br>
        <label>
            <input type="number" name="fone" value="<?=$fone;?>">
        </label>
        <br><br>

        Status:<br>
        <label>
            <select name="status">
                <option selected value="<?=$status?>"><?php echo "Selecionado: ". $status;?></option>
                <option value="Ruim">Ruim</option>
                <option value="Bom">Bom</option>
                <option value="Ótimo">Ótimo</option>
            </select>
        </label>
        <br><br>


        <input type="submit" value="Atualizar" name="btn_cadastro">
        <input type="hidden" name="txt_id" value="<?=$id;?>">
    </form>
</fieldset>

</body>
</html>