@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Alterar Cliente: {{ $cliente->nomeCliente }}</h3>
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



{!!Form::model($cliente, ['method'=>'PATCH', 'route'=>['cliente.update', $cliente->idcliente]])!!}
{{Form::token()}}

<div class="row">
 <div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="nomeCliente">Nome</label>
    <span class="ob">*</span>
    <input type="text" name="nomeCliente" class="form-control" 
    value="{{ $cliente->nomeCliente }}"
    placeholder="Nome...">
  </div>
</div>   



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="rg">RG</label>
    <input type="text" name="rg" class="form-control" 
    value="{{ $cliente->rg }}"
    placeholder="RG...">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="cpf">CPF</label>
    <span class="ob">*</span>
    <input type="text" name="cpf" class="cpf form-control" 
    value="{{ $cliente->cpf }}"
    placeholder="CPF...">
  </div> 

  
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="sexo">Sexo*</label>
    <span class="ob">*</span>
    <select name="sexo"  class="form-control">
      <option value="{{$cliente->sexo}}">{{$cliente->sexo}}</option>
      <option value="M">M</option> 
      <option value="F">F</option>
    </select>
  </div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">             
  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" class="form-control" 
    value="{{ $cliente->telefone }}"
    placeholder="Telefone...">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" name="celular" class="form-control" 
    value="{{ $cliente->celular }}"
    placeholder="Celular...">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="whatsapp">Whatsapp</label>
  <input type="text" name="whatsapp" class="form-control" 
  value="{{ $cliente->whatsapp }}"
  placeholder="whatsapp">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="fax">Email</label>
    <input type="text" name="email" class="form-control" 
    value="{{ $cliente->email }}"
    placeholder="email">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataNascimento">Data Nascimento</label>
    <span class="ob">*</span>
    <input type="date" name="dataNascimento" class="form-control" 
    value="{{ $cliente->dataNascimento }}"
    placeholder="aaaa/mm/dd">
  </div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="'logradouro'">Logradouro</label>
  <span class="ob">*</span>
  <input type="text" name="logradouro" class="form-control" 
  value="{{ $cliente->logradouro }}"
  placeholder="Logradouro">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="numero">Numero</label>
  <span class="ob">*</span>
  <input type="text" name="numero" class="form-control" 
  value="{{ $cliente->numero }}"
  placeholder="numero">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="bairro">Bairro</label>
  <span class="ob">*</span>
  <input type="text" name="bairro" class="form-control" 
  value="{{ $cliente->bairro }}"
  placeholder="bairro">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="cep">CEP</label>
  <span class="ob">*</span>
  <input type="text" name="cep" class="form-control" 
  value="{{ $cliente->cep }}"
  placeholder="cep">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Cidade</label>
    <span class="ob">*</span>
    <select name="idcidade" class="form-control">
      @foreach($cidade as $cid)
      @if($cid->idcidade==$cliente->idcidade)
      <option value="{{$cid->idcidade}}" selected>
        {{$cid->nomeCidade}}
      </option>
      @else
      <option value="{{$cid->idcidade}}">
        {{$cid->nomeCidade}}
      </option>
      @endif
      @endforeach
    </select>
  </div>                
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="status">Status</label>
  <span class="ob">*</span>
  <select name="status"  class="form-control">
    <option value="{{$cliente->status}}">{{$cliente->status}}</option>
    <option value="ativo">Ativo</option> 
    <option value="Inativo">Inativo</option>

  </select>

</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">   
 <div class="form-group"><br>
  <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
  <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pessoa/cliente';">Cancelar</button>
  <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button">Nova Cidade </button></a>
</div>
</div>
</div>
</div>


{!!Form::close()!!}		

@stop