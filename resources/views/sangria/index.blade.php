@extends('layouts.admin')
@section('conteudo')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Sangria <a href="sangria/create"><button class="btn btn-success">Nova Sangria</button></a></h3>
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

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero do Caixa</th>
                    <th>Data</th>
                    <th>Valor da Sangria</th>
                    <th>Saldo após sangria</th>
                    <th>Opções</th>

                    </thead>

                    <?php
                    function converteData($data)
                    {
                        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
                    }
                    ?>
                    @foreach ($caixa as $c)
                        <tr>


                            <td>{{ $c->idcaixa}}</td>
                            <td>{{ converteData($c->data)}}</td>
                            <td>{{ $c->sangria}}</td>
                            <td>{{ $c->saldoAtual}}</td>
                            <td>
                                <a href="{{URL::action('sangriaController@show',$c->idcaixa)}}">
                                    <button class="btn btn-info">Detalhe</button>
                                </a>
                            </td>


                        </tr>


                    @endforeach
                </table>

            </div>
            {{$caixa->render()}}
        </div>
    </div>


@stop

<style>

    #menu ul li {
        display: inline;
    }

    p.alinha {
        padding-left: 1.0em
    }

    <

</style>