<?php  global  $valorFinal; global $soma_caixas;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>
<head>
    <h1>Relatório de Caixa</h1>
    <title><h1>Relatório de Caixa</h1></title>
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
        <td>Numero do Caixa</td>
        <td>Data Abertura:</td>
        <td>Total do Caixa:</td>


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
    <li>Nenhum Caixa Encontrado no período.</li>

</tr>


    @endforelse
    <tr>
        <td>Caixas no período:</td>
        <td></td>
  
        <td>Total:</td>
    </tr>
    <th><?php echo $soma_caixas; ?></th>
    <th></th>

    <th><?php echo 'R$ '.$valorFinal; ?></th>


    </tbody>


</table>
</body>
</html>

