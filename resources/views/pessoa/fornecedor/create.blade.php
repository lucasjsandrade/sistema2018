@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Novo Fornecedor</h3>
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

{!!Form::open(array('url'=>'pessoa/fornecedor','method'=>'POST','autocomplete'=>'off'))!!}<!-- Metodo POST está passando informação -->
{{Form::token()}}


<div class="row">

 <div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="nomeFantasia">Nome fantasia</label>
    <span class="ob">*</span>
    <input type="text" name="nomeFantasia" required value="{{old('nomeFantasia')}}" class="form-control" placeholder="Nome fantasia">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="razaoSocial">Razão social</label>
    <span class="ob">*</span>
    <input type="text" name="razaoSocial" required value="{{old('razaoSocial')}}" class="form-control" placeholder="Razão Social">
  </div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="cnpj">CNPJ</label>
    <span class="ob">*</span>
    <input type="text" name="cnpj" id="cnpj" required value="{{old('cnpj')}}" class="cnpj form-control" placeholder="CNPJ">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">

    <label for="inscricaoEstadual">Inscrição Estadual</label>
    <input type="text" name="inscricaoEstadual" value="{{old('inscricaoEstadual')}}" class="form-control" placeholder="Inscrição Estadual">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="E-mail">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="telefone">Telefone</label>
    <span class="ob">*</span>
    <input type="phone text" name="telefone" required value="{{old('telefone')}}" class="phone form-control" placeholder="Telefone">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="fax">Fax</label>
    <input type="text" name="fax" value="{{old('fax')}}" class="phone form-control" placeholder="Fax">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="whatsapp">Whatsapp</label>
    <input type="text" name="whatsapp" value="{{old('whatsapp')}}" class="celular form-control" placeholder="Whatsapp">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="nomeContato">Nome Contato</label>
    <input type="text" name="nomeContato"  value="{{old('nomeContato')}}" class="form-control" placeholder="Nome contato">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="logradouro">Logradouro</label>
    <span class="ob">*</span>
    <input type="text" name="logradouro" required value="{{old('logradouro')}}" class="form-control" placeholder="Logradouro">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="numero">Numero</label>
    <span class="ob">*</span>
    <input type="number" name="numero"  required value="{{old('numero')}}" class="form-control" placeholder="Numero">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="bairro">Bairro</label>
    <span class="ob">*</span>
    <input type="text" name="bairro" required value="{{old('bairro')}}" class="form-control" placeholder="bairro">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="cep">CEP</label>
    <span class="ob">*</span>
    <input type="text" name="cep" required value="{{old('cep')}}" class="cep form-control" placeholder="cep">
  </div>
</div>

<div class="col-lg-4 col-sm-4 col-xs-12">
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

<div class="col-lg-1 col-sm-1 col-xs-1">
 <div class="form-group">
   <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button" style="
    position: absolute;
    top:25px;
    left: 0px;
    "/> Nova cidade </button></a>
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
