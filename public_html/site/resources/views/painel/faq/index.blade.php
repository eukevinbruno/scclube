@extends('painel.admin')

@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FAQ
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="padding-left: 0;">
                    <h3 class="box-title">Listagem de Perguntas</h3>
                </div>  
                <div class="col-md-6 text-right">
                    <a href='faq/novo' class="btn btn-md btn-success"><i class="fa fa-plus"></i> Nova Pergunta</a>
                </div>  
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="80%">Pergunta</th>
                  <th width="10%">Ordem</th>
                  <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($faq as $item)
                    <tr>
                      <td>{{ $item->pergunta }}</td>
                      <td>{{ $item->ordem }}</td>
                      <td>
                          <a href='/painel/faq/editar/{{ $item->id }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                          <a href='/painel/faq/excluir/{{ $item->id }}' class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Excluir</a>
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