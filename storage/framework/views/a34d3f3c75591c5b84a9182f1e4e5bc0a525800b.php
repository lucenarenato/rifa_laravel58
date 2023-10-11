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

                <form class="login100-form validate-form" method="POST" action="<?php echo e(route('afiliado.reset_password_store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                    <span class="login100-form-title">
                        Recuperar Senha
                    </span>
                    <?php if($msg): ?>
                    <div class="text-center">
                        <?php echo e($msg); ?>

                    </div>
                    <?php endif; ?>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" value="<?php echo e(old('email')); ?>" name="email"
                            placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Enviar link de redefinição de senha
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <a class="txt2" href="<?php echo e(route('afiliado.home')); ?>">
                            Já possiui cadastro ? Faça Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
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
<?php /**PATH /home/rifadigital/public_html/resources/views/afiliados/email.blade.php ENDPATH**/ ?>