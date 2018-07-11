@extends('layouts.admin')
@section('conteudo')
    <?php

    try {
        //session_start();
        if ($_COOKIE['caixa'] == 'aberto') {

            //Sessão Liberada.
        }
    } catch (\Exception $Exception) {
        echo '<script>alert("O Caixa Não está aberto,faça a abertura do Caixa!")</script>';
        unset($_COOKIE['cixa']);
        echo '<script>window.location="caixa/create"</script>';
    }

    ?>
    <div class="row">
        <head>
            <meta charset="utf-8">
            <title>Caixa</title>
        </head>
    </div>
    <body>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section>
                <header>
                    <nav id="menu">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><a href="caixa/create">Abrir
                                    Caixa</a></a></li>
                            <li class="list-group-item list-group-item-primary"><a href="/contaspagar">Contas A
                                    Pagar</a></li>
                            <li class="list-group-item"><a href="/contasreceber">Contas A Receber</a></li>
                            <li class="list-group-item"><a href="/pagamento">Pagamento</a></li>
                            <a href="/venda/venda"><button class="btn btn-danger" onClick="alert(<?php setcookie("caixa"); ?>.'Caixa encerrado com Sucesso!'); return true">Fechar Caixa</button><a>

                        </ul>
                    </nav>


                </header>
                <br>

            </section>
        </div>
    </div>
    </body>

    </div>

    <section>
        <article>
            <br><br>
            <h1></h1>
        </article>

    </section>


@stop


<style>

    #menu ul li {
        display: inline;
    }


</style>