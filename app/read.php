<?php require_once "../database/connect.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <h1>Registros de Alunos: </h1>
    <?php
    $sql = "SELECT * FROM alunos ORDER BY id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($alunos as $aluno) {
            echo "ID: " . $aluno['id'] . '<br>';
            echo "Nome: " . $aluno['nome'] . '<br>';
            echo "Turma: " . $aluno['turma'] . '<br>';
            echo "Email: " . $aluno['email'] . '<br>';
            echo "Nascimento: " . $aluno['nasc'] . '<br>';
            echo "Ativo: " . $aluno['ativo'] . '<br>';
            echo "<hr>";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
    ?>
    <a href="../">Voltar</a>
    <?php include '../includes/footer.php'; ?>
</body>

</html>