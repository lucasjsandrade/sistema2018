<?php $__env->startSection('conteudo'); ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Sangria <a href="sangria/create"><button class="btn btn-success">Nova Sangria</button></a></h3>
        <?php if(count($errors)>0): ?> <!-- Se existir erro vai mostrar um alerta e vai listar os erros -->
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

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero do Caixa</th>
                    <th>Data</th>
                    <th>Valor da Sangria</th>
                    <th>Saldo após sangria</th>
                    <th>Opções</th>

                    </thead>

                    <?php
                    function converteData($data)
                    {
                        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
                    }
                    ?>
                    <?php $__currentLoopData = $caixa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>


                            <td><?php echo e($c->idcaixa); ?></td>
                            <td><?php echo e(converteData($c->data)); ?></td>
                            <td><?php echo e($c->sangria); ?></td>
                            <td><?php echo e($c->saldoAtual); ?></td>
                            <td>
                                <a href="<?php echo e(URL::action('sangriaController@show',$c->idcaixa)); ?>">
                                    <button class="btn btn-info">Detalhe</button>
                                </a>
                            </td>


                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>

            </div>
            <?php echo e($caixa->render()); ?>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<style>

    #menu ul li {
        display: inline;
    }

    p.alinha {
        padding-left: 1.0em
    }

    <

</style>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>