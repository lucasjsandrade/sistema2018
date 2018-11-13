<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Contas Receber</h1>
    <title><h1>Relatório de Contas Pendente</h1></title>
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
        <th>Numero da Conta</th>
        <th>Valor</th>
        <th>Data Vencimento</th>
        <th>Numero da Parcela</th>
        <th>Parcela da Parcela :</th>
        <th>Cliente</th>
        <th>Telefone</th>

    </tr>


    </thead>

    <tbody>

    <?php
    function converteData($data)
    {
        return  $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
    }
    ?>
    @forelse($contasreceber as $c)


        <tr>
            <td>{{$c->idcontasr}}</td>
            <td>{{$c->valorParcela}}</td>
            <td>{{ converteData($c->dataVencimento)}}</td>
            <td>{{$c->idparcela}}</td>
            <td>{{$c->status}}</td>
            <td>{{$c->nomeCliente}}</td>
            <td>{{$c->telefone}}</td>




        </tr>




    @empty



        <li>Nenhum Conta Pendente.</li>



    @endforelse

    </tbody>


</table>
</body>
</html>

