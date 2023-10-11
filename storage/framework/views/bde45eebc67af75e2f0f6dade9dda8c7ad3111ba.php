<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<style>

</style>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
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

    function duvidas() {
        window.open('https://api.whatsapp.com/send?phone=<?php echo e($user->telephone); ?>', '_blank');
    }

    function verRifa(route) {
        window.location.href = route
    }
</script>

<?php $__env->startSection('content'); ?>
    <div class="container app-main" id="app-main">

        <div class="row justify-content-center">
            <div class="col-md-6 rifas <?php echo e($config->tema); ?>">
                <div class="app-title <?php echo e($config->tema); ?>">
                    <h1>⚡ Prêmios</h1>
                    <div class="app-title-desc <?php echo e($config->tema); ?>">Escolha sua sorte</div>
                </div>

                
                <?php $__currentLoopData = $products->where('favoritar', '=', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('product', ['slug' => $product->slug])); ?>">
                        <div class="card-rifa-destaque <?php echo e($config->tema); ?>">
                            <div class="img-rifa-destaque">
                                <img src="/products/<?php echo e($product->imagem()->name); ?>" alt="" srcset="">
                            </div>
                            <div class="title-rifa-destaque <?php echo e($config->tema); ?>">
                                <h1><?php echo e($product->name); ?></h1>
                                <p><?php echo e($product->subname); ?></p>
                                <div style="width: 100%;">
                                    <?php echo $product->status(); ?>

                                    <?php if($product->draw_date): ?>
                                        <br>
                                        <span class="data-sorteio <?php echo e($config->tema); ?>" style="font-size: 12px;">
                                            Data do sorteio <?php echo e(date('d/m/Y', strtotime($product->draw_date))); ?>

                                            
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php $__currentLoopData = $products->where('favoritar', '=', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('product', ['slug' => $product->slug])); ?>">
                        <div class="card-rifa <?php echo e($config->tema); ?>">
                            <div class="img-rifa">
                                <img src="/products/<?php echo e($product->imagem()->name); ?>" alt="" srcset="">
                            </div>
                            <div class="title-rifa title-rifa-destaque <?php echo e($config->tema); ?>">


                                <h1><?php echo e($product->name); ?></h1>
                                <p><?php echo e($product->subname); ?></p>

                                <div style="width: 100%;">
                                    <?php echo $product->status(); ?>

                                    <?php if($product->draw_date): ?>
                                        <br>
                                        <span class="data-sorteio <?php echo e($config->tema); ?>" style="font-size: 12px;">
                                            Data do sorteio <?php echo e(date('d/m/Y', strtotime($product->draw_date))); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <div onclick="duvidas()" class="container d-flex duvida" style="">
                    <div class="row">
                        <div class="d-flex icone-duvidas">🤷</div>
                        <div class="col text-duvidas <?php echo e($config->tema); ?>">
                            <h6 class="mb-0 font-md f-15">Dúvidas?</h6>
                            <p class="mb-0  font-sm f-12 text-muted">Fale conosco</p>
                        </div>
                    </div>
                </div>

                
                <?php if($ganhadores->count() > 0): ?>
                    <div class="app-title <?php echo e($config->tema); ?>">
                        <h1>🎉 Ganhadores</h1>
                        <div class="app-title-desc <?php echo e($config->tema); ?>">sortudos</div>
                    </div>
                    <div class="ganhadores">

                        
                        <?php $__currentLoopData = $winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ganhador <?php echo e($config->tema); ?>"
                                 onclick="verRifa('<?php echo e(route('product', ['slug' => $winner->slug])); ?>')">
                                <div class="ganhador-foto">
                                    <img src="images/sem-foto.jpg" class="" alt="<?php echo e($winner->name); ?>"
                                         style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                </div>
                                <div class="ganhador-desc <?php echo e($config->tema); ?>">
                                    <h3><?php echo e($winner->winner); ?></h3>
                                    <p>
                                        <strong>Sorteio: </strong>
                                        <?php echo e(date('d/m/Y', strtotime($winner->draw_date))); ?>

                                    </p>
                                </div>
                                <div class="ganhador-rifa">
                                    <img src="/products/<?php echo e($winner->imagem()->name); ?>">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $ganhadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ganhador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ganhador <?php echo e($config->tema); ?>"
                                 onclick="verRifa('<?php echo e(route('product', ['slug' => $ganhador->rifa()->slug])); ?>')">
                                <div class="ganhador-foto">
                                    <?php if($ganhador->foto): ?>
                                        <img src="<?php echo e(asset($ganhador->foto)); ?>" class="" alt=""
                                             style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                    <?php else: ?>
                                        <img src="images/sem-foto.jpg" class="" alt=""
                                             style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                    <?php endif; ?>

                                </div>
                                <div class="ganhador-desc <?php echo e($config->tema); ?>">
                                    <h3><?php echo e($ganhador->ganhador); ?></h3>
                                    <p>
                                        Ganhou <strong><?php echo e($ganhador->descricao); ?></strong> cota <span
                                                class="badge bg-success p-1"
                                                style="border-radius: 5px;"><?php echo e($ganhador->cota); ?></span> <br>
                                        <strong>Sorteio: </strong>
                                        <?php echo e(date('d/m/Y', strtotime($ganhador->rifa()->draw_date))); ?>

                                    </p>
                                </div>
                                <div class="ganhador-rifa">
                                    <img src="/products/<?php echo e($ganhador->rifa()->imagem()->name); ?>">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                <?php endif; ?>
                
                <div class="perguntas-frequentes pb-2">
                    <div class="app-title <?php echo e($config->tema); ?>">
                        <h1>🤷 Perguntas frequentes</h1>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                    Acessando suas compras
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Existem <strong>duas</strong> formas de você conseguir acessar suas compras, a
                                    primeira é logando no site, clicando no carrinho de compras no menu superior e a
                                    segunda é visitando o sorteio e clicando em "Ver meus números".
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                    Como envio o comprovante ?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Existem <strong>duas</strong> formas de você conseguir acessar suas compras, a
                                    primeira é logando no site, clicando no carrinho de compras no menu superior e a
                                    segunda é visitando o sorteio e clicando em "Ver meus números".
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer" style="text-align: center">
                        Desenvolvido por M 7 INTERMEDIACOES DIGITAIS LTDA 51.695.927/0001-24
                    </footer>
                </div>
            </div>
        </div>
        <br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dener\Downloads\app_rifa\resources\views/welcome.blade.php ENDPATH**/ ?>