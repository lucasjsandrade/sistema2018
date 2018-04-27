<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Persianas Capricho</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo e(asset('css/_all-skins.min.css')); ?>">
      <link rel="apple-touch-icon" href="<?php echo e(asset('img/apple-touch-icon.png')); ?>">
      <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>">


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
                    <small class="bg-red">Online</small>
                    <span class="hidden-xs">Lucas Andrade</span>
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
                      <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat">Logout</a>
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
                <i class="fa fa-user"></i>
                <span>Movimentação</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/caixa"><i class="fa fa-group"></i>Caixa</a></li>
                <li><a href="/contaspagar"><i class="fa fa-money "></i>Contas a Pagar</a></li>
                <li><a href="/contasreceber"><i class="fa fa-money "></i>Contas a Receber</a></li>
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
                  <i class="fa fa-shopping-cart"></i>

                  <span>Compras</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a> 

                <ul class="treeview-menu">

                  <li><a href="/compra"><i class="fa fa-shopping-cart"></i>Entradas</a></li>

                  <li><a href="/pedido"><i class="fa fa-pencil-square-o"></i> Pedido</a></li>
                  <li><a href="/venda/agendamento"><i class="fa fa-calendar"></i> Agendamento</a></li>
                </ul>
              </li> 



            <li class="treeview">
              <a href="#">
                <i class="fa fa-lock"></i> <span>Login</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="configuracao/usuario"><i class="fa fa-user"></i> Usuarios</a></li>

             </ul>
           </li>
           <li>
            <a href="#">
              <i class="fa fa-plus-square"></i> <span>Ajuda</span>
              <small class="label pull-right bg-red">PDF</small>
            </a>
          </li>
        -->
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
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="row">
              <div class="col-md-12">
                <!--Conteudo-->
                <?php echo $__env->yieldContent('conteudo'); ?>
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
    <script src="<?php echo e(asset('js/jQuery-2.1.4.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">

      jQuery(function($){
       $(".phone").mask("(99) 9999-9999"); 
       $(".cpf").mask("999.999.999-99"); 
       $("cep").mask("99.999-999");
       $("cnpj").mask("999.999.99-99");

     });


   </script>


 </body>
 </html>
