<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Título Opcional</title>

	<!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
	<link rel="stylesheet" href="<?php echo e(url('assets/site/css/certificate.css')); ?>">
</head>
<body>



<h1>Produtos</h1>


<ul>
	<?php $__empty_1 = true; $__currentLoopData = $produto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>



		<li><?php echo e($p->idproduto); ?></li>



	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>



		<li>Nenhum Produto Cadastrado.</li>



	<?php endif; ?>
</ul>



</body>
</html>