<nav class="border-solid border-2 border-zinc-900 border-b-gray-700 p-3 flex items-center justify-between">
    <img class="w-28" src="../imagens/pnh.png">

    <?php if (isset($_SESSION['usuario_id'])): ?>
        <!-- Conteúdo exibido apenas se o usuário estiver logado -->
        <ul class="nav nav-underline flex items-center space-x-4">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">My Matches</a>
            </li>

            <li class="nav-item relative">
                <button id="button" class="flex items-center focus:outline-none p-3 border-2 border-gray-400 rounded-full bg-transparent hover:bg-gray-100">
                    <i class="fa-solid fa-user" style="color: #FFD43B;"></i>
                </button>

                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-44 bg-zinc-900 border border-gray-300 rounded-lg shadow-lg">
                    <a href="/profile" class="block px-4 py-2 text-slate-400 hover:text-slate-100">Meu Perfil</a>
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
