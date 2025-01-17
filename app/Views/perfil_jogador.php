<?php
use App\Helpers\Formatter;
?>

<div class="flex flex-col items-center justify-center min-h-screen dark:bg-zinc-900 py-20 gap-5">
    <div class="text-purple-700 dark:text-amber-300 text-3xl capitalize text-center md:mt-5">
        <h1 class="dark:text-amber-300"><?= htmlspecialchars($jogador->getNomeJogador()) ?></h1>
    </div>

    <div class="flex flex-col justify-items-center w-3/5 p-5">

        <form action="#" method="post" class="items-center">

        <!-- Image -->
            <div class="flex flex-col gap-2 mb-10 mt-5 md:mt-auto md:mb-5 items-center">

                <label class="picture rounded-lg flex flex-col items-center justify-center w-32 h-32 bg-gray-200 dark:bg-zinc-900 dark:focus:bg-purple-950 cursor-pointer" for="picture__input" tabIndex="0" id="picture__dropzone">
                    <span class="picture__image"></span>
                </label>

                <input type="file" name="picture__input" id="picture__input">
            </div>


            <div class="flex flex-col md:flex-row md:text-left">
                <h4 class="text-blue-800 dark:text-amber-300 mb-3">Email</h4>
                <p class="m-0 md:ml-3"><?= htmlspecialchars($user->getEmail()) ?></p>
            </div>

            <div class="flex flex-col md:flex-row md:text-left">
                <h4 class="text-blue-800 dark:text-amber-300 mb-3">Telefone</h4>
                <p class="m-0 md:ml-3"><?= Formatter::formatPhoneNumber(htmlspecialchars($telefone ?? '-')) ?></p>
            </div>

            <div class="flex flex-col md:flex-row md:text-left">
                <h4 class="text-blue-800 dark:text-amber-300 mb-3">Apelido</h4>
                <p class="m-0 md:ml-3"><?= htmlspecialchars($jogador->getApelido()) ?></p>
            </div>

            <div class="flex flex-col md:flex-row md:text-left">
                <h4 class="text-blue-800 dark:text-amber-300 mb-3">CPF</h4>
                <p class="m-0 md:ml-3"><?= htmlspecialchars($jogador->getCpf()) ?></p>
            </div>

            <div class="flex flex-col md:flex-row md:text-left">
                <h4 class="text-blue-800 dark:text-amber-300 mb-3">Data de Nascimento</h4>
                <p class="m-0 md:ml-3"><?= htmlspecialchars($jogador->getDataNascimento()) ?></p>
            </div>

            <div class="flex justify-center items-center mt-10">
                <button class="border-2 text-center" color="black">Editar Informações</button>
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
