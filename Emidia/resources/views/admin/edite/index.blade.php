@extends('adminlte::page')

@section('title', 'Cadastro Receitas')

@section('content_header')
    <h1>Cadastro de Receitas</h1>    
@stop
@section('content')
<div class="box">
    <div class="box-header">    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    </div>
    <div class="box-body">
        <div class="form-group">
                <form name="add_name" id="add_name" method="post" action="{{route('listareceitas.update', $cadastroReceitas->id)}}"> 
                    {!! method_field('put') !!}
                    {!! csrf_field() !!}
                    <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                    </div>

                    <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                    </div>                           
                    <div class="form-group">
                        <label for="des">Título:</label>
                        <input type="titulo" class="form-control" name="titulo" placeholder="Título da Receita:" value="{{$cadastroReceitas->titulo}}" required>
                    </div>
                    <div class="table-responsive">  
                        <table class="table table-bordered" id="dynamic_field"> 
                            <label for="des">Ingredientes:</label>  
                            @foreach($cadIngredientes as $ingrediente)                           
                            <tr> 
                                <td><input type="text" name="name[]" placeholder="Ingredientes" class="form-control name_list" value="{{$ingrediente->ingrediente}}" required/></td>                                 
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add Item.</button></td>
                            </tr>  
                            @endforeach                                                      
                        </table>                            
                    </div>
                    <div class="form-group">  
                        <label for="des">Modo de Preparo:</label>              
                        <textarea name="modo_preparo" id="des" cols="20" rows="5" class="form-control" required>{{$cadastroReceitas->modo_preparo}}</textarea>                  
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="btn btn-primary" id="sendReceita">Salvar</i></button>
                </div>   
                </form>  
        </div>        
    </div>         
</div>
@stop

