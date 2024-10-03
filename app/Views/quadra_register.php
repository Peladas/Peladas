<div class="flex justify-center items-center mt-[195px]">

    <div class="container max-w-[900px]">

        <form action="#" method="post" class="text-center">

            <legend class="font-bold mb-4">Cadastre sua quadra</legend>

            <div class="flex flex-col gap-2 mb-5 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="identificador" name="identificador" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="identificador" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Tipo de quadra
                    </label>
                    <?php if (isset($errors['identificador'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['identificador'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="modalidades" name="modalidades" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="modalidades" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Modalidade(es)
                    </label>
                    <?php if (isset($errors['modalidades'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['modalidades'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="tamanho_quadra" name="tamanho_quadra" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="tamanho_quadra" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Tamanho da quadra
                    </label>
                    <?php if (isset($errors['tamanho_quadra'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['tamanho_quadra'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="quant_min_jogadores" name="quant_min_jogadores" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="quant_min_jogadores" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Quantidade mínima de jogadores
                    </label>
                    <?php if (isset($errors['quant_min_jogadores'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['quant_min_jogadores'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="horarios_func" name="horarios_func" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="horarios_func" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Horários de funcionamento
                    </label>
                    <?php if (isset($errors['horarios_func'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['horarios_func'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="descricao" name="descricao" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="descricao" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Descrição da quadra
                    </label>
                    <?php if (isset($errors['descricao'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['descricao'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="flex flex-col gap-2 mb-8 items-center">
                <div class="relative w-2/5">
                    <input type="text" id="valor_aluguel" name="valor_aluguel" class="peer w-full h-10 px-2 border-b-2 border-amber-300 placeholder-transparent" placeholder=" "/>
                    <label for="valor_aluguel" class="absolute left-2 -top-3 text-gray-500 transition-all duration-200 transform origin-left scale-75 bg-[#1c1917] px-1 peer-placeholder-shown:px-0 peer-placeholder-shown:top-2 peer-placeholder-shown:scale-100">
                        Valor do aluguel
                    </label>
                    <?php if (isset($errors['valor_aluguel'])) { ?>
                        <small class="helper-text text-red-600 font-sm"><?php echo $errors['valor_aluguel'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <div class="mt-4 flex justify-center">
                <button color="black" class="rounded-full border border-slate-100 px-4 py-2 hover:bg-purple-950" type="submit" onclick="">Enviar</button>
            </div>

        </form>

    </div>
</div>