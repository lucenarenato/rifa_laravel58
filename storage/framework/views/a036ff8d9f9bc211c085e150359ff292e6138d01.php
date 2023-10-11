<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meu perfil</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                            </div>

                            <h3 class="profile-username text-center"><?php echo e($users->name); ?></h3>

                            <p class="text-muted text-center"></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <script>
                        function submitFoto() {
                            $('#form-logo').submit();
                        }

                        function alteraLogo() {
                            $('#input-logo').click();
                        }
                    </script>

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php if($users->logo): ?>
                                    <img src="<?php echo e(asset('products/' . $users->logo)); ?>" alt="" width="200">
                                <?php endif; ?>
                            </div>

                            <h3 class="profile-username text-center"><button class="btn btn-sm btn-success"
                                    onclick="alteraLogo()">Alterar Logo</button></h3>
                                    <center><p>3 x 1.5 (cm)</p></center>

                            <form class="d-none" action="<?php echo e(route('alterarLogo')); ?>" enctype="multipart/form-data"
                                method="POST" id="form-logo">
                                <?php echo csrf_field(); ?>
                                <input type="file" id="input-logo" name="logo" onchange="submitFoto()">
                            </form>

                            <p class="text-muted text-center"></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item" style="margin: 3px;"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">Perfil</a></li>
                                <li class="nav-item" style="margin: 3px;"><a class="nav-link" href="#pixel"
                                        data-toggle="tab">Pixel Facebook</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form action="<?php echo e(route('updateProfile')); ?>" method="POST" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo e($users->name); ?>" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label>Nome da plataforma</label>
                                            <input type="text" class="form-control" name="platform"
                                                value="<?php echo e($users->platform); ?>" placeholder="Plataforma">
                                        </div>
                                        <?php if(env('ACTIVE_TEMA')): ?>
                                            <div class="form-group">
                                                <label>Tema</label>
                                                <select name="tema" class="form-control">
                                                    <option value="light" <?php echo e($users->tema == 'light' ? 'selected' : ''); ?>>
                                                        Claro</option>
                                                    <option value="dark" <?php echo e($users->tema == 'dark' ? 'selected' : ''); ?>>
                                                        Escuro</option>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" name="telephone"
                                                value="<?php echo e($users->telephone); ?>" placeholder="Telefone">
                                        </div>
                                        <div class="form-group">
                                            <label>Grupo Whatsapp</label>
                                            <input type="text" class="form-control" name="group_whats"
                                                value="<?php echo e($users->group_whats); ?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?php echo e($users->email); ?>" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <label>Access Token public (Mercado Pago)</label>
                                            <input type="text" class="form-control" name="key_public"
                                                value="<?php echo e($users->key_pix_public); ?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Access Token (Mercado Pago)</label>
                                            <input type="text" class="form-control" name="key"
                                                value="<?php echo e($users->key_pix); ?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Token (ASSAS)</label>
                                            <input type="text" class="form-control" name="token_asaas"
                                                value="<?php echo e($users->token_asaas); ?>" placeholder="">
                                        </div>
                                        <div class="form-group bg-info rounded p-2">
                                            <strong style="color: #000">IMPORTANTE!</strong>
                                            <br>
                                            Inserir o link abaixo na aba Webhook no site da Paggue. Ele é o responsável pala
                                            baixa automática.
                                            <br><br>
                                            <?php echo e(route('api.notificaoPaggue')); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>CLIENT KEY (Paggue)</label>
                                            <input type="text" class="form-control" name="paggue_client_key"
                                                value="<?php echo e($users->paggue_client_key); ?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>CLIENT SECRET (Paggue)</label>
                                            <input type="text" class="form-control" name="paggue_client_secret"
                                                value="<?php echo e($users->paggue_client_secret); ?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" name="facebook"
                                                value="<?php echo e($users->facebook); ?>" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text" class="form-control" name="instagram"
                                                value="<?php echo e($users->instagram); ?>" placeholder="instagram">
                                        </div>
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input type="text" class="form-control" name="senha"
                                                placeholder="Senha">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Alterar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="pixel">
                                    <form action="<?php echo e(route('pixel')); ?>" method="POST" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <label>Verificação do domínio Facebook</label>
                                            <input type="text" class="form-control" name="verify"
                                                value="<?php echo e($users->verify_domain_fb); ?>"
                                                placeholder="Código de verificação do domínio" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pixel</label>

                                            <textarea class="form-control" name="pixel" rows="20" style="resize: none;" required><?php echo e($users->pixel); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dener\Downloads\app_rifa\resources\views/profile.blade.php ENDPATH**/ ?>