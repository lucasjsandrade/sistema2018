<?php $__env->startSection('conteudo'); ?>

    <h1>Detalhes Do Recebimento</h1><br>

    <div class="row">

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idrecebimento">N° do Pagamento</label>
                <p><?php echo e($recebimento->idrecebimento); ?></p>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data</label>
                <p><?php echo e($recebimento->data); ?></p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valorPagamento">Valor Pagamento</label>
                <p><?php echo e($recebimento->valor); ?></p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">N° da conta</label>
                <p><?php echo e($parcela->idcontasr); ?></p>
            </div>

        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numeroParcela">N° da Parcela</label>
                <p><?php echo e($recebimento->idparcela); ?></p>
            </div>

        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">Quantidade de Parcelas</label>
                <p><?php echo e($parcela->parcela); ?></p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">N° Cliente</label>
                <p><?php echo e($parcela->idcliente); ?></p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">Cliente</label>
                <p><?php echo e($parcela->nomeCliente); ?></p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="text">Telefone Cliente</label>
                <p><?php echo e($parcela->telefone); ?></p>
            </div>

        </div>


    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-body">


                <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">


                        <th>Numero Parcela</th>
                        <th>Valor da Parcela</th>
                        <th>Valor Recebido</th>
                        <th>Status</th>
                        <th>Valor Restante</th>
                        </thead>
                        <tfoot>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tfoot>

                        <tbody>



                            <tr>
                                <td><?php echo e($parcela->idparcela); ?></td>
                                <td><?php echo e($parcela->valorParcela+$parcela->valorRecebido); ?></td>
                                <td><?php echo e($parcela->valorRecebido); ?></td>
                                <td><?php echo e($parcela->status); ?></td>
                                <td><?php echo e($parcela->valorParcela); ?></td>
                            </tr>





                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>