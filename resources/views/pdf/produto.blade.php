<?php global  $soma_estoque; global $soma_produto;?>
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Produtos</h1>
    <title><h1>Relatório de Produtos</h1></title>
    <style type="text/css">
       li{
           color:red;
       }
    </style>
</head>
<body>
<table class="table table-condensed">
    <thead>
    <tr>
        <th>Categoria</th>
        <th>Modelo do Produto</th>
        <th>Quantidade em Estoque</th>

    </tr>


    </thead>

    <tbody>
    @forelse($produto as $p)
        <tr>
            <td>{{$p->nome}}</td>
            <td>{{$p->modelo}}</td>
            <td>{{$p->quantidade}}</td>

            <?php $soma_estoque = $p->quantidade + $soma_estoque;?>
            <?php $soma_produto = $p->total + $soma_produto;?>
        </tr>




    @empty



        <li>Nenhum Produto Cadastrado.</li>



    @endforelse
    <tr>
        <th colspan="1.5">Produtos Ativos</th>
        <th colspan="1.5">Total de Produtos em Estoque</th>
    </tr>
    <th><?php echo $soma_produto; ?></th>
    <td></td>
    <th><?php echo $soma_estoque;?></th>

    </tbody>


</table>
</body>
</html>

