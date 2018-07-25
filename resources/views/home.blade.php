@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Persianas Capricho</div>

              <?php
                echo '<script>alert("Logado! Persianas Capricho!")</script>';
                echo '<script>window.location="venda/venda"</script>';

                ?>

            </div>
        </div>
    </div>
</div>
@endsection
