<?php
use App\Helpers\Formatter;
?>

<div class="flex flex-col h-screen md:h-auto w-auto m-4 md:m-0 md:m-10 p-5 gap-10 md:gap-20 items-center justify-center">

        <p class="text-3xl text-purple-700 dark:text-amber-300 text-center font-bold mt-2 md:mt-8">Minhas Quadras</p>

    <div class="flex flex-wrap flex-row gap-6 md:gap-10 w-auto h-auto items-center justify-center">

        <?php

        foreach ($quadras as $quadra) { ?>
            <a href="/minhas-quadras/<?php echo $quadra->getId() ?>" class="w-40 md:w-[190px] gap-2 md:gap-3 h-auto md:h-auto border-2 border-gray-300 dark:border-slate-700 p-3 rounded-md h-64 hover:scale-110 transition-all flex flex-col text-wrap">
                <div class="p-3 bg-gray-200 dark:bg-slate-950 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#ffffff" class="w-auto h-auto" d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h4 class="dark:text-amber-300 text-wrap text-lg md:text-xl md:flex"><?php echo $quadra->getIdentificador() ?></h4>
                    <div class="flex flex-row text-wrap h-auto">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold w-1/2">Modalidade</p>
                        <p class="text-xs md:text-sm w-1/2 text-wrap text-right"><?php echo $quadra->getModalidade() ?></p>
                    </div>
                    <div class="flex flex-row relative">
                        <p class="text-blue-800 dark:text-slate-100 text-xs md:text-sm font-medium md:font-semibold">Tamanho</p>
                        <p class="text-xs md:text-sm absolute bottom-0 right-0"><?php echo $quadra->getTamanhoQuadra() ?></p>
                    </div>
                    <div class="flex flex-row relative">
                        <i class="fa-regular fa-pen-to-square mt-2 ml-[1px]" style="color: #be123c;"></i>
                        <p class="text-xs md:text-sm absolute bottom-0 right-0"><?php echo Formatter::formatCurrency($quadra->getValorAluguel()) ?></p>
                    </div>
                </div>
            </a>
        <?php } ?>

        <a href="/cadastro-quadras" class="border-2 border-gray-300 dark:border-slate-700 rounded-md h-64 md:h-80 w-40 md:w-[190px] flex justify-center items-center hover:scale-110 transition-all">
            <div class="bg-zinc-200 dark:bg-zinc-900 p-3 rounded-md">
                <i class="fa-regular fa-pen-to-square" style="color: #be123c;"></i>
            </div>
        </a>

    </div>
</div>
