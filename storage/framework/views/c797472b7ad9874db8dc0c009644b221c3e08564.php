
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Fornecedores</h1>
    <title><h1>Relatório de Fornecedores</h1></title>
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
        <th>Fornecedor</th>
        <th>Telefone</th>
        <th>Email</th>

    </tr>


    </thead>

    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $fornecedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($f->razaoSocial); ?></td>
            <td><?php echo e($f->telefone); ?></td>
            <td><?php echo e($f->email); ?></td>



        </tr>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>



        <li>Nenhum Produto Cadastrado.</li>



    <?php endif; ?>

    </tbody>


</table>
</body>
</html>

