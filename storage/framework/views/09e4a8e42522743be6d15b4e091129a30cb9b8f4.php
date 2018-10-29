<?php  global  $soma_total;global  $soma_pagamentos; global $soma_compras;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>

<head>
    <h1>Relatório de Pagamento</h1>
    <title><h1>Relatório de Pagamento</h1></title>


    <style type="text/css">
        table.linhasAlternadas { /* Toda a tabela com fundo creme */

            border-collapse: collapse; /* CSS2 */
            background: #F0F3F8;
            border: solid green 1px;

        }



    </style>
</head>
<body>
<table border="1px" cellpadding="0px"  ID="linhasAlternadas">

    <thead>
    <tr>
        <td><b>Fornecedor:</b></td>
        <td><b>Compra N°:</b></td>
        <td><b>Parcelas:</b></td>
        <td><b>Valor da Compra:</b></td>
        <td><b>Parcela N°:</b></td>
        <td><b>N° Pagamento:</b></td>
        <td><b>Data Pagamento:</b></td>
        <td><b>Valor pendente:</b></td>
        <td><b>Valor pago:</b></td>


    </tr>


    </thead>

    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $pagamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($p->razaoSocial); ?></td>
            <td><?php echo e($p->idcompra); ?></td>
            <td><?php echo e($p->numeroDeParcelas); ?></td>
            <td><?php echo e($p->totalCompra); ?></td>
            <td><?php echo e($p->idparcela); ?></td>
            <td><?php echo e($p->idpagamento); ?></td>
            <td><?php echo e(converteData($p->data)); ?></td>
            <td><?php echo e($p->valorParcela); ?></td>
            <td><?php echo e($p->valorPago); ?></td>
        </tr>
        <?php $soma_total = $soma_total + $p->valorPago;
        $soma_pagamentos = $soma_pagamentos + 1;
        ?>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>


        <tr>
            <li><b>Nenhum Pagamento no Periodo.</b></li>

        </tr>

    <?php endif; ?>

    <tr cellpadding="5px" cellspacing="0" ID="final">

        <th colspan="4.5"><b>Pagamentos no período:</b><b><?php echo $soma_pagamentos; ?></b></th>

        <th colspan="4.5">Total: <?php echo 'R$ ' . $soma_total; ?><</th>

    </tr>

    </tbody>


</table>
</body>
</html>

