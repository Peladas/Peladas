<?php

use App\Helpers\Formatter;
?>

<div class="flex flex-col items-center justify-center min-h-screen dark:bg-zinc-900 py-20 gap-5">

    <div class="text-purple-700 dark:text-amber-300 text-3xl capitalize text-center md:mt-5">

        <h1 class="dark:text-amber-300"><?= htmlspecialchars($jogador->getApelido()) ?></h1>
    </div>

    <div class="flex flex-col items-center text-center justify-items-center w-3/5 p-5">
        <form action="#" method="post" class="items-center">

            <div class="flex flex-col gap-2 mb-10 mt-5 md:mt-auto md:mb-5 items-center">
                <label class="text-wrap picture rounded-lg flex flex-col items-center justify-center bg-gray-200 dark:bg-zinc-900 dark:focus:bg-purple-950 cursor-pointer" for="picture__input" tabIndex="0" id="picture__dropzone">
                    <span class="picture__image"></span>
                </label>
                <input type="file" name="picture__input" id="picture__input">
            </div>

            <div class="my-20">

            <table class="table-auto border-collapse border-none dark:border-none w-96 mx-full">
                <tbody>
                    <tr>
                        <th class="border border-gray-300 dark:border-none px-4 py-2 text-blue-800 dark:text-amber-300 text-left">Nome</th>
                        <td class="border border-gray-300 dark:border-none px-4 py-2 text-right"><?= htmlspecialchars($jogador->getNomeJogador()) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 dark:border-none px-4 py-2 text-blue-800 dark:text-amber-300 text-left">Email</th>
                        <td class="border border-gray-300 dark:border-none px-4 py-2 text-right"><?= htmlspecialchars($user->getEmail()) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 dark:border-none px-4 py-2 text-blue-800 dark:text-amber-300 text-left">Telefone</th>
                        <td class="border border-gray-300 dark:border-none px-4 py-2 text-right"><?= Formatter::formatPhoneNumber(htmlspecialchars($telefone ?? '-')) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 dark:border-none px-4 py-2 text-blue-800 dark:text-amber-300 text-left">CPF</th>
                        <td class="border border-gray-300 dark:border-none px-4 py-2 text-right"><?= htmlspecialchars(Formatter::formatCPF($jogador->getCpf() ?? '-')) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 dark:border-none px-4 py-2 text-blue-800 dark:text-amber-300 text-left">Data de Nascimento</th>
                        <td class="border border-gray-300 dark:border-none px-4 py-2 text-right"><?= htmlspecialchars(Formatter::formatBirthDate($jogador->getDataNascimento())) ?></td>
                    </tr>
                </tbody>
            </table>

            </div>


            <div class="flex justify-center items-center">
                <a id="botaoLink">Editar Informações</a>
            </div>
        </form>
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
