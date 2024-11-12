<?php

use App\Helpers\Formatter;
?>

<div class="flex flex-col md:flex-row m-5 gap-8 h-auto md:h-screen w-auto mt-14 dark:bg-zinc-900 items-center">

    <div class="flex flex-col w-auto md:w-1/2 flex items-center">

        <h2 class="text-center mb-6 md:mb-8 text-4xl text-purple-800 dark:text-amber-300 font-semibold">Seu Perfil</h2>

        <div class="flex flex-col gap-8 h-auto items-center justify-center">

            <div class="flex items-center">
                <label class="picture rounded-lg" for="picture__input" tabIndex="0" id="picture__dropzone">
                    <span class="picture__image"></span>
                </label>
            </div>

            <input type="file" name="picture__input" id="picture__input">


            <div class="mt-[1px] mb-2 flex flex-col items-center justify-center">
                <h4 class="text-3xl mt-0 md:mb-2 font-semibold text-purple-800 dark:text-amber-300 text-center flex items-center">Quadra Nenezão</h4>

                <div class="flex flex-col gap-5 p-10 md:pt-8 md:p-14 pt-0 mt-10 md:mt-0">
                    <div>
                        <h4 class="text-blue-800 dark:text-slate-100 mb-3">Endereço</h4>
                        <p class="w-auto text-wrap">Parte Norte Do Patrimonio Muni - Rua Casemiro Kusbick, 1382 - Parte Norte Do Patrimonio, Foz do Iguaçu - PR, 85856-535</p>
                    </div>
                    <div class="flex flex-col md:flex-row text-left">
                        <h4 class="text-blue-800 dark:text-slate-100 mb-3">Telefone</h4>
                        <p class="m-0 md:ml-3">(45) 3523-1672</p>
                    </div>
                    <div class="w-auto mt-5 flex items-center justify-center md:justify-start">
                        <a href="/minhas-quadras" color="black" class="shadow-lg px-5 py-3 rounded-full border border-purple-700 dark:border-slate-950
                        text-slate-100 bg-purple-800 hover:bg-purple-900 focus:bg-violet-600 dark:bg-zinc-800 dark:hover:bg-zinc-950 dark:focus:bg-stone-950
                        transition-colors duration-300 ease-in-out
                        transform hover:scale-105 hover:shadow-lg dark:shadow dark:shadow-zinc-800">
                            Minhas quadras
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="mt-2 md:mt-5 w-auto md:w-[450px] mx-auto m-8 text-base">
        <h4 class="text-center text-2xl mb-5 font-semibold text-purple-800 dark:text-white">Horários para Locações</h4>
        <table class="table-auto border-collapse mt-14 w-auto md:w-full m">
            <thead>
                <tr class="">
                    <th class="text-left text-blue-800 dark:text-amber-300 py-3 pr-24 md:pr-0">Segunda</th>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">Terça</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">Quarta</td>
                    <td class="text-center md:text-center md:text-right py-3 align-middle pr-8 md:pr-0 text-rose-700 dark:text-orange-500">Fechado</td>
                    <td class="text-center md:text-center md:text-right py-3 align-middle pr-8 md:pr-0 text-rose-700 dark:text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">Quinta</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0 text-rose-700 dark:text-orange-500">Fechado</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0 text-rose-700 dark:text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">Sexta</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">Sábado</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0 text-rose-700 dark:text-orange-500">Fechado</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0 text-rose-700 dark:text-orange-500">Fechado</td>
                </tr>
                <tr class="border-t-2 border-slate-700">
                    <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">Domingo</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                    <td class="text-center md:text-right py-3 align-middle pr-8 md:pr-0">00:00</td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-center mt-8">
            <i class="fa-regular fa-pen-to-square" style="color: #be123c;"></i>
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
