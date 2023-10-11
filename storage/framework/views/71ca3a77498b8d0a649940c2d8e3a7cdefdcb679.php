<style>
    .item-compra {
        border: 1px solid;
        color: white;
        background-color: #000;
        border-radius: 5px;
        /* border-radius: 10px; */
    }

    .reservado {
        /* background-color: rgb(68, 124, 170); */
    }

    .pago {
        background-color: rgb(17, 109, 17);
    }

    .qtd-livres {
        padding-left: 10px !important;
        padding-right: 10px !important;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .qtd-pagos {
        padding-left: 10px !important;
        padding-right: 10px !important;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .qtd-reservas {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    .info-qtd {
        cursor: pointer;
    }
</style>



<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('compras.modal.detalhes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="container" style="max-width:100%;min-height:100%;">
        <div class="col-md-12 text-center">
            <h4>Resumo Aguardando Pgto.</h4>
            <h6>Participantes: <?php echo e($participantes->count()); ?></h6>
            <h6>Total de Cotas: <?php echo e($participantes->sum('reservados')); ?></h6>
            <h6>Total: R$ <?php echo e(number_format($participantes->sum('valor'), 2, ',', '.')); ?></h6>
        </div>

        <form action="<?php echo e(route('resumo.pendentesSearch')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row mt-4 mb-4">
                <div class="col-md-2">
                    <label>Cota</label>
                    <input type="text" class="form-control" name="cota" required>
                </div>
                <div class="col-md-1">
                    <label></label>
                    <button type="submit" class="btn btn-sm btn-success form-control mt-4"><i class="fas fa-search"></i>&nbsp;Buscar</button>
                </div>
                <div class="col-md-2">
                    <label></label>
                    <a href="<?php echo e(route('resumo.pendentes')); ?>" class="btn btn-sm btn-info form-control mt-4">Limpar Busca</a>
                </div>
            </div>
        </form>

        <?php if($participantes->count() == 0): ?>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5>Nenhum resultado encontrado!</h5>
                </div>
            </div>
        <?php endif; ?>


        <?php $__currentLoopData = $participantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row p-1 item-compra reservado">
                <div class="col-md-1">
                    <img class="rounded" src="/products/<?php echo e($participante->rifa()->imagem()->name); ?>" width="80">
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <label>
                        <span class="bg-success">Rifa:</span> <?php echo e($participante->rifa()->name); ?> <br>

                        <span class="bg-success">Participante:</span> <?php echo e($participante->name); ?>


                    </label>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <span>
                        <?php echo e(count($participante->numbers())); ?> Cotas <br>
                        R$ <?php echo e(number_format($participante->valor, 2, ',', '.')); ?>

                    </span>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-end">
                    <a href="javascript:void(0)" data-id="<?php echo e($participante->id); ?>" onclick="detalhesParticipante(this)"
                        class="edit btn btn-info float-right mr-1"><i class="fas fa-info-circle"></i></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($paginate): ?>
            <?php echo e($participantes->links()); ?>

        <?php endif; ?>
    </div>

    <script>
        function detalhesParticipante(el) {
            var contentModal = document.getElementById('content-modal-detalhes-compra');
            loading()
            $.ajax({
                url: "<?php echo e(route('compras.detalhes')); ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": el.dataset.id
                },
                success: function(response) {
                    loading();
                    console.log(response.html);
                    $('#content-modal-detalhes-compra').html(response.html)
                    $('#modal_detalhes_compra').modal('show')
                },
                error: function(error) {
                    loading();
                    Swal.fire(
                        'Erro Desconhecido!',
                        '',
                        'error'
                    )
                }
            })
    
    
    
        }
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rifadigital/public_html/resources/views/resumo-home/pendente.blade.php ENDPATH**/ ?>