@extends('layouts.admin')
@section('conteudo')



<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Alterar Orçamento: {{ $orcamento->idvenda }}</h3>
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

{!!Form::model($orcamento, ['method'=>'PATCH', 'route'=>['orcamento.update', $orcamento->idvenda], 'files'=>'true'])!!}
{{Form::token()}}




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
	<!--
	<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
		<div class="form-group">
			<label>itens</label>
			<span class="ob">*</span>
			<select name="idcliente" class="form-control">
				@foreach($itensv as $itens)
				@if($itens->iditensv==$orcamento->idvenda)
				<option value="{{$itens->iditensv}}" selected>
					{{$itens->iditensv}}
				</option>
				@else
				<option value="{{$itens->iditensv}}">
					{{$itens->iditensv}}
					{{$itens->quantidade}}
					{{$itens->valorUnitario}}
					
				</option>
				@endif
				@endforeach
			</select>
		</div>                
	</div>

-->

<div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
	<div class="form-group">
		<label for="status">Status</label>
		<span class="ob">*</span>
		<select name="status"  class="form-control">
			<option value="{{$orcamento->status}}">{{$orcamento->status}}</option>
			<option value="ativo">Ativo</option> 
			<option value="Inativo">Inativo</option>

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
	<div class="panel panel-primary" style="max-width: 1310px; border-color: red;">
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
					<label name="maodeobra" id="maodeobra" for="maodeobra">Mao De Obra</label>
					<input type="number" name="pmaodeobra" id="pmaodeobra" disable class="form-control" placeholder="Mao de obra">
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
				@foreach($itensv as $itens)
				@if($itens->idvenda == $orcamento->idvenda)
				<button id="itensv" value="{{$itensv}}" style="display: none;"></button>
				<button id="idvenda" value="{{$orcamento->idvenda}}" style="display: none;"> 
					@endif
				@endforeach

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
<script >
	sessionStorage.setItem('chave', '$itensv');	

	var dadosItensv = sessionStorage.getItem('chave');

</script>




{!!Form::close()!!}  

@push('scripts')





<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
			adicionar();

		});

		var itensv = $('#itensv').val();
		var itensv = JSON.parse(itensv);
		var idvenda = parseInt($('#idvenda').val());

		var itens = [];

		console.log(itens);
		for( i =0; i< itensv.length; i++){
			var produtos = parseInt(itensv[i].idvenda);

			if( produtos === idvenda ){
				//console.log(itensv[i]);
				
				var linha1 = '<tr class="selected" id="linha'+i+'">    <td> <button type="button" class="btn btn-warning" onclick="apagar('+i+');"> X </button></td>      <td> <input type="hidden" name="idproduto[]" value="'+itensv[i].idproduto+'">'+itensv[i].idproduto+'</td><td> <input type="number" name="pquantidade[]" value="'+itensv[i].quantidade+'"readonly></td> <td> <input type="number" name="pvalorUnitario[]" value="'+itensv[i].valorUnitario+'"readonly></td> <td> <input type="number" name="pmaodeobra[]" value="'+itensv[i].maodeobra+'"readonly></td> <td> <input type="number" name="pdesconto[]" value="'+itensv[i].desconto+'"readonly></td> <td><input type="number" name="pvalorTotal[]" value="'+itensv[i].valorTotal+'"readonly>  </td> </tr>'				

				$('#detalhes').append(linha1);
			}
		}
	});


	var cont=0;
	total = 0;
	subtotal=[];

	//$("#salvar").hide();
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


		//if(idproduto!="" && quantidade!="" && quantidade>0 && valorUnitario!=""){

			$subi=maodeobra-desconto;
			subtotal[cont]=((quantidade*valorUnitario)+$subi);
			total = total + subtotal[cont];

			var linha = '<tr class="selected" id="linha'+cont+'">    <td> <button type="button" class="btn btn-warning" onclick="apagar('+cont+');"> X </button></td>      <td> <input type="hidden" name="idproduto[]" value="'+idproduto+'">'+produto+'</td><td> <input type="number" name="pquantidade[]" value="'+quantidade+'"readonly></td> <td> <input type="number" name="pvalorUnitario[]" value="'+valorUnitario+'"readonly></td> <td> <input type="number" name="pmaodeobra[]" value="'+maodeobra+'"readonly></td> <td> <input type="number" name="pdesconto[]" value="'+desconto+'"readonly></td> <td> '+subtotal[cont]+' </td> </tr>'
			cont++;



			limpar();
			$("#total").val(total);

			ocultar();
			$('#detalhes').append(linha);





	//	}else{
			//alert("Erro ao inserir os detalhes da venda, preencha os campos corretamente!!");

		//}
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
		//	$("#salvar").hide();
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