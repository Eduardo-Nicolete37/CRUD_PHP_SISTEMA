<?php require_once '../includes/helpers.php'; // Chamamos o helpers.php para podermos usar as funções que estão lá?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Delete USERS</title>
</head>
<body>
    <?php
    include '../includes/header.php'; // Chamamos o header que está nos includes
    ?>
    <h1>Apague um User aqui: </h1>
    <div class="delete">
    <form action="" method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id"> <br>
        <input type="submit" value="Apagar">
    </form>
    <hr>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    delete($conexao, $id);}
    ?>
    <?php
    include '../includes/footer.php'; //Chamamos o footer que está nos includes
    ?>
    </div>
</body>

</html>