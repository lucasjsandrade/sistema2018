<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Cadastro de Cidade</h3>
   <?php if(count($errors)>0): ?>
   <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
  </div>
  <?php endif; ?>

  <?php echo Form::open(array('url'=>'regiao/cidade','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

  <?php echo e(Form::token()); ?>

  <div class="row">   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
       <label for="nomeCidade">Nome Cidade</label>
       <span class="ob">*</span>
       <input type="text" name="nomeCidade" required class="form-control" placeholder="Nome...">
     </div>
   </div> 

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
     <div class="form-group">
      <label>Estado</label>
      <span class="ob">*</span>
      <select name="idestado" class="form-control">
        <?php $__currentLoopData = $estado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <option value="<?php echo e($est->idestado); ?>">
          <?php echo e($est->nomeEstado); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </select>
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div class="form-group">
     <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
     <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/cidade';">Cancelar</button>
     <a href=/regiao/estado/create target="_blank"><button class="btn btn-primary" type="button">Novo Estado </button>
     </a>

   </div>
 </div>
 <?php echo Form::close(); ?>		

  </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>