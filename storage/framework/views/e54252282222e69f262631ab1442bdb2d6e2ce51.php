<?php $__env->startSection('conteudo'); ?>

    <h1>Movimentação do Caixa </h1><br>

    <?php
    function converteData($data)
    {
        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
    }
    ?>




    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="idcaixa">Numero do Caixa</label>
            <p><?php echo e($caixa->idcaixa); ?></p>
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="data">Data</label>
            <p><?php echo e(converteData($caixa->data)); ?></p>
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="saldoinical">Saldo Inicial</label>
            <p><?php echo e($caixa->saldoInicial); ?></p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="saldoFinal">Saldo Final</label>
            <p><?php echo e($caixa->saldoFinal); ?></p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="situacao">Situacao</label>
            <p><?php echo e($caixa->situacao); ?></p>
        </div>
    </div>

    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-body">


                <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">


                        <th>N° da Transação</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Tipo da Movimentação</th>
                        <th>Valor</th>
                        <th>N° do Pagamento</th>
                        <th>N° do Recebimento</th>

                        </thead>
                        <tfoot>


                        </tfoot>

                        <tbody>

                        <?php $__currentLoopData = $movimentacaocaixa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($mov->idmovimentacao); ?></td>
                                <td><?php echo e($mov->descricao); ?></td>
                                <td><?php echo e($mov->data); ?></td>
                                <td><?php echo e($mov->tipoMovimentacao); ?></td>
                                <td><?php echo e($mov->valor); ?></td>
                                <td><?php echo e($mov->idpagamento); ?></td>
                                <td><?php echo e($mov->idrecebimento); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><th>
                        <th><th>
                        <th><th>
                        <th><th>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>




    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>