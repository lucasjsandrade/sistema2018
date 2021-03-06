<?php $__env->startSection('conteudo'); ?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>CONTAS A RECEBER</h3>
        <?php echo $__env->make('contasreceber.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php
function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Descricao</th>
                    <th>N° de parcela</th>
                    <th>N° Venda</th>
                    <th>N° Cliente</th>


                </thead>
                <?php $__currentLoopData = $contasreceber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($c->idcontasr); ?></td>
                    <td><?php echo e(converteData($c->data)); ?></td>
                    <td><?php echo e($c->valor); ?></td>
                    <td><?php echo e($c->descricao); ?></td>
                    <td><?php echo e($c->numeroDeParcelas); ?></td>
                    <td><?php echo e($c->idvenda); ?></td>
                    <td><?php echo e($c->idcliente); ?></td>
                    <td>
                        <a href="<?php echo e(URL::action('ContasreceberController@show',$c->idcontasr)); ?>">
                            <button class="btn btn-info">Mostrar</button>
                        </a>

                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>

<?php echo e($contasreceber->render()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>