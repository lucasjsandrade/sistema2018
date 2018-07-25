<?php $__env->startSection('conteudo'); ?>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Alterar Agendamento: <?php echo e($agendamento->idagendamento); ?></h3>
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

<?php echo Form::model($agendamento, ['method'=>'PATCH', 'route'=>['agendamento.update', $agendamento->idagendamento], 'files'=>'true']); ?>

<?php echo e(Form::token()); ?>


<div class="row">  

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Cliente</label>
    <span class="ob">*</span>
    <select name="idcliente" class="form-control">
      <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <?php if($cli->idcliente==$agendamento->idcliente): ?>
      <option value="<?php echo e($cli->idcliente); ?>" selected>
        <?php echo e($cli->nomeCliente); ?>

      </option>
      <?php else: ?>
      <option value="<?php echo e($cli->idcliente); ?>">
        <?php echo e($cli->nomeCliente); ?>

      </option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </select>
  </div>                
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Funcionario</label>
    <span class="ob">*</span>
    <select name="idfuncionario" class="form-control">
      <?php $__currentLoopData = $funcionario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fun): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <?php if($fun->idfuncionario==$agendamento->idfuncionario): ?>
      <option value="<?php echo e($fun->idfuncionario); ?>" selected>
        <?php echo e($fun->nomeFuncionario); ?>

      </option>
      <?php else: ?>
      <option value="<?php echo e($fun->idfuncionario); ?>">
        <?php echo e($fun->nomeFuncionario); ?>

      </option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </select>
  </div>                
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataOrcamento">Data Orçamento</label>
    <input type="date" name="dataOrcamento" class="form-control" 
    value="<?php echo e($agendamento->dataOrcamento); ?>"
    placeholder="aaaa/mm/dd">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataInstalacao">Data Instalação</label>
    <input type="date" name="dataInstalacao" class="form-control" 
    value="<?php echo e($agendamento->dataInstalacao); ?>"
    placeholder="aaaa/mm/dd">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="horaMarcada">Hora marcada</label>
    <input type="time" name="horaMarcada" class="form-control" 
    value="<?php echo e($agendamento->horaMarcada); ?> maxlength="8" name="hour" pattern="[0-9]{2}:[0-9]{2} [0-9]{2} $" min="08:00" max="18:00">
  </div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="status">Status</label>
    <span class="ob">*</span>
    <select name="status"  class="form-control">
      <option value="<?php echo e($agendamento->status); ?>"><?php echo e($agendamento->status); ?></option>
      <option value="Orcamento">Orçamento</option> 
      <option value="Instalacao">Instalação</option>
      <option value="Concluido">Concluido</option>
    </select>
  </div>
</div>

</div>

<div class="col-lg-6 col-sm-6 col-xs-12"> 
  <div class="form-group"><br>
    <button class="btn btn-primary" type="submit">Salvar</button>

    <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/venda/agendamento';">Cancelar</button> 

    </button><a href=/pessoa/funcionario/create target="_blank"><button class="btn btn-primary" type="button">Novo Funcionario </button></a>

  </button><a href=/pessoa/cliente/create target="_blank"><button class="btn btn-primary" type="button">Novo Cliente </button></a>


<?php echo Form::close(); ?>           


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>