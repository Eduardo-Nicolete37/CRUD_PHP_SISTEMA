<?php require_once '../includes/helpers.php'; // Chamamos o helpers.php para podermos usar as funções que estão lá 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Registros</title>
</head>

<body>
    <?php include '../includes/header.php'; // Chamamos o header que está nos includes 
    ?>
    <h1>Registros de Alunos: </h1>
    <hr>
    <?php
    read($conexao); // Chama a função do READ que está no helpers
    ?>
    <a href="../">Voltar</a>
    <?php include '../includes/footer.php'; //Chamamos o footer que está nos includes
    ?>
</body>

</html>