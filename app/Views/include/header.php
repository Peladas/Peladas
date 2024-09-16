<nav class="border-solid border-2 border-zinc-900 border-b-gray-700 p-3">
    <!--<p> Teste </p>-->
    <img class="w-24" src="../imagens/pnh.png">

    <?php if (isset($_SESSION['usuario_id'])): ?>
            <!-- Conteúdo exibido apenas se o usuário estiver logado -->
            <a href="/profile">Meu Perfil</a>
            <a href="/logout">Logout</a>
        <?php else: ?>

        <?php endif; ?>
</nav>
