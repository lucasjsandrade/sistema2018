<?php $__env->startSection('conteudo'); ?>
<?php echo e(Form::Open(array('action'=>array('orcamentoController@destroy',$orcamento->idorcamento),'method'=>'delete'))); ?>

<?php echo e(Form::token()); ?> 




<h1>Detalhes Do Orcamento </h1><br>

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="funcionario">Funcionario</label>
      <p><?php echo e($orcamento->nomeFuncionario); ?></p>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="idpedido">Numero do Orcamento</label>
      <p><?php echo e($orcamento->idorcamento); ?></p>
    </div>
  </div> 

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="dataPedido">Data</label>
      <p><?php echo e($orcamento->dataOrcamento); ?></p>
    </div>
  </div> 


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="cliente">Cliente</label>
      <p><?php echo e($orcamento->nomeCliente); ?></p>
    </div>

  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="status">Status</label>
      <p><?php echo e($orcamento->status); ?></p>
    </div>

  </div>
  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="status">Observação</label>
      <p><?php echo e($orcamento->observacao); ?></p>
    </div>

  </div>


  <div class="row">

    <div class="panel panel-primary">
      <div class="panel-body">


        <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
          <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color:#A9D0F5">


              <th>Produto</th>
              <th>Quantidade</th>
              <th>Valor unitario</th>
              <th>Valor Total</th>
              <th >Total</th>
            </thead>
            <tfoot >


            </tfoot>

            <tbody>


              <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


              <tr>
               <td><?php echo e($det->nome." ".$det->modelo." ".$det->unidadeMedida); ?></td>

               <td><?php echo e($det->quantidade); ?></td>

               <td><?php echo e($det->valorUnitario); ?></td>
               <td ><?php echo e($det->valorTotal); ?></td>

             </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
             
             


             <th>Total </th>
             <th></th>
             <th></th> 
             <th></th>
             <th style="background-color:#A9D0F5"><?php echo e($det->valorTotal); ?><th>  



             </tbody >

           </table>
         </div>

       </div>

     </div>


     

  </div>   
  <div>
     <tr>
         <td>

          <a><button type="submit" class="btn btn-danger">Excluir</button></a>
          <a ><button class="btn btn-primary">Finalizar orcamento</button></a>

          


        </td>  
      </tr>  
  </div> 
  <?php echo Form::close(); ?> 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>