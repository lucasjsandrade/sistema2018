<?php  global  $soma_total; global $soma_vendas;

function converteData($data)
{
    return $data <> "" ? date('d/m/Y', strtotime($data)) : $data = null;
}


?>
        <!DOCTYPE html>

<html>
<head>
    <h1>Relatório de Vendas</h1>
    <title><h1>Relatório de Vendas</h1></title>
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
        <td>Numero da Venda:</td>
        <td>Data Venda:</td>
        <td>Condicao de Pagamento:</td>
        <td>Valor da Vendaa:</td>


    </tr>


    </thead>

    <tbody>

    @forelse($venda as $v)
        <tr>

            <td>{{$v->idvenda}}</td>
            <td>{{ converteData($v->dataVenda)}}</td>
            <td>{{$v->condicaoPagamento}}</td>
            <td>{{'R$ '.$v->valorTotal}}</td>

            <?php $soma_total =$soma_total   + $v->valorTotal?>
            <?php $soma_vendas = $soma_vendas + 1; ?>



        </tr>


    @empty

<tr>
    <li>Nenhum Produto Cadastrado.</li>

</tr>


    @endforelse
    <tr>
        <td>Vendas no período:</td>
        <td></td>
        <td></td>
        <td>Total de Vendas:</td>
    </tr>
    <th><?php echo $soma_vendas; ?></th>
    <th></th>
    <th></th>
    <th><?php echo 'R$ '.$soma_total; ?></th>


    </tbody>


</table>
</body>
</html>

