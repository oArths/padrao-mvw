<?php
include_once("./conexao.php");
$db = new Database();
$pdo = $db->getConnection();

$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT );
if ($id === false){

    header('Location: /aluraplay/aluraplay/index.php?sucess=0');
    exit();
}

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL );
if($url === false){
    header('Location: /aluraplay/aluraplay/index.php?sucess=0');
    exit();
}
$title = filter_input(INPUT_POST,'titulo');
if($url === false){
    header('Location: /aluraplay/aluraplay/index.php?sucess=0');
    exit();
}



$sql = 'UPDATE videos SET url = :url, title = :title  WHERE id = :id;';

$statement = $pdo->prepare($sql);
$statement->bindValue(':url',$url);
$statement->bindValue(':title',$title);
$statement->bindValue(':id',$id, PDO::PARAM_INT);

if($statement->execute() === false){
    // LOCATION PASSADO NO HEADER FAZ COM QUE O USRUARIO SEJA REDIRECIONADO PARA A URL QUE FOI PASSSADA
    header('Location: /aluraplay/aluraplay/index.php?sucess=0');

}else{
    header('Location: /aluraplay/aluraplay/index.php?sucess=4');

}
?>