<nav class="border-solid border-2 border-zinc-900 border-b-gray-700 p-3 flex items-center justify-between">
    <img class="w-28" src="../imagens/pnh.png" onclick="window.location.href='/';">

    <?php if (isset($_SESSION['usuario_id'])): ?>
        <!-- Conteúdo exibido apenas se o usuário estiver logado -->
        <ul class="nav nav-underline flex items-center space-x-4">
            <li class="nav-item">
                <a class="nav-link active hover:text-blue-600 active:text-blue-700" aria-current="page" onclick="window.location.href='/';"  href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:text-blue-600 active:text-blue-700 mr-[1px]" onclick="window.location.href='/areas_desportivas';"href="#">Quadras</a>
            </li>

            <li class="nav-item relative">
                <i class="flex justify-center fa-solid fa-user p-2 w-9 h-9 mr-2" id="button" style="color: #FFD43B;"></i>

                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-44 bg-zinc-900 border border-gray-300 rounded-lg shadow-lg">
                    <a class="block px-4 py-2 text-slate-400 hover:text-slate-100" onclick="window.location.href='/perfil-locador';">Meu Perfil</a>
                    <a href="/logout" class="block px-4 py-2 text-slate-400 hover:text-slate-100">Logout</a>
                </div>
            </li>
        </ul>

        <script>

            const button = document.getElementById('button');
            const userDropdown = document.getElementById('userDropdown');

            button.addEventListener('click', () => {
                userDropdown.classList.toggle('hidden');
            });

            window.addEventListener('click', (e) => {
                if (!button.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        </script>

    <?php else: ?>

    <?php endif; ?>
</nav>
