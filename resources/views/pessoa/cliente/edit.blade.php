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
    <label for="nomeCliente">Nome do cliente</label>
    <span class="ob">*</span>
    <input type="text" name="nomeCliente" class="form-control" 
    value="{{ $cliente->nomeCliente }}"
    placeholder="Nome do cliente">
  </div>
</div>   



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="rg">RG</label>
    <span class="ob">*</span>
    <input type="text" name="rg" class="form-control" 
    value="{{ $cliente->rg }}"
    placeholder="RG">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="cpf">CPF</label>
    <span class="ob">*</span>
    <input type="text" name="cpf" class="cpf form-control" 
    value="{{ $cliente->cpf }}"
    placeholder="CPF">
  </div>   
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="sexo">Sexo</label>
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
    <input type="text" name="telefone" class="phone form-control" 
    value="{{ $cliente->telefone }}"
    placeholder="Telefone">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" name="celular" class="celular form-control" 
    value="{{ $cliente->celular }}"
    placeholder="Celular">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="whatsapp">Whatsapp</label>
  <input type="text" name="whatsapp" class="celular form-control" 
  value="{{ $cliente->whatsapp }}"
  placeholder="Whatsapp">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="fax">E-mail</label>
    <input type="text" name="email" class="form-control" 
    value="{{ $cliente->email }}"
    placeholder="E-mail">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataNascimento">Data Nascimento</label>
    <span class="ob">*</span>
    <input type="date" name="dataNascimento" class="form-control" 
    value="{{ $cliente->dataNascimento }}"
    placeholder="Data de Nascimento">
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
  <label for="numero">Numero da residencia</label>
  <span class="ob">*</span>
  <input type="text" name="numero" class="form-control" 
  value="{{ $cliente->numero }}"
  placeholder="Numero da residencia">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="bairro">Bairro</label>
  <span class="ob">*</span>
  <input type="text" name="bairro" class="form-control" 
  value="{{ $cliente->bairro }}"
  placeholder="Bairro">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="cep">CEP</label>
  <span class="ob">*</span>
  <input type="text" name="cep" class="form-control" 
  value="{{ $cliente->cep }}"
  placeholder="CEP da residencia">
</div>
</div>

<div class="col-lg-4 col-sm-4 col-xs-12">
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

<div class="col-lg-1 col-sm-1 col-xs-1">
 <div class="form-group">
   <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button" style="
    position: absolute;
    top:25px;
    left: 0px;
    "/> Nova cidade </button></a>
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

</div>

</div>

<div class="col-lg-12 col-sm-12 col-xs-12"> 
  <div class="form-group"><br>
    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
    <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/produto';">Cancelar</button>  
    <label class="pull-right">Campo com '<span class="ob">*</span>' obrigatório</label>
  </div> 
</div>

{!!Form::close()!!}		

</div>
@stop