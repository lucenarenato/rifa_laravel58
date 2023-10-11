<?php $__env->startSection('content'); ?>
    <div class="container mt-3" style="max-width:100%;min-height:100%;">
        <div class="table-wrapper ">
            <div class="table-title">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <h2>Whatsapp <b>Mensagens</b></h2>
                    </div>
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
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-3 p-2 rounded" style="background-color: darkblue; color: #fff">
                <center><h4>Varíaveis</h4></center>
                <span>{id}: Código da compra</span> <br>
                <span>{nome}: Nome do cliente</span> <br>
                <span>{valor}: Valor por cota</span> <br>
                <span>{total}: Total da compra</span> <br>
                <span>{cotas}: Cotas da compra</span> <br>
                <span>{sorteio}: Título do sorteio</span> <br>
                <span>{link}: Link de pagamento</span> <br>
            </div>
        </div>

        <form action="<?php echo e(route('wpp.salvar')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 12px;">
                            <li class="nav-item" >
                                <a class="nav-link active" id="botoes-tab" data-toggle="tab" href="#botoes" role="tab"
                                    aria-controls="botoes" aria-selected="true"><strong>Botões Menu Compras</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="automatica-tab" data-toggle="tab" href="#automatica" role="tab"
                                    aria-controls="automatica" aria-selected="true"><strong>Mensagens Automáticas</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="token-tab" data-toggle="tab" href="#token" role="tab"
                                    aria-controls="token" aria-selected="true"><strong>Token API Criar Whats</strong></a>
                            </li>
                        </ul>
                    </nav>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="botoes" role="tabpanel" aria-labelledby="botoes-tab">
                            <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <hr>
                                <input type="hidden" name="id[<?php echo e($msg->id); ?>]" value="<?php echo e($msg->id); ?>">
                                <div class="col-md-12 mt-2">
                                    <label>Título</label>
                                    <input type="text" name="titulo[<?php echo e($msg->id); ?>]" class="form-control"
                                        value="<?php echo e($msg->titulo); ?>">
                                </div>
                                <div class="col-md-12 mt-2 mb-2">
                                    <label>Mensagem</label>
                                    <textarea name="msg[<?php echo e($msg->id); ?>]" rows="10" class="form-control" style="resize: none"><?php echo e($msg->clearBreak()); ?></textarea>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="tab-pane fade" id="automatica" role="tabpanel" aria-labelledby="automatica-tab">
                            <div class="row">
                                <?php $__currentLoopData = $autoMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="idAuto[<?php echo e($auto->id); ?>]" value="<?php echo e($auto->id); ?>">
                                    <div class="col-md-6 mt-2">
                                        <label>Descrição:</label> <?php echo e($auto->descricao); ?><br>
                                        <label>Destinatário:</label>  <?php echo e(ucfirst($auto->destinatario)); ?> <br>
                                        <label>Mensagem</label>
                                        <textarea name="msgAuto[<?php echo e($auto->id); ?>]" rows="10" class="form-control" style="resize: none"><?php echo e($auto->msg); ?></textarea>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="token" role="tabpanel" aria-labelledby="token-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Token Criar Whats</label>
                                    <input type="text" name="token_api_wpp" class="form-control" value="<?php echo e($config->token_api_wpp); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-sm btn-success mt-2 mb-4 float-right">Salvar</button>
        </form>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rifadigital/public_html/resources/views/wpp-msgs/index.blade.php ENDPATH**/ ?>