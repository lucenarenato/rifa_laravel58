<?php $__env->startSection('content'); ?>
    <div class="container mt-3" style="max-width:100%;min-height:100%;">
        <div class="col d-flex justify-content-center">
            <h2>Ganhadores</h2>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(session('success')); ?></li>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('ganhador.addFoto')); ?>" method="POST" enctype="multipart/form-data" id="form-foto" class="d-none">
            <?php echo csrf_field(); ?>
            <input type="text" name="idGanhador" id="idGanhador">
            <input type="file" name="foto" id="btnFoto" accept="image/png, image/jpeg">
        </form>

        <table class="table table-striped table-bordered table-responsive-md table-hover align=center" id="table_rifas">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Ação</th>
                    <th>Prêmio</th>
                    <th>Acões</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ganhadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ganhador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="width: 50px;">
                            <?php if($ganhador->foto): ?>
                                <img src="<?php echo e(asset($ganhador->foto)); ?>" width="50">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/sem-foto.jpg')); ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td style="vertical-align: middle"><?php echo e($ganhador->ganhador); ?></td>
                        <td style="vertical-align: middle"><?php echo e($ganhador->rifa()->name); ?></td>
                        <td style="vertical-align: middle"><?php echo e($ganhador->descricao); ?></td>
                        <td style="vertical-align: middle">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" style="cursor: pointer" data-id="<?php echo e($ganhador->id); ?>"
                                        onclick="alterarFoto(this)"><i class="bi bi-pencil-square"></i>&nbsp;Alterar
                                        Foto</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function alterarFoto(el) {
        let idGanhador = el.dataset.id;
        $('#idGanhador').val(idGanhador)
        $('#btnFoto').click();
    }

    $(function(e) {
        document.getElementById("btnFoto").addEventListener("change", function() {
            $('#form-foto').submit()
        });
    })
</script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rifadigital/public_html/resources/views/painel/ganhadores.blade.php ENDPATH**/ ?>