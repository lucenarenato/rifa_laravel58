<?php $__env->startSection('content'); ?>
    <style>
        .item-compra {
            border: 1px solid;
            color: white;
            /* border-radius: 10px; */
        }

        .reservado {
            background-color: rgb(68, 124, 170);
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

    <div class="container" style="max-width:100%;min-height:100%;">
        <div class="row">
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

            <div class="col-md-12 text-center">
                <h3><?php echo e($rifa->name); ?></h3>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-secondary mr-2" onclick="toggleSearch()"><i class="fas fa-search"></i></button>

                <div class="dropdown mr-2">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" style="cursor: pointer" data-bs-toggle="modal"
                            data-bs-target="#modal_editar_rifa">Editar Sorteio</a>
                        <a class="dropdown-item" style="cursor: pointer" href="<?php echo e(route('product', $rifa->slug)); ?>"
                            target="_blank">Página do Sorteio</a>
                        <a class="dropdown-item" style="cursor: pointer"
                            onclick="liberarReservas('<?php echo e($rifa->id); ?>')">Liberar Reservas</a>
                        <a class="dropdown-item" style="cursor: pointer" onclick="clearModalCriarCompra()"
                            data-bs-toggle="modal" data-bs-target="#modal_criar_compra">Criar Compra</a>
                    </div>
                </div>

                <div class="d-flex">
                    <div title="Qtd de números livres"
                        class="info-qtd btn-secondary d-flex align-items-center p-1 qtd-livres">
                        <?php echo e($rifa->qtdNumerosDisponiveis()); ?> L</div>
                    <div title="Qtd de números reservados"
                        class="info-qtd btn-primary d-flex align-items-center p-1 qtd-reservas">
                        <?php echo e($rifa->qtdNumerosReservados()); ?> R</div>
                    <div title="Qtd de números pagos" class="info-qtd btn-success d-flex align-items-center p-1 qtd-pagos">
                        <?php echo e($rifa->qtdNumerosPagos()); ?> P</div>
                </div>


            </div>
        </div>

        <form action="<?php echo e(route('rifa.comprasBusca', $rifa->id)); ?>" method="POST">
            <div class="row mb-4 d-none" style="border: 1px solid #000; border-radius: 10px; padding: 5px;" id="div-search">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="col-md-6">
                    <label>Nome, e-mail</label>
                    <input type="text" class="form-control" name="search"
                        value="<?php echo e(isset($request['search']) ? $request['search'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label>Telefone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        value="<?php echo e(isset($request['telephone']) ? $request['telephone'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label>Cota</label>
                    <input type="text" class="form-control" name="cota"
                        value="<?php echo e(isset($request['cota']) ? $request['cota'] : ''); ?>">
                </div>
                <div class="col-md-2">
                    <label>ID da compra</label>
                    <input type="number" class="form-control" name="idCompra"
                        value="<?php echo e(isset($request['idCompra']) ? $request['idCompra'] : ''); ?>">
                </div>

                <div class="col-md-4">
                    <label>Situação</label>
                    <select name="situacao" id="" class="form-control">
                        <option></option>
                        <option value="reservado" <?php echo e($situacao == 'reservado' ? 'selected' : ''); ?>>Reservado</option>
                        <option value="pago" <?php echo e($situacao == 'pago' ? 'selected' : ''); ?>>Pago</option>
                    </select>
                </div>



                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-sm btn-secondary btn-block">Buscar</button>
                    <a href="<?php echo e(route('rifa.compras', $rifa->id)); ?>" class="btn btn-sm btn-info btn-block">Limpar Busca</a>
                </div>
            </div>
        </form>

        <?php if($participantes->count() === 0): ?>
            <div class="col-md-12 text-center">
                Nenhuma compra encontrada!
            </div>
        <?php endif; ?>

        <?php $__currentLoopData = $participantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($situacao != ''): ?>
                <?php if($situacao == $participante->situacao()): ?>
                    <div class="row p-1 item-compra <?php echo e($participante->qtdPagos() > 0 ? 'pago' : 'reservado'); ?>">
                        <div class="col-md-1">
                            <img class="rounded" src="/products/<?php echo e($rifa->imagem()->name); ?>" width="80">
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label>
                                #<?php echo e($participante->id); ?> <br>
                                <?php echo e($participante->name); ?>


                            </label>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <span>
                                <?php echo e(count($participante->numbers())); ?> Cotas <br>
                                R$ <?php echo e(number_format($participante->valor, 2, ',', '.')); ?>

                            </span>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-end">
                            <a href="javascript:void(0)" data-id="<?php echo e($participante->id); ?>"
                                onclick="detalhesParticipante(this)" class="edit btn btn-info float-right mr-1"><i
                                    class="fas fa-info-circle"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="row p-1 item-compra <?php echo e($participante->pagos > 0 ? 'pago' : 'reservado'); ?>">
                    <div class="col-md-1">
                        <img class="rounded" src="/products/<?php echo e($rifa->imagem()->name); ?>" width="80">
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <label>
                            #<?php echo e($participante->id); ?> <br>
                            <?php echo e($participante->name); ?>


                        </label>
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <span>
                            <?php echo e(count($participante->numbers())); ?> Cotas <br>
                            R$ <?php echo e(number_format($participante->valor, 2, ',', '.')); ?>

                        </span>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-end">
                        <a href="javascript:void(0)" data-id="<?php echo e($participante->id); ?>"
                            onclick="detalhesParticipante(this)" class="edit btn btn-info float-right mr-1"><i
                                class="fas fa-info-circle"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    
    <?php echo $__env->make('compras.modal.editarRifa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('compras.modal.criarCompra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    <?php echo $__env->make('compras.modal.detalhes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <form class="d-none" action="<?php echo e(route('addFoto')); ?>" id="form-foto" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="text" id="rifa-id" name="idRifa" value="<?php echo e($rifa->id); ?>">
        <input type="file" id="input-add-foto" accept="image/png,image/jpeg,image/jpg" multiple name="fotos[]">
    </form>

    <script>
        document.getElementById("input-add-foto").addEventListener("change", function(el) {
            $('#form-foto').submit();
        });

        document.getElementById('telephone').addEventListener('input', function(e) {
            var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
        });

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

        function addFoto(el) {
            $('#input-add-foto').click()
        }

        function excluirFoto(el) {
            if (el.dataset.qtd <= 1) {
                alert('A rifa precisa de pelo menos 1 foto, adicione outra antes de exlcuir!')
                return;
            }

            const data = {
                id: el.dataset.id
            }

            var id = el.dataset.id;
            var url = '<?php echo e(route('excluirFoto')); ?>'

            Swal.fire({
                title: 'Tem certeza que deseja excluir a foto ?',
                html: `<input type="hidden" id="id" class="swal2-input" value="` + id + `">`,
                inputAttributes: {
                    autocapitalize: 'off'
                },
                backdrop: true,
                showCancelButton: true,
                confirmButtonText: 'Excluir',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: (id) => {
                    return fetch(url, {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                            },
                            method: 'POST',
                            dataType: 'json',
                            body: JSON.stringify(data)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value.success) {
                    Swal.fire({
                        title: `Foto excluida com sucesso`,
                        icon: 'success',
                    }).then(() => {
                        $(`#foto-${id}`).remove();
                    })
                } else {
                    Swal.fire({
                        title: `Erro ao excluir tente novamente`,
                        text: 'Erro: ' + result.value.error,
                        icon: 'error',
                    })
                }
            })
        }

        function toggleSearch() {
            var el = document.getElementById('div-search')
            el.classList.toggle('d-none')
        }

        function liberarReservas(idRifa) {
            Swal.fire({
                title: 'Tem certeza que deseja liberar todas as reservas?',
                text: "Essa ação não poderá ser desfeita",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, liberar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo e(route('compras.liberarReservas')); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "id": idRifa
                        },
                        success: function(response) {
                            if (response.message) {
                                Swal.fire(
                                    'Sucesso!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location.reload()
                                })
                            } else {
                                Swal.fire(
                                    'Erro!',
                                    response.error,
                                    'danger'
                                )
                            }

                        },
                        error: function(error) {
                            Swal.fire(
                                'Erro!',
                                error,
                                'danger'
                            )
                        }
                    })
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dener\Downloads\app_rifa\resources\views/compras/compras.blade.php ENDPATH**/ ?>