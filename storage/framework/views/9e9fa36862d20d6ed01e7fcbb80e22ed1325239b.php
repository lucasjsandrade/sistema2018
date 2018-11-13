<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Contas Pagar</h1>
    <title><h1>Relatório de Contas Pendente</h1></title>
    <style type="text/css">
       li{
           color:red;
       }
    </style>
</head>
<body>
<table class="table table-condensed">
    <thead>
    <tr>
        <th>Numero da Conta</th>
        <th>Valor</th>
        <th>Data Vencimento</th>
        <th>Numero da Parcela</th>
        <th>Parcela da Parcela :</th>
        <th>Fornecedor</th>
        <th>Telefone</th>

    </tr>


    </thead>

    <tbody>

    <?php
    function converteData($data)
    {
        return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
    }
    ?>
    <?php $__empty_1 = true; $__currentLoopData = $contaspagar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>


        <tr>
            <td><?php echo e($c->idcontasp); ?></td>
            <td><?php echo e($c->valorParcela); ?></td>
            <td><?php echo e(converteData($c->dataVencimento)); ?></td>
            <td><?php echo e($c->idparcela); ?></td>
            <td><?php echo e($c->status); ?></td>
            <td><?php echo e($c->razaoSocial); ?></td>
            <td><?php echo e($c->telefone); ?></td>




        </tr>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>



        <li>Nenhum Conta Pendente.</li>



    <?php endif; ?>

    </tbody>


</table>
</body>
</html>

