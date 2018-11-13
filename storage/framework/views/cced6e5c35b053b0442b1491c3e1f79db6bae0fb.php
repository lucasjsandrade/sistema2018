<?php  global  $soma_total;global  $soma_recebimentos; global $soma_vendas;

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
    <h1>Relatório de Recebimento</h1>
    <title><h1>Relatório de Recebimento</h1></title>


    <style type="text/css">

        li {
            color: red;
        }

    </style>
</head>
<body>
<table class="table table-condensed">

    <thead>
    <tr>
        <th><b>Cliente:</b></th>
        <th><b>Venda N°:</b></th>
        <th><b>Parcelas:</b></th>
        <th><b>Valor da venda:</b></th>
        <th><b>Parcela N°:</b></th>
        <th><b>N° Recebimento:</b></th>
        <th><b>Data Recebimento:</b></th>
        <th><b>Valor pendente:</b></th>
        <th><b>Valor pago:</b></th>


    </tr>


    </thead>

    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $recebimento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr class="even">
            <td><?php echo e($r->nomeCliente); ?></td>
            <td><?php echo e($r->idvenda); ?></td>
            <td><?php echo e($r->numeroDeParcelas); ?></td>
            <td><?php echo e($r->valorTotal); ?></td>
            <td><?php echo e($r->idparcela); ?></td>
            <td><?php echo e($r->idrecebimento); ?></td>
            <td><?php echo e(converteData($r->data)); ?></td>
            <td><?php echo e($r->valorParcela); ?></td>
            <td><?php echo e($r->valorRecebido); ?></td>
        </tr>
        <?php $soma_total = $soma_total + $r->valorRecebido;
        $soma_recebimentos = $soma_recebimentos + 1;
        ?>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>


        <tr>
            <li><b>Nenhum Recebimento no Periodo.</b></li>

        </tr>

    <?php endif; ?>

    <tr class="even">

        <th colspan="4.5"><b>Pagamentos no período:</b><b><?php echo $soma_recebimentos; ?></b></th>

        <th colspan="4.5">Total: <?php echo 'R$ ' . $soma_total; ?><</th>

    </tr>

    </tbody>


</table>
</body>
</html>

