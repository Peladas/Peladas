<div>
    <form action="#" method="post">
        <div class="flex flex-col gap-2 mb-4">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['email'] ?? '' ?>">
            <?php if (isset($error['email'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $error['email'] ?></small>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label for="phone">Telefone</label>
            <input type="text" id="phone" name="phone" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['phone'] ?? '' ?>">
            <?php if (isset($error['phone'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $error['phone'] ?></small>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label for="password1">Senha</label>
            <input type="password" id="password1" name="password1" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['password1'] ?? '' ?>">
            <?php if (isset($error['password1'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $error['password1'] ?></small>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label for="password2">Confirme sua senha</label>
            <input type="password" id="password2" name="password2" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['password2'] ?? '' ?>">
            <?php if (isset($error['password2'])) { ?>
                <small class="helper-text text-red-600 font-sm"><?php echo $error['password2'] ?></small>
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
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['name'] ?? '' ?>">
                <?php if (isset($error['name'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['name'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="alias">Apelido</label>
                <input type="text" id="alias" name="alias" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['alias'] ?? '' ?>">
                <?php if (isset($error['alias'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['alias'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['cpf'] ?? '' ?>">
                <?php if (isset($error['cpf'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['cpf'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="birthday">Data de nascimento</label>
                <input type="text" id="birthday" name="birthday" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['birthday'] ?? '' ?>">
                <?php if (isset($error['birthday'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['birthday'] ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="hidden" id="cadastro-locador">
            <div class="flex flex-col gap-2 mb-4">
                <label for="name">Razão Social</label>
                <input type="text" id="name" name="name" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['name'] ?? '' ?>">
                <?php if (isset($error['name'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['name'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="alias">Nome fantasia</label>
                <input type="text" id="alias" name="alias" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['alias'] ?? '' ?>">
                <?php if (isset($error['alias'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['alias'] ?></small>
                <?php } ?>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" required class="bg-transparent border border-teal-400 placeholder:text-gray-400" value="<?php echo $data['cnpj'] ?? '' ?>">
                <?php if (isset($error['cnpj'])) { ?>
                    <small class="helper-text text-red-600 font-sm"><?php echo $error['cnpj'] ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const userType = document.querySelectorAll('input[name="user_type"]');
    //     console.log('userType', userType);
    //     console.log(userType);
    //     userType.forEach(radio => {
    //         radio.addEventListener('change', function() {
    //             const selectedValue = document.querySelector('input[name="option"]:checked').value;
    //             console.log('Selected value:', selectedValue);
    //         });
    //     })
    // });
    function changeUserType(radio) {
        const divJogador = document.getElementById('cadastro-jogador');
        const divLocador = document.getElementById('cadastro-locador');
        if (radio.checked && radio.value === 'jogador') {
            divLocador.classList.add('hidden');
            divJogador.classList.remove('hidden');
        } else {
            divJogador.classList.add('hidden');
            divLocador.classList.remove('hidden');

        }
    }
</script>
