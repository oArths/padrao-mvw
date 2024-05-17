<?php
include_once("./conexao.php");
$id = $_GET['id'];
$db = new Database();
$pdo = $db->getConnection();

$sql = 'DELETE FROM videos WHERE id = ? ';

$statement = $pdo->prepare($sql);
$statement->bindValue(1,$id);

if($statement->execute() === false){
    // LOCATION PASSADO NO HEADER FAZ COM QUE O USRUARIO SEJA REDIRECIONADO PARA A URL QUE FOI PASSSADA
    header('Location: /aluraplay/aluraplay/index.php?sucess=0');
}else{
    header('Location: /aluraplay/aluraplay/index.php?sucess=4');

}
?>