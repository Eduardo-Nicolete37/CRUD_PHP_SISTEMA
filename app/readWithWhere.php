<?php require_once "../includes/helpers.php"; ?>
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
        <?php include '../includes/header.php' ?>
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
        if ($id<2147483647){
        readWithWhere($conexao, $id);}
        else {
            echo "Número inválido, tente novamente <br>";
        }
        } 
        echo '<hr>';
        include '../includes/footer.php';
        ?>
    </div>
</body>

</html>