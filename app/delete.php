<?php require_once '../database/connect.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete USERS</title>
</head>

<body>
    <?php
    include '../includes/header.php';
    ?>
    <h1>Apague um User aqui: </h1>
    <form action="" method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id"> <br>
        <input type="submit" value="Apagar">
    </form>
    <?php
    include '../includes/footer.php';
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $sql = "DELETE FROM  alunos WHERE id = :id";

        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id", $_POST['id']);
            $stmt->execute();
            echo "Registro deletado! <br>";
            echo "<a href='../app/read.php'>Verifique aqui</a><br>";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    ?>
</body>

</html>