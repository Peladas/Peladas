<div class="flex justify-center items-center mt-[200px]">

    <div class="container max-w-[900px]">

        <form action="#" method="post" class="text-center">

            <legend class="font-bold mb-4">Realize seu login</legend>
            <p class="mb-8">Acesse para jogar ou gerenciar suas quadras!</p>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="email" id="email" name="email" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "
                        value="<?php echo $data['email'] ?? '' ?>"/>
                    <label for="email" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        E-mail
                    </label>
                    <?php if (isset($errors['email'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="password" id="password" name="password" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="password" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
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
