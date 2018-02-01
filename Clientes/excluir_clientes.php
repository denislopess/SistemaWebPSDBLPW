<?php

require_once '../Config/connection.php';

if(isset($_GET['id'])){
    $num = $_GET['id'];
    try{
        $stmt = $con->prepare("DELETE FROM clientes WHERE id = ?");
        $stmt->execute(array($num));

        header("Location:clientes_cadastrados.php");
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}
