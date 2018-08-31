@extends('layouts.admin')
@section('conteudo')


<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Editar fornecedor : {{ $fornecedor->nomeFantasia }}</h3> <!-- Categoria vai puxar o nome da categoria que vai editar -->
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


{!!Form:: model($fornecedor, ['method'=>'PATCH', 'route'=>['fornecedor.update', $fornecedor->idfornecedor]])!!}<!-- Metodo PATCH é para editar informação, Route é o caminho que vai ser depois que fazer a alteração, quando clicar no botão editar, vai ser passada a ID para saber qual categoria editar -->

{{Form::token()}}


<div class="row">

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="razaoSocial">Razão social</label>
      <span class="ob">*</span>
      <input type="text" name="razaoSocial" required value="{{$fornecedor->razaoSocial}}" class="form-control" placeholder="Razão Social">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nomeFantasia">Nome fantasia</label>
      <span class="ob">*</span>
      <input type="text" name="nomeFantasia" required value="{{$fornecedor->nomeFantasia}}" class="form-control" placeholder="Nome fantasia">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="cnpj">CNPJ</label>
      <span class="ob">*</span>
      <input type="text" name="cnpj" id="cnpj" required value="{{$fornecedor->cnpj}}" class="cnpj form-control" placeholder="CNPJ">
    </div>
  </div>
  
  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="inscricaoEstadual">Inscrição Estadual</label>
      <input type="text" name="inscricaoEstadual" value="{{$fornecedor->inscricaoEstadual}}"class="form-control" placeholder="Inscrição Estadual">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" name="email" value="{{$fornecedor->email}}" class="form-control" placeholder="E-mail">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="telefone">Telefone</label>
      <span class="ob">*</span>
      <input type="text" name="telefone" required value="{{$fornecedor->telefone}}" class="phone form-control" placeholder="Telefone">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="fax">Fax</label>
      <input type="text" name="fax" value="{{$fornecedor->fax}}" class="phone form-control" placeholder="Fax">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="whatsapp">Whatsapp</label>
      <input type="text" name="whatsapp" value="{{$fornecedor->whatsapp}}" class="phone form-control" placeholder="Whatsapp">
    </div>
  </div>
  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nomeContato">Nome Contato</label>
      <input type="text" name="nomeContato" required value="{{$fornecedor->nomeContato}}" class="form-control" placeholder="nomeContato">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="logradouro">Logradouro</label>
      <span class="ob">*</span>
      <input type="text" name="logradouro" required value="{{$fornecedor->logradouro}}" class="form-control" placeholder="Logradouro">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="numero">Numero</label>
      <span class="ob">*</span>
      <input type="number" name="numero"  value="{{$fornecedor->numero}}" class="form-control" placeholder="Numero">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="bairro">Bairro</label>
      <span class="ob">*</span>
      <input type="text" name="bairro" required value="{{$fornecedor->bairro}}" class="form-control" placeholder="bairro">
    </div>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="cep">CEP</label>
      <span class="ob">*</span>
      <input type="number" name="cep" value="{{$fornecedor->cep}}" class="form-control" placeholder="cep">
    </div>
  </div>

  <div class="col-lg-4 col-sm-4 col-xs-12">
    <div class="form-group">
      <label>Cidade</label>
      <span class="ob">*</span>
      <select name="idcidade" class="form-control selectpicker" data-live-search="true">>
        @foreach($cidade as $cid)
        @if($cid->idcidade==$fornecedor->idcidade)
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
      <option value="{{$fornecedor->status}}">{{$fornecedor->status}}</option>
      <option value="ativo">Ativo</option> 
      <option value="Inativo">Inativo</option>
    </select>
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