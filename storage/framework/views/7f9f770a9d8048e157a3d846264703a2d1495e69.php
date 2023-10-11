<?php $__env->startSection('content'); ?>
    <br><br>
    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key > 0): ?>
            <hr><hr>
        <?php endif; ?>

        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-12 justify-content-center text-center">
                <h6><?php echo e($video->title); ?></h6>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo e($video->link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

    <br><br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/tutorial.blade.php ENDPATH**/ ?>