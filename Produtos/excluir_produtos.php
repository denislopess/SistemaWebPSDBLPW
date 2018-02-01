<?php

require_once '../Config/connection.php';

if(isset($_GET['id'])){
    $num = $_GET['id'];
    try{
        $stmt = $con->prepare("DELETE FROM produtos WHERE idp=?");
        $stmt->execute(array($num));

        header("Location:produtos_cadastrados.php");
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}
