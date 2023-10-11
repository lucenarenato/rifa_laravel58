<style>
    .body-ranking {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        margin-top: 10px;
    }

    .body-ranking.dark {
        background: #222222;
    }

    .title-ranking h5 {
        color: #000;
    }

    .title-ranking span {
        color: #000;
    }

    .title-ranking.dark h5 {
        color: #fff;
    }

    .title-ranking.dark span {
        color: #fff;
    }

    .body-promo {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
    }

    .body-promo.dark {
        background: #222222;
    }

    .title-promo.dark {
        color: #fff !important;
    }
</style>


<?php if(count($ranking) > 0): ?>
    <div class="card" style="border: none;border-radius: 10px;background-color: transparent;">
        <div class="card-body body-ranking <?php echo e($config->tema); ?>">
            <div class="" style="">
                <?php $resultNumber = $totalPago; ?>
            </div>
            <div class="title-ranking <?php echo e($config->tema); ?>" style="margin-bottom: 10px;">
                <h5 style="font-weight: bold;">RANKING DE COMPRADORES</h5>
            </div>


            <div class="row" style="display: flex;justify-content:center;position:relative">
                <?php $__currentLoopData = $ranking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="btn-auto item-ranking">
                        <?php echo e($key + 1); ?>º <?php echo e($productModel->medalhaRanking($key)); ?><br>
                        <span style="font-size: 20px;font-weight: bold;"><?php echo e($rk->name); ?></span>
                        <br>
                        <span style="font-size: 12px;">Qtd. de Bilhetes
                            <?php echo e($rk->totalReservas); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if($productModel->promocoes()->where('qtdNumeros', '>', 0)->count() > 0): ?>
    <div class="" style="">
        <h5 class="mt-1 title-promo <?php echo e($config->tema); ?>">
            📣 Promoção
            <small class="text-muted title-promo <?php echo e($config->tema); ?>" style="font-size: 15px;">Compre mais
                barato!</small>
        </h5>
    </div>
    <div class="card" style="border: none;border-radius: 10px;background-color: transparent; margin-top: -15px;">
        <div class="card-body body-promo <?php echo e($config->tema); ?>">
            <div class="row">
                <?php $__currentLoopData = $productModel->promocoes()->where('qtdNumeros', '>', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($productModel->type_raffles == 'manual'): ?>
                        <div class="col-6" style="margin-bottom: 8px;"  onclick="infoPromo()">
                            <div class="bg-success" style="color: #fff;text-align: center;border-radius:6px;"><strong>
                                    <?php echo e($promo->qtdNumeros); ?> POR - R$:
                                    <?php echo e($promo->valorFormatted()); ?></strong>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-6" style="margin-bottom: 8px;"
                            onclick="addQtd('<?php echo e($promo->qtdNumeros); ?>', '<?php echo e($promo->valorFormatted()); ?>')">
                            <div class="bg-success" style="color: #fff;text-align: center;border-radius:6px;"><strong>
                                    <?php echo e($promo->qtdNumeros); ?> POR - R$:
                                    <?php echo e($promo->valorFormatted()); ?></strong>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="mb-3">

    <div class="row mt-2">
        <div class="" style="">
            <h5 class="mt-1 title-promo <?php echo e($config->tema); ?>">
                ⚡ Cotas
                <small class="text-muted title-promo <?php echo e($config->tema); ?>" style="font-size: 15px;">Escolha a quantidade
                    da sua sorte</small>
            </h5>
        </div>
        <div class="<?php echo e(env('APP_URL') == 'rifasonline.link' ? 'col-md-12 col-12' : 'col-md-6 col-6'); ?>">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="openModal()"
                class="btn btn-secondary btn-sm bg-secondary"
                style="font-size: 12px; width: 100%; <?php echo e(env('APP_URL') == 'rifasonline.link' ? 'background-color: red !important' : 'background: #198754 !important'); ?>">
                <i class="fas fa-shopping-cart"></i>&nbsp;Ver meus números
            </button>
        </div>
        <div class="<?php echo e(env('APP_URL') == 'rifasonline.link' ? 'col-md-12 col-12 mt-2' : 'col-md-6 col-6'); ?>">


            <?php if(env('APP_URL') != 'rifasonline.link'): ?>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-premios"
                    class="btn btn-secondary btn-sm bg-secondary" style="width: 100%; font-size: 12px; ">
                    <i class="fas fa-trophy"></i>&nbsp;Prêmios
                </button>
            <?php endif; ?>
        </div>
    </div>

    <?php if($productModel->parcial): ?>
        <div class="card"
            style="border: none;border-radius: 10px;background-color: transparent; margin-top: -10px !important; margin-bottom: -20px;">
            <div class="card-body body-compra-auto <?php echo e($config->tema); ?>" style="">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="progress-sell">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo e(env('APP_URL') == 'rifasonline.link' ? 'bg-secondary' : 'bg-success'); ?>"
                                    role="progressbar" style="width: <?php echo e($productModel->porcentagem()); ?>%"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <?php echo e($productModel->porcentagem()); ?>%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/rifadigital/public_html/resources/views/rifas/ativas.blade.php ENDPATH**/ ?>