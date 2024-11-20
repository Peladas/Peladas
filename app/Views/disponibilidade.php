<?php

use App\Enums\DiaSemanaEnum;
?>

<div class="mt-28 text-center">

    <div class="m-2">
        <h1 class="text-2xl">Disponibilidades Registradas</h1>
    </div>

    <div class="flex flex-wrap justify-center itemns-center m-5 h-screen gap-8 mt-10">
        <?php foreach ($disponibilidade as $disp) { ?>
            <div>
                <div role="columnheader" class="text-amber-400 p-2 tracking-wide pb-6"><?php echo DiaSemanaEnum::getName($disp->dia) ?></div>
                <div class="flex flex-col justify-start flex-wrap gap-4">
                    <?php
                        foreach ($disp->disponibilidade as $horario) {
                            $inicio = $horario;
                            $fim = (new \DateTime($inicio))->modify('+1 hour')->format('H:i');
                    ?>
                        <a href="#" class="border border-gray-300 rounded-md px-4 py-2 text-zinc-300 hover:bg-gray-800
                        transform transition-transform duration-200 hover:scale-110"><?php echo "$inicio - $fim" ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>