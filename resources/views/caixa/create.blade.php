@extends('layouts.admin')
@section('conteudo')
    <?php

    try {
        session_start();
        if ($_COOKIE['caixa'] == 'aberto') {
            echo '<script>alert("Já exixte um caixa aberto!")</script>';
            echo '<script>window.location="/caixa"</script>';
            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {

    }

    ?>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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

    {!!Form::open(array('url'=>'caixa','method'=>'POST','autocomplete'=>'off'))!!}<!-- Metodo POST está passando informação -->
    {{Form::token()}}
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

                </article>
            </section>


        </div>
    </div>
    </body>

    {!!Form::close()!!}

@stop

<style>

    #menu ul li {
        display: inline;
    }
    p.alinha{padding-left: 1.0em }<

</style>
