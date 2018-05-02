@extends('layouts.admin')
@section('conteudo')
<div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <h3>Cadastro Funcionario</h3>
         @if (count($errors)>0) <!-- Se existir erro vai mostrar um alerta e vai listar os erros --> 
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

         {!!Form::open(array('url'=>'pessoa/funcionario','method'=>'POST','autocomplete'=>'off'))!!}<!-- Metodo POST está passando informação -->
            {{Form::token()}}
             
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                   <label for="nomeFuncionario">Nome</label>
                   <span class="ob">*</span>
                   <input type="text" name="nomeFuncionario" required value="{{old('nomeFuncionario')}}" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group ">
                   <label for="rg">RG</label>
                   <span class="ob">*</span>
                   <input type="text" name="rg" required value="{{old('rg')}}" class="form-control" placeholder="RG">
                </div>
            </div>
           <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group ">
               <label for="cpf">CPF</label>
               <span class="ob">*</span>
               <input type="text" name="cpf" required value="{{old('cpf')}}" class="cpf form-control" placeholder="Informe o CPF">
             </div>
            </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="sexo">Sexo</label>
            <span class="ob">*</span>
            <select name="sexo" id="sexo" class="form-control">
             <option value="M">M</option> 
             <option value="F">F</option>
             </select>
         </div>
        </div>
       <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" value="{{old('telefone')}}" class="phone form-control"
            placeholder="Telefone">
         </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" 
            value="{{old('celular')}}" class="celular form-control"
            placeholder="Celular">
         </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="whatsapp">Whatsapp</label>
            <input type="text" name="whatsapp" value="{{old('whatsapp')}}" class="celular form-control"
            placeholder="whatsapp">
         </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" 
            value="{{old('email')}}" class="form-control"
            placeholder="email">
         </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <span class="ob">*</span>
            <input type="text" name="logradouro" required value="{{old('logradouro')}}" class="form-control"
            placeholder="logradouro">
         </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="numero">Numero</label>
            <span class="ob">*</span>
            <input type="text" name="numero" required value="{{old('numero')}}" class="form-control"
            placeholder="numero">
         </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12"> 
         <div class="form-group">
            <label for="bairro">Bairro</label>
            <span class="ob">*</span>
            <input type="text" name="bairro" required value="{{old('bairro')}}" class="form-control"
            placeholder="bairro">
         </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="cep">CEP</label>
            <span class="ob">*</span>
            <input type="text" name="cep" required value="{{old('cep')}}" class="cep form-control"
            placeholder="cep">
         </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-xs-12">
         <div class="form-group">
            <label for="datanascimento">Data Nascimento</label>
            <span class="ob">*</span>
            <input type="date" name="dataNascimento" required value="{{old('dataNascimento')}}" class="form-control">
         </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
             <div class="form-group">
                  <label>Cidade</label>
                  <span class="ob">*</span>
                  <select name="idcidade" class="form-control">
                     @foreach($cidade as $cid)
                     <option value="{{$cid->idcidade}}"><!-- Aqui vai recuperar o objeto do banco -->
                     {{$cid->nomeCidade}}
                     </option>
                     @endforeach
                  </select>
             </div> 
            </div>

           
            <div class="form-group">
                  <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Confirmar</button>
                  <button class="btn btn-danger" type="reset"  onclick="javascript: location.href='/pessoa/funcionario';">Cancelar</button>
            
           <a href=/regiao/cidade/create target="_blank"><button class="btn btn-primary" type="button">Nova Cidade </button></a>
           </div>

         {!!Form::close()!!}     
            
      </div>
   </div>
@stop