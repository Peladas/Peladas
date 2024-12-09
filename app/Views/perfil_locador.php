<?php
use App\Enums\DiaSemanaEnum;
?>

<div class="flex flex-col md:flex-row gap-8 h-full w-auto mt-16 dark:bg-zinc-900 items-center">

    <div class="flex flex-col w-auto md:w-1/2 flex items-center">

        <h1 class="text-center my-6 md:mb-8 dark:text-amber-300 text-3xl">Seu Perfil</h1>

        <div class="flex flex-col gap-8 h-auto items-center justify-center">

            <div class="flex items-center">
                <label class="picture rounded-lg" for="picture__input" tabIndex="0" id="picture__dropzone">
                    <span class="picture__image"></span>
                </label>
            </div>

            <input type="file" name="picture__input" id="picture__input">


            <div class="mt-[1px] mb-2 flex flex-col items-center justify-center">
                <h1 class="text-2xl mt-0 md:mb-2 text-purple-800 dark:text-amber-300 text-center flex items-center">Quadra Nenezão</h1>

                <div class="flex flex-col gap-5 p-10 md:pt-8 md:p-14 pt-0 mt-10 md:mt-0">
                    <div>
                        <h4 class="text-blue-800 dark:text-amber-300 mb-3">Endereço</h4>
                        <p class="w-auto text-wrap">Parte Norte Do Patrimonio Muni - Rua Casemiro Kusbick, 1382 - Parte Norte Do Patrimonio, Foz do Iguaçu - PR, 85856-535</p>
                    </div>
                    <div class="flex flex-col md:flex-row text-left">
                        <h4 class="text-blue-800 dark:text-amber-300 mb-3">Telefone</h4>
                        <p class="m-0 md:ml-3">(45) 3523-1672</p>
                    </div>
                    <div class="w-auto mt-5 flex items-center justify-center md:justify-start">
                        <a href="/minhas-quadras" class="transform hover:scale-105 px-3 py-2 bg-transparent text-gray-700 border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300">
                            Minhas quadras
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="mt-2 md:mt-5 w-auto md:w-[450px] mx-auto m-8 text-base">
        <h1 class="text-center text-2xl mb-5 text-purple-800 dark:text-white">Horários para Locações</h1>

        <?php
            if (count($horarios)) {
        ?>
            <table class="table-auto border-collapse mt-14 w-auto md:w-full">
                <thead>
                    <tr>
                        <th class="text-left py-3 pr-24 md:pr-0">Dia</th>
                        <th class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">Início</th>
                        <th class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">Fim</th>
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
                        <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0"><?= $startTime ?></td>
                        <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0"><?= $endTime ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
            } else {
        ?>
            <div><p>Sem horários definidos</p></div>
        <?php
            }
        ?>


        <div class="flex justify-center mt-8">
            <a class="bg-none rounded" href="perfil-locador/editar-horario"><i class="fa-regular fa-pen-to-square" style="color: #be123c;"></i></a>
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
