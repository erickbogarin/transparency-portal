<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Informações da conta 
                    <a class="btn btn-link pull-right" href="<?php echo e(url('/password/reset')); ?>">Redefinir sua senha</a>
                </div>

                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="name" disabled value="<?php echo e(auth()->user()->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail:</label>
                            <input type="email" class="form-control" id="email" disabled value="<?php echo e(auth()->user()->email); ?>">
                        </div>
                        <?php if(auth()->user()->conta == 'ADMIN'): ?>
                        <div class="form-group">
                            <label for="conta">Conta:</label>
                            <input type="string" class="form-control" id="conta" disabled value="Administrador">
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label for="conta">Município:</label>
                            <input type="string" class="form-control" id="conta" disabled value="<?php echo e(auth()->user()->municipio->nome); ?>">
                        </div>
                        <div class="form-group">
                            <label for="conta">Orgão:</label>
                            <input type="string" class="form-control" id="conta" disabled value="<?php echo e(auth()->user()->orgao->nome); ?>">
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>