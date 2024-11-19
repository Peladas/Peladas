<nav class="fixed z-50 w-full bg-zinc-100 dark:bg-zinc-800 border-solid border-0 dark:border-b-zinc-900 dark:border-t-zinc-900 mt-0 md:pr-2 p-2 pr-5 flex items-center justify-between drop-shadow-md dark:drop-shadow-lg">
    <a href="/">
        <img class="w-28 hidden dark:block" src="../imagens/pnh.png" alt="modo escuro">
        <img class="w-28 block dark:hidden" src="../imagens/pnh_branco.png" alt="modo claro">
    </a>

    <?php if (isset($_SESSION['usuario_id'])): ?>
        <div class="relative">
            <div id="menu-btn" class="md:hidden cursor-pointer">
                <i class="fa-solid fa-bars" id="menu-button"></i>
            </div>

            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-44 bg-gray-100 dark:bg-zinc-950 text-slate-600 rounded-lg shadow-lg z-50 md:flex-col space-4 md:space-x-4">
                <ul>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700" onclick="window.location.href='/';">Home</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="<?php echo $user_type === 'jogador' ? '/perfil-jogador' : '/perfil-locador' ?>" class="block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700">Meu Perfil</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="<?php echo $user_type === 'jogador' ? '/areas_desportivas' : '/minhas-quadras' ?>" class="block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700">Quadras</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="/logout" class="block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700">Logout</a>
                    </li>
                </ul>
            </div>

            <ul id="menu" class="hidden md:flex space-4 md:space-x-4">
                <li>

                    <label class="switch mt-1.5">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </li>
                <li class="nav-item flex items-center">
                    <a class="nav-link active hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700 " aria-current="page" onclick="window.location.href='/';" href="#">Home</a>
                </li>
                <li class="nav-item flex items-center">
                    <a class="nav-link hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700 mr-[1px]" href="<?php echo $user_type === 'jogador' ? '/areas_desportivas' : '/minhas-quadras' ?>">Quadras</a>
                </li>
                <li class="nav-item relative">
                    <i class="flex justify-center fa-solid fa-user p-2 pt-3 w-9 h-9 mr-2 mb-1" id="button" style="color: #FFD43B;"></i>

                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-44 bg-zinc-900 border border-gray-300 rounded-lg shadow-lg">
                        <a class="block px-4 py-2 text-slate-400 hover:text-slate-100" href="<?php echo $user_type === 'jogador' ? '/perfil-jogador' : '/perfil-locador' ?>">Meu Perfil</a>
                        <a href="/logout" class="block px-4 py-2 text-slate-400 hover:text-slate-100">Logout</a>
                    </div>
                </li>
            </ul>
        </div>

        <script>
            const menuBtn = document.getElementById('menu-btn');
            const menu = document.getElementById('menu');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const userDropdown = document.getElementById('userDropdown');
            const button = document.getElementById('button');
            const body = document.body;

            menuBtn.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });

            button.addEventListener('click', () => {
                userDropdown.classList.toggle('hidden');
            });

            window.addEventListener('click', (e) => {
                if (!menuBtn.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
                if (!button.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            });

            // Define a função applyDarkMode primeiro
            function applyDarkMode(enabled) {
                console.log('Função applyDarkMode foi chamada:', enabled);
                if (enabled) {
                    document.body.classList.add('dark');
                    localStorage.setItem('darkMode', 'enabled');
                } else {
                    document.body.classList.remove('dark');
                    localStorage.setItem('darkMode', 'disabled');
                }
            }

            // Depois, selecione o checkbox e adicione o evento de mudança
            const checkbox = document.querySelector('input[type="checkbox"]');

            checkbox.addEventListener('change', () => {
                console.log('Checkbox foi alterado:', checkbox.checked);
                applyDarkMode(checkbox.checked);
            });
        </script>
    <?php else: ?>
        <!-- Exibir algo para usuários não logados, se necessário -->
    <?php endif; ?>
</nav>
