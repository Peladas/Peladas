<div>
    <form action="#" method="post">
        <div class="flex flex-col gap-2 mb-4">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['email'] ?? '' ?>">
            <?php if (isset($errors['email'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['email'] ?></small>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label for="phone">Telefone</label>
            <input type="text" id="phone" name="phone" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['phone'] ?? '' ?>">
            <?php if (isset($errors['phone'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['phone'] ?></small>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label for="password1">Senha</label>
            <input type="password" id="password1" name="password1" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['password1'] ?? '' ?>">
            <?php if (isset($errors['password1'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['password1'] ?></small>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label for="password2">Confirme sua senha</label>
            <input type="password" id="password2" name="password2" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['password2'] ?? '' ?>">
            <?php if (isset($errors['password2'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $errors['password2'] ?></small>
            <?php } ?>
        </div>
        <div class="flex items-center gap-6">
            <label for="user_type">Tipo de usuário</label>
            <div>
                <input type="radio" name="user_type" value="jogador" onclick="changeUserType(this)"> Jogador
            </div>
            <div>
                <input type="radio" name="user_type" value="locador" onclick="changeUserType(this)"> Locador
            </div>
        </div>
        <div class="hidden" id="cadastro-jogador">
            <div class="flex flex-col gap-2 mb-4">
                <label for="jogador-name">Nome</label>
                <input type="text" id="jogador-name" name="jogador-name" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['jogador-name'] ?? '' ?>">
                <?php if (isset($errors['jogador-name'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['jogador-name'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="jogador-alias">Apelido</label>
                <input type="text" id="jogador-alias" name="jogador-alias" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['jogador-alias'] ?? '' ?>">
                <?php if (isset($errors['jogador-alias'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['jogador-alias'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['cpf'] ?? '' ?>">
                <?php if (isset($errors['cpf'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['cpf'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="birthday">Data de nascimento</label>
                <input type="text" id="birthday" name="birthday" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['birthday'] ?? '' ?>">
                <?php if (isset($errors['birthday'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['birthday'] ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="hidden" id="cadastro-locador">
            <div class="flex flex-col gap-2 mb-4">
                <label for="locador-name">Razão Social</label>
                <input type="text" id="locador-name" name="locador-name" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['locador-name'] ?? '' ?>">
                <?php if (isset($errors['locador-name'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['locador-name'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="'locador-alias'">Nome fantasia</label>
                <input type="text" id="locador-alias" name="locador-alias" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['locador-alias'] ?? '' ?>">
                <?php if (isset($errors['locador-alias'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['locador-alias'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['cnpj'] ?? '' ?>">
                <?php if (isset($errors['cnpj'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['cnpj'] ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit">Enviar</button>
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
            jogadorName.required = true;
            jogadorAlias.required = true;
            cpf.required = true;
            birthday.required = true;
            locadorName.required = false;
            locadorAlias.required = false;
            cnpj.required = false;
        } else {
            divJogador.classList.add('hidden');
            divLocador.classList.remove('hidden');
            jogadorName.required = false;
            jogadorAlias.required = false;
            cpf.required = false;
            birthday.required = false;
            locadorName.required = true;
            locadorAlias.required = true;
            cnpj.required = true;

        }
    }
</script>
