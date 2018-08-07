<?php $__env->startSection('conteudo'); ?>

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
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo Form::open(array('url'=>'pagamento','method'=>'POST','autocomplete'=>'off')); ?>

    <?php echo e(Form::token()); ?>


    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Contas a Pagar</label>
                <span class="ob">*</span>
                <select name="contas" id="pidcontas" class="form-control selectpicker" data-live-search="true"
                        onchange="mostrarValores()">
                    <option value="">Selecione uma Conta a Pagar</option>
                    <?php $__currentLoopData = $contas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($con->idcontasp); ?>_<?php echo e($con->data); ?>_<?php echo e($con->valor); ?>_<?php echo e($con->descricao); ?>_<?php echo e($con->idcompra); ?>_<?php echo e($con->idfornecedor); ?>_<?php echo e($con->parcela); ?>">
                            <?php echo e($con->contas); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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
                <input type="text" name="compra" id="pidcompra" disabled
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

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="idparcelas">N° de Parcelas</label>
                <input type="text" name="idfornecedor" id="pidparcelas" disabled
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="observacao">Observação</label>
                <span class="ob">*</span>
                <input type="text" name="observacao" value="<?php echo e(old('observacao')); ?>"
                       id="observacao" class="form-control" >

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
                                data-live-search="true" onchange="mostrarParcela()">
                            <option value="">Selecione um produto</option>
                            <?php $__currentLoopData = $parcelapagar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $par): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($par->idparcela); ?>_<?php echo e($par->dataVencimento); ?>_<?php echo e($par->valorParcela); ?>_<?php echo e($par->valorPago); ?>_<?php echo e($par->idcontasp); ?>">
                                    <?php echo e($par->parcela); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idvencimento">Vencimento</label>
                        <input type="text" name="dataVencimento" id="pdataVencimento"" disabled
                        class="form-control">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="idvalorParcela">Valor da Parcela</label>
                        <input type="number" name="valorParcela" id="pvalorParcela" disabled
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

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="quantidade">Valor</label>
                        <span class="ob">*</span>
                        <input type="number" name="valorPagamento" value="<?php echo e(old('valorPagamento')); ?>"
                               id="pvalorPagamento" class="form-control" placeholder="Insira o Valor a ser Pago">

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
            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <button class="btn btn-success" id="salvar" type="submit"><i class="fa fa-save"></i> Confirmar</button>
            <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/venda/venda';">Cancelar
            </button>
        </div>
    </div>


    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="salvar">
        <div class="form-group">
            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <button class="btn btn-success" id="salvar" type="submit"><i class="fa fa-save"></i> Confirmar</button>
            <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/caixa';">Cancelar
            </button>
        </div>
    </div>
    </div>

    <?php echo Form::close(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>

            // $("#pidcontas").on("change", funcion(){console.log("Cid");});
            $(document).ready(function () {

                $('#bt_add').click(function () {
                    adicionar();

                });


            });
            var cont = 0;
            total = 0;
            subtotal = [];


            $("#salvar").hide();


            function mostrarValores() {
                dadosContas = document.getElementById('pidcontas').value.split('_');

                $("#pdata").val(dadosContas[1]);
                $("#pvalor").val(dadosContas[2]);
                $("#pdescricao").val(dadosContas[3]);
                $("#pidcompra").val(dadosContas[4]);
                $("#pidfornecedor").val(dadosContas[5]);
                $("#pidparcelas").val(dadosContas[6]);

            }

            function mostrarParcela() {
                dadosParcelas = document.getElementById('pidparcela').value.split('_');

                $("#pdataVencimento").val(dadosParcelas[1]);
                $("#pvalorParcela").val(dadosParcelas[2]);
                $("#pvalorPago").val(dadosParcelas[3]);
                $("#pidcontasp").val(dadosParcelas[4]);
                console.log(dadosParcelas);

            }


            function adicionar() {
                dadosParcela = document.getElementById('pidparcela').value.split('_');
                idparcela = dadosParcela[0];
                parcela = $("#pidparcela option:selected").text();
                dataVencimento = $("#pdataVencimento").val();
                valorParcela = $("#pvalorParcela").val();
                valorPago = $("#pvalorPago").val();
                valorPagamento = $("#pvalorPagamento").val();

                console.log(dadosParcela);


                var linha = '<tr class="selected" id="linha' + cont + '">    <td> <button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"><i class="fa fa-close" ></i></button></td>      <td> <input type="hidden" name="idparcela[]" value="' + idparcela + '">' + parcela + '</td><td> <input type="text" name="dataVencimento[]" value="' + dataVencimento + '"></td>  <td> <input type="number" name="valorParcela[]" value="' + valorParcela + '"></td> <td> <input type="number" name="valorPago[]" value="' + valorPago + '"></td> <td> <input type="number" name="valorPagamento[]" value="' + valorPagamento + '"></tr>'
                cont++;


                limpar();
                $("#total").val(total);

                ocultar();
                $('#detalhes').append(linha);


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

            }


        </script>

    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>