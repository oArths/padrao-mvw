<?php
include_once("../aluraplay/conexao.php");
$db = new Database();
$pdo = $db->getConnection();

$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT );
$video = [
'url' => '',
'title' => '',
];
if($id !== false){
    $statement = $pdo-> prepare('SELECT * FROM videos WHERE id = ?;');
    $statement->bindValue(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $video = $statement->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../aluraplay/css/reset.css">
    <link rel="stylesheet" href="../aluraplay/css/estilos.css">
    <link rel="stylesheet" href="../aluraplay/css/estilos-form.css">
    <link rel="stylesheet" href="../aluraplay/css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho">
            <a class="logo" href="/aluraplay/aluraplay/index.php"></a>

            <div class="cabecalho__icones">
                <a href="./enviar-video.html" class="cabecalho__videos"></a>
                <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <main class="container">

        <form class="container__formulario" action="<?= $id !== false ? '/aluraplay/aluraplay/editar_videos.php?id=' . $id : '../../aluraplay/novo_video.php'; ?>" method="POST">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input 
                    value="<?= $video['url'] ?>"
                    name="url" 
                    class="campo__escrita" 
                    required
                    placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" 
                    id='url' />
                </div>

               
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input 
                    value="<?= $video['title'] ?>"
                    name="titulo" 
                    class="campo__escrita" 
                    required 
                    placeholder="Neste campo, dê o nome do vídeo"
                    id='titulo' />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>