<?php $__env->startSection('conteudo'); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Pagamento<a href="/pagamento/create">
                    <button class="btn btn-success">Incluir</button>
                </a></h3>
            <?php echo $__env->make('pagamento.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero Pagamento</th>
                    <th>Data</th>
                    <th>Valor</th>
					<th>ValorTotal</th>
                    <th>Opções</th>


                    </thead>

                    <?php
                    function converteData($data)
                    {
                        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
                    }
                    ?>
                    <?php $__currentLoopData = $pagamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>


                            <td><?php echo e($pag->idpagamento); ?></td>
                            <td><?php echo e($pag->data); ?></td>
                            <td><?php echo e($pag->valor); ?></td>
                            <td><?php echo e($pag->valorTotal); ?></td>
                            <td>
                                <a href="<?php echo e(URL::action('PagamentoController@show',$pag->idpagamento)); ?>"><button class="btn btn-info">Detalhe</button></a>
                            </td>




                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>

            </div>
            <?php echo e($pagamento->render()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>