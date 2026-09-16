<?php require_once '../database/connect.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE USERS</title>
</head>
<body>
        <h1>Atualiza usuário especifíco</h1>
        <p>No caso de não precisar atualizar algum dado, coloque o mesmo dado já inserido anteriormente</p>
    <section class="forms">
        <form action="" method="post">
            <label for="id">Digite o ID do User: </label>
            <input type="number" name="id" id="id" required> <br>
            <label for="name">Novo Nome: </label>
            <input type="text" name="name" id="name" required> <br>
            <label for="turma">Nova Turma: </label>
            <input type="text" name="turma" id="turma" required> <br>
            <label for="email">Novo Email: </label>
            <input type="text" name="email" id="email" required> <br>
            <label for="nasc">Nova Data de Nascimento: </label>
            <input type="date" name="nasc" id="nasc" required> <br>
            Novo Status: <br>
            <input type="radio" id="ativo" name="ativo" value="1" checked required>
            <label for="ativo">Ativo</label>
            <input type="radio" id="inativo" name="ativo" value="0" required>
            <label for="inativo">Inativo</label><br><br>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">
        </form>
        <?php
    if ($_SERVER['REQUEST_METHOD']=="POST") {
    try{ 
    if (isset($_POST['id']) || is_numeric($_POST['valor'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $turma = $_POST['turma'];
        $email = $_POST['email'];
        $nasc = $_POST['nasc'];
        $ativo = $_POST['ativo'];
    }else {
        echo "ID inválido, tente novamente";
    } 
     $sql = 'UPDATE alunos SET nome = :nome, turma = :turma, nasc = :nasc, ativo = :ativo, email = :email WHERE id=:id';
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $name);
        $stmt->bindParam(":turma", $turma);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":nasc", $nasc);
        $stmt->bindParam(":ativo", $ativo);
        $stmt->execute();
        echo "Registro atualizado! <br>";
        echo "<a href='./read.php'>Verifique aqui</a><br>";
    }catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();}}
    ?>
</body>
</html>
