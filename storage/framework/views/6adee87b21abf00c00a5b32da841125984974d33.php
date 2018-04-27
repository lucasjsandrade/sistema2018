<?php $__env->startSection('conteudo'); ?>
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Alterar Funcionario: <?php echo e($funcionario->nomeFuncionario); ?></h3>
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

			
			

			<?php echo Form::model($funcionario, ['method'=>'PATCH', 'route'=>['funcionario.update', $funcionario->idfuncionario]]); ?>

			<?php echo e(Form::token()); ?>


      

	<div class="row">
       <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="form-group">
              <label for="nomeFuncionario">Nome</label>
              <input type="text" name="nomeFuncionario" class="form-control" 
              value="<?php echo e($funcionario->nomeFuncionario); ?>"
              placeholder="Nome">
            </div>
         </div>   

          <div class="col-lg-6 col-sm-6 col-xs-12">             
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" class="form-control" 
              value="<?php echo e($funcionario->telefone); ?>"
              placeholder="Telefone...">
            </div>
           </div>

           <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="rg">RG</label>
              <input type="text" name="rg" class="form-control" 
              value="<?php echo e($funcionario->rg); ?>"
              placeholder="RG...">
            </div>
       </div>

       <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" class="form-control" 
              value="<?php echo e($funcionario->cpf); ?>"
              placeholder="CPF...">
            </div>
       </div>

       <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="sexo">Sexo</label>
              <input type="text" name="sexo" class="form-control" 
              value="<?php echo e($funcionario->sexo); ?>"
              placeholder="Sexo">
            </div>
       </div>

       <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" class="form-control" 
              value="<?php echo e($funcionario->telefone); ?>"
              placeholder="Telefone...">
            </div>
       </div>

         <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" name="celular" class="form-control" 
              value="<?php echo e($funcionario->celular); ?>"
              placeholder="Celular...">
            </div>
       </div>

          <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
              <label for="whatsapp">Whatsapp</label>
              <input type="text" name="whatsapp" class="form-control" 
              value="<?php echo e($funcionario->whatsapp); ?>"
              placeholder="whatsapp">
            </div>
         </div>

          <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="form-group">
                    <label for="fax">Email</label>
                    <input type="text" name="email" class="form-control" 
                    value="<?php echo e($funcionario->email); ?>"
                    placeholder="email">
             </div>
          </div>

           <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="form-group">
              
                    <label for="dataNascimento">Data Nascimento</label>
                    <input type="text" name="dataNascimento" class="form-control" 
                    value="<?php echo e($funcionario->dataNascimento); ?>"
                    placeholder="dd/mm/aaa">
             </div>
          </div>

           
          <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="form-group">
              <label for="fax">Logradouro</label>
              <input type="text" name="logradouro" class="form-control" 
              value="<?php echo e($funcionario->logradouro); ?>"
              placeholder="logradouro">
            </div>
          </div>

         <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
              <label for="numero">Numero</label>
              <input type="text" name="numero" class="form-control" 
              value="<?php echo e($funcionario->numero); ?>"
              placeholder="numero">
            </div>
         </div>
       <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" class="form-control" 
              value="<?php echo e($funcionario->bairro); ?>"
              placeholder="bairro">
            </div>
      </div>
       <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
              <label for="cep">CEP</label>
              <input type="text" name="cep" class="form-control" 
              value="<?php echo e($funcionario->cep); ?>"
              placeholder="cep">
            </div>
       </div>
 
         
       <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
               <label>Cidade</label>
               <select name="idcidade" class="form-control">
               <?php $__currentLoopData = $cidade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cid): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               <option value= "<?php echo e($cid->idcidade); ?>">
               <?php echo e($cid->nomeCidade); ?>

               </option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
               </select>
            </div>
                        
      </div>
    
     

      <div class="col-lg-6 col-sm-6 col-xs-12">   
         <div class="form-group">
                  <button class="btn btn-primary" type="submit">Salvar</button>
                  <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pessoa/funcionario';">Cancelar</button>
            
           <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button">Nova Cidade </button></a>
         </div>
      </div>
    </div>
	</div>

    <?php echo Form::close(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>