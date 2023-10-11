<div class="card mt-3"
    style="border: none;border-radius: 10px;background-color: #f1f1f1;;height:auto;padding:10px;margin-bottom: 100px;">
    <?php if($productModel->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() == 0): ?>
        <h2 style="text-align: center">
            Aguardando Sorteio!
        </h2>
    <?php else: ?>
        <h2 style="text-align: center">
            Rifa Finalizada!
        </h2>
    <?php endif; ?>



    <?php if(env('APP_URL') == 'rifasonline.link'): ?>
        <h4>
            Aguardando sorteio pela loteria federal
        </h4>
    <?php endif; ?>

    <?php if($productModel->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() > 0): ?>
        <h1 class="mt-3" id="ganhadores">
            🎉 Ganhadores
        </h1>
        <?php $__currentLoopData = $productModel->premios()->where('descricao', '!=', ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mt-2 ">
                <div class="col-md-4">
                    <label><strong>Prêmio <?php echo e($premio->ordem); ?>:
                        </strong><?php echo e($premio->descricao); ?></label>
                </div>
                <div class="col-md-4">
                    <label><strong>Ganhador: </strong><?php echo e($premio->ganhador); ?></label>
                </div>
                <div class="col-md-4">
                    <label><strong>Cota: </strong><?php echo e($premio->cota); ?></label>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/rifas/finalizada.blade.php ENDPATH**/ ?>