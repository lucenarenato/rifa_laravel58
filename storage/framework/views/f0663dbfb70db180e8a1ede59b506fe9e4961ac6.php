<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="title">
            <h3 style="color: #fff"><i style="color: #fff" class="bi bi-clock-history"></i> ENTRAR</h3>
        </div>
        <div class="sub-title" style="color: #fff">Crie seus próprios sorteios!</div>

        <form class="form-signin" method="POST" action="<?php echo e(route('login')); ?>" style="text-align: center;">
            <?php echo e(csrf_field()); ?>


            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label style="color: #fff" for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-12"
                    style="max-width: 250px;
    display: block;
    margin-right: auto;
    margin-left: auto;">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                        required autofocus>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" style="color: #fff" class="col-md-4 control-label">Senha</label>

                <div class="col-md-12"
                    style="max-width: 250px;
    display: block;
    margin-right: auto;
    margin-left: auto;">
                    <input id="password" type="password" class="form-control" name="password" required>

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div style="margin-top: 15px" class="">
                    <button type="submit" class="btn btn-outline-primary">
                        Entrar
                    </button>
                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dener\Downloads\app_rifa\resources\views/auth/login.blade.php ENDPATH**/ ?>