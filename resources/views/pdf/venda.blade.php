<?php  global  $soma_total; global $soma_vendas;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Vendas</h1>
    <title><h1>Relatório de Vendas</h1></title>
    <style type="text/css">
        li {
            color:red;
        }
    </style>
</head>
<body>
<table class="table table-condensed">
    <thead>
    <tr>
        <th>Numero da Venda:</th>
        <th>Data Venda:</th>
        <th>Condicao de Pagamento:</th>
        <th>Valor da Venda:</th>


    </tr>


    </thead>

    <tbody>

    @forelse($venda as $v)
        <tr>

            <td>{{$v->idvenda}}</td>
            <td>{{ converteData($v->dataVenda)}}</td>
            <td>{{$v->condicaoPagamento}}</td>
            <td>{{'R$ '.$v->valorTotal}}</td>

            <?php $soma_total =$soma_total   + $v->valorTotal;?>
            <?php $soma_vendas = $soma_vendas + 1; ?>



        </tr>


    @empty

<tr>
    <li>Nenhuma Venda no Período.</li>

</tr>


    @endforelse
    <tr>
        <th>Vendas no período:</th>
        <td></td>
        <td></td>
        <th>Total de Vendas:</th>
    </tr>
    <th><?php echo $soma_vendas; ?></th>
    <th></th>
    <th></th>
    <th><?php echo 'R$ '.$soma_total; ?></th>


    </tbody>


</table>
</body>
</html>

