<?php $__env->startSection('conteudo'); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3> Pedidos de compra <a href="/compra/pedido/create">
                    <button class="btn btn-success">Incluir</button>
                </a></h3>
            <?php echo $__env->make('compra.pedido.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Data</th>
                    <!--<th>ID:Fucionario</th>-->
                    <th>Numero do Pedido</th>
                    <th>ID:Fornecedor</th>
                    <!--<th>Produto</th>
                    <th>Medida</th>
					<th>Quantidade</th>
					<th>Valor Unitario</th> -->


                    <th>status</th>
                    <!--<th>Forma Pagamento</th>
                        <th>Condicao Pagamento</th> -->

                    <th>Opções</th>


                    </thead>

                    <?php
                    function converteData($data)
                    {
                        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
                    }
                    ?>
                    <?php $__currentLoopData = $compra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>

                            <td><?php echo e(converteData ($comp->dataCompra)); ?></td>
                            <td><?php echo e($comp->idcompra); ?></td>
                            <td><?php echo e($comp->nomeFantasia); ?></td>


                            <td><?php echo e($comp->status); ?></td>


                            <td>
                                <a href="<?php echo e(URL::action('PedidoController@show',$comp->idcompra)); ?>">
                                    <button class="btn btn-info">Detalhe</button>
                                </a>
                                <a href="<?php echo e(URL::action('PedidoController@edit',$comp->idcompra)); ?>">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </a>

                            </td>


                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>

            </div>
            <?php echo e($compra->render()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>