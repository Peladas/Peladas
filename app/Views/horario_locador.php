<div class="flex justify-center items-center mt-14 mb-10">

    <div class="container max-w-[900px]">

        <form action="#" method="post" class="text-center">

            <legend class="font-bold mb-9">Cadastre seu horário de funcionamento</legend>

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

            <div class="mt-4 flex justify-center">
                <button color="black" class="shadow-lg rounded-full border border-purple-700 px-4 py-2 hover:bg-purple-950" type="submit" onclick="">Enviar</button>
            </div>

        </form>

    </div>
</div>
