<?php

use App\Enums\PartidaTypeEnum;
use App\Enums\ReservaStatusEnum;
use App\Helpers\Formatter;

?>

<div class="h-full flex flex-col justify-center gap-5">
    <h1 class="dark:text-amber-300 mb-5 md:mb-10 text-center text-2xl">Dados da Quadra Reservada</h1>
    <div class="flex flex-col md:flex-row gap-5 items-center justify-center m-10 mt-0 md:m-0">
        <div>
            <div class="border-2 border-gray-300 dark:border-slate-700 p-4 rounded-lg bg-gray-200 dark:bg-slate-950 w-56 md:w-72 h-64 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" viewBox="0 0 576 512">
                    <path fill="#ffffff" style="width: auto; height:auto" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z" />
                </svg>
            </div>
        </div>

        <div class="flex flex-col gap-4 w-full md:w-auto md:ml-12 mt-5 md:mt-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full md:w-96">
                <p>
                    <span class="text-blue-800 dark:text-amber-300">Tipo:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getIdentificador() ?></span>
                </p>
                <p class="text-left md:text-right">
                    <span class="text-blue-800 dark:text-amber-300">Modalidade:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getModalidade() ?></span>
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full md:w-96">
                <p>
                    <span class="text-blue-800 dark:text-amber-300">Tamanho:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getTamanhoQuadra() ?></span>
                </p>
                <p class="text-left md:text-right">
                    <span class="text-blue-800 dark:text-amber-300">Valor:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo Formatter::valueReais($quadra->getValorAluguel()) ?></span>
                </p>
            </div>
            <div class="grid grid-cols-1 gap-3 w-full md:w-96">
                <p>
                    <span class="text-blue-800 dark:text-amber-300">Quantidade máxima de jogadores:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getQuantMaxJogadores() ?></span>
                </p>
            </div>
            <p>
                <span class="text-blue-800 dark:text-amber-300">Descrição:</span>
                <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getDescricao() ?></span>
            </p>
        </div>
    </div>

    <h1 class="my-8 text-2xl text-center dark:text-amber-300">Dados da Reserva</h1>
    <div class="flex flex-col md:flex-row justify-center items-center justify-items-center">

        <div class="flex flex-col gap-6 justify-center items-center">

            <div class="flex flex-col md:flex-row itemns-center justify-center">
                <div class="border-[1px] border-gray-300 p-4 rounded-lg bg-gray-200 dark:bg-zinc-900 w-56 md:w-48 h-48 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" viewBox="0 0 576 512">
                        <path fill="#ffffff" style="width: auto; height:auto" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z" />
                    </svg>
                </div>
            </div>

            <div class="flex flex-col gap-6 w-80 m-3 text-wrap">
                <div class="gap-3 w-full md:w-96">
                    <p>
                        <span class="text-blue-800 dark:text-amber-300">Tipo de partida:</span>
                        <span class="text-slate-800 dark:text-slate-100"><?= PartidaTypeEnum::getName($reserva->getTipoReserva()) ?></span>
                    </p>
                </div>
                <div class="gap-3 text-wrap">
                    <p>
                        <span class="text-blue-800 dark:text-amber-300">Data da partida:</span>
                        <span class="text-slate-800 dark:text-slate-100"><?php echo $reserva->getDataReserva() ?></span>
                    </p>
                </div>
                <div class="w-full md:w-96">
                    <p>
                        <span class="text-blue-800 dark:text-amber-300">Horário da partida:</span>
                        <span class="text-slate-800 dark:text-slate-100"><?php echo $reserva->getHorarioReservado() ?></span>
                    </p>
                </div>
                <?php
                if ($usuario !== 'locador' && $reserva->getStatus() === ReservaStatusEnum::PENDING) {
                ?>
                <div class="flex gap-8 items-center justify-center md:justify-start mt-4">
                    <a id="botaoLink" href="#" onclick="confirmCancelation()" class="transform hover:scale-105 px-3 py-2 bg-transparent text-gray-700 border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300">
                        Cancelar Reserva
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmCancelation() {
        const cancelar = confirm("Deseja mesmo cancelar a reserva?");

        if (cancelar) {
            fetch('/cancelar-reserva/<?php echo $reserva->getId() ?>', {
                    method: 'POST'
                })
                .then(() => {
                    alert("Reserva cancelada com sucesso")
                })
                .catch((error) => {
                    alert(`Error: ${error.message}`)
                })
        }
    }
</script>
