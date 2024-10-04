<?php
use App\Helpers\Formatter;
?>

<div class="flex flex-wrap gap-10 w-2/4">

    <a href="/cadastro-quadras" class="border-2 border-slate-700 rounded-md h-64 w-44 flex justify-center items-center hover:scale-110 transition-all">
        <div class="bg-zinc-900 p-3 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-8 w-8 text-black">
                <path fill="#ffffff" d="M96 352L96 96c0-35.3 28.7-64 64-64l256 0c35.3 0 64 28.7 64 64l0 197.5c0 17-6.7 33.3-18.7 45.3l-58.5 58.5c-12 12-28.3 18.7-45.3 18.7L160 416c-35.3 0-64-28.7-64-64zM272 128c-8.8 0-16 7.2-16 16l0 48-48 0c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-48 48 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-48 0 0-48c0-8.8-7.2-16-16-16l-32 0zm24 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-160 0C60.9 512 0 451.1 0 376L0 152c0-13.3 10.7-24 24-24s24 10.7 24 24l0 224c0 48.6 39.4 88 88 88l160 0z" />
            </svg>
        </div>
    </a>

    <?php

    foreach ($quadras as $quadra) { ?>
        <a href="/minhas-quadras/<?php echo $quadra->getId() ?>" class="border-2 border-slate-700 p-3 rounded-md  h-64 hover:scale-110 transition-all">
            <div class="p-3 bg-slate-950">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff" style="width: auto;height:auto" d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                </svg>
            </div>
            <div>
                <h4 class="text-amber-300 text-lg"><?php echo $quadra->getIdentificador() ?></h4>
                <p class="text-sm">Tamanho: <?php echo $quadra->getTamanhoQuadra() ?></p>
                <div class="flex flex-row">
                    <i class="fa-regular fa-pen-to-square" style="color: #ff8000;"></i>
                    <p><?php echo Formatter::formatCurrency($quadra->getValorAluguel()) ?></p>
                </div>
            </div>
        </a>
    <?php } ?>

</div>
