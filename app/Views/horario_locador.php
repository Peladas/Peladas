<div class="flex flex-col justify-center items-center mt-14 mb-8 h-auto m-5 gap-3 w-auto">

    <div class="container max-w-[900px]">

        <form action="#" method="post" class="text-center">

            <legend class="font-bold md dark:text-amber-300 text-center m-14">Cadastre seu horário de funcionamento</legend>

<<<<<<< HEAD
            <div class="mt-2 md:mt-5 w-auto md:w-[450px] mx-auto m-8 text-base">
            <form action="perfil_locador" method="POST" class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4">
                <table class="table-auto border-separate border-spacing-4 mt-14 w-auto md:w-full">
                    <tbody>
                        <?php
                        use App\Enums\DiaSemanaEnum;
                        for ($i = 1; $i <= 7; $i++) {
                            $startTimeName = "start-time_$i";
                            $endTimeName = "end-time_$i";
                        ?>
                        <tr class="border-t-2 border-slate-700">
                            <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0"><?= DiaSemanaEnum::getName($i) ?></td>
                            <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">
                                <div>
                                    <label for="<?= $startTimeName ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start time:</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <input type="time" id="<?= $startTimeName ?>" name="<?= $startTimeName ?>" value="<?php echo $data['hora_inicio'] ?? '' ?>" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="00:00" max="23:59" value="00:00"/>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left text-blue-800 dark:text-amber-300 py-3 font-bold pr-24 md:pr-0">
                                <div>
                                    <label for="<?= $endTimeName ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End time:</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <input type="time" id="<?= $endTimeName ?>" name="<?= $endTimeName ?>" value="<?php echo $data['hora_fim'] ?? '' ?>" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="00:00" max="23:59" value="00:00"/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
=======
            <div class="mt-2 md:mt-5 w-auto md:w-auto md:gap-5 mx-auto m-8 text-base flex flex-wrap justify-center gap-4 flex-col md:flex-row items-center">
                <?php
>>>>>>> a2cd4d9441a559678ee008905edc2a111185e0ee

                use App\Enums\DiaSemanaEnum;

                for ($i = 1; $i <= 7; $i++) {
                    $startTimeName = "start-time_$i";
                    $endTimeName = "end-time_$i";
                ?>
                    <div class="card border border-gray-300 rounded-lg p-6 mb-4 w-64 h-auto bg-gray-50 dark:bg-zinc-900 hover:">
                        <h3 class="text-left text-blue-800 dark:text-amber-300 font-bold mb-4"><?= DiaSemanaEnum::getName($i) ?></h3>

                        <div class="mb-4">
                            <label for="<?= $startTimeName ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start time:</label>
                            <div class="relative">
                                <input type="time" id="<?= $startTimeName ?>" name="<?= $startTimeName ?>" value="<?php echo $data['hora_inicio'] ?? '' ?>"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white text-center"
                                    min="00:00" max="23:59" onfocus="showTimeOptions(this)" />

                                <!-- Select de horários pré-definidos -->
                                <select id="timeSelect" class="hidden absolute bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    onchange="setTimeFromSelect(this, '<?= $startTimeName ?>')">
                                    <option value="" disabled selected>Selecione um horário</option>
                                    <?php for ($h = 0; $h < 24; $h++): ?>
                                        <?php $time = sprintf("%02d:00", $h); ?>
                                        <option value="<?= $time ?>"><?= $time ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>


                        <div>
                            <label for="<?= $endTimeName ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End time:</label>
                            <input type="time" id="<?= $endTimeName ?>" name="<?= $endTimeName ?>" value="<?php echo $data['hora_fim'] ?? '' ?>"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white text-center" min="00:00" max="23:59" />
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div class="mt-8 flex justify-center items-center">
                <button color="black" class="shadow-lg px-5 py-3 rounded-full border border-purple-700 dark:border-slate-950
                        text-slate-100 bg-purple-800 hover:bg-purple-900 focus:bg-violet-600 dark:bg-zinc-800 dark:hover:bg-zinc-950 dark:focus:bg-stone-950
                        transition-colors duration-300 ease-in-out
                        transform hover:scale-105 hover:shadow-lg dark:shadow dark:shadow-zinc-800" type="submit">Enviar</button>
            </div>

        </form>

    </div>
</div>

<script>
    // Exibe o select ao clicar no input
    function showTimeOptions(input) {
        const select = document.getElementById('timeSelect');
        select.classList.remove('hidden');
        select.style.top = input.offsetHeight + 'px'; // Posiciona o select logo abaixo do input
    }

    // Define o valor selecionado no input e oculta o select
    function setTimeFromSelect(select, inputId) {
        const input = document.getElementById(inputId);
        input.value = select.value;
        select.classList.add('hidden');
    }

    // Oculta o select se o usuário clicar fora dele
    document.addEventListener('click', function(event) {
        const select = document.getElementById('timeSelect');
        const input = document.querySelector('input[type="time"]');
        if (!select.contains(event.target) && event.target !== input) {
            select.classList.add('hidden');
        }
    });
</script>
