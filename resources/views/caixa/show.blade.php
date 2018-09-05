@extends('layouts.admin')
@section('conteudo')

    <h1>Movimentação do Caixa </h1><br>

    <?php
    function converteData($data)
    {
        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
    }
    ?>




    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="idcaixa">Numero do Caixa</label>
            <p>{{$caixa->idcaixa}}</p>
        </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="data">Data</label>
            <p>{{converteData($caixa->data)}}</p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="N">Abertura Caixa</label>
            <p>Usuario:{{$caixa->name}}</p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="N">N° Usuario</label>
            <p>{{$caixa->id}}</p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="saldoinical">Saldo Inicial</label>
            <p>{{$caixa->saldoInicial}}</p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="saldoFinal">Saldo Final</label>
            <p>{{$caixa->saldoFinal}}</p>
        </div>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
        <div class="form-group">
            <label for="situacao">Situacao</label>
            <p>{{$caixa->situacao}}</p>
        </div>
    </div>



    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-body">


                <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">


                        <th>N° da Transação</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Tipo da Movimentação</th>
                        <th>Valor</th>
                        <th>N° do Pagamento</th>
                        <th>N° do Recebimento</th>

                        </thead>
                        <tfoot>


                        </tfoot>

                        <tbody>

                        @foreach($movimentacaocaixa as $mov)
                            <tr>
                                <td>{{$mov->idmovimentacao}}</td>
                                <td>{{$mov->descricao}}</td>
                                <td>{{$mov->data}}</td>
                                <td>{{$mov->tipoMovimentacao}}</td>
                                <td>{{$mov->valor}}</td>
                                <td>{{$mov->idpagamento}}</td>
                                <td>{{$mov->idrecebimento}}</td>

                            </tr>
                        @endforeach

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><th>
                        <th><th>
                        <th><th>
                        <th><th>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>




    </div>


@stop
