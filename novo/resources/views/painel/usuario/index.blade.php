@extends('painel.admin')

@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuários
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="padding-left: 0;">
                    <h3 class="box-title">Listagem de Usuários</h3>
                </div>  
                <div class="col-md-6 text-right">
                    <a href='usuario/novo' class="btn btn-md btn-success"><i class="fa fa-plus"></i> Novo Usuário</a>
                </div>  
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Usuário</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                      <td>{{ $usuario->nome }}</td>
                      <td>{{ $usuario->login }}</td>
                      <td>{{ ($usuario->ativo == 1) ? "Ativo" : "Inativo" }}</td>
                      <td>
                          <a href='/painel/usuario/editar/{{ $usuario->id }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                      </td>
                    </tr>
                @endforeach 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection