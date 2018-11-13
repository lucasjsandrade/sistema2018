<?php  global  $soma_total;global  $soma_pagamentos; global $soma_compras;

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
    <h1>Relatório de Pagamento</h1>
    <title><h1>Relatório de Pagamento</h1></title>
<style>
    li{
        color:red;
    }

</style>

</head>
<body>
<table class="table table-condensed">

    <thead>
    <tr>
        <td><b>Fornecedor:</b></td>
        <td><b>Compra N°:</b></td>
        <td><b>Parcelas:</b></td>
        <td><b>Valor da Compra:</b></td>
        <td><b>Parcela N°:</b></td>
        <td><b>N° Pagamento:</b></td>
        <td><b>Data Pagamento:</b></td>
        <td><b>Valor pendente:</b></td>
        <td><b>Valor pago:</b></td>


    </tr>


    </thead>

    <tbody>
    @forelse($pagamento as $p)
        <tr>
            <td>{{$p->razaoSocial}}</td>
            <td>{{$p->idcompra}}</td>
            <td>{{$p->numeroDeParcelas}}</td>
            <td>{{$p->totalCompra}}</td>
            <td>{{$p->idparcela}}</td>
            <td>{{$p->idpagamento}}</td>
            <td>{{ converteData($p->data)}}</td>
            <td>{{$p->valorParcela}}</td>
            <td>{{$p->valorPago}}</td>
        </tr>
        <?php $soma_total = $soma_total + $p->valorPago;
        $soma_pagamentos = $soma_pagamentos + 1;
        ?>




    @empty


        <tr>
            <li><b>Nenhum Pagamento no Periodo.</b></li>

        </tr>

    @endforelse

    <tr cellpadding="5px" cellspacing="0" ID="final">

        <th colspan="4.5"><b>Pagamentos no período:</b><b><?php echo $soma_pagamentos; ?></b></th>

        <th colspan="4.5">Total: <?php echo 'R$ ' . $soma_total; ?><</th>

    </tr>

    </tbody>


</table>
</body>
</html>

