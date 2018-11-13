
        <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <h1>Relatório de Fornecedores</h1>
    <title><h1>Relatório de Fornecedores</h1></title>
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
        <th>Fornecedor</th>
        <th>Telefone</th>
        <th>Email</th>

    </tr>


    </thead>

    <tbody>
    @forelse($fornecedor as $f)
        <tr>
            <td>{{$f->razaoSocial}}</td>
            <td>{{$f->telefone}}</td>
            <td>{{$f->email}}</td>



        </tr>




    @empty



        <li>Nenhum Produto Cadastrado.</li>



    @endforelse

    </tbody>


</table>
</body>
</html>

