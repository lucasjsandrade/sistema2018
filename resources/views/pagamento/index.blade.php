@extends('layouts.admin')
@section('conteudo')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Pagamento<a href="/pagamento/create">
                    <button class="btn btn-success">Incluir</button>
                </a></h3>
            @include('compra.pedido.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero Pagamento</th>
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
                    @foreach ($pagamento as $pag)
                        <tr>


                            <td>{{ $pag->idpagamento}}</td>
                            <td>{{ $pag->data}}</td>
                            <td>{{ $pag->valor}}</td>
                            <td>{{ $pag->valorTotal}}</td>
                            <td>
                                <a href="{{URL::action('PagamentoController@show',$pag->idpagamento)}}"><button class="btn btn-info">Detalhe</button></a>
                            </td>




                        </tr>


                    @endforeach
                </table>

            </div>
            {{$pagamento->render()}}
        </div>
    </div>
@stop
