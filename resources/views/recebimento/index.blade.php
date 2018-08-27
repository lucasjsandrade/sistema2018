@extends('layouts.admin')
@section('conteudo')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Recebimento<a href="/recebimento/create">
                    <button class="btn btn-success">Incluir</button>
                </a></h3>
            @include('recebimento.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero Recebimento</th>
                    <th>Data</th>
                    <th>Valor</th>
					<th>ValorTotal</th>
                    <th>Opções</th>


                    </thead>

                    <?php
                    function converteData($data)
                    {
                        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
                    }
                    ?>
                    @foreach ($recebimento as $rec)
                        <tr>


                            <td>{{ $rec->idrecebimento}}</td>
                            <td>{{ $rec->data}}</td>
                            <td>{{ $rec->valor}}</td>
                            <td>{{ $rec->valorTotal}}</td>
                            <td>
                                <a href="{{URL::action('RecebimentoController@show',$rec->idrecebimento)}}"><button class="btn btn-info">Detalhe</button></a>
                            </td>




                        </tr>


                    @endforeach
                </table>

            </div>
            {{$recebimento->render()}}
        </div>
    </div>
@stop
