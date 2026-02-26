@extends('painel.admin')

@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vídeos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="padding-left: 0;">
                    <h3 class="box-title">Listagem de Vídeos</h3>
                </div>  
                <div class="col-md-6 text-right">
                    <a href='video/novo' class="btn btn-md btn-success"><i class="fa fa-plus"></i> Novo Vídeo</a>
                </div>  
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Vídeo</th>
                  <th>Título</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                      <td><iframe width="280" height="160" src="{{ $video->embed }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
                      <td>{{ $video->titulo }}</td>
                      <td>{{ ($video->status == 1) ? "Ativo" : "Inativo" }}</td>
                      <td>
                          <a href='/painel/video/editar/{{ $video->id }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                          <a href='/painel/video/excluir/{{ $video->id }}' class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Excluir</a>
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