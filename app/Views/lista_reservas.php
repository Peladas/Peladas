<?php

use App\Enums\PartidaTypeEnum;
?>

<div class="flex flex-col size-full p-5 items-center justify-center gap-10">

    <h1 class="text-2xl dark:text-amber-300 text-center">Minhas Reservas</h1>

    <div class="flex flex-wrap gap-16">

        <?php

        foreach ($reservas as $reservaDado) {
            $reserva = $reservaDado['reserva'];
            $quadra = $reservaDado['quadra'];
            $locador = $reservaDado['locador'];
        ?>

            <a href="/lista-reservas/reserva/<?= $reserva->getId() ?>" class="border bg-transparent rounded-lg py-3 px-5">

                <h4 class="dark:text-amber-300 text-xl flex static font-semibold mb-6"><?php echo PartidaTypeEnum::getName($reserva->getTipoReserva()) ?></h4>

                <div class="flex flex-col gap-4">
                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Locador</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $locador->getNomeFantasia() ?></p>
                    </div>

                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Quadra</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $quadra->getIdentificador() . ' - ' . $quadra->getModalidade() ?></p>
                    </div>

                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Data</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $reserva->getDataReserva() ?></p>
                    </div>
                    <div class="flex flex-row relative">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold">Horário</p>
                        <p class="text-xs md:text-sm absolute bottom-0 right-0"><?php echo $reserva->getHorarioReservado() ?></p>
                    </div>
                </div>

            </a>

<?php } ?>
