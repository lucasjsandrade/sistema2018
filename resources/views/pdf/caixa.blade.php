<?php  global  $valorFinal; global $soma_caixas;

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
    <h1>Relatório de Caixa</h1>
    <title><h1>Relatório de Caixa</h1></title>
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
        <th>Numero do Caixa</th>
        <th>Data Abertura:</th>
        <th>Total do Caixa:</th>


    </tr>


    </thead>

    <tbody>

    @forelse($caixa as $c)
        <tr>

            <td>{{$c->idcaixa}}</td>
            <td>{{ converteData($c->data)}}</td>
            <td>{{'R$ '.$c->saldoFinal}}</td>

            <?php $valorFinal =$valorFinal   + $c->saldoFinal;?>
            <?php $soma_caixas = $soma_caixas + 1; ?>



        </tr>


    @empty

<tr>
    <li id="msg">Nenhum Caixa Encontrado no período.</li>

</tr>


    @endforelse
    <tr>
        <th colspan="1.5">Caixas no período:</th>
        <th colspan="1.5">Total:</th>
    </tr>
    <th colspan="1.5"><?php echo $soma_caixas; ?></th>
    <th colspan="1.5"><?php echo 'R$ '.$valorFinal; ?></th>


    </tbody>


</table>
</body>
</html>

