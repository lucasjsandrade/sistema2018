@extends('layouts.admin')
@section('conteudo')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <h3>Cadastro de Produto</h3>
         @if (count($errors)>0)
         <div class="alert alert-danger">
              <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
              </ul>
        </div>
        @endif
  </div>
</div>


{!!Form::open(array('url'=>'estoque/produto','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
{{Form::token()}}

<div class="row">
     
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                  <label>Categoria</label>
                  <span class="ob">*</span>
                  <select name="idcategoria" class="form-control">
                        @foreach($categorias as $cat)
                        <option value="{{$cat->idcategoria}}">
                              {{$cat->nome}}
                        </option>
                        @endforeach
                  </select>
            </div>            
      </div>

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1">
         <div class="form-group">
             <a href=/estoque/categoria/create target="_blank"><button class="btn btn-primary" type="button" style="
              position: absolute;
              top:25px;
              left: 0px;
              "/>Nova categoria</button></a>
         </div>
       </div>

      <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="form-group">
                  <label>Marca</label>
                  <span class="ob">*</span>
                  <select name="codigo" class="form-control">
                        @foreach($marca as $mar)
                        <option value="{{$mar->codigo}}">
                              {{$mar->nome}}
                        </option>
                        @endforeach
                  </select>
            </div>            
      </div>

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1">
         <div class="form-group">
             <a href=/estoque/marca/create target="_blank"><button class="btn btn-primary" type="button" style="
              position: absolute;
              top:25px;
              left: 0px;
              "/>Nova marca</button></a>
         </div>
       </div>

      <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="form-group">
                <label for="modelo">Modelo</label>
                <span class="ob">*</span>
                <input type="text" name="modelo" required value="{{old('modelo')}}" class="form-control" placeholder="Nome do Produto">
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
            <label for="cor">Cor</label>
            <span class="ob">*</span>
            <input type="text" name="cor" required value="{{old('cor')}}" class="form-control" placeholder="Cor">
      </div>
</div>

<div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
            <label for="material">Material</label>
            <input type="text" name="material"  value="{{old('material')}}" class="form-control" placeholder="Material">
      </div>
</div>
<div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
            <label for="unidadeMedida">Unidade De Medida</label>
            <input type="text" name="unidadeMedida"  value="{{old('unidadeMedida')}}" class="form-control" placeholder="Unidade De Medida">
      </div>
      

</div>

<div class="col-lg-6 col-sm-6 col-xs-12"> 
    <div class="form-group"><br>
        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
        <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/estoque/produto';">Cancelar</button>  

  </div>

</div>


{!!Form::close()!!}		



</div>
</div>
@stop