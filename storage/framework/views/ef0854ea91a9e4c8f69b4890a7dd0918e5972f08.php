<?php  global  $valorFinal; global $soma_caixas;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>
<head>
    <h1>Relatório de Caixa</h1>
    <title><h1>Relatório de Caixa</h1></title>
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
        <td>Numero do Caixa</td>
        <td>Data Abertura:</td>
        <td>Total do Caixa:</td>


    </tr>


    </thead>

    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $caixa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>

            <td><?php echo e($c->idcaixa); ?></td>
            <td><?php echo e(converteData($c->data)); ?></td>
            <td><?php echo e('R$ '.$c->saldoFinal); ?></td>

            <?php $valorFinal =$valorFinal   + $c->saldoFinal;?>
            <?php $soma_caixas = $soma_caixas + 1; ?>



        </tr>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>

<tr>
    <li>Nenhum Caixa Encontrado no período.</li>

</tr>


    <?php endif; ?>
    <tr>
        <td>Caixas no período:</td>
        <td></td>

        <td>Total:</td>
    </tr>
    <th><?php echo $soma_caixas; ?></th>
    <th></th>

    <th><?php echo 'R$ '.$valorFinal; ?></th>


    </tbody>


</table>
</body>
</html>

