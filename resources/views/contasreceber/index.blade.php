@extends('layouts.admin')
@section('conteudo')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>CONTAS A RECEBER <a href="contasreceber/create">
            <button class="btn btn-success">Incluir</button>
        </a></h3>
        @include('contasreceber.search')
    </div>
</div>
<?php
function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Descricao</th>
                    <th>N de parcela</th>
                    <th>Id-Venda</th>
                    <th>Id-Cliente</th>


                </thead>
                @foreach ($contasreceber as $c)
                <tr>
                    <td>{{ $c->idcontasr}}</td>
                    <td>{{converteData($c->data)}}</td>
                    <td>{{ $c->valor}}</td>
                    <td>{{ $c->descricao}}</td>
                    <td>{{ $c->numeroDeParcelas}}</td>
                    <td>{{ $c->idvenda}}</td>
                    <td>{{ $c->idcliente}}</td>
                    <td>
                        <a href="{{URL::action('ContasreceberController@show',$c->idcontasr)}}">
                            <button class="btn btn-info">Mostrar</button>
                        </a>
                        <a href="{{URL::action('desenvolvimentoController@index')}}">
                            <button class="btn btn-info">Alterar</button>
                        </a>
                        <a href="" data-target="#modal-delete-{{$c->idcontasr}}" data-toggle="modal">
                            <button class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
                @include('contasreceber.modal')
                @endforeach
            </table>
        </div>          
<<<<<<< HEAD

    </thead>    



</div>
</div>   
=======

                    </thead>
                    @foreach ($contasreceber as $c)
                        <tr>
                            <td>{{ $c->idcontasr}}</td>
                            <td>{{converteData($c->data)}}</td>
                            <td>{{ $c->valor}}</td>
                            <td>{{ $c->descricao}}</td>
                            <td>{{ $c->numeroDeParcelas}}</td>
                            <td>{{ $c->idvenda}}</td>
                            <td>{{ $c->idcliente}}</td>
                            <td>
                                <a href="{{URL::action('ContasreceberController@show',$c->idcontasr)}}">
                                    <button class="btn btn-info">Mostrar</button>
                                </a>
                                <a href="{{URL::action('desenvolvimentoController@index')}}">
                                    <button class="btn btn-info">Alterar</button>
                                </a>
                                <a href="" data-target="#modal-delete-{{$c->idcontasr}}" data-toggle="modal">
                                    <button class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        @include('contasreceber.modal')
                    @endforeach

                </table>

    </div>
</div>


           

>>>>>>> 84a7e0673a235d5309164a7da72716a1e72dd438

{{$contasreceber->render()}}

@stop