<?php

use App\Enums\PartidaTypeEnum;
use App\Enums\ReservaStatusEnum;

?>

<div class="flex flex-col size-full p-5 gap-10">

    <h1 class="text-2xl dark:text-amber-300 text-center">Reservas</h1>
    <div class="flex flex-col md:flex-row justify-start items-start w-full gap-7 my-3">

         <!-- Filtro de status -->
         <div class="mb-4">
            <label for="filtro-status" class="mr-2 text-blue-800 font-medium dark:text-amber-300">Filtrar por status:</label>
            <select id="filtro-status" class="border border-ehite  dark:border-slate-800 rounded-lg py-2 px-4 bg-transparent text-slate-800 dark:text-white" onchange="window.location.href = '?status=' + this.value;">
                <option value="">Todos</option>
                <option value="<?= ReservaStatusEnum::PENDING ?>" <?= isset($_GET['status']) && $_GET['status'] == ReservaStatusEnum::PENDING ? 'selected' : '' ?>>Pendente</option>
                <option value="<?= ReservaStatusEnum::COMPLETED ?>" <?= isset($_GET['status']) && $_GET['status'] == ReservaStatusEnum::COMPLETED ? 'selected' : '' ?>>Concluída</option>
                <option value="<?= ReservaStatusEnum::CANCELED ?>" <?= isset($_GET['status']) && $_GET['status'] == ReservaStatusEnum::CANCELED ? 'selected' : '' ?>>Cancelada</option>
            </select>
        </div>

         <!-- Filtro de tipo de partida -->
         <div class="mb-4">
            <label for="filtro-partida" class="mr-2 text-blue-800 font-medium dark:text-amber-300">Filtrar por partida:</label>
            <select id="filtro-partida" class="border rounded-lg py-2 px-4 bg-transparent text-slate-800 dark:text-white" onchange="window.location.href = '?tipo_reserva=' + this.value;">
                <option value="">Todos</option>
                <option value="<?= PartidaTypeEnum::PRIVADA ?>" <?= isset($_GET['tipo_reserva']) && $_GET['tipo_reserva'] == PartidaTypeEnum::PRIVADA ? 'selected' : '' ?>>Privada</option>
                <option value="<?= PartidaTypeEnum::PUBLICA ?>" <?= isset($_GET['tipo_reserva']) && $_GET['tipo_reserva'] == PartidaTypeEnum::PUBLICA ? 'selected' : '' ?>>Pública</option>
            </select>
        </div>
    </div>


    <div class="flex flex-wrap gap-16 items-center justify-center">

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
    </div>
</div>

<script>
    document.getElementById("filtro-partida").addEventListener("change", function() {
        const url = new URL(window.location.href);
        url.searchParams.set("tipo_reserva", this.value);
        window.location.href = url.toString();
    });
</script>
