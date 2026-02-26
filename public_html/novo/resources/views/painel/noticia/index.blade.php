@extends('painel.admin')

@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notícias
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="padding-left: 0;">
                    <h3 class="box-title">Listagem de Notícias</h3>
                </div>  
                <div class="col-md-6 text-right">
                    <a href='noticia/novo' class="btn btn-md btn-success"><i class="fa fa-plus"></i> Nova Notícia</a>
                </div>  
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="80%">Titulo</th>
                  <th width="10%">Status</th>
                  <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($noticias as $noticia)
                    <tr>
                      <td>{{ $noticia->titulo }}</td>
                      <td>{{ ($noticia->status == 1) ? "Ativo" : "Inativo" }}</td>
                      <td>
                          <a href='/painel/noticia/editar/{{ $noticia->id }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                          <a href='/painel/noticia/excluir/{{ $noticia->id }}' class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Excluir</a>
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