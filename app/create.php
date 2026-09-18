<?php require_once '../includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Cadastrar</title>
</head>

<body>
    <div class="create">
        <?php
        include '../includes/header.php';
        ?>
        <h1>Registre-se: </h1>
        <hr>
        <main>
            <form action="" method="POST">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required><br>
                <label for="turma">Turma: </label>
                <input type="text" name="turma" id="turma" required><br>
                <label for="nasc">Nascimento:</label>
                <input type="date" name="nasc" id="nasc"><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email"><br>
                Status:
                <input type="radio" id="ativo" name="ativo" value="1" checked>
                <label for="ativo">Ativo</label>
                <input type="radio" id="inativo" name="ativo" value="0">
                <label for="inativo">Inativo</label><br><br>
                <input type="reset" value="Limpar">
                <input type="submit" value="Enviar">
            </form>
        </main>
        <hr>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['nome'];
            $turma = $_POST['turma'];
            $nasc = $_POST['nasc'];
            $ativo = (bool)$_POST['ativo'];
            $email = $_POST['email'];
            create($conexao, $name, $turma, $nasc, $ativo, $email);
            include '../includes/footer.php';
        }
        ?>
    </div>
</body>

</html>