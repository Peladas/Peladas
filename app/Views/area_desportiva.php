<?php
use App\Enums\DiaSemanaEnum;
use App\Helpers\Formatter;
?>

<div class="flex flex-col md:flex-row gap-8 h-full w-auto mt-16 dark:bg-zinc-900 items-center">

    <div class="flex flex-col w-auto md:w-1/2 items-center">

        <h1 class="text-center my-6 md:mb-8 dark:text-amber-300 text-3xl"><?= $locador->getNomeFantasia() ?></h1>

        <div class="flex flex-col gap-8 h-auto items-center justify-center">

            <!-- Colocar foto padrão enquanto não temos sistema de cadastro de imagem -->

            <div class="mt-[1px] mb-2 flex flex-col items-center justify-center">
                <div class="flex flex-col gap-5 p-10 md:pt-8 md:p-14 pt-0 mt-10 md:mt-0">
                    <div>
                        <h4 class="text-blue-800 dark:text-amber-300 mb-3">Endereço</h4>
                        <p class="w-auto text-wrap">
                            <?= htmlspecialchars($endereco->getRua()) ?>,
                            <?= htmlspecialchars($endereco->getNumero()) ?> -
                            <?= htmlspecialchars($endereco->getBairro()) ?>,
                            <?= htmlspecialchars($endereco->getCidade()) ?> -
                            <?= htmlspecialchars($endereco->getEstado()) ?>,
                            <?= Formatter::formatCEP(htmlspecialchars($endereco->getCep() ?? '-')) ?>
                        </p>
                    </div>
                    <div class="flex flex-col md:flex-row text-left">
                        <h4 class="text-blue-800 dark:text-amber-300 mb-3">Telefone</h4>
                        <p class="m-0 md:ml-3"><?= Formatter::formatPhoneNumber(htmlspecialchars($telefone ?? '-')) ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-2 md:mt-5 w-auto md:w-[450px] mx-auto m-8 text-base">
        <h1 class="text-center text-2xl mb-5 dark:text-amber-300">Horários para Locações</h1>

        <?php
            if (count($horarios)) {
        ?>
            <table class="table-auto border-collapse mt-14 w-auto md:w-full">
                <thead>
                    <tr>
                        <th class="text-left py-3 pr-24 md:pr-0">Dia</th>
                        <th class="text-center py-3 align-middle pr-8 md:pr-0">Início</th>
                        <th class="text-center py-3 align-middle pr-8 md:pr-0">Fim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 7; $i++) {
                        $dia = array_filter($horarios, function ($horario) use ($i) {
                            return $horario->getDiaSemana() == $i;
                        });
                        $dia = array_shift($dia);
                        $startTime = $dia ? $dia->getHoraInicio() : '-';
                        $endTime = $dia ? $dia->getHoraFim() : '-';
                    ?>
                    <tr class="border-t-2 border-slate-700">
                        <td class="text-left text-blue-800 dark:text-amber-300 py-3 pr-12 md:pr-24"><?= DiaSemanaEnum::getName($i) ?></td>
                        <td class="text-center py-3 align-middle pr-8 md:pr-0"><?= $startTime ?></td>
                        <td class="text-center py-3 align-middle pr-8 md:pr-0"><?= $endTime ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
            } else {
        ?>
            <div class="flex items-center justify-center">
                <p>Sem horários definidos</p>
            </div>
        <?php
            }
        ?>

    </div>

    <div>
        <div class="flex flex-wrap flex-row0 gap-6 md:gap-10 w-auto items-center justify-center">
            <?php

            foreach ($quadras as $quadra) { ?>
                <a href="/areas-desportivas/<?= $locador->getId() ?>/quadra/<?= $quadra->getId() ?>" class="w-40 md:w-[190px] gap-2 md:gap-3 h-auto md:h-auto border-2 border-gray-300 dark:border-slate-700 p-3 rounded-md h-64 hover:scale-110 transition-all flex flex-col text-wrap dark:bg-zinc-900">
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
                            <p class="text-xs md:text-sm absolute bottom-0 right-0"><?php echo Formatter::formatCurrency($quadra->getValorAluguel()) ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>
    </div>
</div>
