@extends('adminlte::page')

@section('title', 'Lista Receitas')


@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Receitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th style="width: 182px;">ID</th>
                <th style="width: 224px;">Título</th>
                <th style="width: 100px;">Ações</th></tr>
                </thead>
                <tbody>                
                @foreach($cadastroReceitas as $receita)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$receita->id}}</td>
                  <td>{{$receita->titulo}}</td> 
                  <td>
                      <a href="{{route('listareceitas.show', $receita->id)}}" class="actions open">
                          <span class="glyphicon glyphicon-eye-open"></span>
                      </a>
                      <a href="{{route('listareceitas.edit', $receita->id)}}" class="actions edit">
                          <span class="glyphicon glyphicon-pencil"></span>
                      </a>
                  </td>                 
                </tr>                    
                @endforeach
                </tbody>                
              </table>
              {!! $cadastroReceitas->links() !!}
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
@stop