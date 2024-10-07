<?php

use App\Helpers\Formatter;
?>

<div class="flex flex-row m-5 gap-8 h-auto w-auto mt-14">

    <div class="flex flex-col w-1/2 h-auto">
        <div class="flex flex-col gap-10 h-auto items-center">

            <label class="picture rounded-lg z-10 mr-10" for="picture__input" tabIndex="0" id="picture__dropzone">
                <span class="picture__image"></span>
            </label>

            <input type="file" name="picture__input" id="picture__input">


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

    <div class="mt-5 w-[450px] mx-auto m-8 text-base">
        <h4 class="text-center text-2xl mb-5 font-semibold text-white">Horários para Locações</h4>
        <table class="table-auto border-collapse mt-14 w-full">
            <thead>
                <tr>
                    <th class="text-left text-yellow-500 py-3">Segunda</th>
                    <td class="text-right py-3 align-middle">00:00</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Terça</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Quarta</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Quinta</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Sexta</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Sábado</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                    <td class="text-right py-3 align-middle text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-yellow-500 py-3 font-bold">Domingo</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                    <td class="text-right py-3 align-middle">00:00</td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-center mt-8">
            <i class="fa-regular fa-pen-to-square" style="color: #ff8000;"></i>
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
