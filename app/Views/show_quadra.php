<div class="flex flex-col items-center justify-center mt-14 md:mt-0 gap-5">
    <h4 class="text-3xl font-semibold dark:text-amber-300 mb-5 md:mb-10 text-center">Dados da Quadra</h4>
    <div class="flex flex-col md:flex-row gap-5 items-center justify-center m-10 mt-0 md:m-0">
        <div>
            <div class="border-2 border-gray-300 dark:border-slate-700 p-4 rounded-lg bg-gray-200 dark:bg-slate-950 w-56 md:w-72 h-64 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" viewBox="0 0 576 512">
                    <path fill="#ffffff" style="width: auto; height:auto" d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z"/>
                </svg>
            </div>
        </div>

        <div class="flex flex-col gap-4 w-full md:w-auto md:ml-12 mt-5 md:mt-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full md:w-96">
                <p>
                    <span class="text-blue-800 dark:text-amber-300">Tipo:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getIdentificador() ?></span>
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
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getValorAluguel() ?></span>
                </p>
            </div>
            <div class="grid grid-cols-1 gap-3 w-full md:w-96">
                <p>
                    <span class="text-blue-800 dark:text-amber-300">Horários de funcionamento:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getHorariosFuncionamento() ?></span>
                </p>
                <p>
                    <span class="text-blue-800 dark:text-amber-300">Quantidade mínima de jogadores:</span>
                    <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getQuantMinJogadores() ?></span>
                </p>
            </div>
            <p>
                <span class="text-blue-800 dark:text-amber-300">Descrição:</span>
                <span class="text-slate-800 dark:text-slate-100"><?php echo $quadra->getDescricao() ?></span>
            </p>

            <div class="flex gap-8 items-center justify-center md:justify-start mt-4">
                <a href="/editar-quadras/<?php echo $quadra->getId() ?>" color="yellow">
                    Editar
                </a>

                <a href="#" onclick="confirmElimination()" color="yellow">
                    Eliminar
                </a>

                <a href="#" onclick="" color="yellow">
                    Consultar Disponibilidade
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmElimination() {
        const excluir = confirm("Deseja excluir a quadra selecionada?");

        if (excluir) {
            fetch('/remover-quadras/<?php echo $quadra->getId() ?>', {
                method: 'POST'
            })
                .then(() => {
                    alert("Quadra eliminada com sucesso")
                })
                .catch((error) => {
                    alert(`Error: ${error.message}`)
                })
        }
    }
</script>
