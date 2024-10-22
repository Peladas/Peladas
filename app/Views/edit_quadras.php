<?php  //var_dump($quadra)
?>
<div class="flex justify-center items-center mt-14 mb-10">

    <div class="container max-w-[900px]">

        <form action="#" method="post" class="flex flex-col">

            <legend class="font-bold mb-9 dark:text-amber-300">Edite sua quadra</legend>

            <div class="flex flex-col gap-2 mb-5 items-center justify-center">
                <div class="relative w-80">
                    <input type="text" id="identificador" name="identificador" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getIdentificador() ?>" />
                    <label for="identificador" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Tipo de quadra
                    </label>
                    <?php if (isset($errors['identificador'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['identificador'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80">
                    <input type="text" id="modalidade" name="modalidade" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getModalidade() ?>" />
                    <label for="modalidades" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100"">
                        Modalidade(es)
                    </label>
                    <?php if (isset($errors['modalidade'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['modalidade'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80">
                    <input type="text" id="tamanho_quadra" name="tamanho_quadra" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getTamanhoQuadra() ?>" />
                    <label for="tamanho_quadra" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100"">
                        Tamanho da quadra
                    </label>
                    <?php if (isset($errors['tamanho_quadra'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['tamanho_quadra'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80">
                    <input type="text" id="quant_min_jogadores" name="quant_min_jogadores" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getQuantMinJogadores() ?>" />
                    <label for="quant_min_jogadores" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100"">
                        Quantidade mínima de jogadores
                    </label>
                    <?php if (isset($errors['quant_min_jogadores'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['quant_min_jogadores'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80">
                    <input type="text" id="horarios_funcionamento" name="horarios_funcionamento" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getHorariosFuncionamento() ?>" />
                    <label for="horarios_funcionamento" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100"">
                        Horários de funcionamento
                    </label>
                    <?php if (isset($errors['horarios_funcionamento'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['horarios_funcionamento'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80">
                    <input type="text" id="descricao" name="descricao" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getDescricao() ?>" />
                    <label for="descricao" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100"">
                        Descrição da quadra
                    </label>
                    <?php if (isset($errors['descricao'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['descricao'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-80">
                    <input type="text" id="valor_aluguel" name="valor_aluguel" class="peer w-full h-10 px-2 border-2 dark:border-amber-300 placeholder-transparent dark:bg-[#18181b]"" placeholder=" " value="<?php echo $quadra->getValorAluguel() ?>" />
                    <label for="valor_aluguel" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-slate-100 dark:bg-[#18181b] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100"">
                        Valor do aluguel
                    </label>
                    <?php if (isset($errors['valor_aluguel'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['valor_aluguel'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="mt-4 flex justify-center">
                <button color="dark" type="submit" onclick="">Enviar</button>
            </div>

        </form>

    </div>
</div>
