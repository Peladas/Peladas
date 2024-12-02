<div class="flex justify-center items-center h-screen md:m-auto">

    <form action="#" method="post" class="flex flex-col gap-3 md:w-[600px] md:mx-auto" onload="cha">

        <legend class="mb-4 dark:text-yellow-300">Faça seu cadastro</legend>

        <div class="relative">
            <input type="email" id="email" name="email" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                value="<?php echo $data['email'] ?? '' ?>" />
            <label for="email" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                E-mail
            </label>
            <?php if (isset($errors['email'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
            <?php } ?>
        </div>

        <div class="relative">

            <input type="text" id="phone" name="phone" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                value="<?php echo $data['phone'] ?? '' ?>" />
            <label for="phone" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                Telefone
            </label>
            <?php if (isset($errors['phone'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['phone'] ?></small>
            <?php } ?>
        </div>

        <div class="md:flex flex-row flex-wrap w-full md:gap-4">
            <div class="relative flex md:flex flex-row flex-col gap-2 flex-1">

                <input type="password" id="password1" name="password1" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                    value="<?php echo $data['password1'] ?? '' ?>" />
                <label for="password1" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Senha </label>
                <?php if (isset($errors['password1'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['password1'] ?></small>
                <?php } ?>
            </div>

            <div class="relative md:gap-2 md:mb-4 flex-1 mt-2 md:mt-0">

                <input type="password" id="password2" name="password2" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " />
                <label for="password2" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                Confirmar Senha </label>
                <?php if (isset($errors['password2'])) { ?>
                    <small class=" helper-text text-red-600 font-sm"><?php echo $errors['password2'] ?></small>
                <?php } ?>

            </div>
        </div>

        <div class="flex items-center gap-6 mt-3 md:mt-0">
            <label class="text-purple-600 dark:text-yellow-300 text-base font-semibold" user_type">Tipo de usuário</label>
            <div>
                <input type="radio" name="user_type" value="jogador" class="accent-purple-950"
                    onclick="changeUserType(this)" <?= isset($data['user_type']) && $data['user_type'] == 'jogador' ? 'checked' : '' ?>> Jogador
            </div>
            <div>
                <input type="radio" name="user_type" value="locador" class="accent-purple-950"
                    onclick="changeUserType(this)" <?= isset($data['user_type']) && $data['user_type'] == 'locador' ? 'checked' : '' ?>> Locador
            </div>
        </div>
        <div>
            <?php if (isset($errors['user_type'])): ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['user_type'] ?></small>
            <?php endif; ?>
        </div>

        <div class="<?= ((! isset($data['user_type'])) or $data['user_type'] == 'locador') ? 'hidden' : '' ?> w-full mt-6"
            id="cadastro-jogador">

            <div class="relative flex flex-col gap-2 mb-4">

                <input type="text" id="jogador-name" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="jogador-name" placeholder="Nome" value="<?php echo $data['jogador-name'] ?? '' ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Nome </label>

                <?php if (isset($errors['jogador-name'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['jogador-name'] ?></small>
                <?php } ?>
            </div>
            <div class=" relative flex flex-col gap-2 mb-4">

                <input type="text" id="jogador-alias" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="jogador-alias" placeholder="Apelido" value="<?php echo $data['jogador-alias'] ?? '' ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Apelido</label>

                <?php if (isset($errors['jogador-alias'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['jogador-alias'] ?></small>
                <?php } ?>
            </div>
            <div class="relative flex flex-col gap-2 mb-4">

                <input type="text" id="cpf" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="cpf" placeholder="CPF" value="<?php echo $data['cpf'] ?? '' ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    CPF</label>

                <?php if (isset($errors['cpf'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['cpf'] ?></small>
                <?php } ?>
            </div>
            <div class="relative flex flex-col gap-2 mb-4">

                <input type="date" id="birthday" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="birthday" placeholder="Data" value="<?php echo $data['birthday'] ?? '' ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Data de Nascimento</label>

                <?php if (isset($errors['birthday'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['birthday'] ?></small>
                <?php } ?>
            </div>

        </div>
        <div class="<?= ((! isset($data['user_type'])) or $data['user_type'] == 'jogador') ? 'hidden' : '' ?> w-80 md:w-full mt-6" id="cadastro-locador">
            <div class="flex flex-col gap-2 mb-4">

                <input type="text" id="locador-name" name="locador-name" placeholder="Razão Social" value="<?php echo $data['locador-name'] ?? '' ?>">
                <?php if (isset($errors['locador-name'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['locador-name'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">

                <input type="text" id="locador-alias" name="locador-alias" placeholder="Nome Fantasia" value="<?php echo $data['locador-alias'] ?? '' ?>">
                <?php if (isset($errors['locador-alias'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['locador-alias'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">

                <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" value="<?php echo $data['cnpj'] ?? '' ?>">
                <?php if (isset($errors['cnpj'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['cnpj'] ?></small>
                <?php } ?>
            </div>

        </div>

        <div class="md:text-left text-center">
            <p class="signin">Já tem uma conta? <a href="#" class="dark:text-amber-500 text-blue-800" onclick="window.location.href='/login';">Faça Login</a> </p>
        </div>

        <div class="mt-4 flex justify-center md:justify-start">
            <button color="black" class="rounded-full border border-slate- mr-5 houver:bg-color focus:border-blue-400" type="submit">Enviar</button>
            <!--<button color="black" class="rounded-full border border-slate- mr-5 houver:bg-color focus:border-blue-400" href="home.php">Voltar</button>-->
        </div>

    </form>
</div>

<script>
    function changeUserType(radio) {
        const divJogador = document.getElementById('cadastro-jogador');
        const divLocador = document.getElementById('cadastro-locador');
        const jogadorName = document.getElementById('jogador-name');
        const jogadorAlias = document.getElementById('jogador-alias');
        const cpf = document.getElementById('cpf');
        const birthday = document.getElementById('birthday');
        const locadorName = document.getElementById('locador-name');
        const locadorAlias = document.getElementById('locador-alias');
        const cnpj = document.getElementById('cnpj');
        if (radio.checked && radio.value === 'jogador') {
            divLocador.classList.add('hidden');
            divJogador.classList.remove('hidden');
            jogadorName = true;
            jogadorAlias = true;
            cpf = true;
            birthday = true;
            locadorName = false;
            locadorAlias = false;
            cnpj = false;
        } else {
            divJogador.classList.add('hidden');
            divLocador.classList.remove('hidden');
            jogadorName = false;
            jogadorAlias = false;
            cpf = false;
            birthday = false;
            locadorName = true;
            locadorAlias = true;
            cnpj = true;

        }
    }
</script>
