<?php $__env->startSection('conteudo'); ?>
<div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Cadastro de País</h3>
                  <?php if(count($errors)>0): ?>
                  <div class="alert alert-danger">
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                  </div>
                  <?php endif; ?>

                  <?php echo Form::open(array('url'=>'regiao/pais','method'=>'POST','autocomplete'=>'off')); ?>

            <?php echo e(Form::token()); ?>

            <div class="form-group">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="nomePais">Nome</label>
                  <span class="ob">*</span>
                  <input type="text" name="nomePais" required class="form-control" placeholder="Nome...">
            </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
             
                  <label for="sigla">Sigla</label>
                  <span class="ob">*</span>
                  <input type="text" name="sigla" required class="form-control" placeholder="Sigla...">
            </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                  <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
                  <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/pais';">Cancelar</button>
            </div>
            </div>
                  <?php echo Form::close(); ?>           
            
            </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>