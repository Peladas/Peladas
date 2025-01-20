<div class="flex justify-center items-center w-full h-screen">
    <div class="container max-w-[900px]">
        <form action="#" method="post" class="text-center">
            <h1 class="dark:text-yellow-300 pb-6 text-3xl">Realize seu login</h1>

            <p class="mb-8">Acesse para jogar ou gerenciar suas quadras!</p>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative sm:w-96 md:w-2/5 w-80">
                    <input type="text" id="email" name="email" class="peer w-full h-10 px-2 border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                        value="<?php echo $data['email'] ?? '' ?>"/>
                    <label for="email" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        E-mail
                    </label>
                    <?php if (isset($errors['email'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative sm:w-96 md:w-2/5 w-80">
                    <input type="password" id="password" name="password" class="peer w-full h-10 px-2 border-b-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "/>
                    <label for="password" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Senha
                    </label>
                    <?php if (isset($errors['password'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['password'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="mt-4 flex justify-center">
                <button color="black" class="rounded-full border border-slate-100 px-4 py-2 hover:bg-purple-950" type="submit" onclick="">Enviar</button>
            </div>
        </form>
    </div>
</div>
