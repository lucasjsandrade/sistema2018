@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Produtos <a href="produto/create"><button class="btn btn-success">Incluir</button></a></h3>
		@include('estoque.produto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Categoria</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Cor</th>
					<th>Preco</th>
					<th>Materia</th>
					<th>Unidade Medida</th>
					<th>Quantidade</th>
					<th>Preço Venda</th>
					<th>Custo</th>
					<th>Status</th>	
					<th>Data Cadastro</th>
					<th>Opções</th>					
				</thead>

				 <?php
			        function converteData($data){
			          return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
			        }
			      ?>

				@foreach ($produtos as $prod)
				<tr>
					<td>{{ $prod->idproduto}}</td>
					<td>{{ $prod->categoria}}</td>
					<td>{{ $prod->modelo}}</td>
					<td>{{ $prod->marca}}</td>
					<td>{{ $prod->cor}}</td>
					<td>{{ $prod->preco}}</td>
					<td>{{ $prod->material}}</td>
					<td>{{ $prod->unidadeMedida}}</td>
					<td>{{ $prod->quantidade}}</td>
					<td>{{ $prod->preco}}</td>
					<td>{{ $prod->custo}}</td>
					<td>{{ $prod->status}}</td>
					<td>{{ converteData ($prod->dataCadastro)}}</td>
					<td>
						<a href="{{URL::action('ProdutoController@edit',$prod->idproduto)}}"><button class="btn btn-info">Alterar</button></a></td>
						<td> <a href="" data-target="#modal-delete-{{$prod->idproduto}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a></td> 
						
						
					</tr>

					@include('estoque.produto.modal')
					@endforeach
				</table>
				
			</div>
			{{$produtos->render()}}
		</div>
	</div>
	@stop