@extends('layouts.admin')
@section('conteudo')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Relatório de Recebimento <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <i class="fa fa-shopping-cart"></i></h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Filtros</h3>
        </div>
    </div>


    {!!Form::open(array('url'=>'/pdf/RecebimentoGetPDF','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="col-lg-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <label for="dataInicial">Data Inicial</label>
            <span class="ob">*</span>
            <input validaData type="date" name="dataInicial" required value="{{old('dataInicial')}}" class="form-control">
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <label for="dataFinal">Data Final</label>
            <span class="ob">*</span>
            <input validaData type="date" name="dataFinal" required value="{{old('dataFinal')}}" class="form-control">
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label>Cliente</label>
            <span class="ob">*</span>
            <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
                <option value="T">Todos</option>
                @foreach($cliente as $cli)
                    <option value="{{$cli->idcliente}}">
                        {{$cli->nomeCliente}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
        <div class="form-group">
            <input name="_token" value="{{ csrf_token()}}" type="hidden">
            <button class="btn btn-success" type="submit"> Gerar Relatorio <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>

        </div>
    </div>





    {!!Form::close()!!}
@stop