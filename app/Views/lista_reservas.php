<?php

use App\Enums\PartidaTypeEnum;
use App\Enums\ReservaStatusEnum;

?>

<div class="flex flex-col size-full p-5 items-center justify-center gap-10">

    <h1 class="text-2xl dark:text-amber-300 text-center">Reservas</h1>
    <div class="flex flex-col md:flex-row justify-start items-start w-full gap-7 my-3 mb-4">

        <!-- Filtro de status -->
        <div class="">
            <label for="filtro-status" class="mr-2 text-blue-800 font-medium dark:text-amber-300">Filtrar por status:</label>
            <select id="filtro-status" class="border-[1px] border-ehite border-slate-400 rounded-lg py-2 px-4 bg-transparent text-slate-800 dark:text-white
            dark:hover:bg-zinc-900">
                <option class="dark:bg-zinc-900" value="">Todos</option>
                <option class="dark:bg-zinc-900" value="<?= ReservaStatusEnum::PENDING ?>" <?= isset($_GET['status']) && $_GET['status'] == ReservaStatusEnum::PENDING ? 'selected' : '' ?>>Aberta</option>
                <option class="dark:bg-zinc-900" value="<?= ReservaStatusEnum::COMPLETED ?>" <?= isset($_GET['status']) && $_GET['status'] == ReservaStatusEnum::COMPLETED ? 'selected' : '' ?>>Concluída</option>
                <option class="dark:bg-zinc-900" value="<?= ReservaStatusEnum::CANCELED ?>" <?= isset($_GET['status']) && $_GET['status'] == ReservaStatusEnum::CANCELED ? 'selected' : '' ?>>Cancelada</option>
            </select>
        </div>

        <!-- Filtro de tipo de partida -->
        <div class="">
            <label for="filtro-partida" class="mr-2 text-blue-800 font-medium dark:text-amber-300">Filtrar por partida:</label>
            <select id="filtro-partida" class="border-[1px] border-slate-400 rounded-lg py-2 px-4 bg-transparent text-slate-800 dark:text-white" onchange="window.location.href = '?tipo_reserva=' + this.value;">
                <option class="dark:bg-zinc-900" value="">Todos</option>
                <option class="dark:bg-zinc-900" value="<?= PartidaTypeEnum::PRIVADA ?>" <?= isset($_GET['tipo_reserva']) && $_GET['tipo_reserva'] == PartidaTypeEnum::PRIVADA ? 'selected' : '' ?>>Privada</option>
                <option class="dark:bg-zinc-900" value="<?= PartidaTypeEnum::PUBLICA ?>" <?= isset($_GET['tipo_reserva']) && $_GET['tipo_reserva'] == PartidaTypeEnum::PUBLICA ? 'selected' : '' ?>>Pública</option>
            </select>
        </div>
    </div>

    <?php if (!empty($reservas)) { ?>
        <?php
        // Define a prioridade de cada status
        $prioridadeStatus = [
            ReservaStatusEnum::PENDING => 1,   // Pendente (maior prioridade)
            ReservaStatusEnum::COMPLETED => 2, // Concluída
            ReservaStatusEnum::CANCELED => 3,  // Cancelada (menor prioridade)
        ];

        // Ordena as reservas com base na prioridade do status
        usort($reservas, function ($a, $b) use ($prioridadeStatus) {
            $prioridadeA = $prioridadeStatus[$a['reserva']->getStatus()];
            $prioridadeB = $prioridadeStatus[$b['reserva']->getStatus()];

            return $prioridadeA <=> $prioridadeB;
        });
        ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-16 md:gap-8">
            <?php
            foreach ($reservas as $reservaDado) {
                $reserva = $reservaDado['reserva'];
                $quadra = $reservaDado['quadra'];
                $locador = $reservaDado['locador'];

                // Verifica se a reserva está concluída e a data já passou
                $dataReserva = new DateTime($reserva->getDataReserva());
                $hoje = new DateTime();
                $isCompletedAndPast = $reserva->getStatus() === ReservaStatusEnum::COMPLETED && $dataReserva < $hoje;
                $isCanceled = $reserva->getStatus() === ReservaStatusEnum::CANCELED;
            ?>
                <!-- Aplica a classe 'opacity-50' se a reserva estiver concluída e a data já tiver passado -->
                <a href="/lista-reservas/reserva/<?= $reserva->getId() ?>" class="border bg-transparent rounded-lg py-3 px-5 <?= $isCompletedAndPast ? 'opacity-50' : '' ?> <?= $isCanceled ? 'opacity-50' : '' ?>">
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
                            <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Locador</p>
                            <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $locador->getNomeFantasia() ?></p>
                        </div>

                        <div class="flex flex-row text-wrap h-auto">
                            <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Quadra</p>
                            <p class="text-xs md:text-sm w-1/2 text-wrap text-right">
                                <?php echo $quadra->getIdentificador() . ' - ' . $quadra->getModalidade() ?>
                            </p>
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
    <?php } else { ?>
        <div class="flex items-center justify-center flex-col md:flex-row gap-10 justify-items-center h-full md:h-96">
            <div class="w-auto">
                <img class="size-auto" src="/imagens/icon.png">
            </div>
            <div class="text-wrap text-center justify-center items-center md:w-auto w-72">
                <p class="jersey text-5xl md:text-8xl text-purple-800 dark:text-amber-300 flex items-center text-center">Falta de Reservas</p>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    document.getElementById("filtro-partida").addEventListener("change", function() {
        const url = new URL(window.location.href);
        if (this.value) {
            url.searchParams.set('tipo_reserva', this.value);
        } else {
            url.searchParams.delete('tipo_reserva');
        }
        window.location.href = url.toString();
    });

    document.getElementById("filtro-status").addEventListener("change", function () {
        const url = new URL(window.location.href);
        if (this.value) {
            url.searchParams.set('status', this.value);
        } else {
            url.searchParams.delete('status');
        }
        window.location.href = url.toString();
    });
</script>
