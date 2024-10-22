<div class="flex flex-col items-center justify-center justify-items-center justify-self-center min-h-screen dark:bg-zinc-900">
    <div class="text-purple-700 dark:text-amber-300 text-2xl font-bold capitalize text-center md:mt-5">
        <h4 class="dark:text-amber-300">Perfil do Usuário</h4>
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

        <!-- -->

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="nome" name="nome" class="peer w-full h-10 px-2 border-2 dark:border-b-2 dark:border-amber-300 dark:focus:border-amber-200 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                    <label for="nome" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Nome
                    </label>
                    <?php if (isset($errors['nome'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['nome'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="usuario" name="usuario" class="peer w-full h-10 px-2 border-2 dark:border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                    <label for="usuario" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Nome de Usuário
                    </label>
                    <?php if (isset($errors['usuario'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['usuario'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="date" id="data_nascimento" name="data_nascimento" class="peer w-full h-10 px-2 border-2 dark:border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                    <label for="data_nascimento" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Data de Nascimento
                    </label>
                    <?php if (isset($errors['data_nascimento'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['data_nascimento'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="cpf" name="cpf" class="peer w-full h-10 px-2 border-2 dark:border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                    <label for="cpf" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        CPF
                    </label>
                    <?php if (isset($errors['cpf'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['cpf'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="telefone" name="telefone" class="peer w-full h-10 px-2 border-2 dark:border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                    <label for="telefone" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Telefone
                    </label>
                    <?php if (isset($errors['telefone'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['telefone'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="email" name="email" class="peer w-full h-10 px-2 border-2 dark:border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                    <label for="email" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        E-mail
                    </label>
                    <?php if (isset($errors['email'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
                    <?php } ?>
                </div>
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
