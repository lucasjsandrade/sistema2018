<?php $__env->startSection('conteudo'); ?>


    <body>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <section>
                <header>
                    <nav id="menu">
                        <ul class="list-group">

                            <a href="caixa/create">
                                <button class="btn btn-primary">Abrir Caixa</button>

                                <a href="/sangria/create">
                                    <button class="btn btn-primary">Sangria</button>

                                    <a href="/suprimento/create">
                                        <button class="btn btn-primary">Suprimento</button>

                                        <a href="/contaspagar">
                                            <button class="btn btn-primary">Contas a pagar</button>

                                            <a href="/contasreceber">
                                                <button class="btn btn-primary">Contas a receber</button>

                                                <a href="/pagamento">
                                                    <button class="btn btn-primary">Pagamento</button>

                                                    <a href="/recebimento">
                                                        <button class="btn btn-primary">Recebimento</button>


                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <button class="btn btn-danger">Fechar caixa</button>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <!-- User image -->
                                                            <li class="user-header">
                                                                <p>
                                                                    <n>Deseja Realmente fechar o Caixa?</n>
                                                                </p>
                                                            </li>

                                                            <!-- Menu Footer-->
                                                            <li class="user-footer">

                                                                <div class="pull-right">
                                                                    <a href="<?php echo e(url('/close')); ?>"
                                                                       class="btn btn-danger btn-flat">Fechar
                                                                        Caixa</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        </li>
                        </ul>
                    </nav>


                </header>


            </section>
        </div>
    </div>
    </body>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Caixas</h3>
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
                    <th>Saldo Inicial</th>
                    <th>Saldo atual</th>
                    <th>Saldo final</th>
                    <th>Situação</th>
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
                            <td><?php echo e($c->saldoInicial); ?></td>
                            <td><?php echo e($c->saldoAtual); ?></td>
                            <td><?php echo e($c->saldoFinal); ?></td>
                            <td><?php echo e($c->situacao); ?></td>
                            <td>
                                <a href="<?php echo e(URL::action('CaixaController@show',$c->idcaixa)); ?>">
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