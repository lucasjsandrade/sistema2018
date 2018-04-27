@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Alterar Agendamento: {{ $agendamento->idagendamento }}</h3>
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

{!!Form::model($agendamento, ['method'=>'PATCH', 'route'=>['agendamento.update', $agendamento->idagendamento], 'files'=>'true'])!!}
{{Form::token()}}

<div class="row">  

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Cliente</label>
    <span class="ob">*</span>
    <select name="idcliente" class="form-control">
      @foreach($cliente as $cli)
      @if($cli->idcliente==$agendamento->idcliente)
      <option value="{{$cli->idcliente}}" selected>
        {{$cli->nomeCliente}}
      </option>
      @else
      <option value="{{$cli->idcliente}}">
        {{$cli->nomeCliente}}
      </option>
      @endif
      @endforeach
    </select>
  </div>                
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label>Funcionario</label>
    <span class="ob">*</span>
    <select name="idfuncionario" class="form-control">
      @foreach($funcionario as $fun)
      @if($fun->idfuncionario==$agendamento->idfuncionario)
      <option value="{{$fun->idfuncionario}}" selected>
        {{$fun->nomeFuncionario}}
      </option>
      @else
      <option value="{{$fun->idfuncionario}}">
        {{$fun->nomeFuncionario}}
      </option>
      @endif
      @endforeach
    </select>
  </div>                
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataOrcamento">Data Orçamento</label>
    <input type="date" name="dataOrcamento" class="form-control" 
    value="{{ $agendamento->dataOrcamento }}"
    placeholder="aaaa/mm/dd">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="dataInstalacao">Data Instalação</label>
    <input type="date" name="dataInstalacao" class="form-control" 
    value="{{ $agendamento->dataInstalacao }}"
    placeholder="aaaa/mm/dd">
  </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="horaMarcada">Hora marcada</label>
    <input type="time" name="horaMarcada" class="form-control" 
    value="{{ $agendamento->horaMarcada}} maxlength="8" name="hour" pattern="[0-9]{2}:[0-9]{2} [0-9]{2} $" min="08:00" max="18:00">
  </div>
</div>



<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="form-group">
    <label for="status">Status</label>
    <span class="ob">*</span>
    <select name="status"  class="form-control">
      <option value="{{$agendamento->status}}">{{$agendamento->status}}</option>
      <option value="Orcamento">Orçamento</option> 
      <option value="Instalacao">Instalação</option>
      <option value="Concluido">Concluido</option>
    </select>
  </div>
</div>

</div>

<div class="col-lg-6 col-sm-6 col-xs-12"> 
  <div class="form-group"><br>
    <button class="btn btn-primary" type="submit">Salvar</button>

    <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/venda/agendamento';">Cancelar</button> 

    </button><a href=/pessoa/funcionario/create target="_blank"><button class="btn btn-primary" type="button">Novo Funcionario </button></a>

  </button><a href=/pessoa/cliente/create target="_blank"><button class="btn btn-primary" type="button">Novo Cliente </button></a>


{!!Form::close()!!}           


@stop