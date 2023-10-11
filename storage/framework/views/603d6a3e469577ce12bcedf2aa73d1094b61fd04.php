<div class="row">
    <div class="col-3">
        <img src="/products/<?php echo e($rifa->imagem()->name); ?>" width="100%" style="border-radius: 10px;">
    </div>
    <div class="col-9">
        <h3><?php echo e($rifa->name); ?></h3>
        <h6><strong>Data do sorteio: </strong><?php echo e(date('d/m/Y', strtotime($rifa->draw_date))); ?></h6>
    </div>
</div>

<?php $__currentLoopData = $rifa->premios()->where('descricao', '!=', '')->where('participant_id', '!=', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <hr>
    <div class="row mt-2">
        <div class="col-1">
            <h1 style="font-size: 50px;">
                <?php echo e($premio->ordem); ?>

            </h1>
        </div>
        <div class="col-9" style="font-size: 14px; line-height: 12px;">
            <label>Nome: <?php echo e($premio->ganhador); ?></label> <br>
            <label>
                Telefone: 
                <span id="tel-hide-<?php echo e($premio->id); ?>"><?php echo e(substr($premio->telefone, 0, 4)); ?> *****-****</span>
                <span class="d-none" id="tel-show-<?php echo e($premio->id); ?>"><?php echo e($premio->telefone); ?></span>
                <i class="far fa-eye" id="eye-show" onclick="toggleTelefone('<?php echo e($premio->id); ?>')" style="cursor: pointer"></i>
                <i class="far fa-eye-slash d-none" id="eye-hide" onclick="toggleTelefone('<?php echo e($premio->id); ?>')" style="cursor: pointer"></i>
            </label>
            <br>
            <label>Status: <?php echo $premio->participante()->statusBadge(); ?></label> <br>
            <label>Rifa: <?php echo e($rifa->name); ?></label> <br>
            <label>Data da Compra: <?php echo e(date('d/m/Y H:i', strtotime($premio->participante()->created_at))); ?></label> <br> 
            <label> Número Sorteado:&nbsp;</label><span class="badge bg-success"> <?php echo e($premio->cota); ?></span> <br>
            <label>Valor Pago: </label> <span class="badge bg-primary">R$ <?php echo e(number_format($premio->participante()->valor, 2, ",", ".")); ?></span> <br>
            <label><?php echo e($premio->participante()->pagos + $premio->participante()->reservados); ?> Bilhete(s) comprados</label> <br>
            
            <label>Prêmio: <?php echo e($premio->descricao); ?></label> <br>
            <a href="<?php echo e($premio->linkWpp()); ?>" target="_blank" class="btn btn-sm btn-success" style="font-size: 12px;"><i class="fab fa-whatsapp"></i>&nbsp; ENTRAR EM CONTATO</a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    function toggleTelefone(id){
        var telHide = document.getElementById(`tel-hide-${id}`)
        var telShow = document.getElementById(`tel-show-${id}`)
        var eyeShow = document.getElementById('eye-show')
        var eyeHide = document.getElementById('eye-hide')

        telHide.classList.toggle('d-none')
        telShow.classList.toggle('d-none')
        eyeShow.classList.toggle('d-none')
        eyeHide.classList.toggle('d-none')
    }
</script><?php /**PATH /home/s02com/rifapress/rifapress-v9.0.0.s02.com.br/resources/views/layouts/ver-ganhadores.blade.php ENDPATH**/ ?>