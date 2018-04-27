@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h1>Alterar Funcionario: {{ $funcionario->nomeFuncionario }}</h1>
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




{!!Form::model($funcionario, ['method'=>'PATCH', 'route'=>['funcionario.update', $funcionario->idfuncionario]])!!}
{{Form::token()}}



<div class="row">

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nomeFuncionario">Nome</label>
      <span class="ob">*</span>
      <input type="text" name="nomeFuncionario" class="form-control" 
      value="{{ $funcionario->nomeFuncionario }}"
      placeholder="Nome">
    </div>
  </div>   

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="rg">RG</label>
      <span class="ob">*</span>
      <input type="text" name="rg" class="form-control" 
      value="{{ $funcionario->rg }}"
      placeholder="RG...">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="cpf">CPF</label>
      <span class="ob">*</span>
      <input type="text" name="cpf" class="cpf form-control" 
      value="{{ $funcionario->cpf }}"
      placeholder="CPF...">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="sexo">Sexo</label>
      <span class="ob">*</span>
      <select name="sexo"  class="form-control">
        <option value="{{$funcionario->sexo}}">{{$funcionario->sexo}}</option>
        <option value="M">M</option> 
        <option value="F">F</option>
      </select>
    </div>
  </div>


  <div class="col-lg-6 col-sm-6 col-xs-12">             
    <div class="form-group">
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" class="phone form-control" 
      value="{{ $funcionario->telefone }}"
      placeholder="Telefone...">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="celular">Celular</label>
      <input type="text" name="celular" class="phone form-control" 
      value="{{ $funcionario->celular }}"
      placeholder="Celular...">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
   <div class="form-group">
    <label for="whatsapp">Whatsapp</label>
    <input type="text" name="whatsapp" class="phone form-control" 
    value="{{ $funcionario->whatsapp }}"
    placeholder="whatsapp">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" 
    value="{{ $funcionario->email }}"
    placeholder="email">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataNascimento">Data Nascimento</label>
    <span class="ob">*</span>
    <input type="date" name="dataNascimento" class="form-control" 
    value="{{ $funcionario->dataNascimento }}"
    placeholder="dd/mm/aaa">
  </div>
</div>


<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="logradouro">Logradouro</label>
    <span class="ob">*</span>
    <input type="text" name="logradouro" class="form-control" 
    value="{{ $funcionario->logradouro }}"
    placeholder="logradouro">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="numero">Numero</label>
  <span class="ob">*</span>
  <input type="text" name="numero" class="form-control" 
  value="{{ $funcionario->numero }}"
  placeholder="numero">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="bairro">Bairro</label>
  <span class="ob">*</span>
  <input type="text" name="bairro" class="form-control" 
  value="{{ $funcionario->bairro }}"
  placeholder="bairro">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="cep">CEP</label>
  <span class="ob">*</span>
  <input type="text" name="cep" class="cep form-control" 
  value="{{ $funcionario->cep }}"
  placeholder="cep">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label>Cidade</label>
   <span class="ob">*</span>
   <select name="idcidade" class="form-control">
     @foreach($cidade as $cid)
     <option value= "{{$cid->idcidade}}">
       {{$cid->nomeCidade}}
     </option>
     @endforeach
   </select>
 </div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="status">Status</label>
  <span class="ob">*</span>
  <select name="status"  class="form-control">
    <option value="{{$funcionario->status}}">{{$funcionario->status}}</option>
    <option value="ativo">Ativo</option> 
    <option value="Inativo">Inativo</option>

  </select>

</div>
</div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">   
 <div class="form-group">
  <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
  <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pessoa/funcionario';">Cancelar</button>

  <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button">Nova Cidade </button></a>
</div>
</div>
</div>
</div>

{!!Form::close()!!} 
@stop