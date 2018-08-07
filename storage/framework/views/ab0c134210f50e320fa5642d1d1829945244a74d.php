<?php $__env->startSection('conteudo'); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nova Compra <i class="fa fa-shopping-cart"></i></h3>
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
    <?php

    try {

        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("Para Realizar uma Compra o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
        unset($_COOKIE['caixa']);
        echo '<script>window.location="/caixa/create"</script>';
    }

    ?>

    <?php echo Form::open(array('url'=>'compra/compra','method'=>'POST','autocomplete'=>'off')); ?>

    <?php echo e(Form::token()); ?>


    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Funcionario</label>
                <span class="ob">*</span>
                <select name="idfuncionario" id="idfuncionario" class="form-control selectpicker"
                        data-live-search="true">
                    <?php $__currentLoopData = $funcionario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fun): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($fun->idfuncionario); ?>">
                            <?php echo e($fun->nomeFuncionario); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>
        </div>


        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label>Fornecedor</label>
                <span class="ob">*</span>
                <select name="idfornecedor" id="idfornecedor" class="form-control selectpicker" data-live-search="true">
                    <?php $__currentLoopData = $fornecedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $for): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($for->idfornecedor); ?>">
                            <?php echo e($for->razaoSocial); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
            </div>
        </div>



        <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
            <div class="form-group">
                <label for="condicaoPagamento">Condição Pagamento</label>
                <span class="ob">*</span>
                <select name="condicaoPagamento" id="condicaoPagamento" value="<?php echo e(old('condicaoPagamento')); ?>"
                        id="icondicaoPagamento" class="form-control">

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

                        <label>Produto</label>
                        <span class="ob">*</span>
                        <select name="pidproduto" id="pidproduto" class="form-control selectpicker"
                                data-live-search="true">
                            <?php $__currentLoopData = $produto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($pro->idproduto); ?>">
                                    <?php echo e($pro->produto); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <span class="ob">*</span>
                        <input type="number" name="quantidade" value="<?php echo e(old('quantidade')); ?>"
                               id="pquantidade" class="form-control" placeholder="Quantidade">
                    </div>
                </div>


                <div class="col-lg-2 col-sm-2 col-md-2  col-xs-12">
                    <div class="form-group">
                        <label for="valorUnitario">Valor Unitario</label>
                        <span class="ob">*</span>
                        <input type="number" name="valorUnitario" value="<?php echo e(old('valorUnitario')); ?>" id="pvalorUnitario"
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
                        <tfoot>
                        <th></th>

                        <th></th>
                        <th></th>
                        <th></th>

                        <td>
                            <input type="text" name="totalCompra" readonly id="total" class="form-control"
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
            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
            <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/compra';">Cancelar</button>
        </div>
    </div>


    </div>



    <?php echo Form::close(); ?>


    <?php $__env->startPush('scripts'); ?>
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

            function adicionar() {
                idproduto = $("#pidproduto").val();
                produto = $("#pidproduto option:selected").text();
                quantidade = $("#pquantidade").val();
                valorUnitario = $("#pvalorUnitario").val();


                if (idproduto != "" && quantidade != "" && quantidade > 0 && valorUnitario != "") {

                    subtotal[cont] = (quantidade * valorUnitario);
                    total = total + subtotal[cont];

                    var linha = '<tr class="selected" id="linha' + cont + '">    <td> <button type="button" class="btn btn-warning" onclick="apagar(' + cont + ');"> X </button></td>      <td> <input type="hidden" name="idproduto[]" value="' + idproduto + '">' + produto + '</td><td> <input type="number" name="quantidade[]" value="' + quantidade + '"></td> <td> <input type="number" name="valorUnitario[]" value="' + valorUnitario + '"></td> <td> ' + subtotal[cont] + ' </td> </tr>'
                    cont++;


                    limpar();
                    $("#total").val(total);
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
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>