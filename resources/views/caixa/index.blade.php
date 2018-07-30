@extends('layouts.admin')
@section('conteudo')

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
                            <li class="list-group-item list-group-item-primary">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <label>Fechar Caixa</label>
                                </a>

                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <p>
                                            <n>Deseja Realmente fechar o Caixa?</n>
                                        </p>
                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a href="{{url('/close')}}" class="btn btn-danger btn-flat">Fechar Caixa</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
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


    <div class="row">
        <h3><p class="alinha">Caixas</p> </h3>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>Numero do Caixa</th>
                    <th>Data</th>
                    <th>Saldo Inicial</th>
                    <th>Saldo Final</th>
                    <th>Diferença</th>
                    <th>Situação</th>
                    <th>Opções</th>


                    </thead>

                    <?php
                    function converteData($data)
                    {
                        return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
                    }
                    ?>
                    @foreach ($caixa as $c)
                        <tr>


                            <td>{{ $c->idcaixa}}</td>
                            <td>{{ converteData($c->data)}}</td>
                            <td>{{ $c->saldoInicial}}</td>
                            <td>{{ $c->saldoFinal}}</td>
                            <td>{{ $c->diferenca}}</td>
                            <td>{{ $c->situacao}}</td>
                            <td>
                                <a href="{{URL::action('CaixaController@show',$c->idcaixa)}}"><button class="btn btn-info">Detalhe</button></a>
                            </td>




                        </tr>


                    @endforeach
                </table>

            </div>
            {{$caixa->render()}}
        </div>
    </div>

@stop

<style>

    #menu ul li {
        display: inline;
    }
    p.alinha{padding-left: 1.0em }<

</style>