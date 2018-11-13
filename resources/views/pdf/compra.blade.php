<?php  global  $soma_total; global $soma_compras;

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
    <h1>Relatório de Compras</h1>
    <title><h1>Relatório de Compras</h1></title>
    <style type="text/css">
        li {
            color: red;
        }
    </style>
</head>
<body>
<table class="table table-condensed">

    <thead>
    <tr>
        <th>Numero da Compra:</th>
        <th>Data Compra:</th>
        <th>Condição de Pagamento:</th>
        <th>Valor da Compra:</th>


    </tr>


    </thead>

    <tbody>

    @forelse($compra as $c)
        <tr>

            <td>{{$c->idcompra}}</td>
            <td>{{ converteData($c->dataCompra)}}</td>
            <td>{{$c->condicaoPagamento}}</td>
            <td>{{'R$ '.$c->totalCompra}}</td>

            <?php $soma_total = $soma_total + $c->totalCompra;?>
            <?php $soma_compras = $soma_compras + 1; ?>


        </tr>


    @empty

        <tr>
            <li>Nenhuma Compra no Período.</li>

        </tr>


    @endforelse
    <tr>
        <th>Compras no período:</th>
        <td></td>
        <td></td>
        <th>Total de Compras:</th>
    </tr>
    <th><?php echo $soma_compras; ?></th>
    <th></th>
    <th></th>
    <th><?php echo 'R$ ' . $soma_total; ?></th>


    </tbody>


</table>
</body>
</html>

