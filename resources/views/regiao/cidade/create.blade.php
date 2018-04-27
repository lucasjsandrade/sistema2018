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
            
            <div class="form-group">
            	<label for="nomeCidade">Nome Cidade</label>
            	<input type="text" name="nomeCidade" class="form-control" placeholder="Nome...">
            </div>
            

               
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

         <div class="form-group">   
           <button type="button" onclick="javascript: location.href='/regiao/estado';" style="
                  height: 35px;
                  padding: 10px;
                  border-radius: 10px;
                  background: #3c8dbc;
                  color: white;
                  text-align: center;
                  
                  
              "/>Novo Estado</button>
              </div>
                        
                 
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Confirmar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            	
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop