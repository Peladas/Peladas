<?php

use App\Enums\DiaSemanaEnum;
?>

<div class="text-center min-h-screen flex flex-col justify-between items-center justify-center">
    <div class="flex-grow"> <!-- Esse contêiner vai ocupar o espaço restante da tela -->
        <div class="m-2 py-2 md:py-4 flex flex-wrap text-center items-center justify-center">
            <h1 class="text-2xl md:text-3xl dark:text-amber-300">Disponibilidades Registradas</h1>
        </div>

        <div class="flex flex-wrap justify-center itemns-center m-5 gap-8 mt-10">
            <?php foreach ($disponibilidade as $disp) { ?>
                <div>
                    <div role="columnheader" class="text-blue-800 dark:text-amber-400 p-2 tracking-wide font-semibold pb-6"><?php echo DiaSemanaEnum::getName($disp->dia) ?></div>
                    <div class="flex flex-col justify-start flex-wrap gap-4">
                        <?php
                        foreach ($disp->disponibilidade as $horario) {
                            $inicio = $horario;
                            $fim = (new \DateTime($inicio))->modify('+1 hour')->format('H:i');
                        ?>
                            <a href="#" class="border rounded-md px-4 py-2 text-base dark:bg-zinc-900 dark:border-gray-600 dark:text-zinc-300
                        dark:hover:bg-zinc-800 transform transition-all duration-300 hover:scale-105 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 shadow-sm
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                <?php echo "$inicio - $fim" ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>
