<?php

use App\Enums\PartidaTypeEnum;
use App\Helpers\Formatter;
?>

<div class="size-full flex flex-col justify-center items-center p-4">

    <form action="/cadastro-reserva" method="post" class="gap-y-20">
        <input type="hidden" name="quadra_id" value="<?= $quadra->getId() ?>">

        <h1 class="text-2xl text-center dark:text-amber-300 my-4">Criar Partida</h1>

        <div class="flex flex-col md:flex-row gap-x-20 my-10">

        <!--Dados-->

            <div class="flex flex-col gap-10 w-1/2">

                <h1 class="text-xl text-center dark:text-amber-300 text-black">Dados da Quadra</h1>

                <div class="flex flex-col md:flex-row items-center justify-center gap-6 w-auto">

                    <div class="relative border-[1px] border-gray-300 p-4 rounded-lg bg-gray-200 dark:bg-zinc-900 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-56" viewBox="0 0 576 512">
                            <path fill="#ffffff" style="width: auto; height:auto" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z" />
                        </svg>
                    </div>

                    <div class="flex flex-col gap-4 w-auto">

                            <p>
                                <span class="text-blue-800 dark:text-amber-300">Locador:</span>
                                <span class="text-slate-800 dark:text-slate-100"><?= $locador->getNomeFantasia() ?></span>
                            </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full md:w-96">
                            <p>
                                <span class="text-blue-800 dark:text-amber-300">Tipo:</span>
                                <span class="text-slate-800 dark:text-slate-100"><?= $quadra->getIdentificador() ?></span>
                            </p>
                            <p class="text-left md:text-right">
                                <span class="text-blue-800 dark:text-amber-300">Modalidade:</span>
                                <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getModalidade() ?></span>
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full md:w-96">
                            <p>
                                <span class="text-blue-800 dark:text-amber-300">Tamanho:</span>
                                <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getTamanhoQuadra() ?></span>
                            </p>
                            <p class="text-left md:text-right">
                                <span class="text-blue-800 dark:text-amber-300">Valor:</span>
                                <span class="text-slate-800 dark:text-slate-100"><?php echo Formatter::valueReais($quadra->getValorAluguel()) ?></span>
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-3 w-full md:w-96">
                            <p>
                                <span class="text-blue-800 dark:text-amber-300">Quantidade máxima de jogadores:</span>
                                <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getQuantMaxJogadores() ?></span>
                            </p>
                        </div>
                        <p>
                            <span class="text-blue-800 dark:text-amber-300">Descrição:</span>
                            <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getDescricao() ?></span>
                        </p>

                        <div class="flex items-center gap-6">
                    <label class="text-purple-800 dark:text-yellow-300 text-base font-semibold">Tipo de Partida</label>
                    <div>
                        <input type="radio" name="tipo_reserva" value="<?php echo PartidaTypeEnum::PRIVADA ?>" class="accent-purple-950"
                            onclick="selectTypePartida()" <?= isset($data['tipo_reserva']) && $data['tipo_reserva'] == PartidaTypeEnum::PRIVADA ? 'checked' : '' ?>> Privada
                    </div>
                    <div>
                        <input type="radio" name="tipo_reserva" value="<?php echo PartidaTypeEnum::PUBLICA ?>" class="accent-purple-950"
                            onclick="selectTypePartida()" <?= isset($data['tipo_reserva']) && $data['tipo_reserva'] == PartidaTypeEnum::PUBLICA ? 'checked' : '' ?>> Pública
                    </div>

                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['tipo_reserva'] ?? '' ?></small>
                </div>

                    </div>
                </div>

            </div>



            <div class="w-1/2 flex justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <h1 class="text-xl dark:text-white mb-8 align-center text-center text-black">Selecione uma data</h1>
                    <div id="calendar-container" class="w-full"></div>

                    <div class="w-80 md:w-full">
                        <div class="flex items-center justify-between text-amber-300 mb-3 ">
                            <h4 class="text-purple-800 font-semibold dark:text-amber-300 text-lg" id="calendar-current-date"></h4>
                            <div id="calendar-navigation">
                                <span
                                    id="calendar-prev"
                                    class="material-symbols-rounded rounded-full hover:bg-zinc-800 cursor-pointer text-purple-800 dark:text-amber-300">
                                    chevron_left
                                </span>
                                <span
                                    id="calendar-next"
                                    class="material-symbols-rounded rounded-full hover:bg-zinc-800 cursor-pointer text-purple-800 dark:text-amber-300">
                                    chevron_right
                                </span>
                            </div>
                        </div>

                        <div id="calendar-body" class="text-stone-200">
                            <div id="calendar-weekdays" class="grid grid-cols-7 text-start gap-7">
                                <span class="text-center text-blue-800 dark:text-orange-400">Dom</span>
                                <span class="text-center text-blue-800 dark:text-orange-400">Seg</span>
                                <span class="text-center text-blue-800 dark:text-orange-400">Ter</span>
                                <span class="text-center text-blue-800 dark:text-orange-400">Qua</span>
                                <span class="text-center text-blue-800 dark:text-orange-400">Qui</span>
                                <span class="text-center text-blue-800 dark:text-orange-400">Sex</span>
                                <span class="text-center text-blue-800 dark:text-orange-400">Sab</span>
                            </div>

                            <div id="calendar-dates" class="grid grid-cols-7 text-black dark:text-white"></div>
                        </div>
                    </div>
                    <small class="helper-text text-red-600 font-sm"><?php echo $errors['data_reserva'] ?? '' ?></small>

                    <div>
                        <p class="mt-10 text-purple-800 dark:text-amber-300 text-base font-medium">Data selecionada: <span id="selected-date" class="dark:text-white text-center md:text-left text-blue-800">-</span></p>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="flex flex-col items-center justify-center gap-10 mt-6">
    <h1 class="text-xl dark:text-amber-300">Disponibilidade</h1>
    <div class="gap-10 mb-10">
        <input type="hidden" id="selected-date-iso" name="data_reserva">
        <input type="hidden" id="selected-time" name="horario_reservado">
        <p id="disponibilidades" class="text-wrap mb-5">Selecione uma data para vizualizar a disponibilidade</p>

        <small class="helper-text text-red-600 font-sm"><?php echo $errors['horario_reservado'] ?? '' ?></small>

        <div class="flex md:justify-center justify-start">
            <button color="black" class="mt-6 rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
                type="submit">Reservar Quadra</button>
        </div>
    </div>

    </form>
</div>

<script>
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();
    let selectedDate = null;
    const dateFormat = 'w-10 h-10 flex justify-center items-center rounded-full mx-auto';

    const day1 = document.getElementById('calendar-dates');

    const currdate = document.getElementById('calendar-current-date');

    const prenexIcons = document.querySelectorAll(
        '#calendar-navigation span'
    );

    // Array of month names
    const months = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro',
    ];

    const compareDates = (day, month, year, date) => {
        if (day === date.getDate() && month === date.getMonth() && year === date.getFullYear()) {
            return true;
        }

        return false;
    };

    const setSelectedDate = (day, month, year) => {
        console.log({
            day,
            month,
            year
        });
        selectedDate = new Date(year, month, day)
        console.log(selectedDate);
        const dateField = document.getElementById('selected-date');
        const dateString = new Intl.DateTimeFormat('pt-BR', {
            dateStyle: 'long'
        }).format(selectedDate);
        dateField.innerHTML = dateString;
        const dateIsoField = document.getElementById('selected-date-iso');
        dateIsoField.value = selectedDate.toISOString();
        dateIsoField.dispatchEvent(new Event('change'));
        console.log(dateString);
    };

    // Function to generate the calendar
    const manipulate = () => {
        // Get the first day of the month
        let dayone = new Date(year, month, 1).getDay();

        // Get the last date of the month
        let lastdate = new Date(year, month + 1, 0).getDate();

        // Get the day of the last date of the month
        let dayend = new Date(year, month, lastdate).getDay();

        // Get the last date of the previous month
        let monthlastdate = new Date(year, month, 0).getDate();

        // Variable to store the generated calendar HTML
        let lit = '';

        // Loop to add the last dates of the previous month
        for (let i = dayone; i > 0; i--) {
            lit += `<span class="${dateFormat} text-gray-400 cursor-default w-10 h-10">${
            monthlastdate - i + 1
          }</span>`;
        }

        // Loop to add the dates of the current month
        for (let i = 1; i <= lastdate; i++) {
            // Check if the current date is today
            let isToday = compareDates(i, month, year, new Date()) ?
                'bg-cyan-300 dark:text-black' :
                '';
            lit += `<button type="button" onclick="setSelectedDate(${i}, ${month}, ${year})"><span class="${isToday} ${dateFormat} hover:bg-cyan-300 hover:text-white dark:hover:text-black">${i}</span></button>`;
        }

        // Loop to add the first dates of the next month
        for (let i = dayend; i < 6; i++) {
            lit += `<span class="${dateFormat} text-gray-400 cursor-default">${
            i - dayend + 1
          }</span>`;
        }

        // Update the text of the current date element
        // with the formatted current month and year
        currdate.innerText = `${months[month]} ${year}`;

        // update the HTML of the dates element
        // with the generated calendar
        day1.innerHTML = lit;
    };

    manipulate();

    prenexIcons.forEach((icon) => {
        // When an icon is clicked
        icon.addEventListener('click', () => {
            // Check if the icon is "calendar-prev"
            // or "calendar-next"
            month = icon.id === 'calendar-prev' ? month - 1 : month + 1;

            // Check if the month is out of range
            if (month < 0 || month > 11) {
                // Set the date to the first day of the
                // month with the new year
                date = new Date(year, month, new Date().getDate());

                // Set the year to the new year
                year = date.getFullYear();

                // Set the month to the new month
                month = date.getMonth();
            } else {
                // Set the date to the current date
                date = new Date();
            }

            manipulate();
        });
    });
</script>

<script>
    const quadraId = <?php echo $quadra->getId() ?>;
    console.log('quadraId', quadraId);
    const selectedDateElement = document.getElementById('selected-date-iso');
    console.log(selectedDateElement)
    selectedDateElement.addEventListener('change', async (ev) => {
        try {
            const selectedDate = ev.target.value;
            console.log('selected date', selectedDate);
            const url = `/api/quadra/${quadraId}/disponibilidade?date=${selectedDate}`;
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }
            const json = await response.json();
            renderDisponibilidade(json);
            console.log('json', json);
        } catch (error) {
            console.error(error.message);
        }
    });

    function renderDisponibilidade(horarios) {
    const renderElement = document.getElementById('disponibilidades');
    renderElement.innerHTML = null;

    // Criação do contêiner para os horários, com grid e espaçamento
    const gridContainer = document.createElement('div');
    gridContainer.classList.add('grid', 'grid-cols-2', 'gap-4');  // 2 colunas com espaçamento de 4px entre os itens

    horarios.forEach(horario => {
        const element = document.createElement('button');
        // Adiciona a classe de cor vermelha e estiliza os botões
        element.classList.add('text-black', 'border-[1px]', 'border-slate-800', 'p-2', 'hover:bg-cyan-300', 'rounded-full', 'transform',
            'hover:scale-105', // Aumenta o tamanho do botão
            'hover:translate-y-2', // Move o botão para baixo
            'transition-all', // Aplica transições em todos os efeitos
            'duration-300',
            'dark:focus:bg-slate-900',
            'focus:bg-cyan-500',
            'dark:text-white',
            'dark:border-slate-600') // Duração suave de 300ms);
        element.type = 'button';
        element.innerText = horario;

        // Adiciona o evento de clique
        element.addEventListener('click', () => {
            const timeElement = document.getElementById('selected-time');
            timeElement.value = horario;
            console.log(horario);
        });

        // Adiciona o botão ao contêiner
        gridContainer.appendChild(element);
    });

    // Adiciona o contêiner com os horários ao elemento principal
    renderElement.appendChild(gridContainer);
}
</script>

