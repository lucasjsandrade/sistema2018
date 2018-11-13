<?php  global  $soma_total; global $soma_vendas;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Vendas</h1>
    <title><h1>Relatório de Vendas</h1></title>
    <style type="text/css">
        li {
            color:red;
        }
    </style>
</head>
<body>
<table class="table table-condensed">
    <thead>
    <tr>
        <th>Numero da Venda:</th>
        <th>Data Venda:</th>
        <th>Condicao de Pagamento:</th>
        <th>Valor da Venda:</th>


    </tr>


    </thead>

    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $venda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>

            <td><?php echo e($v->idvenda); ?></td>
            <td><?php echo e(converteData($v->dataVenda)); ?></td>
            <td><?php echo e($v->condicaoPagamento); ?></td>
            <td><?php echo e('R$ '.$v->valorTotal); ?></td>

            <?php $soma_total =$soma_total   + $v->valorTotal;?>
            <?php $soma_vendas = $soma_vendas + 1; ?>



        </tr>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>

<tr>
    <li>Nenhuma Venda no Período.</li>

</tr>


    <?php endif; ?>
    <tr>
        <th>Vendas no período:</th>
        <td></td>
        <td></td>
        <th>Total de Vendas:</th>
    </tr>
    <th><?php echo $soma_vendas; ?></th>
    <th></th>
    <th></th>
    <th><?php echo 'R$ '.$soma_total; ?></th>


    </tbody>


</table>
</body>
</html>

