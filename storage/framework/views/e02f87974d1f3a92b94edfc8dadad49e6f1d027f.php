
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Produtos</h1>
    <title><h1>Relatório de CLientes</h1></title>
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
        <th>Nome</th>
        <th>Telefone</th>
        <th>Celular</th>
        <th>Email</th>

    </tr>


    </thead>

    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($c->nomeCliente); ?></td>
            <td><?php echo e($c->telefone); ?></td>
            <td><?php echo e($c->celular); ?></td>
            <td><?php echo e($c->email); ?></td>



        </tr>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>



        <li>Nenhum Produto Cadastrado.</li>



    <?php endif; ?>

    </tbody>


</table>
</body>
</html>

