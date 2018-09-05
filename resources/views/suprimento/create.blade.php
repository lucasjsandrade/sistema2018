@extends('layouts.admin')
@section('conteudo')
    <?php
    global $idusuario;
    global $last_id;
    $idusuario = Auth::user()->id;
    $last_id = DB::table('caixa')->orderBy('idcaixa', 'DESC')->first();

    try {


        if($last_id->situacao == 'Aberto'){

            //Libera o Formulario

        }


        if($last_id->situacao !== 'Aberto'){

            echo '<script>alert("Para Realizar uma Suprimento o Caixa deve estar aberto! Por favor faça a abertura do Caixa.")</script>';
            echo '<script>window.location="/caixa/create"</script>';
            exit;
        }
    }
    catch (\Exception $Exception) {


    }

    ?>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Novo suprimento</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::open(array('url'=>'suprimento','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="sangria">Valor do suprimento</label>
                        <span class="ob">*</span>
                        <input type="number" name="suprimento" required value="{{old('suprimento')}}" class="form-control"
                               placeholder="Informe o valor do suprimento">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao"  value="{{old('descricao')}}" class="form-control">
                    </div>
                </div>


                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
                        <button class="btn btn-danger" type="reset" onclick="javascript: location.href='/contaspagar';">
                            Cancelar
                        </button>

                    </div>
                </div>
                {!!Form::close()!!}


            </div>
        </div>

@stop