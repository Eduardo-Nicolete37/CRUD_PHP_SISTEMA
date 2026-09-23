<?php 
require_once '../login/verifica_user.php';
require_once "../includes/helpers.php"; // Chamamos o helpers.php para podermos usar as funções que estão lá
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Vizualizar Registro Especifico</title>
</head>

<body>
    <div class='read'>
        <?php include '../includes/header.php' // Chamamos o header que está nos includes 
        ?>
        <h1>Vizualiza usuário especifíco</h1>
        <section class="forms">
            <form action="" method="post">
                <label for="id">Digite o ID do User: </label>
                <input type="number" name="id" id="id">
            </form>
        </section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) { // Definimos este limie para não quebramos o limite da váriavel INT
            $id = $_POST['id'];
            if ($id < 2147483647) {
                readWithWhere($conexao, $id);
            } // Chama a função do READ com WHERE que está no helpers
            else {
                echo "Número inválido, tente novamente <br>";
            }
        }
        echo '<hr>';
        include '../includes/footer.php'; //Chamamos o footer que está nos includes
        ?>
    </div>
</body>

</html>