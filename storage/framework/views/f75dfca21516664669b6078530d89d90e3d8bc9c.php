<?php $__env->startSection('conteudo'); ?>

    <?php


    try {

        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("Para Realizar um Recebimento o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
        unset($_COOKIE['caixa']);
        echo '<script>window.location="/caixa/create"</script>';
    }

    ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Recebimento <i class="fa fa-money"></i></h3>
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

    <?php echo Form::open(array('url'=>'recebimento','method'=>'POST','autocomplete'=>'off')); ?>

    <?php echo e(Form::token()); ?>


    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="">Contas a Receber</label>
                <span class="ob">*</span>

                <select name="contas" id="contas" class="form-control selectpicker" data-live-search="true">
                    <option value="">Selecione uma Conta</option>
                    <?php $__currentLoopData = $contasreceber; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($con->idcontasr); ?>_<?php echo e($con->data); ?>_<?php echo e($con->valor); ?>_<?php echo e($con->descricao); ?>_<?php echo e($con->idvenda); ?>_<?php echo e($con->idcliente); ?>_<?php echo e($con->parcela); ?>_<?php echo e($con->nomeCliente); ?>"><?php echo e($con->idcontasr); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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
                <input type="text" name="observacao" value="<?php echo e(old('observacao')); ?>"
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
                        <label for="quantidade">Valor</label>
                        <span class="ob">*</span>
                        <input type="number" name="valorRecebimento" value="<?php echo e(old('valorRecebimento')); ?>"
                               id="pvalorRecebimento" class="form-control" required
                               placeholder="Insira o Valor a ser Recebido">

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
                        <th>Valor Recebimenmento</th>

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
                console.log(idcontas);
                $parcelasItens = $('.parcItens').remove();
                $.get('/parcelareceberget/' + idcontas, function (data) {

                    $.each(data, function (create, element) {

                        $("#pnumeroparcela").val(element.idparcela);
                        $("#pstatus").val(element.status);
                        $("#pdataVencimento").val(element.dataVencimento);
                        $("#pvalorParcela").val(element.valorParcela);
                        $("#pvalorRecebimento").val(element.valorRecebimento);

                        idparcela = element.idparcela;
                        dataVencimento = element.dataVencimento;
                        valorParcela = element.valorParcela;
                        valorRecebimento = element.valorRecebimento;
                        status = element.status;


                    });


                }, 'json');

            });


            function adicionar() {


                lvalorPagamento = $("#pvalorPagamento").val();
                ltotal = lvalorPagamento;
                if (lvalorPagamento != "") {

                    var linha = '<tr class="selected" id="linha' + cont + '">    <td> <button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"><i class="fa fa-close" ></i></button></td> <td> <input type="text" name="lidparcela[]" value="' + idparcela + '"></td> <td> <input type="text" name="lstatus" value="' + status +'"></td>  <td> <input type="text" name="ldataVencimento[]" value="' + dataVencimento + '"></td><td> <input type="text" name="lvalorParcela[]" value="' + valorParcela + '"></td> <td> <input type="text" name="lvalorPago[]" value="' + valorPago + '"></td> <td> <input type="text" name="valorPagamentos[]" value="' + lvalorPagamento + '"></td> <td> <input type="text" name="ltotal[]" value="' + ltotal + '"></td></tr>'
                    cont++;
                    console.log(valorPago);
                    limpar();
                    $("#total").val(ltotal);

                    ocultar();
                    $('#detalhes').append(linha);

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

    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>