<?php $__env->startSection('conteudo'); ?>
    <?php

    try {

        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("Para Realizar uma Sangria o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
        unset($_COOKIE['caixa']);
        echo '<script>window.location="/caixa/create"</script>';
    }

    ?>


    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nova Sangria</h3>
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php echo Form::open(array('url'=>'sangria','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

            <?php echo e(Form::token()); ?>


            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="sangria">Valor da sangria</label>
                        <span class="ob">*</span>
                        <input type="number" name="sangria" required value="<?php echo e(old('sangria')); ?>" class="form-control"
                               placeholder="Informe o valor da sangria">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao"  value="<?php echo e(old('descricao')); ?>" class="form-control">
                    </div>
                </div>


                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
                        <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/contaspagar';">
                            Cancelar
                        </button>

                    </div>
                </div>
                <?php echo Form::close(); ?>



            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>