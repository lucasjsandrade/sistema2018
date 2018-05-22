@extends('layouts.admin')
@section('conteudo')

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Novo Pedido</h3>
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


{!!Form::open(array('url'=>'compra/pedido','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="row">

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Funcionario</label>
      <span class="ob">*</span>
      <select name="idfuncionario" class="form-control">
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
      <label>Fornecedor</label>
      <span class="ob">*</span>
      <select name="idfornecedor" class="form-control">
        @foreach($fornecedor as $for)
        <option value="{{$for->idfornecedor}}">
          {{$for->razaoSocial}}
        </option>
        @endforeach
      </select>
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="condicaoPagamento">Condição Pagamento</label>
      <span class="ob">*</span>
      <input type="text" name="condicaoPagamento" value="{{old('condicaoPagamento')}}" class="form-control" placeholder="Condição Pagamento">
    </div>
  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <span class="ob">*</span>
      <label>Forma Pagamento</label>
      <select name="formaPagamento" id="formaPagamento" class="form-control">
        <option value="Dinheiro">Dinheiro </option>
        <option value="Boleto"> Boleto </option>
        <option value="Cartão">Cartão </option>
      </select>
    </div>
  </div>  

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div class="form-group">
    <a href=/pessoa/fornecedor/create target="_blank"><button class="btn btn-primary" type="button">Novo Fornecedor</button></a>
    <a href=/pessoa/funcionario/create target="_blank"><button class="btn btn-primary" type="button">Novo Funcionario</button></a>
    <a href=/estoque/produto/create target="_blank"><button class="btn btn-primary" type="button">Novo Produto</button></a>
  </div>
</div>

</div>


<div class="row">


 <div class="panel panel-primary">

  <div class="panel-body" >
    
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
      <div class="form-group">
        <label>Produto</label>
        <span class="ob">*</span>
        <select name="idproduto" id="pidproduto"
        class="form-control selectpicker" data-live-search="true">
        @foreach($produto as $pro)
        <option value="{{$pro->idproduto}}">
          {{$pro->produto}}
        </option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="quantidade">Quantidade</label>
      <span class="ob">*</span>
      <input type="number" name="quantidade" value="{{old('quantidade')}}" 
      id="pquantidade"  class="form-control" placeholder="Quantidade">
    </div>
  </div>


  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label for="valorUnitario">Valor Unitario</label>
      <span class="ob">*</span>
      <input type="number" name="valorUnitario" value="{{old('valorUnitario')}}" id="pvalorUnitario" class="form-control" 
      placeholder="valorUnitario">
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



<div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
  <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
    <thead style="background-color:#A9D0F5">
      <th>Opções</th>
      <th>Produtos</th>
      <th>Quantidade</th>
      <th>Valor Unitario</th>
      
      <th>Total</th>
    </thead>
    <tfoot>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      
      <th id="total">R$ 0,00</th>     
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
   <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
   <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pedido';">Cancelar</button>
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

  function adicionar(){
    idproduto=$("#pidproduto").val();
    produto=$("#pidproduto option:selected").text();
    quantidade=$("#pquantidade").val();
    valorUnitario=$("#pvalorUnitario").val();
    //valorTotal=$("#pvalorTotal").val();

    if(idproduto!="" && quantidade!="" && quantidade>0 && valorUnitario!=""){

      subtotal[cont]=(quantidade*valorUnitario);
      total = total + subtotal[cont];
      var linha = '<tr class="selected" id="linha'+cont+'">    <td> <button type="button" class="btn btn-warning" onclick="apagar('+cont+');"> X </button></td>      <td> <input type="hidden" name="idproduto[]" value="'+idproduto+'">'+produto+'</td><td> <input type="number" name="quantidade[]" value="'+quantidade+'"></td>                       <td> <input type="number" name="valorUnitario[]" value="'+valorUnitario+'"></td> <td> '+subtotal[cont]+' </td> </tr>'
      cont++;
      limpar();
      $("#total").html("R$: " + total);
      ocultar();
      $('#detalhes').append(linha);

    }else{
      alert("Erro ao inserir os detalhes, preencha os campos corretamente!!");

    }
  }
  total=0;

  function limpar(){
    $("#pquantidade").val("");
    $("#pvalorUnitario").val("");
    $("#pdesconto").val("");
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
    $("#total").html("R$: " + total);
    $("#linha" + index).remove();
    ocultar();
  }



</script>
@endpush
@stop