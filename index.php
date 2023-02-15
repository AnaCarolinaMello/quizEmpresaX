<?php
header("Content-type: charset=utf8");
require_once "Class/quiz.php";
$listar = new Quiz();
$result = $listar->listar();
$inconsistencies = $listar->getInconsistencie();
//var_dump($resulta); die();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Listagem de erros</title>
    <link rel="stylesheet" href="public/style/index.css" type="text/css">
</head>
<body>
    <div id='container'>
        <div id='cabecalho'> 
            <h4>Id</h4>
            <h4 class='separacao'>Causa do erro</h4>
            <h4 id='separar'>Id</h4>
            <h4 class='separacao'>Incongruencias</h4>
        </div>
        <div id="espaco">
            <div>
                <?php foreach ($result as $value) { ?>
                    <div class='conteudo'>
                        <p class = 'delimitador'><?php echo $value[0]; ?></p>
                        <p class = 'space'><?php echo $value[1]; ?></p>
                    </div>
                <?php } ?>
            </div>
            <div id='separador'>
                <?php foreach ($inconsistencies as $value) { ?>
                    <div class='conteudo'>
                        <p class = 'delimitador'><?php echo $value[0]; ?></p>
                        <p class = 'space'><?php echo $value[1]; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>