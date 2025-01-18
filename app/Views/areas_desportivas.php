<div class="flex flex-col h-auto w-full items-center justify-center mt-16">

    <div class="flex flex-col h-auto w-full items-center justify-center mt-16">
        <div class="text-center mt-16 text-wrap px-10">
            <h1 class="capitalize h-auto dark:text-amber-300 text-3xl">Áreas Disponíveis para Locação</h1>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-5 m-8">
            <?php
            if ($data) {
                foreach ($data as $locador) {
                    // Montar a URL para detalhes do locador
            ?>
                    <a href="/areas-desportivas/<?php echo ($locador->id); ?>" class="flex flex-row w-96 text-wrap no-underline flex flex-row p-2 border-2 border-solid border-slate-100 dark:border-zinc-400 m-3 mt-8 rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300" id="cards">

                    <div class="h-20 w-20">

                        <svg xmlns="http://www.w3.org/2000/svg" height="auto" viewBox="0 -960 960 960" width="24px" fill="#e8eaed" style="width: auto;">
                            <path d="M360-400h400L622-580l-92 120-62-80-108 140Zm-40 160q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/>
                        </svg>

                    </div>

                        <div class="ml-3 capitalize">
                            <h3 class="dark:text-amber-300"><?= htmlspecialchars($locador->nome) ?></h3>
                            <p><?= htmlspecialchars($locador->endereco) ?></p>
                        </div>

                    </a>
            <?php
                }
            } else {
                echo '<p>Nenhuma área disponível no momento</p>';
            }
            ?>
        </div>
    </div>
</div>
