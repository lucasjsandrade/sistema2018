<?php $__env->startSection('conteudo'); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Relatório de Recebimento <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <i class="fa fa-shopping-cart"></i></h3>
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <h3>Filtros</h3>
        </div>
    </div>


    <?php echo Form::open(array('url'=>'/pdf/RecebimentoGetPDF','method'=>'POST','autocomplete'=>'off')); ?>

    <?php echo e(Form::token()); ?>


    <div class="col-lg-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <label for="dataInicial">Data Inicial</label>
            <span class="ob">*</span>
            <input validaData type="date" name="dataInicial" required value="<?php echo e(old('dataInicial')); ?>" class="form-control">
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <label for="dataFinal">Data Final</label>
            <span class="ob">*</span>
            <input validaData type="date" name="dataFinal" required value="<?php echo e(old('dataFinal')); ?>" class="form-control">
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label>Cliente</label>
            <span class="ob">*</span>
            <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
                <option value="T">Todos</option>
                <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($cli->idcliente); ?>">
                        <?php echo e($cli->nomeCliente); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
        <div class="form-group">
            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <button class="btn btn-success" type="submit"> Gerar Relatorio <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>

        </div>
    </div>





    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>