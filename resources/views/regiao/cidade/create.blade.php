@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Cadastro de Cidade</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'regiao/cidade','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">  
            <div class="form-group">
            	<label for="nomeCidade">Nome Cidade</label>
            	<input type="text" name="nomeCidade" class="form-control" placeholder="Nome...">
            </div>            
               
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">      
            <div class="form-group">
             <label>Estado</label>
               <select name="idestado" class="form-control">
                @foreach($estado as $est)
                              <option value="{{$est->idestado}}">
                              {{$est->nomeEstado}}
                              </option>
                @endforeach
                </select>
            </div>
         </div>

        <div class="col-lg-1 col-sm-1 col-xs-1">
         <div class="form-group">
             <a href=/regiao/estado/create target="_blank"><button class="btn btn-primary" type="button" style="
              position: absolute;
              top:25px;
              left: 0px;
              "/> Novo estado </button></a>
         </div>
       </div>
                        
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">      
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Confirmar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>            	
            </div>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop