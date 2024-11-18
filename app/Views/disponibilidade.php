<div>
    <p>Teste Disponibilidade</p>
</div>

<?php
use App\Enums\DiaSemanaEnum;

foreach ($disponibilidade as $disp) {
?>
    <p><?php echo DiaSemanaEnum::getName($disp->dia) ?></p>
    <div class="flex items-center gap-4">
        <?php
        foreach ($disp->disponibilidade as $horario) {
            $inicio = $horario;
            $fim = (new \DateTime($inicio))->modify('+1 hour')->format('H:i');
        ?>
            <a href="#" class="border rounded px-4 py-2"><?php echo "$inicio - $fim" ?></a>
        <?php } ?>
    </div>
<?php } ?>
