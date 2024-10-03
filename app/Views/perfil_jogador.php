<div class="flex items-center justify-center min-h-screen bg-zinc-900">
    <div class="flex flex-col justify-items-center w-3/5 bg-zinc-900 p-5 rounded-lg shadow-lg">
    <h4 class="text-amber-300 text-2xl font-bold capitalize absolute top-28 inset-0 text-center">Perfil do Usuário</h4>
        <div class="w-24 h-24 mb-5 mx-auto flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mx-auto text-amber-300">
                <path fill="#FFD43B" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
            </svg>
            <i class="fa-regular fa-pen-to-square" style="color: #FFD43B;"></i>
        </div>

        <form action="#" method="post">

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="nome" name="nome" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" " />
                    <label for="nome" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Nome
                    </label>
                    <i class="fa-regular fa-pen-to-square absolute right-2 top-1/2 transform -translate-y-1/2" style="color: #FFD43B;"></i>
                    <?php if (isset($errors['nome'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['nome'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="usuario" name="usuario" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent bg-[#1c1917] text-white rounded pr-10 focus:outline-none" placeholder=" " />
                    <label for="usuario" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Nome de Usuário
                    </label>
                    <i class="fa-regular fa-pen-to-square absolute right-2 top-1/2 transform -translate-y-1/2" style="color: #FFD43B;"></i>
                    <?php if (isset($errors['usuario'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['usuario'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="date" id="data_nascimento" name="data_nascimento" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" " />
                    <label for="data_nascimento" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Data de Nascimento
                    </label>
                    <?php if (isset($errors['data_nascimento'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['data_nascimento'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="cpf" name="cpf" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" " />
                    <label for="cpf" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        CPF
                    </label>
                    <i class="fa-regular fa-pen-to-square absolute right-2 top-1/2 transform -translate-y-1/2" style="color: #FFD43B;"></i>
                    <?php if (isset($errors['cpf'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['cpf'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="telefone" name="telefone" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent bg-[#1c1917] text-white rounded pr-10 focus:outline-none" placeholder=" " />
                    <label for="telefone" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Telefone
                    </label>
                    <i class="fa-regular fa-pen-to-square absolute right-2 top-1/2 transform -translate-y-1/2" style="color: #FFD43B;"></i>
                    <?php if (isset($errors['telefone'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['telefone'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="email" name="email" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" " />
                    <label for="email" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        E-mail
                    </label>
                    <i class="fa-regular fa-pen-to-square absolute right-2 top-1/2 transform -translate-y-1/2" style="color: #FFD43B;"></i>
                    <?php if (isset($errors['email'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>
