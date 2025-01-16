<div class="flex flex-col h-auto w-full items-center justify-center mt-16">

    <div class="flex flex-col h-auto w-full items-center justify-center mt-16">
        <div class="text-center mt-16 text-wrap px-10">
            <h1 class="capitalize h-auto dark:text-amber-300 text-3xl">Áreas Disponíveis para Locação </h1>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-5 m-8">
            <?php

            if ($data) {
                foreach ($data as $locador) {
            ?>
                    <div class="flex flex-row w-96 text-wrap">
                        <div class="flex flex-row p-2 border-2 border-solid border-slate-100 dark:border-zinc-400 m-3 mt-8 rounded-lg shadow-lg">
                            <svg class="w-[60px] h-[60px] border-[2px] border-solid border-slate-100 dark:border-0 m-2 rounded-full p-[2px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                            </svg>

                            <div class="ml-3 capitalize">
                                <h3 class="dark:text-amber-300"><?= $locador->nome ?></h3>
                                <p><?= $locador->endereco ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo 'Nenhuma área disponível no momento';
            }
            ?>
        </div>
    </div>
</div>
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
                    <a href="/areas-desportivas/<?php echo ($locador->id); ?>" class="flex flex-row w-96 text-wrap no-underline">
                        <div class="flex flex-row p-2 border-2 border-solid border-slate-100 dark:border-zinc-400 m-3 mt-8 rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300">
                            <svg class="w-[60px] h-[60px] border-[2px] border-solid border-slate-100 dark:border-0 m-2 rounded-full p-[2px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                            </svg>

                            <div class="ml-3 capitalize">
                                <h3 class="dark:text-amber-300"><?= htmlspecialchars($locador->nome) ?></h3>
                                <p><?= htmlspecialchars($locador->endereco) ?></p>
                            </div>
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
