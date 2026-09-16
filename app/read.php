<?php require_once '../includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Registros</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <h1>Registros de Alunos: </h1>
    <hr>
    <?php 
    read($conexao);
    ?>
    <a href="../">Voltar</a>
    <?php include '../includes/footer.php'; ?>
</body>

</html>