<?php $__env->startSection('conteudo'); ?>

<?php echo Form::model($orcamento, ['method'=>'PATCH', 'route'=>['orcamento.update', $orcamento->idvenda], 'files'=>'true']); ?>

<?php echo e(Form::token()); ?>


<script type="text/javascript">$totalTotal = 0.0;</script>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Alterar Orçamento: <?php echo e($orcamento->idvenda); ?></h3>
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


<br>

<div class="row">  

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Funcionario</label>
      <span class="ob">*</span>
      <select name="idfuncionario" class="form-control">
        <?php $__currentLoopData = $funcionario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fun): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($fun->idfuncionario==$orcamento->idfuncionario): ?>
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

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Cliente</label>
      <span class="ob">*</span>
      <select name="idcliente" class="form-control">
        <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($cli->idcliente==$orcamento->idcliente): ?>
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
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <a href=/estoque/produto/create target="_blank"><button class="btn btn-primary" type="button">Novo Produto</button></a>
    </div>

  </div>
</div>

<div class="row">
  <div class="panel panel-primary">
    <div class="panel-body" >
      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">

          <label>Selecione um Produto</label>
          <span class="ob">*</span>
          <select name="pidproduto" id="pidproduto" class="form-control selectpicker" data-live-search="true">
            <option value="">Selecione um produto  </option>
            <?php $__currentLoopData = $produto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <option value="<?php echo e($pro->idproduto); ?>_<?php echo e($pro->quantidade); ?>_<?php echo e($pro->preco); ?>">
              <?php echo e($pro->produto); ?>    
            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </select>
        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
          <label for="num_doc">Quantidade</label>
          <input type="number" name="quantidade"

          id="pquantidade"
          class="form-control" placeholder="Quantidade...">
        </div>
      </div>

      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
          <label for="preco">Valor Unitario</label>
          <input type="number" name="preco" 
          id="ppreco"
          disabled
          class="form-control" placeholder="Valor Unitario...">
        </div>
      </div>

      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
          <label for="estoque">Estoque</label>
          <input type="number" name="estoque" 
          id="pqestoque"
          disabled
          class="form-control" placeholder="Estoque...">
        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
          <label for="desconto">Desconto</label>
          <input type="text" name="desconto" value="<?php echo e(old('desconto')); ?>" 
          id="pdesconto"  class="form-control" placeholder="Desconto">

        </div>
      </div>
      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
          <label name="maodeobra" id="maodeobra" for="maodeobra">Mao De Obra</label>
          <input type="number" name="pmaodeobra" id="pmaodeobra" disable class="form-control" placeholder="Mao de obra">
        </div>
      </div>

      <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
          <button type="button" id="bt_add"
          class="btn btn-info">
          Adicionar
        </button>

      </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="table-responsive form-group">
        <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover" >
          <thead style="background-color:#A9D0F5">                                
           <th>Opções</th>
           <th>Produtos</th>
           <th>Quantidade</th>
           <th>Valor Unitario</th>
           <th>Mão de Obra</th>
           <th>Desconto</th>

           <th>Total</th>
         </thead>

         <tbody>
          <script type="text/javascript">
           var cont = 0;
           var total = 0;
         </script>
         <?php 
         $cont_php = 0;
          ?>
         <?php $final= 0; ?>
         <?php $__currentLoopData = $itensv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itens): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>  
         <?php if($itens->idvenda == $orcamento->idvenda): ?>                                                      
         <tr class="selected" id= <?php  echo "linha".$cont_php;  ?>>
          <td>
           <button type="button" class="btn btn-warning" onclick="apagar(<?php  echo $cont_php;  ?>);"><i class="fa fa-close" ></i></button>

         </td>
         <td>
          <input class="form-control" name="idproduto[]" value="<?php echo e($itens->idproduto); ?>">
        </td>
        <td>
          <input class="form-control" name="quantidade[]" value="<?php echo e($itens->quantidade); ?>">
        </td>
        <td>
         <input class="form-control" name="valorUnitario[]" value="<?php echo e($itens->valorUnitario); ?>">
       </td>         
       <td>
         <input class="form-control" name="maodeobra[]" value="<?php echo e($itens->maodeobra); ?>">
       </td> 
       <td>
        <input class="form-control" name="desconto[]" value="<?php echo e($itens->desconto); ?>">
      </td> 
      <td>
        <input class="form-control" name="valorTotal[]" value="<?php echo e($itens->valorTotal); ?>">
        
          <script type="text/javascript"> $totalTotal = $totalTotal + <?php echo e($itens->valorTotal); ?>; </script>
        
      </td> 
      <?php 
      $final +=  $itens->valorTotal; 
      ?>

    </tr>
    <script type='text/javascript'>cont++;</script> 
    <?php 
    $cont_php++;                 
     ?>  
    <?php endif; ?> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    
  </tbody>
  <tfoot>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>

    <td>
      <input type="text" name="valorFinal" value="<?php echo $final; ?>" readonly id="total" class="form-control" style="width: 100px;">
    </td>      
  </tfoot>
</table>
</div>
</div>
<script language="javascript">
  var title = "<?php print $final; ?>";
</script>
<!--<?php echo '<script>var title = "'. $final .'";</script>'; ?>-->
<div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
  <div class="form-group">
    <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
    <button title="Salvar"  class="btn btn-success" type="submit"><i class="fa fa-save"></i>   Salvar  </button>
    <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/venda/orcamento';">Cancelar</button>
  </div>
</div>
</div>






<?php echo Form::close(); ?>




<?php $__env->startPush('scripts'); ?>

<script>
  



  $(document).ready(function(){

    $('#bt_add').click(function(){
      adicionar();
    });

  });
  var subi = parseFloat(title);
  var cont=0;
  var soma=0;
  total = 0;
  subtotal=[];
  $("#pidproduto").change(mostrarValores);


//$("#salvar").hide();

function adicionar(){
  dadosProdutos=document.getElementById('pidproduto').value.split('_');
  idproduto=dadosProdutos[0];
  produto=$("#pidproduto option:selected").text();
  quantidade=$("#pquantidade").val();
  valorUnitario=$("#ppreco").val();
  maodeobra=$("#pmaodeobra").val();
  desconto=$("#pdesconto").val();
  estoque=$("#pqestoque").val();
  valorTotal=$("#total").val();



      //Verificar if de adicionar linha se a linha anterior estiver em branco
      if(quantidade !=="" && produto !== ""){


        soma+=maodeobra-desconto;
        
        subtotal[cont]=(((quantidade*valorUnitario)+soma))
        total = (subtotal[cont])+subi;
        //console.log(total);
        
        $totalTotal = $totalTotal + subtotal[cont];

        var linha = '<tr class="selected" id="linha'+cont+'"><td><button type="button" class="btn btn-warning" onclick="apagar('+cont+');"><i class="fa fa-close"></i></button></td><td><input class="form-control" name="idproduto[]" value="'+idproduto+'"></td><td><input class="form-control" name="quantidade[]" value="'+quantidade+'"></td><td><input class="form-control" name="valorUnitario[]" value="'+valorUnitario+'"></td><td><input class="form-control" name="desconto[]" value="'+desconto+'"></td><td><input class="form-control" name="maodeobra[]" value="'+maodeobra+'"></td><td><input class="form-control" name="valorTotal[]" id="valorTotal" value="'+subtotal[cont]+'"></td></tr>';
        cont++;

        console.log($totalTotal);
        //$('input.total').val($totalTotal);

        
        limpar();
        $("#total").val($totalTotal);
        $('#detalhes').append(linha);



      }else{
        alert("Erro ao inserir os produtos, preencha os campos corretamente!");
      }
    }

    total=0;

    function mostrarValores(){
      dadosProdutos=document.getElementById('pidproduto').value.split('_');
      $("#ppreco").val(dadosProdutos[2]);
      $("#pqestoque").val(dadosProdutos[1]);
    }

    function limpar(){
     $("#pquantidade").val("");
     $("#pvalorUnitario").val("");
     $("#pdesconto").val("");
     $("#pmaodeobra").val("");
     $("#ptotal").val("");
   }

   function apagar(index){
     $("#total").val(total);
     $("#linha" + index).remove();
     cont--;

   }

 </script>

 <?php $__env->stopPush(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>