<header>
    <nav class="navbar">
        <div class="navbar1">
        <a href="/mini_sistema/">Inicio</a>
        <a href="/mini_sistema/app/create.php">Cadastrar</a>
        <a href="/mini_sistema/app/read.php">Vizualizar todos</a>
        <a href="/mini_sistema/app/read_with_where.php">Vizualizar um</a>
        <a href="/mini_sistema/app/update.php">Atualizar registro</a>
        <a href="/mini_sistema/app/delete.php">Deletar Registro</a>
        </div>
        <div class="navbar2">
        <a href="/mini_sistema/login/login.php">Login</a>
        <?php
        if (isset($_SESSION['id'])) {
            echo "<a href='/mini_sistema/login/logout.php'>Logout</a>";
        }
        ?>
        </div>
    </nav>
    <hr>
    
</header>