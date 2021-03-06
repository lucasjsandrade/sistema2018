@extends('layouts.admin')
@section('conteudo')
    <?php
    global $idusuario;
    global $last_id;
    $idusuario = Auth::user()->id;
    $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();

    try {


        if($last_id->situacao == 'Aberto'){

            //Libera o Formulario

        }


        if($last_id->situacao !== 'Aberto'){

            echo '<script>alert("Para Realizar um Pagamento o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
            echo '<script>window.location="/caixa/create"</script>';
            exit;
        }
    }
    catch (\Exception $Exception) {


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
                <label for="">Contas a Pagar</label>
                <span class="ob">*</span>

                <select name="contas" id="contas" class="form-control selectpicker" data-live-search="true">
                    <option value="">Selecione uma Conta</option>
                    @foreach($contaspagar as $con)
                        <option value="{{$con->idcontasp}}_{{$con->data}}_{{$con->valor}}_{{$con->descricao}}_{{$con->idcompra}}_{{$con->idfornecedor}}_{{$con->parcela}}_{{$con->razaoSocial}}">{{$con->idcontasp}}</option>
                    @endforeach

                </select>

            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="data">Data Lançamento</label>
                <input type="text" name="data" id="pdata" readonly
                       class="form-control">
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="valor">Valor da Conta</label>
                <input type="number" name="valor" id="pvalor" readonly
                       class="form-control">
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="pdescricao" readonly
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcompra">N° Compra</label>
                <input type="text" name="compra" id="pidcompra" readonly
                       class="form-control">
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idparcelas">N° do Fornecedor</label>
                <input type="text" name="idfornecedor" id="pidfornecedor" readonly
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcompra">Fornecedor</label>
                <input type="text" name="idfornecedor" id="prazaoSocial" readonly
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idparcelas">N° de Parcelas</label>
                <input type="text" name="idparcelas" id="pidparcelas" readonly
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="observacao">Observação</label>
                <input type="text" name="observacao" value="{{old('observacao')}}"
                       id="observacao" class="form-control">

            </div>
        </div>
    </div>



    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label>Parcela a Pagar</label>
                        <span class="ob">*</span>
                        <select name="parcelas" class="form-control" id="parcelas">
                            <option selected="selected">Selecione a Parcela</option>
                        </select>

                    </div>
                </div>

                <div class="col-lg-1 col-sm-1 col-md-1  col-xs-1">
                    <div class="form-group">
                        <label for="numeroparcela">Cod Parcela</label>
                        <input type="integer" name="numeroparcela" id="pnumeroparcela" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="col-lg-1 col-sm-1 col-md-1  col-xs-1">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="pstatus" readonly
                               class="form-control">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idvencimento">Vencimento</label>
                        <input type="text" name="dataVencimento" id="pdataVencimento" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idvalorParcela">Valor da Parcela</label>
                        <input type="number" name="valorParcela" id="pvalorParcela" readonly
                               class="form-control">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idvalorPago">Valor Pago</label>
                        <input type="text" name="idvalorPago" id="pvalorPago" readonly
                               required class="form-control">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="pvalorPagamento">Valor</label>
                        <span class="ob">*</span>
                        <input type="number" name="valorPagamento" value="{{old('valorPagamento')}}"
                               id="pvalorPagamento" class="form-control" required
                               placeholder="Insira o Valor a ser Pago">

                    </div>
                </div>


                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add"
                                class="btn btn-info">
                            Adicionar
                        </button>

                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12  col-xs-12">
                    <table id="detalhes" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                        <th>Opções</th>
                        <th>N° Parcela</th>
                        <th>Status</th>
                        <th>Data Vencimento</th>
                        <th>Valor da Parcela</th>
                        <th>Valor Pago</th>
                        <th>Valor Pagamento</th>

                        <th>Total</th>
                        </thead>
                        <tfoot>
                        <th></th>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>




                        </tfoot>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>

    </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
        <div class="form-group">
            <input name="_token" value="{{ csrf_token()}}" type="hidden">
            <button class="btn btn-success" id="salvar" type="submit"><i class="fa fa-save"></i> Confirmar</button>
            <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/venda/venda';">Cancelar
            </button>
        </div>
    </div>


    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
        <div class="form-group">
            <input name="_token" value="{{ csrf_token()}}" type="hidden">
            <button class="btn btn-success" id="salvar" type="submit"><i class="fa fa-save"></i> Confirmar</button>
            <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/caixa';">Cancelar
            </button>
        </div>
    </div>
    </div>

    {!!Form::close()!!}
    @push('scripts')
        <script>

            // $("#pidcontas").on("change", funcion(){console.log("Cid");});
            $(document).ready(function () {

                $('#bt_add').click(function () {
                    adicionar();

                });

            });

            $('select#contas').change(function () {


                var idcontas = $(this).val();
                console.log(idcontas);
                $parcelasItens = $('.parcItens').remove();
                $.get('/parcelapagar/' + idcontas, function (data) {
                    console.log(data);
                    $.each(data, function (create, element) {
                        $('select#parcelas').append('<option value="' + element.idparcela + ',' + element.dataVencimento + ',' + element.valorParcela + ',' + element.valorPago + '" class="parcItens">' + element.idparcela + '</option>')

                        console.log(data);
                    });


                }, 'json');


                dadosContas = document.getElementById('contas').value.split('_');


                $("#pdata").val(dadosContas[1]);
                $("#pvalor").val(dadosContas[2]);
                $("#pdescricao").val(dadosContas[3]);
                $("#pidcompra").val(dadosContas[4]);
                $("#pidfornecedor").val(dadosContas[5]);
                $("#pidparcelas").val(dadosContas[6]);
                $("#prazaoSocial").val(dadosContas[7]);

            });


            var cont = 0;
            total = 0;
            subtotal = [];


            $("#salvar").hide();


            $('select#parcelas').change(function () {
                console.log('oi');
                var idcontas = $(this).val();

                $parcelasItens = $('.parcItens').remove();
                $.get('/parcelapagarget/' + idcontas, function (data) {

                    $.each(data, function (create, element) {

                        $("#pnumeroparcela").val(element.idparcela);
                        $("#pstatus").val(element.status);
                        $("#pdataVencimento").val(element.dataVencimento);
                        $("#pvalorParcela").val(element.valorParcela);
                        $("#pvalorPago").val(element.valorPago);

                        idparcela = element.idparcela;
                        dataVencimento = element.dataVencimento;
                        valorParcela = element.valorParcela;
                        valorPago = element.valorPago;
                        status = element.status;
                      //  console.log(status);
                    });


                }, 'json');

            });


            function adicionar() {


                lvalorPagamento = $("#pvalorPagamento").val();
                ltotal = lvalorPagamento;
                if (lvalorPagamento != "") {

                    if (lvalorPagamento > 0) {

                        var linha = '<tr class="selected" id="linha' + cont + '">    <td> <button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"><i class="fa fa-close" ></i></button></td> <td> <input type="text" name="lidparcela[]" value="' + idparcela + '"></td> <td> <input type="text" name="lstatus" value="' + status + '"></td>  <td> <input type="text" name="ldataVencimento[]" value="' + dataVencimento + '"></td><td> <input type="text" name="lvalorParcela[]" value="' + valorParcela + '"></td> <td> <input type="text" name="lvalorPago[]" value="' + valorPago + '"></td> <td> <input type="text" name="valorPagamentos[]" value="' + lvalorPagamento + '"></td> <td> <input type="text" name="ltotal[]" value="' + ltotal + '"></td></tr>'
                        cont++;
                        console.log(valorPago);
                        limpar();
                        $("#total").val(ltotal);

                        ocultar();
                        $('#detalhes').append(linha);

                    }

                    else {
                        alert("Valor do Pagamento não pode ser negativo!!");

                    }
                }
                 else {
                alert("Insira os dados Obrigatorios!!");

            }

            }



            function limpar() {
                $("#pquantidade").val("");
                $("#pvalorUnitario").val("");
                $("#pdesconto").val("");
            }


            function ocultar() {
                if (total > 0) {
                    $("#salvar").show();
                } else {
                    $("#salvar").hide();
                }
            }


            function apagar(index) {
                total = total - subtotal[index];
                $("#total").val(total);
                $("#linha" + index).remove();

            }


        </script>

    @endpush

@stop

