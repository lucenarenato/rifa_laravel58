<div class="col-md-12 text-center">
    Sorteio: <?php echo e($rifa->name); ?>

</div>

<form action="<?php echo e(route('informarGanhadores')); ?>" id="form-informar-ganhadores" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="idRifa" value="<?php echo e($rifa->id); ?>">
    <div class="row">
        <?php $__currentLoopData = $rifa->premios()->where('descricao', '!=', ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 mt-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo e($premio->ordem); ?> º</span>
                    </div>
                    <input type="text" min="0" max="<?php echo e($rifa->qtd - 1); ?>" placeholder="Informe o numero da cota - <?php echo e($premio->descricao); ?>" class="form-control" name="cotas[<?php echo e($premio->ordem); ?>]" required>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button class="btn btn-sm btn-success mt-2 float-right">Definir Ganhadores</button>
</form><?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/layouts/definir-ganhador.blade.php ENDPATH**/ ?>