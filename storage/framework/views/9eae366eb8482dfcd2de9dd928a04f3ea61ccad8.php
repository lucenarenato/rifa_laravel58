<style>
    .title-rifa-destaque {
        background: #fff;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        padding-bottom: 10px;
    }

    .title-rifa-destaque.dark {
        background: #222222;
    }

    .title-rifa-destaque.dark h1 {
        color: #fff;
    }

    .title-rifa-destaque.dark p {
        color: #fff;
    }

    .valor.dark {
        color: #fff;
    }

    .desc {
        border: none;
        border-radius: 10px;
        background-color: #fff;
        max-height: 250px;
        padding: 10px;
        margin-bottom: 0px;
        overflow: scroll
    }

    .desc.dark{
        background: #222222;
    }

    .desc.dark p{
        color: #fff;
    }

    .data-sorteio.dark{
        color: #fff !important;
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="margin-top: -20px;">
        <?php $__currentLoopData = $productModel->fotos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key === 0 ? 'active' : ''); ?>" style="margin-top: 30px;"
                id="slide-foto-<?php echo e($foto->id); ?>">
                <img src="/products/<?php echo e($foto->name); ?>"
                    style="border-top-right-radius: 20px;border-top-left-radius: 20px; "
                    class="d-block w-100" alt="...">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="title-rifa-destaque <?php echo e($config->tema); ?>">
        <h1><?php echo e($productModel->name); ?></h1>
        <p><?php echo e($productModel->subname); ?></p>
        <div style="width: 100%;">
            <?php echo $productModel->status(); ?>

            <?php if($productModel->draw_date): ?>
                <br>
                <span class="data-sorteio <?php echo e($config->tema); ?> ml-1" style="font-size: 12px;">
                    Data do sorteio <?php echo e(date('d/m/Y', strtotime($productModel->draw_date))); ?>

                    
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="text-center">
        <span class="valor <?php echo e($config->tema); ?>">POR APENAS</span>
        <span class="badge p-2" style="font-size: 14px; background: #000; color: #d1d1d1">R$
            <?php echo e($product[0]->price); ?></span>
    </div>
</div>

<?php if(env('REQUIRED_DESCRIPTION')): ?>
    <div class="" style="">
        <h5 class="mt-1 title-promo <?php echo e($config->tema); ?>">
            📋 Descrição
        </h5>
    </div>
    <div class="card mt-3 desc <?php echo e($config->tema); ?>">
        <p>
            <?php echo $productDescription; ?>

        </p>
    </div>
<?php endif; ?>


<div class="mt-2 d-flex text-center justify-content-center">
    <div class="text-center">
        <center>
            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::url()); ?>" target="_blank"
                rel="noreferrer noopener" role="button"><i class="fab fa-facebook botao-social"></i></a>
            <!-- Telegram -->
            <a href="https://telegram.me/share/url?url=<?php echo e(Request::url()); ?>"
                target="_blank" rel="noreferrer noopener" role="button"><i class="fab fa-telegram botao-social"></i></a>
            <!-- Whatsapp -->
            <a href="https://api.whatsapp.com/send?text=<?php echo e(Request::url()); ?>" target="_blank"
                rel="noreferrer noopener" role="button"><i class="fab fa-whatsapp botao-social"></i></a>
            <!-- Twitter -->
            <a href="https://twitter.com/intent/tweet?text=Vc%20pode%20ser%20o%20Próximo%20Ganhador%20<?php echo e(Request::url()); ?>"
                target="_blank" rel="noreferrer noopener" role="button"><i class="fab fa-twitter botao-social"></i></a>
        </center>

    </div>
</div>
<?php /**PATH C:\Users\Dener\Downloads\app_rifa\resources\views/rifas/common.blade.php ENDPATH**/ ?>