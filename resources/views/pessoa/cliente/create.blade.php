@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Cadastro Cliente</h3>
   @if (count($errors)>0) <!-- Se existir erro vai mostrar um alerta e vai listar os erros --> 
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

{!!Form::open(array('url'=>'pessoa/cliente','method'=>'POST','autocomplete'=>'off'))!!}<!-- Metodo POST está passando informação -->
{{Form::token()}}



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label for="nomeCliente">Nome</label>
   <span class="ob">*</span>
   <input type="text" name="nomeCliente" required value="{{old('nomeCliente')}}" class="form-control" placeholder="Nome do Cliente">
 </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label for="rg">RG</label>
   <input type="text" name="rg"  value="{{old('rg')}}"class="form-control" placeholder="RG">
 </div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
   <label for="cpf">CPF</label>
   <span class="ob">*</span>
   <input type="text" name="cpf" required value="{{old('cpf')}}" 
   class="cpf form-control" placeholder="000.000.000-00">
 </div>
</div>


<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="sexo">Sexo</label>
    <span class="ob">*</span>
    <select name="sexo" id="sexo" class="form-control">
     <option value="M">M</option> 
     <option value="F">F</option>
   </select>
 </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="telefone">Telefone</label>
  <input type="text" name="telefone" 
  value="{{old('telefone')}}" class="phone form-control"
  placeholder="Telefone">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="celular">Celular</label>
  <input type="text" name="celular" 
  value="{{old('celular')}}" class="phone form-control"
  placeholder="Celular">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="whatsapp">Whatsapp</label>
  <input type="text" name="whatsapp"  
  value="{{old('whatsapp')}}" class="phone form-control"
  placeholder="whatsapp">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="email">Email</label>
  <input type="email" name="email" 
  value="{{old('email')}}" class="form-control"
  placeholder="email">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="logradouro">Logradouro</label>
  <span class="ob">*</span>
  <input type="text" name="logradouro" 
  required value="{{old('logradouro')}}" class="form-control"
  placeholder="logradouro">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="numero">Numero</label>
  <span class="ob">*</span>
  <input type="text" name="numero" 
  required value="{{old('numero')}}" class="form-control"
  placeholder="numero">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12"> 
 <div class="form-group">
  <label for="bairro">Bairro</label>
  <span class="ob">*</span>
  <input type="text" name="bairro" 
  required value="{{old('bairro')}}" class="form-control"
  placeholder="bairro">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="cep">CEP</label>
  <span class="ob">*</span>
  <input type="text" name="cep" required value="{{old('cep')}}" 
  class="cep form-control"
  placeholder="CEP 00.000-000">
</div>
</div> 

<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label for="dataNascimento">Data Nascimento</label>
  <span class="ob">*</span>
  <input type="date" name="dataNascimento" required value="{{old('dataNascimento')}}" class="form-control"
  placeholder="dd/mm/aaaa">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
 <div class="form-group">
  <label>Cidade</label>
  <span class="ob">*</span>
  <select name="idcidade" class="form-control">
   @foreach($cidade as $cid)
   <option value="{{$cid->idcidade}}"><!-- Aqui vai recuperar o objeto do banco -->
     {{$cid->nomeCidade}}
   </option>
   @endforeach
 </select>
</div> 
</div>


<div class="form-group">
 <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
 <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pessoa/cliente';">Cancelar</button>
 <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button">Nova Cidade </button></a>
</div>

</div>

{!!Form::close()!!}     

</div>
</div>
@stop