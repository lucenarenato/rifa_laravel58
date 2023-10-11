<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<style>
    body {
        background: #000 !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(function(e) {
        // if (isIOS()) {
        //     $('#app-main').attr('style', 'margin-top: 100px !important');
        // }
    })

    function isIOS() {
        var ua = navigator.userAgent.toLowerCase();

        //Lista de dispositivos que acessar
        var iosArray = ['iphone', 'ipod'];

        var isApple = false;

        if (ua.includes('iphone') || ua.includes('ipod')) {
            isApple = true
        }

        return isApple;
    }

    function verRifa(route) {
        window.location.href = route
    }
</script>


<style>
    @media (max-width: 768px) {
        .app-main {
            margin-top: 50px !important;
        }
    }

    @media  only screen and (-webkit-min-device-pixel-ratio: 1) {

        ::i-block-chrome,
        .app-main {
            margin-top: 100px !important;
        }
    }

    .app-main {
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        max-width: 600px;
        margin-top: 40px;
        margin-bottom: 50px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .app-main a {
        text-decoration: none;
    }

    .app-main a:hover {
        text-decoration: none;
    }

    .app-title {
        display: flex;
        align-items: self-end;
        padding-bottom: 10px;
    }

    .app-title h1 {
        color: rgba(0, 0, 0, .9);
        padding-right: 5px;
        font-weight: 600;
        font-size: 1.3em;
        margin: 0;
        padding-top: 10px;
    }

    .app-title .app-title-desc {
        color: rgba(0, 0, 0, .5);
        padding-top: 6px;
        font-size: .9em;
    }


    /* *************************************************************** */
    /* Card Rifa em Destaque */
    /* *************************************************************** */
    .rifas {
        background: #e4e4e4;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        position: absolute;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        min-height: 100vh;
    }

    .rifa-dark {
        background-color: #383838;
    }

    .card-rifa-destaque .img-rifa-destaque img {
        width: 100%;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }

    .card-rifa-destaque {
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        padding-bottom: 10px;
        background: #fff;
        margin-bottom: 10px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .title-rifa-destaque {
        padding-top: 5px;
        padding-left: 10px;
    }

    .title-rifa-destaque h1 {
        color: #202020;
        -webkit-line-clamp: 2 !important;
        margin-bottom: 1px;
        font-weight: 500;
        font-size: 1em;
    }

    .title-rifa-destaque p {
        color: rgba(0, 0, 0, .7);
        font-size: .75em;
        max-width: 96%;
        margin: 0;
    }

    /* *************************************************************** */


    /* *************************************************************** */
    /* Card Rifa Normal */
    /* *************************************************************** */
    .card-rifa img {
        width: 100px;
        height: 100px;
        border-radius: 10px;
    }

    .card-rifa {
        background: #fff;
        padding: 5px;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex
    }

    .title-rifa {
        margin-left: 15px;
        width: 100%;
    }

    .blink {
        margin-top: 5px;
        animation: animate 1.5s linear infinite;
    }



    @keyframes  animate {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 0.7;
        }

        100% {
            opacity: 0;
        }
    }
</style>


<?php $__env->startSection('content'); ?>
    <style>
        .duvida {
            background-color: #ffffff5e;
            border-radius: 10px;
            height: 60px;
            align-items: center;
            justify-content: center;
            margin-top: 7px;
            cursor: pointer;
        }

        .icone-duvidas {
            width: 50px;
            justify-content: center;
            align-items: center;
            background-color: #b9b9b9;
            height: 35px;
            border-radius: 10px;
            text-align: center;
            font-size: 20px;
        }

        .text-duvidas {
            display: flex !important;
            flex-direction: column;
            justify-content: center
        }

        .f-15 {
            font-size: 15px;
        }

        .f-12 {
            font-size: 12px;
        }

        .data-sorteio {
            /* float: right; */
            padding-right: 10px;
            font-weight: thin;
            text-align: center;
            /* margin-top: 10px; */
            color: #000;
        }

        .rifas.dark {
            background: #383838;
        }

        .app-title.dark h1 {
            color: #fff;
        }

        .app-title-desc.dark {
            color: #fff;
        }

        .card-rifa-destaque.dark {
            background: #222222;
        }

        .title-rifa-destaque.dark h1 {
            color: #fff;
        }

        .title-rifa-destaque.dark p {
            color: #fff;
        }

        .card-rifa.dark {
            background: #222222;
        }

        .text-duvidas.dark h6 {
            color: #fff;
        }

        .text-duvidas.dark p {
            color: #fff !important;
        }

        .data-sorteio.dark {
            color: #fff !important;
        }

        .app-title.dark {
            color: #fff;
        }
    </style>

    <div class="container app-main" id="app-main">

        <div class="row justify-content-center">
            <div class="col-md-6 col-12 rifas <?php echo e($config->tema); ?>">
                <div class="app-title <?php echo e($config->tema); ?>">
                    <h1>🛒 Compras</h1>
                    <div class="app-title-desc <?php echo e($config->tema); ?>">recentes</div>
                </div>

                

                <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card app-card mb-2 pointer border-bottom-warning">
                        <div class="card-body">
                            <div class="row align-items-center row-gutter-sm">
                                <div class="col-auto">
                                    <div class="position-relative rounded-pill overflow-hidden box-shadow-08"
                                        style="width: 56px; height: 56px;">
                                        <div
                                            style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;">
                                            <img alt="" src="/products/<?php echo e($reserva->rifa()->imagem()->name); ?>"
                                                decoding="async" data-nimg="fill"
                                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"><noscript></noscript>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ps-2"><small
                                        class="compra-data font-xss opacity-50"><?php echo e(date('d/m/Y H:i', strtotime($reserva->created_at))); ?></small>
                                    <div class="compra-title font-weight-500"><?php echo e($reserva->rifa()->name); ?></div><small
                                        class="font-xss opacity-75 text-uppercase"><?php echo e($reserva->status()); ?> (<?php echo e($reserva->pagos + $reserva->reservados); ?> COTAS)</small>
                                    <?php if($reserva->pagos > 0): ?>
                                        <div class="compra-cotas font-xs" style="max-height: 200px;overflow: auto;">
                                            <?php if($reserva->rifa()->modo_de_jogo == 'numeros'): ?>
                                                <?php $__currentLoopData = $reserva->pagos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numPago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="badge bg-success me-1"><?php echo e($numPago); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $reserva->pagos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numPago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span
                                                        class="badge bg-success me-1"><?php echo e($numPago->grupoFazendinha()); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                    <?php else: ?>
                                        <div class="compra-cotas font-xs" style="max-height: 200px;overflow: auto;">
                                            <?php if($reserva->rifa()->type_raffles == 'automatico'): ?>
                                                Números serão gerados após o pagamento!
                                            <?php else: ?>
                                                <?php $__currentLoopData = $reserva->reservados(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numRes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="badge bg-success me-1"><?php echo e($numRes); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>


                                        </div>
                                        <?php if($reserva->qtdReservados() > 0): ?>
                                            <br>
                                            <a href="<?php echo e(route('pagarReserva', $reserva->id)); ?>">
                                                <div class="col-12 pt-2">
                                                    <span class="btn btn-warning btn-sm p-1 px-2 w-100 font-xss">Efetuar pagamento <i class="bi bi-chevron-right"></i></span>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

    <br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/minhas-reservas.blade.php ENDPATH**/ ?>