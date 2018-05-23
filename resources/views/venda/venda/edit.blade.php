@extends('layouts.admin')
@section('conteudo')

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Alterar Orçamento: {{$orcamento->idvenda}}</h3>
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
{!!Form::model($orcamento, ['method'=>'PUT', 'route'=>['venda.update', $orcamento->idvenda]])!!}
{{Form::token()}}

<br>

<div class="row">  

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Funcionario</label>
      <span class="ob">*</span>
      <select name="idfuncionario" class="form-control">
        @foreach($funcionario as $fun)
        @if($fun->idfuncionario==$orcamento->idfuncionario)
        <option value="{{$fun->idfuncionario}}" selected>
          {{$fun->nomeFuncionario}}
        </option>
        @else
        <option value="{{$fun->idfuncionario}}">
          {{$fun->nomeFuncionario}}
        </option>
        @endif
        @endforeach
      </select>
    </div>                
  </div>

  <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
    <div class="form-group">
      <label>Cliente</label>
      <span class="ob">*</span>
      <select name="idcliente" class="form-control">
        @foreach($cliente as $cli)
        @if($cli->idcliente==$orcamento->idcliente)
        <option value="{{$cli->idcliente}}" selected>
          {{$cli->nomeCliente}}
        </option>
        @else
        <option value="{{$cli->idcliente}}">
          {{$cli->nomeCliente}}
        </option>
        @endif
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
          <input type="text" name="desconto" value="{{old('desconto')}}" 
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
        <tbody>
          <script type="text/javascript">
           var cont = 0;
           var total = 0;
         </script>
         @php
         $cont_php = 0;
         @endphp

         @foreach($itensv as $itens)  
         @if($itens->idvenda == $orcamento->idvenda)                                                      
         <tr class="selected" id= @php echo "linha".$cont_php; @endphp>
          <td>
           <button type="button" class="btn btn-danger" onclick="apagar(@php echo $cont_php; @endphp);"><i class="fa fa-close"></i></button>
         </td>
         <td>
          <input class="form-control" name="idproduto[]" value="{{$itens->idproduto}}">
        </td>
        <td>
          <input class="form-control" name="quantidade[]" value="{{$itens->quantidade}}">
        </td>
        <td>
         <input class="form-control" name="valorUnitario[]" value="{{$itens->valorUnitario}}">
       </td>         
       <td>
         <input class="form-control" name="maodeobra[]" value="{{$itens->maodeobra}}">
       </td> 
       <td>
        <input class="form-control" name="desconto[]" value="{{$itens->desconto}}">
      </td> 
      <td>
        <input class="form-control" name="valorTotal[]" value="{{$itens->valorTotal}}">
      </td> 

    </tr>
    <script type='text/javascript'>cont++;</script> 
    @php
    $cont_php++;                 
    @endphp  
    @endif 
    @endforeach

  </tbody>
</table>
</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
  <div class="form-group">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
    <button title="Salvar"  class="btn btn-success" type="submit"><i class="fa fa-save"></i>   Salvar  </button>
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
  $("#pidproduto").change(mostrarValores);


//$("#salvar").hide();

function adicionar(){
  dadosProdutos=document.getElementById('pidproduto').value.split('_');
  idproduto=dadosProdutos[0];
  produto=$("#pidproduto option:selected").text();
  var produto = '';  
  var produto = '';         
  var quantidade = '';
  var valorUnitario = '';
  var maodeobra = '';
  var desconto = '';
  var estoque = '';
  var valorTotal = '';

  produto=$("#idproduto").val();
  quantidade=$("#pquantidade").val();
  valorUnitario=$("#ppreco").val();
  maodeobra=$("#pmaodeobra").val();
  desconto=$("#pdesconto").val();
  estoque=$("#pqestoque").val();
  valorTotal=$("#total").val();


      //Verificar if de adicionar linha se a linha anterior estiver em branco
      if(quantidade !=="" && produto !== ""){

        $subi=maodeobra-desconto;
        subtotal[cont]=((quantidade*valorUnitario)+$subi);
        total = total + subtotal[cont];

        var linha = '<tr class="selected" id="linha'+cont+'"><td><button type="button" class="btn btn-danger" onclick="apagar('+cont+');"><i class="fa fa-close"></i></button></td><td><input class="form-control" name="idproduto[]" value="'+idproduto+'"></td><td><input class="form-control" name="quantidade[]" value="'+quantidade+'"></td><td><input class="form-control" name="valorUnitario[]" value="'+valorUnitario+'"></td><td><input class="form-control" name="desconto[]" value="'+desconto+'"></td><td><input class="form-control" name="maodeobra[]" value="'+maodeobra+'"></td><td><input class="form-control" name="valorTotal[]" value="'+valorTotal+'"></td></tr>';
        cont++;
        
        limpar();
        $("#total").val(total);
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
   }

   function apagar(index){
     $("#total").val(total);
     $("#linha" + index).remove();
     cont--;

   }

 </script>

 @endpush
 @stop