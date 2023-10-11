<?php $__env->startComponent('mail::message'); ?>
# Link de Recuperação de Senha
 
validade de 1 hora!
 
<?php $__env->startComponent('mail::button', ['url' => $link]); ?>
Recuperar a Senha
<?php echo $__env->renderComponent(); ?>
 
Equipe,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH /home/rifadigital/public_html/resources/views/emails/password_reset_afiliado.blade.php ENDPATH**/ ?>