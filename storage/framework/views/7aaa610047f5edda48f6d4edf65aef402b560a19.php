<style>
    body {
        background-color: #fff !important;
    }

    ul.nav.nav-tabs {
        /*background-color: #333;
        border-radius: 20px;*/
    }

    a.nav-link.active.show {
        background-color: #9c2526;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #222222 !important;
        border-radius: 10px;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .nav-tabs {
        border-bottom: none !important;
    }

    .nav-tabs .nav-link {
        margin-bottom: -1px;
        border-radius: 10px !important;
        border: 1px solid transparent;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #132439 !important;
        border-radius: 10px;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    /* width */
    #teste::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    #teste::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    #teste::-webkit-scrollbar-thumb {
        background: #28a745 !important;
        border-radius: 10px;
    }

    /* Handle on hover */
    #teste::-webkit-scrollbar-thumb:hover {
        background: #28a745 !important;
    }

    .list-group-item {
        background-color: #000 !important;
        border: 1px solid #333 !important;
        color: #fff;
    }

    .btn-auto {
        background-color: #E5E5E5 !important;
        border-radius: 10px !important;
        border-color: #E5E5E5 !important;
        font-size: 22px;
        min-height: 100px;
        justify-content: center !important;
        align-items: center !important;
        text-align: center;
    }

    .btn-popular {
        background-color: #fff !important;
        border-color: green !important;
    }

    .popular {
        background-color: green;
    }

    .text-popular {
        margin-top: -21px;
        right: 10px;
        position: absolute;
        margin-top: -55px;
        font-size: 12px !important;
        margin-right: 80px;
    }

    .item-ranking {
        /* width: 45% !important; */
        color: #000;
        background-color: #fff;
        border-radius: 0px;
        padding: 10px;
        border: 1px solid;
        margin-top: 10px !important;
        margin-left: 5px;
    }

    @media (max-width: 768px) {
        .text-popular {
            margin-right: 35px;
        }
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="container mt-3" style="max-width:100%;min-height:100%;">
        <div class="table-wrapper ">
            <div class="table-title">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <h2>Ranking</h2>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function submitRanking(){
                $('#form-ranking').submit()
            }
        </script>

        <form action="<?php echo e(route('resumo.rankingSelect')); ?>" id="form-ranking" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12">
                    <label>Seleciona a Rifa</label>
                    <select name="rifa" class="form-control" onchange="submitRanking()">
                        <?php $__currentLoopData = $rifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rifa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rifa->id); ?>" <?php echo e($rifaSelected->id == $rifa->id ? 'selected' : ''); ?>><?php echo e($rifa->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </form>

        <?php if(count($rifaSelected->rankingAdmin()) > 0): ?>
            <div class="card mt-4" style="border: none;border-radius: 10px;background-color: transparent;">
                <div class="card-body" style="background-color: #f1f1f1;border: none;border-radius: 10px;">
                    <div class="" style="">

                    </div>
                    <div class="text-center" style="margin-bottom: 10px;">
                        <h5 style="color: #000; font-weight: bold;">RANKING DE COMPRADORES - <?php echo e($rifaSelected->name); ?></h5>
                    </div>


                    <div class="row" style="display: flex;justify-content:center;position:relative">
                        <?php $__currentLoopData = $rifaSelected->rankingAdmin(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 btn-auto item-ranking" onclick="addQtd('5')">
                                <?php echo e($key + 1); ?>º <?php echo e($key === 0 ? '🥇' : '🥈'); ?><br>
                                <span style="font-size: 20px;font-weight: bold;"><?php echo e($rk->name); ?></span>
                                <br>
                                <span style="font-size: 12px;">Qtd. de Bilhetes
                                    <?php echo e($rk->totalReservas); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
        <?php else: ?>
                <p>Nenhum participante encontrado.</p>
                <span><strong>OBS.:</strong> Somente cotas pagas contam para o ranking!</span>
            </div>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rifadigital/public_html/resources/views/resumo-home/ranking.blade.php ENDPATH**/ ?>