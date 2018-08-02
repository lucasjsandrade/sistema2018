@extends('layouts.admin')
@section('conteudo')

    <?php

    try {

        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("Para Realizar uma Venda o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
        unset($_COOKIE['caixa']);
        echo '<script>window.location="/caixa/create"</script>';
    }

    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Pagamento <i class="fa fa-money"></i></h3>
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

    {!!Form::open(array('url'=>'pagamento','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Contas a Pagar</label>
                <span class="ob">*</span>
                <select name="pidcontas" id="pidcontas" class="form-control selectpicker" data-live-search="true">
                    <option value="">Selecione uma Conta a Pagar</option>
                    @foreach($contas as $con)
                        <option value="{{$con->idcontasp}}_{{$con->data}}_{{$con->valor}}_{{$con->descricao}}_{{$con->idcompra}}_{{$con->idfornecedor}}">
                            {{$con->contas}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data Lançamento</label>
                <input type="text" name="data" id="pdata" disabled
                       class="form-control">
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valor">Valor da Conta</label>
                <input type="number" name="valor" id="pvalor" disabled
                       class="form-control">
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="pdescricao" disabled
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcompra">N° Compra</label>
                <input type="text" name="idcompra" id="pidcompra" disabled
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcompra">N° Fornecedor</label>
                <input type="text" name="idfornecedor" id="pidfornecedor" disabled
                       class="form-control">
            </div>
        </div>


    </div>



    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">

                        <label>Selecione a Parcela</label>
                        <span class="ob">*</span>
                        <select name="pidparcela" id="pidparcela" class="form-control selectpicker"
                                data-live-search="true">
                            <option value="">Selecione um produto</option>
                            @foreach($parcelapagar as $par)
                                <option value="{{$par->idparcela}}_{{$par->dataVencimento}}_{{$par->valorParcela}}_{{$par->valorPago}}_{{$par->idcontasp}}">
                                    {{$par->parcela}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idcompra">Vencimento</label>
                        <input type="text" name="idvencimento" id="pvencimento" disabled
                               class="form-control">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idcompra">Valor da Parcela</label>
                        <input type="text" name="valor" id="pvalor" disabled
                               class="form-control">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idvalorPago">Valor Pago</label>
                        <input type="text" name="idvalorPago" id="pvalorPago" disabled
                               class="form-control">
                    </div>
                </div>



            </div>
        </div>

    </div>

    {!!Form::close()!!}
    @push('script')
        <script>

            $(document).ready(function () {
                $('#bt_add').click(function () {
                    adicionar();

                });
            });


            $("#pidcontas").change(mostrarValores);

            function mostrarValores() {
                dadosContas = document.getElementById('pidcontas').value.split('_');
                $("#pdata").val(dadosContas[5]);
                $("#pvalor").val(dadosContas[4]);
            }


            function adicionar() {
                dadosContas = document.getElementById('pidcontas').value.split('_');
                idcontasp = dadosContas[0];
                contas = $("#pidcontas option:selected").text();
                data = $("#pdata").val();
                valor = $("#pdata").val();
                descricao = $("#pdata").val();
                idcompra = $("#pdata").val();
                idfornecedor = $("#pdata").val();

            }

        </script>

    @endpush

@stop

