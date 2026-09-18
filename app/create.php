<?php require_once '../includes/helpers.php'; // Chamamos o helpers.php para podermos usar as funções que estão lá
?>
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
        include '../includes/header.php'; // Chamamos o header que está nos includes
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
        // Esse if serve para o php somente comece no momento em que o formulário seja submetido
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['nome']; // Para facilitar a intepretação do código, inserimos os POSTs dentro de váriaveis
            $turma = $_POST['turma'];
            $nasc = $_POST['nasc'];
            $ativo = (bool)$_POST['ativo']; // Forçamos essa váriavel ser booleana
            $email = $_POST['email'];
            create($conexao, $name, $turma, $nasc, $ativo, $email); // Chamamos a função do helpers.php
            include '../includes/footer.php'; //Chamamos o footer que está nos includes
        }
        ?>
    </div>
</body>

</html>