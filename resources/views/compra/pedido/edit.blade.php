@extends('layouts.admin')
@section('conteudo')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Alterar Pedido : {{ $pedido->idcompra }}</h3>
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

    {!!Form::model($pedido, ['method'=>'PATCH', 'route'=>['pedido.update', $pedido->idcompra], 'files'=>'true'])!!}

    {{Form::token()}}



    <div class="row">

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="status">Status</label>
                <span class="ob">*</span>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Selecione Pedido</option>
                    <option value="Aberto">Aberto (Pedido)</option>
                    <option value="Fechado">Fechado (Compra)</option>
                </select>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Funcionario</label>
                <span class="ob">*</span>
                <select name="idfuncionario" class="form-control">
                    @foreach($funcionario as $fun)
                        @if($fun->idfuncionario==$pedido->idfuncionario)
                            <option value="{{$fun->idfuncionario}}" selected>
                                {{$fun->nomeFuncionario}}
                            </option>
                        @else
                            <option value="{{$fun->idfuncionario}}">
                                {{$fun->nomeFuncionario}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Fornecedor</label>
                <span class="ob">*</span>
                <select name="idfornecedor" class="form-control">
                    @foreach($fornecedor as $for)
                        @if($for->idfornecedor==$pedido->idfornecedor)
                            <option value="{{$for->idfornecedor}}" selected>
                                {{$for->nomeFantasia}}
                            </option>
                        @else
                            <option value="{{$for->idfornecedor}}">
                                {{$for->nomeFantasia}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="condicaoPagamento">Condição Pagamento</label>
                <span class="ob">*</span>
                <input type="text" name="condicaoPagamento" value="{{old('condicaoPagamento')}}" class="form-control"
                       placeholder="Condição Pagamento">
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
                        <label>Produto</label>
                        <span class="ob">*</span>
                        <select name="idproduto" id="pidproduto"
                                class="form-control selectpicker" data-live-search="true">
                            @foreach($produto as $pro)
                                <option value="{{$pro->idproduto}}">
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
                        <label for="valorUnitario">Valor Unitario</label>
                        <span class="ob">*</span>
                        <input type="number" name="valorUnitario" value="{{old('valorUnitario')}}" id="pvalorUnitario"
                               class="form-control"
                               placeholder="valorUnitario">
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
                        <th>Total</th>
                        </thead>

                        <tbody>

                        <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tfoot>

                        </tbody>

                        <tbody>
                        <script type="text/javascript">
                            var cont = 0;
                            var total = 0;
                        </script>
                        @php
                            $cont_php = 0;
                        @endphp
                        <?php $final = 0; ?>
                        @foreach($itensc as $itens)
                            @if($itens->idcompra == $pedido->idcompra)
                                <tr class="selected" id= @php echo "linha".$cont_php; @endphp>
                                    <td>
                                        <button type="button" class="btn btn-warning"
                                                onclick="apagar(@php echo $cont_php; @endphp);"><i
                                                    class="fa fa-close"></i></button>

                                    </td>
                                    <td>
                                        <input class="form-control" name="idproduto[]" value="{{$itens->idproduto}}">
                                    </td>
                                    <td>
                                        <input class="form-control" name="quantidade[]" value="{{$itens->quantidade}}">
                                    </td>

                                    <td>
                                        <input class="form-control" name="valorUnitario[]"
                                               value="{{$itens->valorUnitario}}">
                                    </td>

                                    <td>
                                        <input class="form-control" name="valorTotal[]" value="{{$itens->valorTotal}}">

                                        <script type="text/javascript"> $totalTotal = $totalTotal + {{$itens->valorTotal}} ; </script>

                                    </td>

                                    <?php
                                    $final += $itens->valorTotal;
                                    ?>


                                </tr>
                                <script type='text/javascript'>cont++;</script>
                                @php
                                    $cont_php++;
                                @endphp
                            @endif
                        @endforeach

                        </tbody>

                        <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <td>
                            <input type="text" name="total" value="<?php echo $final; ?>" readonly id="total"
                                   class="form-control" style="width: 100px;">
                        </td>
                        </tfoot>

                    </table>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
                        <div class="form-group">
                            <input name="_token" value="{{ csrf_token()}}" type="hidden">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
                            <button class="btn btn-danger" type="reset"
                                    onclick="javascript: location.href='/compra/pedido';">Cancelar
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
                        $("#salvar");

                        function adicionar() {
                            idproduto = $("#pidproduto").val();
                            produto = $("#pidproduto option:selected").text();
                            quantidade = $("#pquantidade").val();
                            valorUnitario = $("#pvalorUnitario").val();
                            valorTotal=$("#pvalorTotal").val();

                            if (idproduto != "" && quantidade != "" && quantidade > 0 && valorUnitario != "") {

                                subtotal[cont] = (quantidade * valorUnitario);
                                total = total + subtotal[cont];

                                var linha =
                                    '<tr class="selected" id="linha' + cont + '"> <td><button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"><i class="fa fa-close"></i></button></td> <td> <input class="form-control" name="idproduto[]"  value="' + idproduto + '"></td> <td> <input class="form-control" name="quantidade[]"  value="' + quantidade + '"></td><td> <input class="form-control" name="valorUnitario[]"  value="' + valorUnitario + '"></td> <td><input class="form-control" name="valorTotal[]" id="valorTotal" value="' + subtotal[cont] + '"></td> </tr>'
                                cont++;
                                limpar();
                                $("#total").html("R$: " + total);
                                ocultar();
                                $('#detalhes').append(linha);

                            } else {
                                alert("Erro ao inserir os detalhes, preencha os campos corretamente!!");

                            }
                        }

                        total = 0;

                        function limpar() {
                            $("#pquantidade").val("");
                            $("#pvalorUnitario").val("");
                            $("#total").val("");

                        }

                        function ocultar() {
                            if (total > 0) {
                                $("#salvar").show();
                            } else {
                                $("#salvar");
                            }
                        }

                        function apagar(index) {
                            total = total - subtotal[index];
                            $("#total").html("R$: " + total);
                            $("#linha" + index).remove();
                            ocultar();
                        }


                    </script>
    @endpush
@stop