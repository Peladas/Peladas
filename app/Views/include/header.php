<nav class="fixed z-50 w-full bg-zinc-100 dark:bg-zinc-800 border-solid border-0 dark:border-b-zinc-900 dark:border-t-zinc-900 py-2 md:px-2 px-4 flex items-center justify-between drop-shadow-md dark:drop-shadow-lg">
    <a href="/" class="nav-text p-0 border-0 shadow-none bg-transparent">
        <img class="w-28 hidden dark:block" src="/imagens/pnh.png" alt="logo">
        <img class="w-28 block dark:hidden" src="/imagens/pnh_branco.png" alt="logo">
    </a>

    <?php if (isset($_SESSION['usuario_id'])): ?>
        <div class="relative">
            <div id="menu-btn" class="md:hidden cursor-pointer border-slate-950">
                <i class="fa-solid fa-bars" id="menu-button"></i>
            </div>

            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-gray-100 dark:bg-zinc-950 text-slate-600 rounded-lg shadow-lg z-50 md:flex-col space-4 md:space-x-4">
                <ul>
                    <li>
                        <a href="#" class="bg-transparent border-0 shadow-none block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700" onclick="window.location.href='/';">Home</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="<?php echo $user_type === 'jogador' ? '/perfil-jogador' : '/perfil-locador' ?>"
                            class="bg-transparent border-0 shadow-none block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700">Meu Perfil</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="<?php echo $user_type === 'jogador' ? '/areas-desportivas' : '/minhas-quadras' ?>"
                            class="bg-transparent border-0 shadow-none block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700">Quadras</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="/logout" class="bg-transparent border-0 shadow-none block px-4 py-2 hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700">Logout</a>
                    </li>
                </ul>
            </div>

            <ul id="menu" class="hidden md:flex space-4 md:space-x-4">
                <li>
                    <a id="switchBtn" type="button" class="">
                        <i class="fas fa-sun hidden dark:block text-white"></i>
                        <i class="fas fa-moon block dark:hidden"></i>
                    </a>
                </li>
                <li class="nav-item flex items-center">
                    <a class="hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700 border-0 shadow-none bg-transparent pr-[1px]" aria-current="page" onclick="window.location.href='/';" href="#">Home</a>
                </li>
                <li class="nav-item flex items-center">
                    <a class="hover:text-blue-600 dark:hover:text-yellow-400 active:text-blue-700 pr-2 border-0 shadow-none bg-transparent" href="<?php echo $user_type === 'jogador' ? '/areas-desportivas' : '/minhas-quadras' ?>">Quadras</a>
                </li>
                <li class="nav-item relative bg-transparent">
                    <i class="flex justify-center fa-solid fa-user p-2 pt-3 w-9 h-9 mr-2 mb-1 text-purple-700 dark:text-amber-300" id="button"></i>


                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-44 dark:bg-zinc-900 border-[1px] dark:border-gray-800 rounded-sm shadow-lg">
                        <a class="rounded-none border-0 block shadow-none px-4 py-2 text-slate-400 hover:text-slate-100 dark:bg-zinc-900" href="<?php echo $user_type === 'jogador' ? '/perfil-jogador' : '/perfil-locador' ?>">Meu Perfil</a>
                        <a href="/logout" class="rounded-none border-0 block shadow-none px-4 py-2 text-slate-400 hover:text-slate-100 dark:bg-zinc-900">Logout</a>
                    </div>
                </li>
            </ul>

        </div>

    <?php else: ?>
        <!-- Exibir algo para usuários não logados, se necessário -->
    <?php endif; ?>
</nav>

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


    document.getElementById('switchBtn').addEventListener('click', () => {
        // const html = document.getElementsByTagName('html').item(0);
        const body = document.body;
        const darkModeToggle = document.getElementById('switchBtn');
        const texto = document.getElementById('texto-alterado');
        const sunIcon = darkModeToggle.querySelector('.fas.fa-sun');
        const moonIcon = darkModeToggle.querySelector('.fas.fa-moon');

        body.classList.toggle('dark');
        // body.classList.toggle('dark-mode');


        if (body.classList.contains('dark')) {
            localStorage.setItem('@peladas:mode', 'dark');
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'inline';
            moonIcon.style.color = '#6b21a8';
            texto.textContent = 'Clique na Lua para desativar o Dark-Mode';
        } else {
            localStorage.setItem('@peladas:mode', 'light')
            sunIcon.style.display = 'inline';
            moonIcon.style.display = 'none';
            texto.textContent = 'Clique no Sol para ativar o Dark-Mode';
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const storedMode = localStorage.getItem('@peladas:mode') ?? 'dark';
        console.log('mode', storedMode);

        if (storedMode === 'dark') {
            body.classList.add('dark');
            console.log('adicionando modo dark')
            // body.classList.add('dark-mode');
        } else {
            body.classList.remove('dark');
            console.log('removendo modo dark')
            // body.classList.remove('dark-mode');

        }
    });



    // Define a função applyDarkMode primeiro
    // function applyDarkMode(enabled) {
    //     console.log('Função applyDarkMode foi chamada:', enabled);
    //     if (enabled) {
    //         document.body.classList.add('dark');
    //         localStorage.setItem('darkMode', 'enabled');
    //     } else {
    //         document.body.classList.remove('dark');
    //         localStorage.setItem('darkMode', 'disabled');
    //     }
    // }

    // Depois, selecione o checkbox e adicione o evento de mudança

    // const checkbox = document.querySelector('input[type="checkbox"]');
    // if (checkbox) {
    //     checkbox.addEventListener('change', () => {
    //         console.log('Checkbox foi alterado:', checkbox.checked);
    //         applyDarkMode(checkbox.checked);
    //     });
    // }
</script>
