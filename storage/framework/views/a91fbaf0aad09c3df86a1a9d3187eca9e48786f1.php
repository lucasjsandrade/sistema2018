<?php $__env->startSection('conteudo'); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Recebimento<a href="/recebimento/create">
                    <button class="btn btn-success">Incluir</button>
                </a></h3>
            <?php echo $__env->make('recebimento.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero Recebimento</th>
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
                    <?php $__currentLoopData = $recebimento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>


                            <td><?php echo e($rec->idrecebimento); ?></td>
                            <td><?php echo e($rec->data); ?></td>
                            <td><?php echo e($rec->valor); ?></td>
                            <td><?php echo e($rec->valorTotal); ?></td>
                            <td>
                                <a href="<?php echo e(URL::action('RecebimentoController@show',$rec->idrecebimento)); ?>"><button class="btn btn-info">Detalhe</button></a>
                            </td>




                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>

            </div>
            <?php echo e($recebimento->render()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>