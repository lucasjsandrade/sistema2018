<?php $__env->startSection('conteudo'); ?>
    <?php
    global $idusuario;
    global $last_id;
     $idusuario = Auth::user()->id;

    $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();

    try {

                if($last_id->situacao !== 'Aberto'){

                //Libera o Formulario

            }


     if($last_id->situacao == 'Aberto'){

         echo '<script>alert("Já exixte um caixa aberto!")</script>';
         echo '<script>window.location="/caixa"</script>';
         exit;

    }


    } catch (\Exception $Exception) {

    }

    ?>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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

    <?php echo Form::open(array('url'=>'caixa','method'=>'POST','autocomplete'=>'off')); ?><!-- Metodo POST está passando informação -->
    <?php echo e(Form::token()); ?>

    <body>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section>
                <article>
                    <h4><p class="alinha">Insira um valor para iniciar o caixa</p> </h4>
                    <div class="col-lg-4 col-sm-4 col-md-4  col-xs-12">
                        <div class="form-group">
                            <label for="quantidade">Saldo Inicial</label>
                            <span class="ob">*</span>
                            <input type="text" name="saldoInicial" required id="psaldoInicial" class="form-control"
                                   placeholder="Ex. : 1000.00 ">
                        </div>
                        <button class="btn btn-success" name="abrir" value="abrir">Abrir</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" name="descricao"  value="<?php echo e(old('descricao')); ?>" class="form-control">
                        </div>
                    </div>
                    <input type="text" name="idusuario" hidden value="<?php echo $idusuario; ?>" class="hidden">

                </article>
            </section>


        </div>
    </div>
    </body>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<style>

    #menu ul li {
        display: inline;
    }
    p.alinha{padding-left: 1.0em }<

</style>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>