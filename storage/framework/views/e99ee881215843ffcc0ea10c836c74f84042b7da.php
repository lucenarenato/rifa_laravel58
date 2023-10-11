<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resumo Rifa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        .quadro {
            width: 25%;
            border: solid;
            border-width: thin;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: white;
            font-weight: bold;
        }

        .f-12 {
            font-size: 12px;
        }
    </style>
    <style>
        @page  {
            size: A4
        }
    </style>
</head>

<body>
    <center>
        <h3><?php echo e($participante->rifa()->name); ?></h3>
    </center>
    <br>

    <div style="width: 90% !important;">
        <div class="row">
            <div class="col-md-4">
                <label>
                    <strong>Nome: </strong> <?php echo e($participante->name); ?>

                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>
                    <strong>Telefone: </strong> <?php echo e('(**) ***** - ' . substr($participante->telephone, -4)); ?>

                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>
                    <strong>Status: </strong> <?php echo e($participante->reservados > 0 ? 'Reservado' : 'Pago'); ?>

                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>
                    <strong>Cotas </strong>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="max-width: 100%;">
                <label>
                    <?php $__currentLoopData = $participante->numbers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key > 0): ?>
                        , 
                    <?php endif; ?>
                        <?php echo e($number); ?>

                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </label>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH /home/rifadigital/public_html/resources/views/pdf/resumoRifa.blade.php ENDPATH**/ ?>