<?php 
require_once "../database/connect.php"; 
function create($conexao, $name, $turma, $nasc, $ativo, $email){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO alunos (nome, turma, nasc, ativo, email) VALUES (:nome, :turma, :nasc, :ativo, :email)";
        $ativo = (bool)$_POST['ativo'];
        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $name);
            $stmt->bindParam(":turma", $turma);
            $stmt->bindParam(":nasc", $nasc);
            $stmt->bindParam(":ativo", $ativo);
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            echo "Aluno inserido com sucesso! <br>";
            echo "<a href='../app/read.php'>Veja aqui</a>";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();}}
}
?>