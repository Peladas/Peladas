<?php  //var_dump($quadra)
?>
<div class="flex justify-center items-center my-6">

    <div class="w-auto h-screen flex items-center jutify-center">

        <form action="#" method="post" class="flex flex-col">

            <div class="flex justify-center items-center text-3xl">
                <h1 class="mb-9 dark:text-amber-300">Edite os dados do seu perfil</h1>
            </div>

            <div class="relative flex flex-col gap-2 mb-4">
                <div class="relative">
                    <input disabled type="email" id="email" name="email" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                        value="<?php echo $user->getEmail() ?>" />
                    <label for="email" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        E-mail
                    </label>
                </div>
            </div>

            <div class="relative flex flex-col gap-2 mb-4">
                <div class="relative">
                    <input type="text" id="telefone" name="telefone" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                        value="<?php echo $user->getTelefone() ?>" />
                    <label for="telefone" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Telefone
                    </label>
                    <?php if (isset($errors['telefone'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['telefone'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="relative flex flex-col gap-2 mb-4">
                <input type="text" id="nome_jogador" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="nome_jogador" placeholder="Nome" value="<?php echo $jogador->getNomeJogador() ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Nome </label>

                <?php if (isset($errors['nome_jogador'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['nome_jogador'] ?></small>
                <?php } ?>
            </div>
            <div class=" relative flex flex-col gap-2 mb-4">
                <input type="text" id="apelido" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="apelido" placeholder="Apelido" value="<?php echo $jogador->getApelido() ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Apelido</label>

                <?php if (isset($errors['apelido'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['apelido'] ?></small>
                <?php } ?>
            </div>
            <div class="relative flex flex-col gap-2 mb-4">

                <input type="text" id="cpf" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="cpf" placeholder="CPF" value="<?php echo $jogador->getCpf() ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    CPF</label>

                <?php if (isset($errors['cpf'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['cpf'] ?></small>
                <?php } ?>
            </div>
            <div class="relative flex flex-col gap-2 mb-4">

                <input type="date" id="data_nascimento" class="peer w-80 md:w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" name="data_nascimento" placeholder="Data de Nascimento" value="<?php echo $jogador->getDataNascimento() ?>">
                <label for="text" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                    Data de Nascimento</label>

                <?php if (isset($errors['data_nascimento'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['data_nascimento'] ?></small>
                <?php } ?>
            </div>

            <div class="mx-auto">
                <button color="black" class="rounded-full border border-slate- mr-5 houver:bg-color focus:border-blue-400" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>
