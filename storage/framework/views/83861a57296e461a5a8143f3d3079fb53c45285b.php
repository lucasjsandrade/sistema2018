<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Cadastro Cliente</h3>
   <?php if(count($errors)>0): ?> <!-- Se existir erro vai mostrar um alerta e vai listar os erros --> 
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

<?php echo Form::open(array('url'=>'pessoa/cliente','method'=>'POST','autocomplete'=>'off')); ?><!-- Metodo POST está passando informação -->
<?php echo e(Form::token()); ?>




<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label for="nomeCliente">Nome</label>
   <span class="ob">*</span>
   <input type="text" name="nomeCliente" required value="<?php echo e(old('nomeCliente')); ?>" class="form-control" placeholder="Nome do Cliente">
 </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label for="rg">RG</label>
   <input type="text" name="rg"  value="<?php echo e(old('rg')); ?>"class="form-control" placeholder="RG">
 </div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label for="cpf">CPF</label>
   <span class="ob">*</span>
   <input type="text" name="cpf" required value="<?php echo e(old('cpf')); ?>" 
   class="cpf form-control" placeholder="000.000.000-00">
 </div>
</div>


<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="sexo">Sexo</label>
    <span class="ob">*</span>
    <select name="sexo" id="sexo" class="form-control">
     <option value="M">M</option> 
     <option value="F">F</option>
   </select>
 </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="telefone">Telefone</label>
  <input type="text" name="telefone" 
  value="<?php echo e(old('telefone')); ?>" class="phone form-control"
  placeholder="Telefone">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="celular">Celular</label>
  <input type="text" name="celular" 
  value="<?php echo e(old('celular')); ?>" class="celular form-control"
  placeholder="Celular">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="whatsapp">Whatsapp</label>
  <input type="text" name="whatsapp"  
  value="<?php echo e(old('whatsapp')); ?>" class="celular form-control"
  placeholder="whatsapp">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="email">Email</label>
  <input type="email" name="email" 
  value="<?php echo e(old('email')); ?>" class="form-control"
  placeholder="email">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="logradouro">Logradouro</label>
  <span class="ob">*</span>
  <input type="text" name="logradouro" 
  required value="<?php echo e(old('logradouro')); ?>" class="form-control"
  placeholder="logradouro">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="numero">Numero</label>
  <span class="ob">*</span>
  <input type="text" name="numero" 
  required value="<?php echo e(old('numero')); ?>" class="form-control"
  placeholder="numero">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12"> 
 <div class="form-group">
  <label for="bairro">Bairro</label>
  <span class="ob">*</span>
  <input type="text" name="bairro" 
  required value="<?php echo e(old('bairro')); ?>" class="form-control"
  placeholder="bairro">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="cep">CEP</label>
  <span class="ob">*</span>
  <input type="text" name="cep" required value="<?php echo e(old('cep')); ?>" 
  class="cep form-control"
  placeholder="CEP 00.000-000">
</div>
</div> 

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="dataNascimento">Data Nascimento</label>
  <span class="ob">*</span>
  <input type="date" name="dataNascimento" required value="<?php echo e(old('dataNascimento')); ?>" class="form-control"
  placeholder="dd/mm/aaaa">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label>Cidade</label>
  <span class="ob">*</span>
  <select name="idcidade" class="form-control">
   <?php $__currentLoopData = $cidade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cid): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
   <option value="<?php echo e($cid->idcidade); ?>"><!-- Aqui vai recuperar o objeto do banco -->
     <?php echo e($cid->nomeCidade); ?>

   </option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
 </select>
</div> 
</div>


<div class="form-group">
 <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
 <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pessoa/cliente';">Cancelar</button>
 <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button">Nova Cidade </button></a>
</div>

</div>

<?php echo Form::close(); ?>     

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>