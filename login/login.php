<?php require_once '../includes/helpers.php'; // Chamamos o helpers.php para podermos usar as funções que estão lá
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Ingresse</title>
</head>

<body>
    <div class="create">
        <?php
        include '../includes/header.php'; // Chamamos o header que está nos includes
        ?>
        <h1>Acesse o sistema: </h1>
        <hr>
        <main>
            <form action="" method="POST">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required><br>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" required><br>
                <input type="reset" value="Limpar">
                <input type="submit" value="Enviar">
            </form>
            <p>Não tem cadastro? <a href="./cadastrar.php">Cadastre-se aqui</a></p>
            <?php
            // Esse if serve para o php somente comece no momento em que o formulário seja submetido
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                $passWD = $_POST['senha']; // Para facilitar a intepretação do código, inserimos os POSTs dentro de váriaveis
                $usuario = consultaUser($conexao, $email); // Chamamos a função do helpers.php
                if ($usuario['email'] == $_POST['email'] && $usuario['passWD'] == $_POST['passWD']) {
                    session_start();
                    $_SESSION['id'] = $usuario['id'];
                    header("Location: ../index.php");
                    exit();
                } else {
                    echo "Usuário e/ou senha inválidos! Tente novamente";
                }
            }

            ?>
        </main>
        <hr>
    </div>
</body>

</html>