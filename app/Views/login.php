<div>
    <form action="#" method="post">

        <legend>Faça seu Login</legend>

        <div class="flex flex-col gap-2 mb-4">

            <input type="email" id="email" name="email" placeholder="E-mail" class="w-2/5" value="<?php echo $data['email'] ?? '' ?>">
            <?php if (isset($errors['email'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
            <?php } ?>
        </div>

        <div class="flex flex-col gap-2 mb-4 mr-4">

            <input type="password" id="password" name="password" placeholder="Senha" required class="pr-16" value="<?php echo $data['password'] ?? '' ?>">
            <?php if (isset($errors['password'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['password'] ?></small>
            <?php } ?>
        </div>

        <div class="mt-4">
            <button color="black" class="rounded-full border border-slate-100 mr-5 houver:bg-purple-950" type="submit">Enviar</button>
        </div>
    </form>
</div>
