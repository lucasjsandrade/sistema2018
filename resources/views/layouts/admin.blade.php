<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Persianas Capricho</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="/estoque/produto" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Persianas Capricho</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegação</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <small class="bg-green">Online</small>
                            <span class="hidden-xs">Administrador</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                <p>
                                    Estagio Supervisionado 2018
                                    <small></small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Região</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="/regiao/pais"><i class="fa fa-flag"></i> País</a></li>
                        <li><a href="/regiao/estado"><i class="fa fa-flag-o"></i> Estado</a></li>
                        <li><a href="/regiao/cidade"><i class="fa fa-building-o"></i> Cidade</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Estoque</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/estoque/produto"><i class="fa fa-cubes"></i> Produtos</a></li>
                        <li><a href="/estoque/categoria"><i class="fa fa-inbox"></i> Categorias</a></li>
                        <li><a href="/estoque/marca"><i class="fa fa-tags"></i> Marca</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Pessoa</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/pessoa/fornecedor"><i class="fa fa-group"></i>Fornecedor</a></li>
                        <li><a href="/pessoa/cliente"><i class="fa fa-user-plus"></i>Cliente</a></li>
                        <li><a href="/pessoa/funcionario"><i class="fa fa-user-plus"></i>Funcionario</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-money "></i>
                        <span>Movimentação</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/caixa"><i class="fa fa-calculator" aria-hidden="true"></i>Caixa</a></li>
                        <li><a href="/pagamento"><i class="fa fa-calculator" aria-hidden="true"></i>Pagamento</a></li>
                        <li><a href="/recebimento"><i class="fa fa-calculator" aria-hidden="true"></i>Recebimento</a>
                        </li>
                        <li><a href="/contaspagar"><i class="fa fa-money "></i>Contas a Pagar</a></li>
                        <li><a href="/contasreceber"><i class="fa fa-money "></i>Contas a Receber</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Compras</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="/compra/compra"><i class="fa fa-shopping-cart"></i>Entradas</a></li>
                        <li><a href="/compra/pedido"><i class="fa fa-pencil-square-o"></i> Pedido</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Vendas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/venda/agendamento"><i class="fa fa-calendar"></i> Agendamento</a>
                        <li><a href="/venda/orcamento"><i class="fa fa-calendar"></i> Orcamentos</a></li>
                        <li><a href="/venda/venda"><i class="fa fa-calendar"></i> Vendas</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-lock"></i> <span>Login</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/seguranca/usuario"><i class="fa fa-user"></i> Usuarios</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i><span>Relatórios</span>
                        <small class="label pull-right bg-red">PDF</small>

                        <ul class="treeview-menu">
                            <li><a href="/pdf/caixa"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Caixa</a></li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="/pdf/compra"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Compras</a>
                            </li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="/pdf/venda"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Vendas</a></li>
                        </ul>

                        <ul class="treeview-menu">
                            <li><a href="/pdf/pagamento"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Pagamento</a>
                            </li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="/pdf/recebimento"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Recebimento</a>
                            </li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="/pdf/produtoGetPDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Produtos</a>
                            </li>
                        </ul>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-info-circle"></i> <span>Sobre...</span>
                        <small class="label pull-right bg-yellow">IT</small>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sistema Persianas Capricho</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Conteudo-->
                                @yield('conteudo')
                                <!--Fim Conteudo-->
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        c<b>Versão</b
    </div>
    <strong>Estagio Supervisionado <a </a>.</strong> 4 Ano.
</footer>


<!-- jQuery 2.1.4 -->
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@stack('scripts')
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">

    jQuery(function ($) {
        $(".celular").mask("(99) 99999-9999");
        $(".phone").mask("(99) 9999-9999");
        $(".cpf").mask("999.999.999-99");
        $(".cep").mask("99.999-999");
        $(".cnpj").mask("99.999.999/9999-99");

    });


    $('#cnpj').blur(
        function () {
            if (validarCNPJ($(this).val())) {
                //alert('CNPJ válido');
            } else {
                alert('CNPJ Invállido');
                $('#cnpj').val('');
            }


        }
    );

    function validarCNPJ(cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g, '');

        if (cnpj == '')
            return false;

        if (cnpj.length != 14)
            return false;

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;

        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;
    }


    $('.cpf').blur(
        function () {
            if (validaCpf($(this).val())) {
                //alert('CPF Válido');
            } else {
                alert('CPF Invállido');
                $('.cpf').val('');
            }
        }
    )

    function validaCpf(valor) {
        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');
        if (valor == "00000000000" ||
            valor == "11111111111" ||
            valor == "22222222222" ||
            valor == "33333333333" ||
            valor == "44444444444" ||
            valor == "55555555555" ||
            valor == "66666666666" ||
            valor == "77777777777" ||
            valor == "88888888888" ||
            valor == "99999999999") {
            return false;
        } else {
            // Captura os 9 primeiros dígitos do CPF
            // Ex.: 02546288423 = 025462884
            var digitos = valor.substr(0, 9);

            // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
            var novo_cpf = calc_digitos_posicoes(digitos);

            // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
            var novo_cpf = calc_digitos_posicoes(novo_cpf, 11);


            // Verifica se o novo CPF gerado é idêntico ao CPF enviado
            if (novo_cpf === valor) {
                // CPF válido
                return true;
            } else {
                // CPF inválido
                return false;
            }
        }
    }

    function calc_digitos_posicoes(digitos, posicoes = 10, soma_digitos = 0) {
        // Garante que o valor é uma string
        digitos = digitos.toString();

        // Faz a soma dos dígitos com a posição
        // Ex. para 10 posições:
        //   0    2    5    4    6    2    8    8   4
        // x10   x9   x8   x7   x6   x5   x4   x3  x2
        //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
        for (var i = 0; i < digitos.length; i++) {
            // Preenche a soma com o dígito vezes a posição
            soma_digitos = soma_digitos + (digitos[i] * posicoes);

            // Subtrai 1 da posição
            posicoes--;

            // Parte específica para CNPJ
            // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
            if (posicoes < 2) {
                // Retorno a posição para 9
                posicoes = 9;
            }
        }

        // Captura o resto da divisão entre soma_digitos dividido por 11
        // Ex.: 196 % 11 = 9
        soma_digitos = soma_digitos % 11;

        // Verifica se soma_digitos é menor que 2
        if (soma_digitos < 2) {
            // soma_digitos agora será zero
            soma_digitos = 0;
        } else {
            // Se for maior que 2, o resultado é 11 menos soma_digitos
            // Ex.: 11 - 9 = 2
            // Nosso dígito procurado é 2
            soma_digitos = 11 - soma_digitos;
        }

        // Concatena mais um dígito aos primeiro nove dígitos
        // Ex.: 025462884 + 2 = 0254628842
        var cpf = digitos + soma_digitos;

        // Retorna
        return cpf;
    }

</script>


</body>
</html>
