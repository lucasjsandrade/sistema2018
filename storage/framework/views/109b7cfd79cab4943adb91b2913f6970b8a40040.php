<?php global  $soma_estoque; global $soma_produto;?>
        <!DOCTYPE html>
<html>
<head>
    <h1>Relatório de Produtos</h1>
    <title><h1>Relatório de Produtos</h1></title>
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
        <td>Categoria</td>
        <td>Modelo do Produto</td>
        <td>Quantidade em Estoque</td>

    </tr>


    </thead>

    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $produto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($p->nome); ?></td>
            <td><?php echo e($p->modelo); ?></td>
            <td><?php echo e($p->quantidade); ?></td>

            <?php $soma_estoque = $p->quantidade + $soma_estoque;?>
            <?php $soma_produto = $p->total + $soma_produto;?>
        </tr>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>



        <li>Nenhum Produto Cadastrado.</li>



    <?php endif; ?>
    <tr>
        <td>Produtos Ativos</td>
        <td>Total de Produtos em Estoque</td>
    </tr>
    <th><?php echo $soma_produto; ?></th>
    <th><?php echo $soma_estoque;?></th>

    </tbody>


</table>
</body>
</html>

