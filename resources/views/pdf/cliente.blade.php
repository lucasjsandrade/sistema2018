<!DOCTYPE html>
<html>
<head>
    <h1>Teste PDF</h1>
    <title>
        <h1>...</h1>
    </title>
</head>
<body>
<table>
    <thead>

    </thead>

    <tbody>
    @forelse($cliente as $c)


        <li>{{ $c->nomeCliente }}</li>



    @empty



        <li>Nenhum Produto Cadastrado.</li>



    @endforelse


    </tbody>


</table>
</body>
</html>

