@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Orçamento <i class="fa fa-shopping-cart"></i></h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
       @foreach ($errors->all() as $error)
       <li>{{$error}}</li>
       @endforeach
     </ul>
   </div>
   @endif
 </div>
</div>



{!!Form::open(array('url'=>'venda/orcamento','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="row">
  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Funcionario</label>
      <span class="ob">*</span>
      <select name="idfuncionario" id="idfuncionario" class="form-control selectpicker" data-live-search="true">
        @foreach($funcionario as $fun)
        <option value="{{$fun->idfuncionario}}">
          {{$fun->nomeFuncionario}}
        </option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Cliente</label>
      <span class="ob">*</span>
      <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
        @foreach($cliente as $cli)
        <option value="{{$cli->idcliente}}">
          {{$cli->nomeCliente}}
        </option>
        @endforeach
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
          @foreach($produto as $pro)
          <option value="{{$pro->idproduto}}_{{$pro->quantidade}}_{{$pro->preco}}">
            {{$pro->produto}}    
          </option>
          @endforeach
        </select>
      </div>
    </div>


    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <label for="num_doc">Quantidade</label>
        <span class="ob">*</span>
        <input type="number" name="quantidade"

        id="pquantidade"
        class="form-control" placeholder="Quantidade...">
      </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <label for="preco">Valor Unitario</label>
        <span class="ob">*</span>
        <input type="number" name="preco" 
        id="ppreco"
        disabled
        class="form-control" placeholder="Valor Unitario...">
      </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <label for="estoque">Estoque</label>
        <span class="ob">*</span>
        <input type="number" name="estoque" 
        id="pqestoque"
        disabled
        class="form-control" placeholder="Estoque...">
      </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <label for="desconto">Desconto</label>
        <span class="ob">*</span>
        <input type="text" name="desconto" value="0" 
        id="pdesconto"  class="form-control" placeholder="Valor do desconto">

      </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <label name="maodeobra" id="maodeobra" for="maodeobra">Mao De Obra</label>
        <span class="ob">*</span>
        <input type="number" name="pmaodeobra" value="0" id="pmaodeobra"  class="form-control" placeholder="Valor da Mão de Obra">
      </div>
    </div>
    
    <div class="form-group">        
      <input type="hidden" name="status" value="Aberta" >
    </div>





    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <button type="button" id="bt_add"
        class="btn btn-info">
        Adicionar
      </button>

    </div>
  </div>



  <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
      <thead style="background-color:#A9D0F5">
        <th>Opções</th>
        <th>Produtos</th>
        <th>Quantidade</th>
        <th>Valor Unitario</th>
        <th>Mão de Obra</th>
        <th>Desconto</th>

        <th>Total</th>
      </thead>
      <tfoot>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>

        <td>
          <input type="text" name="valorTotal" readonly id="total" class="form-control" style="width: 100px;">
        </td>     
      </tfoot>   
    </tfoot>
  </table>
</div>

</div>
</div>

</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
  <div class="form-group">
   <input name="_token" value= "{{ csrf_token()}}" type="hidden"> 
   <button class="btn btn-success" id="salvar" type="submit"><i class="fa fa-save"></i> Confirmar</button>
   <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/venda/orcamento';">Cancelar</button>
 </div>
</div>


</div>



{!!Form::close()!!}   

@push('scripts')
<script>

  $(document).ready(function(){
    $('#bt_add').click(function(){
      adicionar();

    });
  });

  var cont=0;
  total = 0;
  subtotal=[];
  
  $("#salvar").hide();
  $("#pidproduto").change(mostrarValores);


  function mostrarValores(){
    dadosProdutos=document.getElementById('pidproduto').value.split('_');
    $("#ppreco").val(dadosProdutos[2]);
    $("#pqestoque").val(dadosProdutos[1]);
  }

  function adicionar(){
    dadosProdutos=document.getElementById('pidproduto').value.split('_');
    idproduto=dadosProdutos[0];
    produto=$("#pidproduto option:selected").text();
    quantidade=$("#pquantidade").val();
    valorUnitario=$("#ppreco").val();
    maodeobra=$("#pmaodeobra").val();
    desconto=$("#pdesconto").val();
    estoque=$("#pqestoque").val();
    

    if(idproduto!="" && quantidade!="" && quantidade>0 && valorUnitario!=""  && desconto!=""  && maodeobra!=""){

      $subi=maodeobra-desconto;
      subtotal[cont]=((quantidade*valorUnitario)+$subi);
      total = total + subtotal[cont];

      var linha = '<tr class="selected" id="linha'+cont+'">    <td> <button type="button" class="btn btn-warning" onclick="apagar('+cont+');"> X </button></td>      <td> <input type="hidden" name="idproduto[]" value="'+idproduto+'">'+produto+'</td><td> <input type="number" name="pquantidade[]" value="'+quantidade+'"readonly></td> <td> <input type="number" name="pvalorUnitario[]" value="'+valorUnitario+'"readonly></td> <td> <input type="number" name="pmaodeobra[]" value="'+maodeobra+'"readonly></td> <td> <input type="number" name="pdesconto[]" value="'+desconto+'"readonly></td> <td> '+subtotal[cont]+' </td> </tr>'
      cont++;



      limpar();
      $("#total").val(total);

      ocultar();
      $('#detalhes').append(linha);

      



    }else{
      alert("Erro ao inserir os detalhes do Produto!!  'Verifique se foi preenchido a quantidade,desconto ou mão de obra'. ");

    }
  }


  total=0;


  function limpar(){
    $("#pquantidade").val("");
    $("#pvalorUnitario").val("");
    $("#pdesconto").val("");
    $("#pmaodeobra").val("");
  }




  function ocultar(){
    if(total>0){
      $("#salvar").show();
    } else{
      $("#salvar").hide();
    }
  }

  function apagar(index){
    total = total - subtotal[index];
    $("#total").val(total);
    $("#linha" + index).remove();
    ocultar();
  }



</script>
@endpush
@stop