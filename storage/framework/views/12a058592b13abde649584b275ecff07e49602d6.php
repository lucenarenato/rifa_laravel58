<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo @$data['social']->name; ?> <?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/icons/favicon.ico')); ?>" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/animate/animate.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo e(asset('images/img-01.png')); ?>" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="<?php echo e(route('afiliado.novo')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <span class="login100-form-title">
                        Afiliado - Novo Cadastro <br>
                        <?php if(@$data['social']->logo): ?>
                            <img src="<?php echo e(asset('products/' . @$data['social']->logo)); ?>" alt="" width="100"
                                height="50">
                        <?php else: ?>
                            SEU SCRIPT
                        <?php endif; ?>
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nome" value="<?php echo e(old('nome')); ?>"
                            placeholder="Nome" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" value="<?php echo e(old('email')); ?>"
                            placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="cpf" value="<?php echo e(old('cpf')); ?>"
                            placeholder="CPF" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-id-card"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="pix" value="<?php echo e(old('pix')); ?>"
                            placeholder="Chave PIX" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-key"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="senha" placeholder="Senha" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="conf_senha" placeholder="Confirmar Senha"
                            required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Cadastrar
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <a class="txt2" href="<?php echo e(route('afiliado.home')); ?>">
                            Já possiui cadastro ? Faça Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/tilt/tilt.jquery.min.js')); ?>"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('js/main.js"')); ?>></script>

</body>

</html>
<?php /**PATH /home/rifadigital/public_html/resources/views/afiliados/cadastro.blade.php ENDPATH**/ ?>