@extends('layouts.admin')
@section('conteudo')


<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Funcionario   <a href="funcionario/create"><button class="btn btn-success">Incluir</button></a></h3>
    @include('pessoa.funcionario.search')
  </div>
</div>

<div class="row">
 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="table-responsive">

      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Id Funcionario</th>
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

         @foreach ($funcionario as $fun)

        <tr>
          <td>{{ $fun->idfuncionario}}</td>
          <td>{{ $fun->nomeFuncionario}}</td>
          <td>{{ $fun->logradouro}}</td>
          <td>{{ $fun->numero}}</td>
          <td>{{ converteData ($fun->dataNascimento)}}</td>
          <td>{{ $fun->status}}</td>
          <td>{{ converteData ($fun->dataCadastro)}}</td>
          <td>{{ $fun->cidade}}</td>

        <td>
          <a href="{{URL::action('FuncionarioController@edit',$fun->idfuncionario)}}"><button class="btn btn-info">Alterar</button></a>
          <a href="" data-target="#modal-delete-{{$fun->idfuncionario}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a></td>
       </tr>
        @include('pessoa.funcionario.modal')
        @endforeach
        
     </table>
    </div>
    {{$funcionario->render()}}
  </div>
</div>

@stop