<div class="flex justify-center items-center mt-14 mb-10">

    <div class="container max-w-[900px] min-h-px my-10">

        <form action="#" id="quadra-form" method="post" class="text-center">

            <legend class="font-bold mb-9 dark:text-amber-300">Cadastre sua quadra</legend>

            <div class="flex flex-col gap-2 mb-7 items-center">
                <div class="w-80 md:w-full">
                    <select id="identificador" name="identificador" class="px-10 peer w-80 md:w-2/5 h-10 px-2 border-2 border-purple-700 dark:border-amber-300 rounded-lg placeholder-transparent dark:bg-zinc-900 bg-transparent text-gray-500" name="select" id="">
                        <option>Tipo de quadra</option>
                        <option value="Areia" <?php echo isset($data['identificador']) && $data['identificador'] == "Areia" ? 'selected' : ''  ?>>Areia</option>
                        <option value="Madeira <?php echo isset($data['identificador']) && $data['identificador'] == "Madeira" ? 'selected' : ''  ?>">Madeira</option>
                        <option value="Concreto <?php echo isset($data['identificador']) && $data['identificador'] == "Concreto" ? 'selected' : ''  ?>">Concreto</option>
                        <option value="Grama Natural <?php echo isset($data['identificador']) && $data['identificador'] == "Grama Natural" ? 'selected' : ''  ?>">Grama Natural</option>
                        <option value="Grama Sintética <?php echo isset($data['identificador']) && $data['identificador'] == "Grama Sintética" ? 'selected' : ''  ?>">Grama Sintética</option>
                    </select>
                    <?php if (isset($errors['identificador'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['identificador'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="modalidade" name="modalidade" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" "
                        value="<?php echo $data['modalidade'] ?? '' ?>"/>
                    <label for="modalidade" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Modalidade(es)
                    </label>
                    <?php if (isset($errors['modalidade'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['modalidade'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="tamanho_quadra" name="tamanho_quadra" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " value="<?php echo $data['tamanho_quadra'] ?? '' ?>"/>
                    <label for="tamanho_quadra" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Tamanho da quadra
                    </label>
                    <?php if (isset($errors['tamanho_quadra'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['tamanho_quadra'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="quant_max_jogadores" name="quant_max_jogadores" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " value="<?php echo $data['quant_max_jogadores'] ?? '' ?>"/>
                    <label for="quant_max_jogadores" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Quantidade mínima de jogadores
                    </label>
                    <?php if (isset($errors['quant_max_jogadores'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['quant_max_jogadores'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="descricao" name="descricao" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " value="<?php echo $data['descricao'] ?? '' ?>"/>
                    <label for="descricao" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Descrição da quadra
                    </label>
                    <?php if (isset($errors['descricao'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['descricao'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80 md:w-2/5">
                    <input type="text" id="valor_aluguel" name="valor_aluguel" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]" placeholder=" " value="<?php echo $data['valor_aluguel'] ?? '' ?>"/>
                    <label for="valor_aluguel" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Valor do aluguel
                    </label>
                    <?php if (isset($errors['valor_aluguel'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['valor_aluguel'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="mt-4 flex justify-center">
                <a class="rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
                 id="submit-quadra-form" href="#" onclick="submitAddressForm">Enviar</a>
            </div>

        </form>

    </div>
</div>

<script>
    const submitBtn = document.getElementById('submit-quadra-form');
    submitBtn.addEventListener('click', (ev) => {
        ev.preventDefault();
        const formElement = document.getElementById('quadra-form');
        formElement.submit();
    });
</script>
