<?php

use App\Helpers\Formatter;
?>

<div class="flex flex-row m-5 gap-8 h-auto w-auto mt-14">

    <div class="flex flex-col w-1/2 h-auto">
        <div class="flex flex-col gap-10 h-auto items-center">

            <div class="relative border-2 border-slate-700 p-3 rounded-lg bg-slate-950 w-44 h-44 z-10 mr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" viewBox="0 0 576 512">
                    <path fill="#ffffff" style="width: auto; height:auto" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z" />
                </svg>
                <i class="fa-regular fa-pen-to-square absolute right-2 bottom-2 text-orange-500 text-xl z-40"></i>
            </div>

            <div class="mt-[1px] pr-10 mb-2">
                <h4 class="text-3xl mt-0 mb-12 font-semibold text-center">Quadra Nenezão</h4>
                <div class="flex flex-col gap-5 p-14 pt-0">
                    <div>
                        <h4 class="text-slate-100 mb-3">Endereço</h4>
                        <p class="text-amber-300">Parte Norte Do Patrimonio Muni - Rua Casemiro Kusbick, 1382 - Parte Norte Do Patrimonio, Foz do Iguaçu - PR, 85856-535</p>
                    </div>
                    <div class="flex flex-row">
                        <h4 class="text-slate-100 mb-3">Telefone</h4>
                        <p class="ml-3 text-amber-300">(45) 3523-1672</p>
                    </div>
                    <div class="w-auto mt-5">
                        <a href="/minhas-quadras" color="black" class="px-4 py-2 rounded-full border border-slate-100 text-slate-100 bg-stone-900 hover:bg-stone-950 focus:bg-stone-950 dark:bg-stone-900 dark:hover:bg-zinc-950 dark:focus:bg-stone-950 transition-colors duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                            Minhas quadras
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="mt-5 w-96 mx-auto m-8 text-base">
        <h4 class="text-center text-2xl mb-5 font-semibold text-white">Horários para Locações</h4>
        <table class="table-auto border-collapse mt-10 w-full">
            <thead>
                <tr>
                    <th class="text-left text-yellow-500 py-3">Segunda</th>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Terça</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Quarta</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Quinta</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Sexta</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Sábado</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Domingo</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-center mt-8">
            <i class="fa-regular fa-pen-to-square" style="color: #ff8000;"></i>
        </div>
    </div>




</div>
