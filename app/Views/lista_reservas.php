<?php

use App\Enums\PartidaTypeEnum;
?>

<div class="flex flex-col h-auto m-10 p-5- gap-20 items-center" style="margin-top: 80px;">
    <div class="relative">
        <p class="text-3xl dark:text-amber-300 text-center font-semibold">Minhas Reservas</p>
    </div>

    <div class="flex flex-wrap gap-10 w-2/4">

        <?php

        foreach ($reservas as $reserva) { ?>

            <a href="/lista-reservas/reserva/<?= $reserva->getId() ?>" class="w-[220px] border-2 border-slate-700 p-3 rounded-md h-64 hover:scale-110 transition-all">
                <div>
                <h4 class="text-amber-300 text-xl"><?php echo PartidaTypeEnum::getName($reserva->getTipoReserva()) ?></h4>
                <div class="flex flex-col gap-2">
                        <div class="flex flex-row text-wrap h-auto">
                            <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Data</p>
                            <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $reserva->getDataReserva() ?></p>
                        </div>
                        <div class="flex flex-row relative">
                            <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold">Horário</p>
                            <p class="text-xs md:text-sm absolute bottom-0 right-0"><?php echo $reserva->getHorarioReservado() ?></p>
                        </div>
                    </div>
                </div>
            </di>
        <?php } ?>

    </div>
</div>
