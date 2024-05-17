<?php
include_once("./conexao.php");

$db = new Database();
$pdo = $db->getConnection();
// FILTYER INPUT VALIDA UM Dado passando primeiro por onde o dado vem INPUT_POST
// dps o dado e em sequida o tipo de validação,no caso url FILTER_VALIDATE_URL
$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL );
if($url === false){
    header('Location: /aluraplay/aluraplay/index.php?sucess=0');
    exit();
}
$titulo = filter_input(INPUT_POST,'titulo');
if($url === false){
    header('Location: /aluraplay/aluraplay/index.php?sucess=0');
    exit();
}



$sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $url);
$statement->bindValue(2,$titulo);

if($statement->execute() === false){
    // LOCATION PASSADO NO HEADER FAZ COM QUE O USRUARIO SEJA REDIRECIONADO PARA A URL QUE FOI PASSSADA
}else{
    header('Location: /aluraplay/aluraplay/index.php?sucess=1');

}
?>