<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Alterar Estado: <?php echo e($estado->nomeEstado); ?></h3>
   <?php if(count($errors)>0): ?>
   <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
    </ul>
  </div>
  <?php endif; ?>


  <?php echo Form::model($estado, ['method'=>'PATCH', 'route'=>['estado.update', $estado->idestado]]); ?>

  <?php echo e(Form::token()); ?>


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="form-group">
     <label for="nomeEstado">Nome do Estado</label>
     <span class="ob">*</span>
     <input type="text" name="nomeEstado" required class="form-control" 
     value="<?php echo e($estado->nomeEstado); ?>"
     placeholder="Nome Do Estado...">
   </div>
 </div>

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
   <div class="form-group">
     <label for="sigla">Sigla</label>
     <span class="ob">*</span>
     <input type="text" name="sigla" required class="form-control" 
     value="<?php echo e($estado->sigla); ?>"
     placeholder="Sigla...">
   </div>
 </div>

 <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"> 
 <div class="form-group">
  <label>Pais</label>
  <span class="ob">*</span>
  <select name="idpais" class="form-control">
    <?php $__currentLoopData = $pais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <option value="<?php echo e($pai->idpais); ?>">
      <?php echo e($pai->nomePais); ?>

    </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </select>
</div>
</div>

<div class="col-lg-1 col-sm-1 col-xs-1">
         <div class="form-group">
             <a href=/regiao/pais/create target="_blank"><button class="btn btn-primary" type="button" style="
              position: absolute;
              top:25px;
              left: 0px;
              "/>  Novo pais </button></a>
         </div>
       </div>


 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
          <label for="status">Status</label>
          <span class="ob">*</span>
          <select name="status"  class="form-control">
            <option value="<?php echo e($estado->status); ?>"><?php echo e($estado->status); ?></option>
            <option value="ativo">Ativo</option> 
            <option value="Inativo">Inativo</option>
      </select>

</div>

 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
     <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
     <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/estado';">Cancelar</button>    
    </div>
 </div>


<?php echo Form::close(); ?>		


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>