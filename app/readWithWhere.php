<?php require_once "../database/connect.php";?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizualizar Registro Especifico</title>
</head>

<body>
    <?php include '../includes/header.php'?>
    <h1>Vizualiza usuário especifíco</h1>
    <section class="forms">
        <form action="" method="post">
            <label for="id">Digite o ID do User: </label>
            <input type="number" name="id" id="id">
        </form>
    </section>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        try {
            $sql = "SELECT * FROM alunos WHERE id = :id;";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<hr>";
            echo "ID:" . $aluno['id'] . '<br>';
            echo "Aluno:" . $aluno['nome'] . '<br>';
            echo "Turma:" . $aluno['turma'] . '<br>';
            echo "Email:" . $aluno['email'] . '<br>';
            echo "Data de Nascimento:" . $aluno['nasc'] . '<br>';
            echo "Ativo:" . $aluno['ativo'] . '<br>';
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        echo "<a href='./'>Retorne aqui</a>";
    }
    echo '<hr>';
    include '../includes/footer.php';
    ?>
    
</body>

</html>