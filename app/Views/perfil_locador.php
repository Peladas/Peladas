<?php
use App\Enums\DiaSemanaEnum;
use App\Helpers\Formatter;

?>

<div class="flex flex-col md:flex-row gap-8 md:h-screen w-auto mt-16 dark:bg-zinc-900 items-center">

    <div class="flex flex-col w-auto md:w-1/2 flex items-center">

        <h1 class="text-center md:mb-8 text-2xl dark:text-amber-300">Seu Perfil</h1>

        <div class="flex flex-col gap-8 h-auto items-center justify-center">

            <div class="flex items-center">
                <label class="picture rounded-lg" for="picture__input" tabIndex="0" id="picture__dropzone">
                    <span class="picture__image"></span>
                </label>
            </div>

            <input type="file" name="picture__input" id="picture__input">

            <div class="mt-[1px] mb-2 flex flex-col items-center justify-center w-3/4">
                <h1 class="text-2xl mt-0 md:mb-2 dark:text-amber-300 text-center flex items-center"><?= $locador->getNomeFantasia()?></h1>

                <?php if ($endereco): ?>
                    <div class="flex flex-col gap-5 p-10 md:pt-8 md:p-14 pt-0 mt-5 md:mt-0 text-center md:text-left">
                        <div class="flex flex-col md:flex-row gap-5">
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
                        <div class="flex items-center justify-center">
                            <a href="perfil-locador/editar-endereco" id="botaoLink"> <i class="fa-regular fa-pen-to-square bg-transparent" style="color: #ffffff; padding-top: 2px; padding-bottom: 2px; border-radius: 9999px;"></i></a>
                        </div>

                        <div class="flex flex-col md:flex-row md:text-left">
                            <h4 class="text-blue-800 dark:text-amber-300 mb-3">Telefone</h4>
                            <p class="m-0 md:ml-6"><?= Formatter::formatPhoneNumber(htmlspecialchars($telefone ?? '-')) ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col items-center justify-center gap-5">

                    <div class="mt-5">
                        <p class="text-center text-red-500">Você ainda não cadastrou um endereço.</p>
                        <div class="w-auto mt-5 text-center">
                            <a href="/perfil-locador/editar-endereco" id="botaoLink">
                                Cadastrar Endereço
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="w-auto flex items-center justify-center flex-col">
                        <a id="botaoLink" href="/minhas-quadras">
                            Minhas quadras
                        </a>
                    </div>

                    </div>


                </div>
            </div>
            <div class="flex flex items-center justify-center text-center flex-col w-1/2 mt-16 md:mt-0">
            <h1 class="flex flex itemns-center text-center text-2xl mb-5 dark:text-amber-300">Horários para Locações</h1>
            <?php
            if (count($horarios)) {
        ?>

            <table class="table-auto border-collapse mt-14 w-auto md:w-96">
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

        <div class="flex justify-center mt-8 mb-10">
            <!--<a class="bg-none rounded" href="perfil-locador/editar-horario"><i class="fa-regular fa-pen-to-square" style="color: #be123c;"></i></a>-->
            <a id="botaoLink" href="perfil-locador/editar-horario">Incluir Horários</a>
        </div>

        </div>
        </div>


    </div>
</div>

<script>
    const inputFile = document.querySelector("#picture__input");
    const pictureImage = document.querySelector(".picture__image");
    const pictureDropzone = document.querySelector("#picture__dropzone");
    const pictureImageTxt = "Choose or drag an image";
    pictureImage.innerHTML = pictureImageTxt;

    function displayImage(file) {
        const reader = new FileReader();

        reader.addEventListener("load", function(e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.classList.add("picture__img");

            pictureImage.innerHTML = "";
            pictureImage.appendChild(img);
        });

        reader.readAsDataURL(file);
    }


    inputFile.addEventListener("change", function(e) {
        const file = e.target.files[0];
        if (file) {
            displayImage(file);
        } else {
            pictureImage.innerHTML = pictureImageTxt;
        }
    });


    pictureDropzone.addEventListener("dragover", function(e) {
        e.preventDefault();
        pictureDropzone.classList.add("picture--hover");
    });

    pictureDropzone.addEventListener("dragleave", function() {
        pictureDropzone.classList.remove("picture--hover");
    });

    pictureDropzone.addEventListener("drop", function(e) {
        e.preventDefault(); // Previne comportamento padrão
        pictureDropzone.classList.remove("picture--hover");

        const file = e.dataTransfer.files[0];
        if (file) {
            displayImage(file);
        }
    });
</script>
