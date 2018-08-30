@extends('layouts.admin')
@section('conteudo')

    <h1>Detalhes Do Recebimento</h1><br>

    <div class="row">

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idrecebimento">N° do Pagamento</label>
                <p>{{$recebimento->idrecebimento}}</p>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data</label>
                <p>{{$recebimento->data}}</p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valorPagamento">Valor Pagamento</label>
                <p>{{$recebimento->valor}}</p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">N° da conta</label>
                <p>{{$parcela->idcontasr}}</p>
            </div>

        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numeroParcela">N° da Parcela</label>
                <p>{{$recebimento->idparcela}}</p>
            </div>

        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">Quantidade de Parcelas</label>
                <p>{{$parcela->parcela}}</p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">N° Cliente</label>
                <p>{{$parcela->idcliente}}</p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">Cliente</label>
                <p>{{$parcela->nomeCliente}}</p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="text">Telefone Cliente</label>
                <p>{{$parcela->telefone}}</p>
            </div>

        </div>


    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-body">


                <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">


                        <th>Numero Parcela</th>
                        <th>Valor da Parcela</th>
                        <th>Valor Recebido</th>
                        <th>Status</th>
                        <th>Valor Restante</th>
                        </thead>
                        <tfoot>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tfoot>

                        <tbody>



                            <tr>
                                <td>{{$parcela->idparcela}}</td>
                                <td>{{$parcela->valorParcela+$parcela->valorRecebido}}</td>
                                <td>{{$parcela->valorRecebido}}</td>
                                <td>{{$parcela->status}}</td>
                                <td>{{$parcela->valorParcela}}</td>
                            </tr>





                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

@stop