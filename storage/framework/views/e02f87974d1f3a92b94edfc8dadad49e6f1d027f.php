<!DOCTYPE html>
<html>
<head>
    <h1>Teste PDF</h1>
    <title>
        <h1>...</h1>
    </title>
</head>
<body>
<table>
    <thead>

    </thead>

    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>


        <li><?php echo e($c->nomeCliente); ?></li>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>



        <li>Nenhum Produto Cadastrado.</li>



    <?php endif; ?>


    </tbody>


</table>
</body>
</html>

