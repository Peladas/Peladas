<div class="mx-auto max-w-[760px]">
    <div>
        <p>Tipo: <?php echo $quadra->getIdentificador() ?></p>
        <p>Modalidade: <?php echo $quadra->getModalidade() ?></p>
        <p>Tamanho: <?php echo $quadra->getTamanhoQuadra() ?></p>
        <p>Valor: <?php echo $quadra->getValorAluguel() ?></p>
        <p>Horários de funcionamento: <?php echo $quadra->getHorariosFuncionamento() ?></p>
        <p>Quantidade mínima de jogadores: <?php echo $quadra->getQuantMinJogadores() ?></p>
        <p>Descrição: <?php echo $quadra->getDescricao() ?></p>
    </div>
    <div class="flex gap-8 items-center justify-start mt-4">
        <a href="/editar-quadras/<?php echo $quadra->getId() ?>" class="px-4 py-2 bg-amber-300 text-stone-800 rounded">Editar</a>
        <a href="/remover-quadra/<?php echo $quadra->getId() ?>" class="px-4 py-2 bg-amber-300 text-stone-800 rounded">Eliminar</a>
    </div>
</div>
