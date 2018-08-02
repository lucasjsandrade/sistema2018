<?php $__env->startSection('conteudo'); ?>

    <?php

    try {

        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("Para Realizar uma Venda o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
        unset($_COOKIE['caixa']);
        echo '<script>window.location="/caixa/create"</script>';
    }

    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Pagamento <i class="fa fa-money"></i></h3>
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo Form::open(array('url'=>'pagamento','method'=>'POST','autocomplete'=>'off')); ?>

    <?php echo e(Form::token()); ?>


    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Contas a Pagar</label>
                <span class="ob">*</span>
                <select name="pidcontas" id="pidcontas" class="form-control selectpicker" data-live-search="true">
                    <option value="">Selecione uma Conta a Pagar</option>
                    <?php $__currentLoopData = $contas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($con->idcontasp); ?>_<?php echo e($con->data); ?>_<?php echo e($con->valor); ?>_<?php echo e($con->descricao); ?>_<?php echo e($con->idcompra); ?>_<?php echo e($con->idfornecedor); ?>">
                            <?php echo e($con->contas); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data  Lançamento</label>
                <input type="text" name="data" id="pdata" disabled
                       class="form-control">
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" name="valor" id="pvalor" disabled
                       class="form-control">
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="pdescricao" disabled
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcompra">N° Compra</label>
                <input type="text" name="idcompra" id="pidcompra" disabled
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcompra">N° Fornecedor</label>
                <input type="text" name="idfornecedor" id="pidfornecedor" disabled
                       class="form-control">
            </div>
        </div>



    </div>



    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">

                        <label>Selecione a Parcela</label>
                        <span class="ob">*</span>
                        <select name="pidparcela" id="pidparcela" class="form-control selectpicker"
                                data-live-search="true">
                            <option value="">Selecione um produto</option>
                            <?php $__currentLoopData = $parcelapagar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $par): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($par->idparcela); ?>_<?php echo e($par->dataVencimento); ?>_<?php echo e($par->valorParcela); ?>_<?php echo e($par->valorPago); ?>_<?php echo e($par->idcontasp); ?>">
                                    <?php echo e($par->parcela); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php echo Form::close(); ?>

    <?php $__env->startPush('script'); ?>
        <script>

            $(document).ready(function () {
                $('#bt_add').click(function () {
                    adicionar();

                });
            });


            $("#pidcontas").change(mostrarValores);

            function mostrarValores() {
                dadosContas = document.getElementById('pidcontas').value.split('_');
                $("#pdata").val(dadosContas[5]);
                $("#pvalor").val(dadosContas[4]);
            }


            function adicionar() {
                dadosContas = document.getElementById('pidcontas').value.split('_');
                idcontasp = dadosContas[0];
                contas = $("#pidcontas option:selected").text();
                data = $("#pdata").val();
                valor = $("#pdata").val();
                descricao = $("#pdata").val();
                idcompra = $("#pdata").val();
                idfornecedor = $("#pdata").val();

            }

        </script>

    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>