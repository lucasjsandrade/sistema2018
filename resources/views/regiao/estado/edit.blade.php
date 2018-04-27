@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Alterar Estado: {{ $estado->nomeEstado }}</h3>
   @if (count($errors)>0)
   <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach 
    </ul>
  </div>
  @endif


  {!!Form::model($estado, ['method'=>'PATCH', 'route'=>['estado.update', $estado->idestado]])!!}
  {{Form::token()}}
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="form-group">
     <label for="nomeEstado">Nome do Estado</label>
     <span class="ob">*</span>
     <input type="text" name="nomeEstado" required class="form-control" 
     value="{{ $estado->nomeEstado }}"
     placeholder="Nome Do Estado...">
   </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
   <div class="form-group">
     <label for="sigla">Sigla</label>
     <span class="ob">*</span>
     <input type="text" name="sigla" required class="form-control" 
     value="{{ $estado->sigla }}"
     placeholder="Sigla...">
   </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
 <div class="form-group">
  <label>Pais</label>
  <span class="ob">*</span>
  <select name="idpais" class="form-control">
    @foreach($pais as $pai)
    <option value="{{$pai->idpais}}">
      {{$pai->nomePais}}
    </option>
    @endforeach
  </select>
</div>
</div>

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
          <label for="status">Status</label>
          <span class="ob">*</span>
          <select name="status"  class="form-control">
            <option value="{{$estado->status}}">{{$estado->status}}</option>
            <option value="ativo">Ativo</option> 
            <option value="Inativo">Inativo</option>

      </select>

</div>

 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
     <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
     <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/regiao/estado';">Cancelar</button>
     <a href=/regiao/pais/create target="_blank"><button class="btn btn-primary" type="button">Novo País </button></a>
    </div>
 </div>
</div>
{!!Form::close()!!}		

</div>
</div>
@stop