<?php  global  $soma_total; global $soma_compras;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>
<head>
    <h1>Relatório de Compras</h1>
    <title><h1>Relatório de Compras</h1></title>
    <style type="text/css">
        table {
            width: 80%;
            magin: 0;
            border: 1px solid;

        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>Numero da Compra:</td>
        <td>Data Compra:</td>
        <td>Condicao de Pagamento:</td>
        <td>Valor da Compra:</td>


    </tr>


    </thead>

    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $compra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>

            <td><?php echo e($c->idcompra); ?></td>
            <td><?php echo e(converteData($c->dataCompra)); ?></td>
            <td><?php echo e($c->condicaoPagamento); ?></td>
            <td><?php echo e('R$ '.$c->totalCompra); ?></td>

            <?php $soma_total =$soma_total   + $c->totalCompra;?>
            <?php $soma_compras = $soma_compras + 1; ?>



        </tr>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>

<tr>
    <li>Nenhum Produto Cadastrado.</li>

</tr>


    <?php endif; ?>
    <tr>
        <td>Compras no período:</td>
        <td></td>
        <td></td>
        <td>Total de Compras:</td>
    </tr>
    <th><?php echo $soma_compras; ?></th>
    <th></th>
    <th></th>
    <th><?php echo 'R$ '.$soma_total; ?></th>


    </tbody>


</table>
</body>
</html>

