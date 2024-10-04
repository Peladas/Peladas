<?php

use App\Helpers\Formatter;
?>

<div class="flex flex-row m-10 gap-10 w-auto mt-5">

    <div class="flex flex-col w-2/4">
        <div class="flex flex-col gap-16 h-auto">

            <div class="relative border-2 border-slate-700 p-3 rounded-lg bg-slate-950 w-40 h-40 z-10 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" viewBox="0 0 576 512">
                    <path fill="#ffffff" style="width: auto; height:auto" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z" />
                </svg>
                <i class="fa-regular fa-pen-to-square absolute right-2 bottom-2 text-orange-500 text-xl z-40"></i>
            </div>

            <div class="mt-2 pr-10">
                <h4 class="text-3xl mb-5 font-semibold">Quadra Nenezão</h4>
                <div>
                    <h4 class="text-slate-100">Endereço</h4>
                    <p class="mb-3 text-amber-300">Parte Norte Do Patrimonio Muni - Rua Casemiro Kusbick, 1382 - Parte Norte Do Patrimonio, Foz do Iguaçu - PR, 85856-535</p>
                </div>
                <div>
                    <h4 class="text-slate-100">Telefone</h4>
                    <p class="text-amber-300">Telefone: (45) 3523-1672</p>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5 w-1/2">
    <h4 class="text-center text-2xl mb-5 font-semibold text-white">Horários para Locações</h4>
    <table class="table-auto border-collapse mt-10">
        <thead>
            <tr>
                <th class="w-48 text-center text-yellow-500 py-3">Horários</th>
                <th class="w-48 text-center text-yellow-500 py-3">Segunda</th>
                <th class="w-48 text-center text-yellow-500 py-3">Terça</th>
                <th class="w-48 text-center text-yellow-500 py-3">Quarta</th>
                <th class="w-48 text-center text-yellow-500 py-3">Quinta</th>
                <th class="w-48 text-center text-yellow-500 py-3">Sexta</th>
                <th class="w-48 text-center text-yellow-500 py-3">Sábado</th>
                <th class="w-48 text-center text-yellow-500 py-3">Domingo</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center border-solid p-5">
                <td class="text-center py-4 text-white">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle text-orange-500">Fechado</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
            </tr>
            <tr class="text-center border-solid p-5">
                <td class="text-center py-4 text-white">01:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle text-orange-500">Fechado</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle">00:00</td>
                <td class="text-center py-4 align-middle text-orange-500">Fechado</td>
                <td class="text-center py-4 align-middle">00:00</td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-center mt-8">
        <i class="fa-regular fa-pen-to-square" style="color: #ff8000;"></i>
    </div>
</div>



    <!--<div class="w-2/4">
        <a href="/minhas-quadras" class="px-4 py-2 rounded text-black bg-amber-300 hover:bg-yellow-500 focus:bg-yellow-500 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:bg-yellow-500 transition-colors duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
            Minhas quadras
        </a>
    </div>-->

</div>
