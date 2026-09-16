<?php
require_once "../database/connect.php";
function create($conexao, $name, $turma, $nasc, $ativo, $email)
{
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
            echo "Erro: " . $e->getMessage();
        }
    }
}
function delete($conexao, $id)
{
    $sql = "DELETE FROM  alunos WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Registro deletado! <br>";
        echo "<a href='../app/read.php'>Verifique aqui</a><br>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function read($conexao)
{
    $sql = "SELECT * FROM alunos ORDER BY id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($alunos as $aluno) {
            echo "<div class='read'>ID: " . $aluno['id'] . '<br>';
            echo "Nome: " . $aluno['nome'] . '<br>';
            echo "Turma: " . $aluno['turma'] . '<br>';
            echo "Email: " . $aluno['email'] . '<br>';
            echo "Nascimento: " . $aluno['nasc'] . '<br>';
            echo "Ativo: " . $aluno['ativo'] . '<br>';
            echo "</div><hr>";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
function readWithWhere($conexao, $id)
{
    try {
        $sql = "SELECT * FROM alunos WHERE id = :id;";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($aluno !== false) {
            echo "<hr>";
            echo "ID:" . $aluno['id'] . '<br>';
            echo "Aluno:" . $aluno['nome'] . '<br>';
            echo "Turma:" . $aluno['turma'] . '<br>';
            echo "Email:" . $aluno['email'] . '<br>';
            echo "Data de Nascimento:" . $aluno['nasc'] . '<br>';
            echo "Ativo:" . $aluno['ativo'];
        } else {
            echo "Nenhum registro encontrado.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    echo '<br>' . "<a href='./'>Retorne aqui</a>";
}
