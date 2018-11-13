
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Produtos</h1>
    <title><h1>Relatório de CLientes</h1></title>
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
        <th>Nome</th>
        <th>Telefone</th>
        <th>Celular</th>
        <th>Email</th>

    </tr>


    </thead>

    <tbody>
    @forelse($cliente as $c)
        <tr>
            <td>{{$c->nomeCliente}}</td>
            <td>{{$c->telefone}}</td>
            <td>{{$c->celular}}</td>
            <td>{{$c->email}}</td>



        </tr>




    @empty



        <li>Nenhum Produto Cadastrado.</li>



    @endforelse

    </tbody>


</table>
</body>
</html>

