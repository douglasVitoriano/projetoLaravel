@extends('adminlte::page')

@section('title', 'Receita')

@section('content_header')
    <h1>Receita</h1>    
@stop
@section('content')
<div class="box">
    <div class="box-header">    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    </div>
    <div class="box-body">
        <div class="form-group">                   
                    <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                    </div>

                    <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                    </div>                           
                    <div class="form-group">
                        <label for="des">Título:</label>
                        <input type="titulo" class="form-control" name="titulo" placeholder="Título da Receita:" value="{{$cadastroReceitas->titulo}}" readonly>
                    </div>
                    <div class="table-responsive">  
                        <table class="table table-bordered" id="dynamic_field"> 
                            <label for="des">Ingredientes:</label> 
                            @foreach($cadIngredientes as $ingrediente)
                            <tr> 
                                <td><input type="text" name="name[]" placeholder="Ingredientes" class="form-control name_list" value="{{$ingrediente->ingrediente}}" readonly/></td>                                 
                            </tr>
                            @endforeach
                        </table>                            
                    </div>
                    <div class="form-group">  
                        <label for="des">Modo de Preparo:</label>              
                        <textarea name="modo_preparo" id="des" cols="20" rows="5" class="form-control" readonly>{{$cadastroReceitas->modo_preparo}}</textarea>                  
                    </div>
                    <div class="box-footer clearfix">                        
                        <form action="{{route('listareceitas.destroy', $cadastroReceitas->id)}}" method="post">
                            {{method_field('delete')}}
                            {!! csrf_field() !!}
                            <a href="{{route('admin.listareceitas')}}" class="btn btn-primary">
                                Voltar 
                            </a> 
                            <button class="btn btn-danger" type="submit">Delete</button>           
                        </form>        
                </div>     
        </div>        
    </div>         
</div>


@stop

