@extends('layouts.admin')
@section('conteudo')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Contas a pagar</h3>
   @if (count($errors)>0)
   <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {!!Form::open(array('url'=>'contaspagar','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
  {{Form::token()}}

  <div class="row">   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
       <label for="descricao">Descricao</label>
       <span class="ob">*</span>
       <input type="text" name="descricao" required value="{{old('descricao')}}"  class="form-control" placeholder="descricao">
     </div>
   </div> 

   <div class="row">   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="valor">Valor</label>
        <span class="ob">*</span>
        <input type="text" name="valor" required value="{{old('descricao')}}"  class="form-control" placeholder="valor">
      </div>
    </div> 

   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="data">Data</label>
      <span  class="ob">*</span>
      <input type="date" name="data" required value="{{old('data')}}" class="form-control">
    </div>
  </div>
</div>



<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
 <div class="form-group">
   <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
   <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/contaspagar';">Cancelar</button>

 </div>
</div>
{!!Form::close()!!}		


</div>
</div>

@stop