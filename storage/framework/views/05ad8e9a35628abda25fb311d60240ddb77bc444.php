<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Alterar Produto: <?php echo e($produto->nome); ?></h3>
    <?php if(count($errors)>0): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php echo Form::model($produto, ['method'=>'PATCH', 'route'=>['produto.update', $produto->idproduto], 'files'=>'true']); ?>

<?php echo e(Form::token()); ?>


<div class="row">
 <div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Categoria</label>
    <span class="ob">*</span>
    <select name="idcategoria" class="form-control">
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <option value="<?php echo e($cat->idcategoria); ?>">
        <?php echo e($cat->nome); ?>

      </option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </select>
  </div>
  
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Marca</label>
    <span class="ob">*</span>
    <select name="codigo" class="form-control">
      <?php $__currentLoopData = $marca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mar): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <option value="<?php echo e($mar->codigo); ?>">
        <?php echo e($mar->nome); ?>

      </option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </select>
  </div>
  
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="modelo">Modelo</label>
    <span class="ob">*</span>
    <input type="text" name="modelo" required class="form-control"
    value="<?php echo e($produto->modelo); ?>"
    placeholder="Nome do Produto...">
  </div>
</div>


<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="cor">Cor</label>
    <span class="ob">*</span>
    <input type="text" name="cor" required class="form-control" 
    value="<?php echo e($produto->cor); ?>"
    placeholder="Cor...">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="material">Material</label>
    <input type="text" name="material" class="form-control" 
    value="<?php echo e($produto->material); ?>"
    placeholder="Material...">
  </div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="unidadeMedida">Unidade De Medida </label>
    <input type="text" name="unidadeMedida" class="form-control" 
    value="<?php echo e($produto->unidadeMedida); ?>"
    placeholder="Unidade De Medida...">
  </div> 
  

</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="status">Status</label>
  <span class="ob">*</span>
  <select name="status"  class="form-control">
    <option value="<?php echo e($produto->status); ?>"><?php echo e($produto->status); ?></option>
    <option value="ativo">Ativo</option> 
    <option value="Inativo">Inativo</option>

  </select>

</div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="preco">Preço Venda</label>
    <span class="ob">*</span>
    <input type="text" name="preco" requiredclass="form-control"  class="form-control" 
    value="<?php echo e($produto->preco); ?>"
    placeholder="Preço...">
  </div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12"> 
  <div class="form-group"><br>
    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
    <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/produto';">Cancelar</button> 

    <a href=/estoque/categoria/create target="_blank"><button class="btn btn-primary" type="button">Nova Categoria </button></a>

    <button class="btn btn-primary" type="button" onclick="javascript: location.href='/estoque/marca/create';"> Nova Marca </button>
    
  </div>

</div>
<?php echo Form::close(); ?>           


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>