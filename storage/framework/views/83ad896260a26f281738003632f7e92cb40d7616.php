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
                  <label for="nomePais">Nome</label>
                  <input type="text" name="nomePais" class="form-control" placeholder="Nome...">
            </div>

             <div class="form-group">
                  <label for="sigla">Sigla</label>
                  <input type="text" name="sigla" class="form-control" placeholder="Sigla...">
            </div>
           
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Confirmar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
                  
            </div>

                  <?php echo Form::close(); ?>           
            
            </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>