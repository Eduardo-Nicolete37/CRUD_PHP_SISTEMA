<header>
    <nav class="navbar">
        <div class="navbar1">
        <a href="../">Inicio</a>
        <a href="../app/create.php">Cadastrar</a>
        <a href="../app/read.php">Vizualizar todos</a>
        <a href="../app/readWithWhere.php">Vizualizar um</a>
        <a href="../app/update.php">Atualizar registro</a>
        <a href="../app/delete.php">Deletar Registro</a>
        </div>
        <div class="navbar2">
        <a href="../login/login.php">Login</a>
        <?php
        if (isset($_SESSION['id'])) {
            echo "<a href='../login/logout.php'>Logout</a>";
        }
        ?>
        </div>
    </nav>
    <hr>
</header>