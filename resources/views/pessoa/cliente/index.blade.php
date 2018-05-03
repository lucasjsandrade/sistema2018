@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Cliente <a href="cliente/create"><button class="btn btn-success">Incluir</button></a></h3>
    @include('pessoa.cliente.search')
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Código Cliente</th>
          <th>Nome</th>
          <th>Logradouro</th>
          <th>numero</th>
          <th>data Nacimento</th>
          <th>status</th>
          <th>data Cadastro</th>
          <th>Cidade</th>
        </thead>

        <?php
        function converteData($data)
        {
          return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
        }
        ?>


        @foreach ($cliente as $cli)
        <tr>
          <td>{{ $cli->idcliente}}</td>
          <td>{{ $cli->nomeCliente}}</td>
          <td>{{ $cli->logradouro}}</td>
          <td>{{ $cli->numero}}</td>
          <td>{{ converteData ($cli->dataNascimento)}}</td>
          <td>{{ $cli->status}}</td>
          <td>{{ converteData ($cli->dataCadastro)}}</td>
          <td>{{ $cli->cidade}}</td>

          <td>
            <a href="{{URL::action('ClienteController@edit',$cli->idcliente)}}"><button class="btn btn-info">Alterar</button></a>
            <a href="" data-target="#modal-delete-{{$cli->idcliente}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a></td>
          </tr>
          @include('pessoa.cliente.modal')
          @endforeach
        </table>
      </div>
      {{$cliente->render()}}
    </div>
  </div>
  @stop