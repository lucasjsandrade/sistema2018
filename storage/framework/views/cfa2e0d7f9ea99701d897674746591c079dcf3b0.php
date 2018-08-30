<?php $__env->startSection('conteudo'); ?>
   


    <h1>Detalhes Do Pagamento</h1><br>

    <div class="row">

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idpagamento">N° do Pagamento</label>
                <p><?php echo e($pagamento->idpagamento); ?></p>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data</label>
                <p><?php echo e($pagamento->data); ?></p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valorPagamento">Valor Pagamento</label>
                <p><?php echo e($pagamento->valorTotal); ?></p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">N° da conta</label>
                <p><?php echo e($parcela->idcontasp); ?></p>
            </div>

        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numeroParcela">N° da Parcela</label>
                <p><?php echo e($pagamento->idparcelap); ?></p>
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
                <label for="numero">N° fornecedor</label>
                <p><?php echo e($parcela->idfornecedor); ?></p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">Fornecedor</label>
                <p><?php echo e($parcela->razaoSocial); ?></p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="text">Telefone Fonecedor</label>
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
                        <th>Valor Pago</th>
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
                                <td><?php echo e($parcela->valorParcela+$parcela->valorPago); ?></td>
                                <td><?php echo e($parcela->valorPago); ?></td>
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