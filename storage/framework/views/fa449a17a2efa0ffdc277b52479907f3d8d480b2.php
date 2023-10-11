<style>
    .grupo-fazendinha {
        cursor: pointer;
    }

    @media (max-width: 768px) {

        .pago{
            height: 100%;
        }

        .reservado{
            height: 100%;
        }
    }

    .reservado {
        background-color: #ffc10775;
        width: 100%;
        height: 90%;
    }

    .pago {
        background-color: #0094f0b3;
        width: 100%;
        height: 90%;
    }

    .selected-group {
        opacity: 0.5;
    }

    .h150 {
        height: 150px;
        background-size: 50%;
        background-repeat: no-repeat
    }
</style>

<div class="row g-0 justify-content-center">
    <?php $__currentLoopData = $productModel->numbers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($numero->statusFormated() == 'disponivel'): ?>
            <div class="col-4 grupo-fazendinha <?php echo e('fazenda-'. $numero->statusFormated()); ?>" data-grupo="<?php echo e($numero->grupoFazendinha()); ?>"
                 onclick="selectFazendinha('<?php echo e($numero->number); ?>')" id="<?php echo e($numero->number); ?>">
                <img style="width: 100%" src="<?php echo e(asset('images/bixos/' . $numero->number . '.webp')); ?>">
            </div>
        <?php else: ?>
            <div class="col-4" title="<?php echo e($numero->status); ?> por <?php echo e($numero->participante()->name); ?>" onclick="info('<?php echo e($numero->status); ?> por <?php echo e($numero->participante()->name); ?>')" class="grupo-fazendinha <?php echo e('fazenda-'. $numero->statusFormated()); ?>" data-grupo="<?php echo e($numero->grupoFazendinha()); ?>" id="<?php echo e($numero->number); ?>">
                <img style="width: 100%" src="<?php echo e(asset('images/bixos/' . $numero->number . '.webp')); ?>">
                <div class="<?php echo e($numero->statusFormated()); ?>"></div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="d-flex justify-content-center">
    <div class="payment" id="payment" style="display: none; width: 500px !important;margin-bottom: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-12 col-9" style="background-color: #fff; color: #000; border-radius: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center" style="width: 100%">
                            <span id="numberSelected" class="scrollmenu"></span>
                        </div>
                    </div>
                    <div class="row"
                        style="text-align: center;background-color: #fff; margin-top: 5px; justify-content-center; margin-bottom: 10px;">
                        <div class="col-12 d-flex justify-content-center">
                            <center style="width: 400px;">
                                <button type="button" class="btn btn-danger reservation blob"
                                    style="border: none;color: #fff;font-weight: bold;width: 100%;background-color: green"
                                    data-toggle="modal" onclick="openModalCheckout()"><i
                                        class="far fa-check-circle"></i>&nbsp;Participar do
                                    sorteio
                                    <span style="font-size: 14px; float:right"><span
                                            id="numberSelectedTotal"></span></span></button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br><br>

<script>
    function info(msg){
        Swal.fire(msg)
    }
</script>
<?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/rifas/fazendinha.blade.php ENDPATH**/ ?>