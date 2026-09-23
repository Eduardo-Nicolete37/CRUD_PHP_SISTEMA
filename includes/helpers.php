<?php
require_once "../database/connect.php";
function create($conexao, $name, $turma, $nasc, $ativo, $email)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO alunos (nome, turma, nasc, ativo, email) VALUES (:nome, :turma, :nasc, :ativo, :email)";
        // Definimos a função que será enviada ao SQL
        try {
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":nome", $name); // Aqui, definimos os valores que seram enviados para a table
            $stmt->bindParam(":turma", $turma);
            $stmt->bindParam(":nasc", $nasc);
            $stmt->bindValue(":ativo", $ativo, PDO::PARAM_BOOL); // Usamos o PARAM_BOOL para forçar o banco tratar esse dado como booleano
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            echo "Aluno inserido com sucesso! <br>";
            echo "<a href='/mini_sistema/app/read.php'>Veja aqui</a>";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
function delete($conexao, $id)
{
    $sql = "DELETE FROM  alunos WHERE id = :id"; // Definimos a função que será enviada ao SQL

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id); // Enviamos o ID que será deletado 
        $stmt->execute();
        echo "Registro deletado! <br>";
        echo "<a href='/mini_sistema/app/read.php'>Verifique aqui</a><br>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function read($conexao)
{
    $sql = "SELECT * FROM alunos ORDER BY id"; // Definimos a função que será enviada ao SQL

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Colocamos todo os valores selecionados na matriz $alunos
        foreach ($alunos as $aluno) { // Loop para passar por todos os valores da váriavel
            echo "<div class='read'>ID: " . $aluno['id'] . '<br>';
            echo "Nome: " . $aluno['nome'] . '<br>';
            echo "Turma: " . $aluno['turma'] . '<br>';
            echo "Email: " . $aluno['email'] . '<br>';
            echo "Nascimento: " . $aluno['nasc'] . '<br>';
            if ($aluno['ativo'] == 1) {
                echo "Ativo: Sim";
            } else {
                echo "Ativo: Não";
            }
            echo "</div><hr>";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
function readWithWhere($conexao, $id)
{
    try {
        $sql = "SELECT * FROM alunos WHERE id = :id;"; // Definimos a função que será enviada ao SQL
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id); // O ID  que será procurado é enviado à database
        $stmt->execute();

        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($aluno !== false) { // Se o Aluno não existir, o print dos dados são feitos
            echo "<hr>";
            echo "ID:" . $aluno['id'] . '<br>';
            echo "Aluno:" . $aluno['nome'] . '<br>';
            echo "Turma:" . $aluno['turma'] . '<br>';
            echo "Email:" . $aluno['email'] . '<br>';
            echo "Data de Nascimento:" . $aluno['nasc'] . '<br>';
            if ($aluno['ativo'] == 1) {
                echo "Ativo: Sim";
            } else {
                echo "Ativo: Não";
            }
        } else {
            echo "Nenhum registro encontrado.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    echo '<br>' . "<a href='/mini_sistema'>Retorne aqui</a>";
}
function update($conexao, $id, $name, $turma, $email, $nasc, $ativo)
{
    try {
        $sql = 'UPDATE alunos SET nome = :nome, turma = :turma, nasc = :nasc, ativo = :ativo, email = :email WHERE id=:id';
        // Definimos a função que será enviada ao SQL
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $name);
        $stmt->bindParam(":nasc", $nasc);
        $stmt->bindParam(":turma", $turma); // Aqui, definimos os valores que seram atualizados na table
        $stmt->bindValue(":ativo", $ativo, PDO::PARAM_BOOL); // Usamos o PARAM_BOOL para forçar o banco tratar esse dado como booleano
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        echo "Registro atualizado! <br>";
        echo "<a href='/mini_sistema/app/read.php'>Verifique aqui</a><br>";
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}

// Funções para Login
function cadastraUser($conexao, $email, $passWD)
{

    $sql = "INSERT INTO users (email, passWD) VALUES (:email, :passWD)";
    // Definimos a função que será enviada ao SQL
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":email", $email); // Aqui, definimos os valores que seram enviados para a table
        $stmt->bindParam(":passWD", $passWD);
        $stmt->execute();
        echo "Usuário cadastrado com sucesso! <br>";
        echo "<a href='/mini_sistema/app/read.php'>Veja aqui</a>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function consultaUser($conexao, $email)
{
    try {
        $sql = "SELECT id, email, passWD FROM users WHERE email = :email;"; // Definimos a função que será enviada ao SQL
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":email", $email); // O ID  que será procurado é enviado à database
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario !== false) { // Se o Aluno não existir, o print dos dados são feitos
            return $usuario;
        } else {
            echo "Nenhum registro encontrado. Cadastre-se " . '<a href="/mini_sistema/cadastrar.php">aqui</a>';
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    echo '<br>' . "<a href='/mini_sistema'>Retorne aqui</a>";
}

?>
