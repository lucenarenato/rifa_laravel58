<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>

<style>
    body {
        /*background-color: #181818 !important;*/
        /*background-color: #132439 !important;*/
        background-color: #000 !important;
        background-size: cover;
        width: 100%;
        background-position: bottom;
        background-repeat: no-repeat;
        padding-top:40px;


        /*background-image: url('images/background-asfalto.jpg');*/
    }
</style>


<?php $__env->startSection('title', 'Page Title'); ?>


<?php $__env->startSection('sidebar'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="container rounded-top-5" id="" style="background-color:#e3e3e3;padding-bottom:75px;min-height: 100vh;" >
        <?php if(!empty($winners[0])): ?>
            <h1 class="mt-3" id="ganhadores">
               🎉 Ganhadores
               <small class="text-muted" style="font-size: 15px;">sortudos</small>
            </h1>

            <div class="container">

                <?php $__currentLoopData = $winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="row mt-1" style="background-color: #fff;padding: 5px;border-radius: 20px;color: #000;">
                        <div class="col-2" style="justify-content: center;align-items: center;text-align: center;display: flex;border: 1px green solid; border-radius: 15px;">
                            <a href="<?php echo e(route('product', ['id' => $winner->id])); ?>">
                                <img src="images/sem-foto.jpg" class="" alt="<?php echo e($winner->name); ?>" style="min-height: 50px;max-height: 20px;border-radius:10px;">
                            </a>
                        </div>
                        <div class="col-8">
                            <?php echo $winner->winner; ?><br>
                            Sorteio: <a href="<?php echo e(route('product', ['id' => $winner->id])); ?>" style="color:#28a745"><?php echo e($winner->name); ?></a>
                        </div>
                        <div class="col-2" style="justify-content: center;align-items: center;text-align: center;display: flex;">
                            <a href="<?php echo e(route('product', ['id' => $winner->id])); ?>">
                                <img src="<?php echo e(asset('products/' . $winner->imagem()->name)); ?>" class="" alt="<?php echo e($winner->name); ?>" style="min-height: 50px;max-height: 20px;border-radius:250px;">
                            </a>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rifadigital/public_html/resources/views/ganhadores.blade.php ENDPATH**/ ?>