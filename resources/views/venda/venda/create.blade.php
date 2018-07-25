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
            <h3>Nova Venda <i class="fa fa-shopping-cart"></i></h3>
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


    {!!Form::open(array('url'=>'venda/venda','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Funcionario</label>
                <span class="ob">*</span>
                <select name="idfuncionario" id="idfuncionario" class="form-control selectpicker"
                        data-live-search="true">
                    @foreach($funcionario as $fun)
                        <option value="{{$fun->idfuncionario}}">
                            {{$fun->nomeFuncionario}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Cliente</label>
                <span class="ob">*</span>
                <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
                    @foreach($cliente as $cli)
                        <option value="{{$cli->idcliente}}">
                            {{$cli->nomeCliente}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="origemVenda">Origem Venda</label>
                <span class="ob">*</span>
                <select name="origemVenda" id="origemVenda" value="{{old('origemVenda')}}"
                        id="origemVenda" class="form-control">

                    <option value="Balcao">Balcao</option>
                    <option value="Instalacao">Instalacao</option>


                </select>

            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="condicaoPagamento">Condição Pagamento</label>
                <span class="ob">*</span>
                <select name="condicaoPagamento" id="condicaoPagamento" value="{{old('condicaoPagamento')}}"
                        id="condicaoPagamento" class="form-control">

                    <option value="Avista">Avista</option>
                    <option value="Aprazo">A prazo</option>


                </select>

            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <span class="ob">*</span>
                <label>Forma Pagamento</label>
                <select name="formaPagamento" id="formaPagamento" class="form-control">

                    <option value="Dinheiro">Dinheiro</option>
                    <option value="Boleto"> Boleto</option>
                    <option value="Cartão">Cartão</option>
                    <option value="Cartão">Cheque</option>


                </select>
            </div>

        </div>
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <span class="ob">*</span>
                <label>Numero De parcelas</label>
                <select name="numeroDeParcelas" id="numeroDeParcelas" class="form-control">

                    <option value=1>1x</option>
                    <option value=2>2x</option>
                    <option value=3>3x</option>
                    <option value=4>4x</option>
                    <option value=5>5x</option>
                    <option value=6>6x</option>
                    <option value=7>7x</option>
                    <option value=8>8x</option>
                    <option value=9>9x</option>
                    <option value=10>10x</option>


                </select>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <a href=/pessoa/fornecedor/create target="_blank">
                    <button class="btn btn-primary" type="button">Novo Fornecedor</button>
                </a>
                <a href=/pessoa/funcionario/create target="_blank">
                    <button class="btn btn-primary" type="button">Novo Funcionario</button>
                </a>
                <a href=/estoque/produto/create target="_blank">
                    <button class="btn btn-primary" type="button">Novo Produto</button>
                </a>
            </div>

        </div>
    </div>


    <div class="row">


        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">

                        <label>Selecione um Produto</label>
                        <span class="ob">*</span>
                        <select name="pidproduto" id="pidproduto" class="form-control selectpicker"
                                data-live-search="true">
                            <option value="">Selecione um produto</option>
                            @foreach($produto as $pro)
                                <option value="{{$pro->idproduto}}_{{$pro->quantidade}}_{{$pro->preco}}">
                                    {{$pro->produto}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <span class="ob">*</span>
                        <input type="number" name="quantidade" value="{{old('quantidade')}}"
                               id="pquantidade" class="form-control" placeholder="Quantidade">

                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="preco">Valor Unitario</label>
                        <input type="number" name="preco"
                               id="ppreco"
                               disabled
                               class="form-control" placeholder="Valor Unitario...">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="estoque">Estoque</label>
                        <input type="number" name="estoque"
                               id="pqestoque"
                               disabled
                               class="form-control" placeholder="Estoque...">
                    </div>
                </div>


                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="desconto">Desconto</label>
                        <span class="ob">*</span>
                        <input type="number" name="desconto"
                               id="pdesconto" class="form-control" value="0" placeholder="Insira um desconto ou '0'">

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
                        <th>Produtos</th>
                        <th>Quantidade</th>
                        <th>Valor Unitario</th>
                        <th>Desconto</th>

                        <th>Total</th>
                        </thead>
                        <tfoot>
                        <th></th>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                        <td>
                            <input type="text" name="valorTotal" readonly id="total" class="form-control"
                                   style="width: 100px;">
                        </td>
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



    {!!Form::close()!!}

    @push('scripts')
        <script>

            $(document).ready(function () {
                $('#bt_add').click(function () {
                    adicionar();

                });
            });

            var cont = 0;
            total = 0;
            subtotal = [];

            $("#salvar").hide();
            $("#pidproduto").change(mostrarValores);


            function mostrarValores() {
                dadosProdutos = document.getElementById('pidproduto').value.split('_');
                $("#ppreco").val(dadosProdutos[2]);
                $("#pqestoque").val(dadosProdutos[1]);
            }

            function adicionar() {
                dadosProdutos = document.getElementById('pidproduto').value.split('_');
                idproduto = dadosProdutos[0];
                produto = $("#pidproduto option:selected").text();
                quantidade = $("#pquantidade").val();
                valorUnitario = $("#ppreco").val();
                desconto = $("#pdesconto").val();
                estoque = $("#pqestoque").val();


                if (idproduto != "" && quantidade != "" && quantidade > 0 && valorUnitario != "") {
                    if (Number(estoque) >= Number(quantidade)) {

                        subtotal[cont] = ((quantidade * valorUnitario) - desconto);
                        total = total + subtotal[cont];

                        var linha = '<tr class="selected" id="linha' + cont + '">    <td> <button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"><i class="fa fa-close" ></i></button></td>      <td> <input type="hidden" name="idproduto[]" value="' + idproduto + '">' + produto + '</td><td> <input type="number" name="quantidade[]" value="' + quantidade + '"></td> <td> <input type="number" name="valorUnitario[]" value="' + valorUnitario + '"></td> <td> <input type="number" name="desconto[]" value="' + desconto + '"></td> <td> ' + subtotal[cont] + ' </td> </tr>'
                        cont++;


                        limpar();
                        $("#total").val(total);

                        ocultar();
                        $('#detalhes').append(linha);

                    } else {
                        alert("A quantidade vendida não pode ser maior que o estoque!!");

                    }


                } else {
                    alert("Erro ao inserir os detalhes da venda, preencha os campos corretamente!!");

                }
            }


            total = 0;


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
                ocultar();
            }


        </script>
    @endpush
@stop