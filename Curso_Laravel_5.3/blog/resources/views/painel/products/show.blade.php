@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-arrow-left"></span></a>
    Produto: <b>{{$dataProduto->name}}</b>
</h1>
<p><b>Ativo:</b> {{$dataProduto->active}}</p>
<p><b>Number:</b> {{$dataProduto->number}}</p>
<p><b>Categoria:</b> {{$dataProduto->category}}</p>
<p><b>Descrição:</b> {{$dataProduto->description}}</p>

<hr>

@if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}<p>
            @endforeach
        </div>        
@endif

{!! Form::open(['route' => ['produtos.destroy', $dataProduto->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("Deletar Produto: $dataProduto->name", ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection