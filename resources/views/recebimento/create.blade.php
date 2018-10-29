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

            echo '<script>alert("Para Realizar um Recebimento o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
            echo '<script>window.location="/caixa/create"</script>';
            exit;
        }
    }
    catch (\Exception $Exception) {


    }

    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Recebimento <i class="fa fa-money"></i></h3>
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

    {!!Form::open(array('url'=>'recebimento','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="">Contas a Receber</label>
                <span class="ob">*</span>

                <select name="contas" id="contas" class="form-control selectpicker" data-live-search="true">
                    <option value="">Selecione uma Conta</option>
                    @foreach($contasreceber as $con)
                        <option value="{{$con->idcontasr}}_{{$con->data}}_{{$con->valor}}_{{$con->descricao}}_{{$con->idvenda}}_{{$con->idcliente}}_{{$con->parcela}}_{{$con->nomeCliente}}">{{$con->idcontasr}}</option>
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
                <label for="idvenda">N° Venda</label>
                <input type="text" name="venda" id="pidvenda" readonly
                       class="form-control">
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idncliente">N° do Cliente</label>
                <input type="text" name="idcliente" id="pidcliente" readonly
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idcliente">Cliente</label>
                <input type="text" name="idcliente" id="pnomeCliente" readonly
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
                        <label>Parcela a Receber</label>
                        <span class="ob">*</span>
                        <select name="parcelas" class="form-control" id="parcelas">
                            <option selected="selected">Selecione a Parcela</option>
                        </select>

                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="numeroparcela">N° Parcela</label>
                        <input type="integer" name="numeroparcela" id="pnumeroparcela" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
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
                        <label for="idvalorRecebido">Valor Recebido</label>
                        <input type="text" name="valorRecebido" id="pvalorRecebido" readonly
                               required class="form-control">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="valorRecebimento">Valor Recebimento</label>
                        <span class="ob">*</span>
                        <input type="float" name="valorRecebimento" value="{{old('valorRecebimento')}}"
                               id="pvalorRecebimento" class="form-control" required
                               placeholder="Valor do Recebimento">

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
                        <th>Valor Recebido</th>
                        <th>Valor Recebimento</th>

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
            <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/recebimento';">Cancelar
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

                $parcelasItens = $('.parcItens').remove();
                $.get('/parcelareceber/' + idcontas, function (data) {
                    console.log(data);
                    $.each(data, function (create, element) {
                        $('select#parcelas').append('<option value="' + element.idparcela + ',' + element.dataVencimento + ',' + element.valorParcela + ',' + element.valorRecebido + '" class="parcItens">' + element.idparcela + '</option>')
                    console.log(data);

                    });


                }, 'json');


                dadosContas = document.getElementById('contas').value.split('_');


                $("#pdata").val(dadosContas[1]);
                $("#pvalor").val(dadosContas[2]);
                $("#pdescricao").val(dadosContas[3]);
                $("#pidvenda").val(dadosContas[4]);
                $("#pidcliente").val(dadosContas[5]);
                $("#pidparcelas").val(dadosContas[6]);
                $("#pnomeCliente").val(dadosContas[7]);

            });


            var cont = 0;
            total = 0;
            subtotal = [];


            $("#salvar").hide();


            $('select#parcelas').change(function () {

               //
                var idcontas = $(this).val();

                $parcelasItens = $('.parcItens').remove();
                $.get('/parcelareceberget/' + idcontas, function (data) {
                    console.log(data);
                    $.each(data, function (create, element) {

                        $("#pnumeroparcela").val(element.idparcela);
                        $("#pstatus").val(element.status);
                        $("#pdataVencimento").val(element.dataVencimento);
                        $("#pvalorParcela").val(element.valorParcela);
                        $("#pvalorRecebido").val(element.valorRecebido);

                        idparcela = element.idparcela;
                        dataVencimento = element.dataVencimento;
                        valorParcela = element.valorParcela;
                        valorRecebido = element.valorRecebido;
                        status = element.status;


                    });


                }, 'json');

            });


            function adicionar() {


                lvalorRecebimento = $("#pvalorRecebimento").val();
                ltotal = lvalorRecebimento;
                if (lvalorRecebimento != "") {
                    if (lvalorRecebimento > 0) {

                        var linha = '<tr class="selected" id="linha' + cont + '">    <td> <button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"><i class="fa fa-close" ></i></button></td> <td> <input type="text" name="lidparcela[]" value="' + idparcela + '"></td> <td> <input type="text" name="lstatus" value="' + status + '"></td>  <td> <input type="text" name="ldataVencimento[]" value="' + dataVencimento + '"></td><td> <input type="text" name="lvalorParcela[]" value="' + valorParcela + '"></td> <td> <input type="text" name="lvalorRecebido[]" value="' + valorRecebido + '"></td> <td> <input type="text" name="lvalorRecebimento[]" value="' + lvalorRecebimento + '"></td> <td> <input type="text" name="ltotal[]" value="' + ltotal + '"></td></tr>'
                        cont++;
                        console.log(valorRecebido);
                        limpar();
                        $("#total").val(ltotal);

                        ocultar();
                        $('#detalhes').append(linha);

                    }
                    else {
                        alert("Valor do Recebimento não pode ser negativo!!");

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

