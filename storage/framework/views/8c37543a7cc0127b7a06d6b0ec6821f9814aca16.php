<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Contas a pagar</h3>
   <?php if(count($errors)>0): ?>
   <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
  </div>
  <?php endif; ?>

  <?php echo Form::open(array('url'=>'contaspagar','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

  <?php echo e(Form::token()); ?>


  <div class="row">   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
       <label for="descricao">Descricao</label>
       <span class="ob">*</span>
       <input type="text" name="descricao" required value="<?php echo e(old('descricao')); ?>"  class="form-control" placeholder="descricao">
     </div>
   </div> 

   <div class="row">   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="valor">Valor</label>
        <span class="ob">*</span>
        <input type="text" name="valor" required value="<?php echo e(old('descricao')); ?>"  class="form-control" placeholder="valor">
      </div>
    </div> 

     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="data">Data</label>
        <span  class="ob">*</span>
        <input type="date" name="data" required value="<?php echo e(old('data')); ?>" class="form-control">
      </div>
    </div>
  </div>
    
    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
     <div class="form-group">
       <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
       <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/contasapagar';">Cancelar</button>

     </div>
   </div>
   <?php echo Form::close(); ?>		


</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>