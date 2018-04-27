@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Estado <a href="estado/create"><button class="btn btn-success">Incluir</button></a></h3>
    @include('regiao.estado.search')
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Id Estado</th>
          <th>Estado</th>
          <th>Sigla</th>
          <th>Pais</th>
          <th>Status</th>

        </thead>
        @foreach ($estado as $est)
        <tr>
          <td>{{ $est->idestado}}</td>
          <td>{{ $est->nomeEstado}}</td>
          <td>{{ $est->sigla}}</td>
          <td>{{ $est->pais}}</td>
          <td>{{ $est->status}}</td>
          

          <td>
           <a href="{{URL::action('EstadoController@edit',$est->idestado)}}"><button class="btn btn-info">Alterar</button></a>
           <a href="" data-target="#modal-delete-{{$est->idestado}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>

         </td>

       </tr>

       @include('regiao.estado.modal')
       @endforeach
       
       
       
     </table>

   </div>
   
   {{$estado->render()}}
 </div>
</div>
@stop