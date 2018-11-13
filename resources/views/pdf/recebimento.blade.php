<?php  global  $soma_total;global  $soma_recebimentos; global $soma_vendas;

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
    <h1>Relatório de Recebimento</h1>
    <title><h1>Relatório de Recebimento</h1></title>


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
        <th><b>Cliente:</b></th>
        <th><b>Venda N°:</b></th>
        <th><b>Parcelas:</b></th>
        <th><b>Valor da venda:</b></th>
        <th><b>Parcela N°:</b></th>
        <th><b>N° Recebimento:</b></th>
        <th><b>Data Recebimento:</b></th>
        <th><b>Valor pendente:</b></th>
        <th><b>Valor pago:</b></th>


    </tr>


    </thead>

    <tbody>
    @forelse($recebimento as $r)
        <tr class="even">
            <td>{{$r->nomeCliente}}</td>
            <td>{{$r->idvenda}}</td>
            <td>{{$r->numeroDeParcelas}}</td>
            <td>{{$r->valorTotal}}</td>
            <td>{{$r->idparcela}}</td>
            <td>{{$r->idrecebimento}}</td>
            <td>{{ converteData($r->data)}}</td>
            <td>{{$r->valorParcela}}</td>
            <td>{{$r->valorRecebido}}</td>
        </tr>
        <?php $soma_total = $soma_total + $r->valorRecebido;
        $soma_recebimentos = $soma_recebimentos + 1;
        ?>




    @empty


        <tr>
            <li><b>Nenhum Recebimento no Periodo.</b></li>

        </tr>

    @endforelse

    <tr class="even">

        <th colspan="4.5"><b>Pagamentos no período:</b><b><?php echo $soma_recebimentos; ?></b></th>

        <th colspan="4.5">Total: <?php echo 'R$ ' . $soma_total; ?><</th>

    </tr>

    </tbody>


</table>
</body>
</html>

