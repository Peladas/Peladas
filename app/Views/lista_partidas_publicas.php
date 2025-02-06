<?php

use App\Enums\PartidaTypeEnum;
use App\Enums\ReservaStatusEnum;

?>

<div class="flex flex-col size-full p-5 items-center justify-center gap-10">

    <h1 class="text-2xl dark:text-amber-300 text-center">Partidas Públicas</h1>

    <!-- Filtro de partida pública -->
    <div class="flex flex-col md:flex-row justify-start items-start w-full gap-7 my-3 mb-4">
        <div class="">
            <label for="filtro-partida" class="mr-2 text-blue-800 font-medium dark:text-amber-300">Filtrar por:</label>
            <select id="filtro-partida" class="border-[1px] border-slate-400 rounded-lg py-2 px-4 bg-transparent text-slate-800 dark:text-white" onchange="filtrarPartidas(this.value)">
                <option class="dark:bg-zinc-900" value="1" <?= (!isset($_GET['filtro']) || $_GET['filtro'] == 1) ? 'selected' : '' ?>>Minhas Partidas</option>
                <option class="dark:bg-zinc-900" value="2" <?= isset($_GET['filtro']) && $_GET['filtro'] == 2 ? 'selected' : '' ?>>Inscrito</option>
                <option class="dark:bg-zinc-900" value="3" <?= isset($_GET['filtro']) && $_GET['filtro'] == 3 ? 'selected' : '' ?>>Disponíveis</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-16 md:gap-8">
        <?php
        foreach ($reservas as $reservaDado) {
            $reserva = $reservaDado['reserva'];
            $quadra = $reservaDado['quadra'];
            $jogador = $reservaDado['jogador'];
        ?>
            <a href="/partida-publica/<?= $reserva->getId() ?>/inscrever" class="border bg-transparent rounded-lg py-3 px-5">
                <?php
                $reservaStatus = $reserva->getStatus();
                $statusClassesList = [
                    ReservaStatusEnum::PENDING => 'text-blue-500',
                    ReservaStatusEnum::COMPLETED => 'text-green-500',
                    ReservaStatusEnum::CANCELED => 'text-red-500',
                ];
                $statusClass = $statusClassesList[$reservaStatus];
                ?>
                <h4 class="flex items-center justify-between dark:text-amber-300 text-xl flex static font-semibold mb-6">
                    <?php echo PartidaTypeEnum::getName($reserva->getTipoReserva()) ?>
                    <span class="<?= $statusClass ?>">
                        (<?= ReservaStatusEnum::getName($reservaStatus) ?>)
                    </span>
                </h4>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Jogador</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $jogador->getNomeJogador() ?></p>
                    </div>

                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Quadra</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $quadra->getIdentificador() . ' - ' . $quadra->getModalidade() ?></p>
                    </div>

                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Data</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $reserva->getDataReservaFormatado() ?></p>
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
    function filtrarPartidas(filtro) {
        const url = new URL(window.location.href);
        url.searchParams.set("filtro", filtro);
        window.location.href = url.toString();
    }
</script>
