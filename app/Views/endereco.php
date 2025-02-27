<div class="flex justify-center items-center h-screen md:m-auto">

    <form id="address-form" action="#" method="post" class="flex flex-col gap-3 md:w-[600px] md:mx-auto">

        <h1 class="pb-5 dark:text-yellow-300 text-3xl flex justify-center items-center">Cadastre seu Endereço</h1>

        <div class="relative">
            <input type="text" id="cep" name="cep" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                value="<?php echo $endereco ? $endereco->getCep() : '' ?>" />
            <label for="cep" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                CEP
            </label>
            <?php if (isset($errors['cep'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['cep'] ?></small>
            <?php } ?>
        </div>

        <div class="relative">

            <input type="text" id="estado" name="estado" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                value="<?php echo $endereco ? $endereco->getEstado() : '' ?>" />
            <label for="estado" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                Estado
            </label>
            <?php if (isset($errors['estado'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['estado'] ?></small>
            <?php } ?>
        </div>

        <div class="md:flex flex-row flex-wrap w-full md:gap-4">
            <div class="relative flex md:flex flex-row flex-col gap-2 flex-1">

                <input type="text" id="cidade" name="cidade" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                    value="<?php echo $endereco ? $endereco->getCidade() : '' ?>" />
                <label for="cidade" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Cidade </label>
                <?php if (isset($errors['cidade'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['cidade'] ?></small>
                <?php } ?>
            </div>

            <div class="relative md:gap-2 md:mb-4 flex-1 mt-2 md:mt-0">

                <input type="text" id="bairro" name="bairro" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                    value="<?php echo $endereco ? $endereco->getBairro() : '' ?>" />
                <label for="bairro" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">Bairro </label>
                <?php if (isset($errors['bairro'])) { ?>
                    <small class=" helper-text text-red-600 font-sm"><?php echo $errors['bairro'] ?></small>
                <?php } ?>

            </div>
        </div>

        <div class="md:flex flex-row flex-wrap w-full md:gap-4">
            <div class="relative flex md:flex flex-row flex-col gap-2 flex-1">

                <input type="text" id="rua" name="rua" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                    value="<?php echo $endereco ? $endereco->getRua() : '' ?>" />
                <label for="rua" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Rua/Avenida </label>
                <?php if (isset($errors['rua'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['rua'] ?></small>
                <?php } ?>
            </div>

            <div class="relative md:gap-2 md:mb-4 flex-1 mt-2 md:mt-0">

                <input type="text" id="numero" name="numero" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                    value="<?php echo $endereco ? $endereco->getNumero() : '' ?>"/>
                <label for="numero" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                Número </label>
                <?php if (isset($errors['numero'])) { ?>
                    <small class=" helper-text text-red-600 font-sm"><?php echo $errors['numero'] ?></small>
                <?php } ?>

            </div>
        </div>

        <div class="mt-4 flex justify-center md:justify-start">
            <!-- <a id="submit-address-form" href="#" onclick="submitAddressForm">Enviar</a> -->
            <button
                type="submit"
                class="rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
            >
                Enviar
        </button>
        </div>

    </form>
</div>

<!-- <script>
    const submitBtn = document.getElementById('submit-address-form');
    submitBtn.addEventListener('click', (ev) => {
        ev.preventDefault();
        const formElement = document.getElementById('address-form');
        formElement.submit();
    });
</script> -->
