<?php $__env->startSection('conteudo'); ?>
    <?php

    try {
        //session_start();
        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("O Caixa Não está aberto,faça a abertura do Caixa!")</script>';
        unset($_COOKIE['cixa']);
        echo '<script>window.location="caixa/create"</script>';
    }

    ?>
    <div class="row">
        <head>
            <meta charset="utf-8">
            <title>Caixa</title>
        </head>
    </div>
    <body>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section>
                <header>
                    <nav id="menu">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><a href="caixa/create">Abrir
                                    Caixa</a></a></li>
                            <li class="list-group-item list-group-item-primary"><a href="/contaspagar">Contas A
                                    Pagar</a></li>
                            <li class="list-group-item"><a href="/contasreceber">Contas A Receber</a></li>
                            <li class="list-group-item"><a href="/pagamento">Pagamento</a></li>


                        </ul>
                    </nav>


                </header>
                <br>

            </section>
        </div>
    </div>
    </body>

    </div>

    <section>
        <article>
            <br><br>
            <h1></h1>
        </article>

    </section>


    <div class="row">
        <h3><p class="alinha">Caixas</p> </h3>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero do Caixa</th>
                    <th>Data</th>
                    <th>Saldo Inicial</th>
                    <th>Saldo Final</th>
                    <th>Diferença</th>
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
                            <td><?php echo e($c->saldoFinal); ?></td>
                            <td><?php echo e($c->diferenca); ?></td>
                            <td><?php echo e($c->situacao); ?></td>
                            <td>
                                <a href="<?php echo e(URL::action('CaixaController@show',$c->idcaixa)); ?>"><button class="btn btn-info">Detalhe</button></a>
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
    p.alinha{padding-left: 1.0em }<

</style>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>