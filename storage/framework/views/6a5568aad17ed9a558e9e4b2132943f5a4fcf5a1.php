    <!-- Modal Editar Rifa -->
    <div id="modal_editar_rifa" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form action="<?php echo e(route('update', ['id' => $rifa->id])); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <?php echo method_field('PUT'); ?>
                    <?php echo e(csrf_field()); ?>


                    <div class="modal-body">

                        <div class="container mt-3">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <h2>Edita Rifa</h2>

                            <div class="row">
                                <div class="col-12">
                                    <nav>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 12px;">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="geral-tab" data-toggle="tab"
                                                    href="#geral<?php echo e($rifa->id); ?>" role="tab"
                                                    aria-controls="geral" aria-selected="true">Geral</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="premios-tab" data-toggle="tab"
                                                    href="#premios<?php echo e($rifa->id); ?>" role="tab"
                                                    aria-controls="premios" aria-selected="true">Prêmios</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="ajustes-tab" data-toggle="tab"
                                                    href="#ajustes<?php echo e($rifa->id); ?>" role="tab"
                                                    aria-controls="ajustes" aria-selected="false">Ajustes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="promocao-tab" data-toggle="tab"
                                                    href="#promocao<?php echo e($rifa->id); ?>" role="tab"
                                                    aria-controls="promocao" aria-selected="false">Promoção</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="fotos-tab" data-toggle="tab"
                                                    href="#fotos<?php echo e($rifa->id); ?>" role="tab"
                                                    aria-controls="fotos" aria-selected="false">Fotos</a>
                                            </li>
                                        </ul>
                                    </nav>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active"
                                            id="geral<?php echo e($rifa->id); ?>" role="tabpanel"
                                            aria-labelledby="geral-tab">
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="product_id"
                                                        value="<?php echo e($rifa->id); ?>">
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleInputEmail1">Nome</label>
                                                        <input type="text" class="form-control"
                                                            name="name"
                                                            value="<?php echo e($rifa->name); ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Valor</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text">R$:</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            name="price"
                                                            value="<?php echo e($rifa->price); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleInputEmail1">Sub Titulo</label>
                                                        <input type="text" class="form-control"
                                                            name="subname"
                                                            value="<?php echo e($rifa->subname); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Qtd mínima de
                                                            compra</label>
                                                        <input type="number" class="form-control"
                                                            min="1" max="999999"
                                                            name="minimo"
                                                            value="<?php echo e($rifa->minimo); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Qtd máxima de
                                                        compra</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                            name="maximo"
                                                            value="<?php echo e($rifa->maximo); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Tempo de expiração
                                                        (min)
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                            name="expiracao" min="0"
                                                            value="<?php echo e($rifa->expiracao); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <label for="">Mostar Ranking de
                                                        compradores (Qtd)</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                            name="qtd_ranking"
                                                            value="<?php echo e($rifa->qtd_ranking); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Mostrar Parcial (%)</label>
                                                    <select name="parcial"class="form-control">
                                                        <option value="1"
                                                            <?php echo e($rifa->parcial == 1 ? 'selected' : ''); ?>>
                                                            Sim</option>
                                                        <option value="0"
                                                            <?php echo e($rifa->parcial == 0 ? 'selected' : ''); ?>>
                                                            Não</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <label>Gateway de Pagamento</label>
                                                    <select name="gateway"class="form-control">
                                                        <option value="mp" <?php echo e($rifa->gateway == 'mp' ? 'selected' : ''); ?>>Mercado Pago</option>
                                                        <option value="paggue" <?php echo e($rifa->gateway == 'paggue' ? 'selected' : ''); ?>>Paggue</option>
                                                        <option value="asaas" <?php echo e($rifa->gateway == 'asaas' ? 'selected' : ''); ?>>ASAAS</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>% de Ganho do Afiliado</label>
                                                    <input type="number" class="form-control" name="ganho_afiliado" value="<?php echo e($rifa->ganho_afiliado); ?>">
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <label>Descrição</label>
                                                    <textarea class="form-control summernote" name="description" id="desc-<?php echo e($rifa->id); ?>" rows="10"
                                                        style="min-height: 200px;" required><?php echo $rifa->descricao(); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show"
                                            id="premios<?php echo e($rifa->id); ?>" role="tabpanel"
                                            aria-labelledby="geral-tab">
                                            <div class="row">
                                                <?php $__currentLoopData = $rifa->premios(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6 mt-2">
                                                        <label><?php echo e($premio->ordem); ?>º Prêmio</label>
                                                        <input type="text" class="form-control" name="descPremio[<?php echo e($premio->ordem); ?>]" value="<?php echo e($premio->descricao); ?>">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade"
                                            id="ajustes<?php echo e($rifa->id); ?>" role="tabpanel"
                                            aria-labelledby="ajustes-tab">
                                            <div class="row mt-3">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="status_sorteio">Status
                                                            Sorteio</label>
                                                        <select class="form-control"
                                                            name="status" id="status">
                                                            <option value="Inativo"
                                                                <?php echo e($rifa->status == 'Inativo' ? "selected='selected'" : ''); ?>>
                                                                Inativo</option>
                                                            <option value="Ativo"
                                                                <?php echo e($rifa->status == 'Ativo' ? "selected='selected'" : ''); ?>>
                                                                Ativo</option>
                                                            <option value="Finalizado"
                                                                <?php echo e($rifa->status == 'Finalizado' ? "selected='selected'" : ''); ?>>
                                                                Finalizado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <form action="<?php echo e(route('drawDate')); ?>"
                                                    method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="product_id"
                                                        value="<?php echo e($rifa->id); ?>">
                                                    <div class="col-12 col-md-7">
                                                        <div class="form-group">
                                                            <label for="data_sorteio">Data
                                                                Sorteio</label>
                                                            <input type="datetime-local"
                                                                class="form-control"
                                                                name="data_sorteio"
                                                                id="data_sorteio"
                                                                value="<?php echo e($rifa->draw_date ? date('Y-m-d H:i:s', strtotime($rifa->draw_date)) : ''); ?>">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm">
                                                    <div class="form-group">
                                                        <label
                                                            for="cadastrar_ganhador">Ganhador</label>
                                                        <input type="text" class="form-control"
                                                            name="cadastrar_ganhador"
                                                            id="cadastrar_ganhador"
                                                            value="<?php echo e($rifa->winner); ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="visible_rifa">Mostrar na Página
                                                            Inicial?</label>
                                                        <select class="form-control"
                                                            name="visible" id="visible">
                                                            <option value="0">Não</option>
                                                            <option value="1"
                                                                <?php echo e($rifa->visible == 1 ? "selected='selected'" : ''); ?>>
                                                                Sim</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>URL amigável</label>
                                                    <input type="text" name="slug" value="<?php echo e($rifa->slug); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="favoritar_rifa">Favoritar
                                                            Rifa</label>
                                                        <select class="form-control"
                                                            name="favoritar_rifa"
                                                            id="favoritar_rifa">
                                                            <option value="0">Não</option>
                                                            <option value="1"
                                                                <?php echo e($rifa->favoritar == 1 ? "selected='selected'" : ''); ?>>
                                                                Sim</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="tipo_reserva">Tipo de
                                                            Reserva?</label>
                                                        <select class="form-control"
                                                            name="tipo_reserva" id="tipo_reserva">
                                                            <option value="manual"
                                                                <?php echo e($rifa->type_raffles == 'manual' ? "selected='selected'" : ''); ?>>
                                                                Manual</option>
                                                            <option value="automatico"
                                                                <?php echo e($rifa->type_raffles == 'automatico' ? "selected='selected'" : ''); ?>>
                                                                Automático</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-1 d-flex justify-content-center">
                                                <p>Tipo de Rifa</p>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="rifa_numero">Rifa de Números ou
                                                            Fazendinha</label>
                                                        <select class="form-control"
                                                            name="rifa_numero" id="rifa_numero" disabled>
                                                            <option value="numeros"
                                                                <?php echo e($rifa->modo_de_jogo == 'numeros' ? "selected='selected'" : ''); ?>>
                                                                Números</option>
                                                            <option value="fazendinha-completa"
                                                                <?php echo e($rifa->modo_de_jogo == 'fazendinha-completa' ? "selected='selected'" : ''); ?>>
                                                                Fazendinha - Grupo Completo</option>
                                                            <option value="fazendinha-meio"
                                                                <?php echo e($rifa->modo_de_jogo == 'fazendinha-meio' ? "selected='selected'" : ''); ?>>
                                                                Fazendinha - Meio Grupo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade"
                                            id="promocao<?php echo e($rifa->id); ?>" role="tabpanel"
                                            aria-labelledby="promocao-tab">

                                            <?php $__currentLoopData = $rifa->promocoes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row text-center mt-2 promo">
                                                    <h5>Promoção <?php echo e($promo->ordem); ?></h5>
                                                    <div class="col-md-6">
                                                        <label>Qtd de números</label>
                                                        <input type="number" min="0"
                                                            name="numPromocao[<?php echo e($promo->ordem); ?>]"
                                                            max="10000"
                                                            class="form-control text-center"
                                                            value="<?php echo e($promo->qtdNumeros); ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label
                                                            for="exampleInputEmail1">% de Desconto</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text">%</span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control text-center"
                                                                name="valPromocao[<?php echo e($promo->ordem); ?>]"
                                                                value="<?php echo e($promo->desconto); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <div class="tab-pane fade" id="fotos<?php echo e($rifa->id); ?>"
                                            role="tabpanel" aria-labelledby="promocao-tab">
                                            <center><button type="button"
                                                    class="btn btn-sm btn-info"
                                                    data-id="<?php echo e($rifa->id); ?>"
                                                    onclick="addFoto(this)">+ Foto(s)</button>
                                            </center>
                                            <div class="row d-flex justify-content-center mt-4">
                                                <?php if($rifa->fotos()->count() > 0): ?>
                                                    <?php $__currentLoopData = $rifa->fotos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-4 text-center"
                                                            id="foto-<?php echo e($foto->id); ?>">
                                                            <img src="/products/<?php echo e($foto->name); ?>"
                                                                width="200"
                                                                style="border-radius: 10px;">
                                                                <?php if($key >= 0): ?>
                                                                <a data-qtd="<?php echo e($rifa->fotos()->count()); ?>" href="javascript:void(0)"
                                                                    class="delete btn btn-danger"
                                                                    onclick="excluirFoto(this)"
                                                                    data-id="<?php echo e($foto->id); ?>"><i
                                                                        class="bi bi-trash3"></i></a>
                                                                <?php endif; ?>
                                                                
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>

                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php /**PATH /home/rifadigital/public_html/resources/views/compras/modal/editarRifa.blade.php ENDPATH**/ ?>