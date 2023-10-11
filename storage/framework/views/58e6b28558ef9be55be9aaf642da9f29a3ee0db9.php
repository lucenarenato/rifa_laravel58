<!-- Stored in resources/views/layouts/master.blade.php -->

<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="color-scheme" content="light only">
    <meta name="X-DarkMode-Default" value="false"/>
    <?php echo $__env->yieldContent('ogContent'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo e(mix('css/rifapress.css')); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <!--<script defer src="<?php echo e(mix('js/app.js')); ?>"></script>
    <script src="//<?php echo e(Request::getHost()); ?>:6001/socket.io/socket.io.js"></script>-->

    <title><?php echo @$data['social']->name; ?> <?php echo $__env->yieldContent('title'); ?></title>


    <meta name="facebook-domain-verification" content="<?php echo @$data['social']->verify_domain_fb; ?>"/>

    <?php echo @$data['social']->pixel; ?>


    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("<?php echo @$data['social']->key_pix_public; ?>");
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('css/menu2.css')); ?>">
</head>

<body>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->yieldSection(); ?>

<?php
$subDomain = explode('.', request()->getHost());
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div id="loadingSystem" class="d-none"></div>


<nav class="navbar navbar-expand-lg  fixed-top px-0 py-3 " style="background-color:#000;">

    <div class="container header-menu" style="justify-content:space-evenly;align-items: center;">
        <div class="col-md-6 col-12 d-flex justify-content-between align-items-center">
            <div>
                <a class="" href="<?php echo e(route('inicio')); ?>"
                   style="color: #ffffff!important;font-family: 'Roboto Condensed', sans-serif;">
                    <?php if(@$data['social']->logo): ?>
                        <img src="<?php echo e(asset('products/' . @$data['social']->logo)); ?>" alt="" width="100"
                             height="50">
                    <?php else: ?>
                        SEU SCRIPT
                    <?php endif; ?>
                </a>
            </div>

            <div>
                <a href="#" data-bs-toggle="modal" data-bs-target="#consultar-reservas"
                   style="text-decoration: none; font-size: 12px; color: #fff">
                    <?php if(env('APP_URL') == 'seuscript.com.br'): ?>
                        <span class="badge bg-success p-2" style="font-size: 10px;"><i
                                    class="fas fa-search"></i>&nbsp;MEUS NÚMEROS</span>
                    <?php else: ?>
                        <i class="bi bi-cart-check"
                           style="margin-top: 10px;font-size: 35px;color: rgb(180, 180, 180) !important; opacity: 1;"></i>
                    <?php endif; ?>
                </a>

                <button type="button" aria-label="Menu" class="btn btn-link text-white" data-bs-toggle="modal"
                        data-bs-target="#mobileMenu" style="margin-top: -15px;"><i class="bi bi-filter-right"
                                                                                   style="font-size: 40px;"></i>
                </button>
            </div>
        </div>
    </div>
    </div>
</nav>

<menu id="mobileMenu" class="modal fade modal-fluid" tabindex="-1" aria-labelledby="mobileMenuLabel"
      style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-cor-primaria">
            <header class="app-header app-header-mobile--show">
                <div class="container container-600 h-100 d-flex align-items-center justify-content-between">
                    <a href="/">
                        <?php if(@$data['social']->logo): ?>
                            <img src="<?php echo e(asset('products/' . @$data['social']->logo)); ?>" alt=""
                                 class="app-brand img-fluid">
                        <?php else: ?>
                            SEU SCRIPT
                        <?php endif; ?>
                    </a>
                    <div class="app-header-mobile">
                        <button type="button"
                                class="btn btn-link text-white menu-mobile--button pe-0 font-lgg"
                                data-bs-dismiss="modal" aria-label="Fechar"><i class="bi bi-x-circle"></i></button>
                    </div>
                </div>
            </header>
            <div class="modal-body" style="background: #000 !important">
                <div class="container container-600">
                    <nav class="nav-vertical nav-submenu font-xs mb-2">
                        <ul>
                            <li><a class="text-white" alt="Página Principal" href="/"><i
                                            class="icone bi bi-house"></i><span>Início</span></a></li>
                            <?php if(env('AFILIADOS')): ?>
                                <li><a class="text-white" alt="Área de Afiliados"
                                       href="<?php echo e(route('afiliado.home')); ?>"><i
                                                class="icone fas fa-people-arrows"></i><span>Área de
                                                Afiliados</span></a>
                                </li>
                            <?php endif; ?>
                            <li><a class="text-white" alt="Sorteios" href="/sorteios"><i
                                            class="icone bi bi-card-list"></i><span>Sorteios</span></a></li>
                            <li><a class="text-white" alt="Meus Números" data-bs-toggle="modal"
                                   data-bs-target="#consultar-reservas"><i
                                            class="icone bi bi-card-list"></i><span>Meus números</span></a>
                            </li>
                            <li><a alt="Créditos" class="text-white" href="<?php echo e(route('ganhadores')); ?>"><i
                                            class="icone bi bi-lightning-charge"></i><span>Ganhadores</span></a></li>
                            </li>
                        </ul>
                    </nav>
                    <div class="text-center">
                        <a href="/login" class="btn btn-primary w-100 rounded-pill">
                            <i class="icone bi bi-box-arrow-in-right"></i>
                            Entrar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</menu>


    <?php if(@$data['social']->group_whats !== null): ?>
        <div class="row  d-flex mt-5">
        <a class="rifapress_zap" href="<?php echo @$data['social']->group_whats; ?>"
           data-toggle="tooltip" data-placement="top" title="Whatsapp">
            <i class="bi bi-whatsapp rifapress_bi_zap"></i></a>
        </div>
    <?php endif; ?>


<!-- Modal  consultar -->
<div class="modal fade" id="consultar-reservas" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" style="background-color: #020f1e;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">CONSULTAR RESERVAS</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #020f1e;">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo e(route('minhasReservas')); ?>" method="POST" style="display: flex;">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="telephone" id="telephone"
                                   style="background-color: #fff;border: none;color: #000000;margin-right:5px;"
                                   aria-describedby="passwordHelpBlock" maxlength="15" placeholder="Celular com DDD"
                                   class="form-control" required>
                            <button type="submit" class="btn btn-danger">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(@$data['social']->group_whats != null): ?>
    <a href="<?php echo e(@$data['social']->group_whats); ?>" class="botao-flutuante botao-flutuante-whats" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
<?php endif; ?>

<?php if(@$data['social']->instagram != null): ?>
    <a href="<?php echo e(@$data['social']->instagram); ?>" class="botao-flutuante botao-flutuante-insta" target="_blank">
        <i class="fab fa-instagram"></i>
    </a>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>


<footer class="footer" style="text-align: center">
    <a href="https://seuscript.com.br/" target="_blank">Desenvolvido por SEU SCRIPT
    </a>
</footer>


<script>
    document.getElementById('telephone').addEventListener('input', function (e) {
        var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
        e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
    });

    document.getElementById('telephone1').addEventListener('input', function (e) {
        var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
        e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
    });

    function loading() {
        var el = document.getElementById('loadingSystem');
        el.classList.toggle("d-none");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
<?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/layouts/app.blade.php ENDPATH**/ ?>