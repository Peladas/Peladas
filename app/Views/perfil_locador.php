<?php

use App\Helpers\Formatter;
?>

<div class="flex flex-row m-10 gap-10 w-auto mt-12">

    <div class="flex flex-col w-2/4">
        <div class="flex flex-row gap-10 h-auto">

            <div class="relative border-2 border-slate-700 p-3 rounded-lg bg-slate-950 w-64 h-40 z-10 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" viewBox="0 0 576 512">
                    <path fill="#ffffff" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z" />
                </svg>
                <i class="fa-regular fa-pen-to-square absolute right-2 bottom-2 text-orange-500 text-xl z-40"></i>
            </div>
            <div class="mt-2">
                <h4 class="text-2xl mb-5 font-semibold">Quadra Nenezão</h4>
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

        <div class="mt-16">
            <h4 class="text-center text-2xl mb-5 font-semibold text-white">Horários para Locações</h4>
            <table class="flex flex-wrap table-auto border-collapse mt-10">
                <thead>
                    <tr>
                        <th class="w-48 text-center ml-20 text-yellow-500 ">Segunda</th>
                        <th class="w-48 text-center mr-20 text-yellow-500 py-3">terça</th>
                        <th class="w-48 text-center mr-20 text-yellow-500 py-3">Quarta</th>
                        <th class="w-48 text-center mr-20 text-yellow-500 py-3">Quinta</th>
                        <th class="w-48 text-center mr-20 text-yellow-500 py-3">Sexta</th>
                        <th class="w-48 text-center mr-20 text-yellow-500 py-3">Sábado</th>
                        <th class="w-48 text-center mr-20 text-yellow-500 py-3">Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="mr-10 text-center border-solid p-5">
                        <td class="text-center border-r py-4 text-white align-middle">00:00</td>
                        <td class="text-center py-4 align-middle">00:00</td>
                        <td class="text-center py-4 align-middle">00:00</td>
                        <td class="text-center py-4 align-middle text-orange-500">Fechado</td>
                        <td class="text-center py-4 align-middle">00:00</td>
                        <td class="text-center py-4 align-middle">00:00</td>
                        <td class="text-center py-4 align-middle">00:00</td>
                    </tr>
                    <tr class="mr-10 text-center border-solid p-5">
                        <td class="text-center border-r py-4 text-white align-middle">00:00</td>
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

    </div>


    <div class="w-2/4">
        <a href="/minhas-quadras" class="px-4 py-2 rounded text-black bg-amber-300 hover:bg-yellow-500 focus:bg-yellow-500 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:bg-yellow-500 transition-colors duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
            Minhas quadras
        </a>
    <div class="flex flex-wrap gap-10 w-2/4 w-16">

        <div onclick="window.location.href='/cadastro-quadras';" class="border-2 border-slate-700 rounded-md h-64 w-44 flex justify-center items-center hover:cursor-pointer hover:scale-110 transition-all">
            <div class="bg-zinc-900 p-3 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-8 w-8 text-black">
                    <path fill="#ffffff" d="M96 352L96 96c0-35.3 28.7-64 64-64l256 0c35.3 0 64 28.7 64 64l0 197.5c0 17-6.7 33.3-18.7 45.3l-58.5 58.5c-12 12-28.3 18.7-45.3 18.7L160 416c-35.3 0-64-28.7-64-64zM272 128c-8.8 0-16 7.2-16 16l0 48-48 0c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-48 48 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-48 0 0-48c0-8.8-7.2-16-16-16l-32 0zm24 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-160 0C60.9 512 0 451.1 0 376L0 152c0-13.3 10.7-24 24-24s24 10.7 24 24l0 224c0 48.6 39.4 88 88 88l160 0z" />
                </svg>
            </div>
        </div>

        <?php foreach ($quadras as $quadra) { ?>
            <div class="border-2 border-slate-700 p-3 rounded-md h-64 w-44">
                <div class="p-2 bg-slate-950 h-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#ffffff" style="width: auto;height:auto;" d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                    </svg>
                </div>
                <div class="w-auto h-20 mt-2">
                    <h4 class="text-amber-300 text-base"><?php echo $quadra->getIdentificador() ?></h4>
                    <div class="flex flex-row relative">
                        <p class="text-base font-medium">Tamanho:</p>
                        <p class="text-sm absolute bottom-0 right-0"><?php echo $quadra->getTamanhoQuadra() ?></p>
                    </div>
                    <div class="flex flex-row relative">
                        <i class="fa-regular fa-pen-to-square mt-2 ml-[1px]" style="color: #ff8000;"></i>
                        <p class="absolute bottom-0 right-0"><?php echo Formatter::formatCurrency($quadra->getValorAluguel()) ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>
