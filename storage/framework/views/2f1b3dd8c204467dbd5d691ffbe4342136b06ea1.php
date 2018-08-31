<?php $__env->startSection('conteudo'); ?>


<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Editar fornecedor : <?php echo e($fornecedor->nomeFantasia); ?></h3> <!-- Categoria vai puxar o nome da categoria que vai editar -->
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


<?php echo Form:: model($fornecedor, ['method'=>'PATCH', 'route'=>['fornecedor.update', $fornecedor->idfornecedor]]); ?><!-- Metodo PATCH é para editar informação, Route é o caminho que vai ser depois que fazer a alteração, quando clicar no botão editar, vai ser passada a ID para saber qual categoria editar -->

<?php echo e(Form::token()); ?>



<div class="row">

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="razaoSocial">Razão social</label>
      <span class="ob">*</span>
      <input type="text" name="razaoSocial" required value="<?php echo e($fornecedor->razaoSocial); ?>" class="form-control" placeholder="Razão Social">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nomeFantasia">Nome fantasia</label>
      <span class="ob">*</span>
      <input type="text" name="nomeFantasia" required value="<?php echo e($fornecedor->nomeFantasia); ?>" class="form-control" placeholder="Nome fantasia">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="cnpj">CNPJ</label>
      <span class="ob">*</span>
      <input type="text" name="cnpj" id="cnpj" required value="<?php echo e($fornecedor->cnpj); ?>" class="cnpj form-control" placeholder="CNPJ">
    </div>
  </div>
  
  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="inscricaoEstadual">Inscrição Estadual</label>
      <input type="text" name="inscricaoEstadual" value="<?php echo e($fornecedor->inscricaoEstadual); ?>"class="form-control" placeholder="Inscrição Estadual">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" name="email" value="<?php echo e($fornecedor->email); ?>" class="form-control" placeholder="E-mail">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="telefone">Telefone</label>
      <span class="ob">*</span>
      <input type="text" name="telefone" required value="<?php echo e($fornecedor->telefone); ?>" class="phone form-control" placeholder="Telefone">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="fax">Fax</label>
      <input type="text" name="fax" value="<?php echo e($fornecedor->fax); ?>" class="phone form-control" placeholder="Fax">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="whatsapp">Whatsapp</label>
      <input type="text" name="whatsapp" value="<?php echo e($fornecedor->whatsapp); ?>" class="phone form-control" placeholder="Whatsapp">
    </div>
  </div>
  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nomeContato">Nome Contato</label>
      <input type="text" name="nomeContato" required value="<?php echo e($fornecedor->nomeContato); ?>" class="form-control" placeholder="nomeContato">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="logradouro">Logradouro</label>
      <span class="ob">*</span>
      <input type="text" name="logradouro" required value="<?php echo e($fornecedor->logradouro); ?>" class="form-control" placeholder="Logradouro">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="numero">Numero</label>
      <span class="ob">*</span>
      <input type="number" name="numero"  value="<?php echo e($fornecedor->numero); ?>" class="form-control" placeholder="Numero">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="bairro">Bairro</label>
      <span class="ob">*</span>
      <input type="text" name="bairro" required value="<?php echo e($fornecedor->bairro); ?>" class="form-control" placeholder="bairro">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="cep">CEP</label>
      <span class="ob">*</span>
      <input type="number" name="cep" value="<?php echo e($fornecedor->cep); ?>" class="form-control" placeholder="cep">
    </div>
  </div>

  <div class="col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
      <label>Cidade</label>
      <span class="ob">*</span>
      <select name="idcidade" class="form-control selectpicker" data-live-search="true">>
        <?php $__currentLoopData = $cidade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cid): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($cid->idcidade==$fornecedor->idcidade): ?>
        <option value="<?php echo e($cid->idcidade); ?>" selected>
          <?php echo e($cid->nomeCidade); ?>

        </option>
        <?php else: ?>
        <option value="<?php echo e($cid->idcidade); ?>">
          <?php echo e($cid->nomeCidade); ?>

        </option>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </select>
    </div>                
  </div>

  <div class="col-lg-1 col-sm-1 col-xs-1">
   <div class="form-group">
     <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button" style="
      position: absolute;
      top:25px;
      left: 0px;
      "/> Nova cidade </button></a>
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
   <div class="form-group">
    <label for="status">Status</label>
    <span class="ob">*</span>
    <select name="status"  class="form-control">
      <option value="<?php echo e($fornecedor->status); ?>"><?php echo e($fornecedor->status); ?></option>
      <option value="ativo">Ativo</option> 
      <option value="Inativo">Inativo</option>
    </select>
  </div>
</div>


<div class="col-lg-12 col-sm-12 col-xs-12"> 
  <div class="form-group"><br>
    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
    <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/produto';">Cancelar</button>  
    <label class="pull-right">Campo com '<span class="ob">*</span>' obrigatório</label>
  </div> 
</div>
<?php echo Form::close(); ?>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>