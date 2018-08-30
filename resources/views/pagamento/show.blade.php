@extends('layouts.admin')
@section('conteudo')


    <h1>Detalhes Do Pagamento</h1><br>

    <div class="row">

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idpagamento">N° do Pagamento</label>
                <p>{{$pagamento->idpagamento}}</p>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data</label>
                <p>{{$pagamento->data}}</p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valorPagamento">Valor Pagamento</label>
                <p>{{$pagamento->valorTotal}}</p>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">N° da conta</label>
                <p>{{$parcela->idcontasp}}</p>
            </div>

        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numeroParcela">N° da Parcela</label>
                <p>{{$pagamento->idparcelap}}</p>
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
                <label for="numero">N° fornecedor</label>
                <p>{{$parcela->idfornecedor}}</p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="numero">Fornecedor</label>
                <p>{{$parcela->razaoSocial}}</p>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="text">Telefone Fonecedor</label>
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
                        <th>Valor Pago</th>
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
                                <td>{{$parcela->valorParcela+$parcela->valorPago}}</td>
                                <td>{{$parcela->valorPago}}</td>
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