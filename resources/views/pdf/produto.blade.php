<?php global  $soma_estoque; global $soma_produto;?>
        <!DOCTYPE html>
<html>
<head>
    <h1>Relatório de Produtos</h1>
    <title><h1>Relatório de Produtos</h1></title>
    <style type="text/css">
        table {
            width: 80%;
            magin: 0;
            border: 1px solid;

        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>Categoria</td>
        <td>Modelo do Produto</td>
        <td>Quantidade em Estoque</td>

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
        <td>Produtos Ativos</td>
        <td>Total de Produtos em Estoque</td>
    </tr>
    <th><?php echo $soma_produto; ?></th>
    <th><?php echo $soma_estoque;?></th>

    </tbody>


</table>
</body>
</html>

