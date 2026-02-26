@extends('painel.admin')

@section('conteudo')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Páginas
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="padding-left: 0;">
                    <h3 class="box-title">Listagem de Páginas</h3>
                </div>  
                <div class="col-md-6 text-right">
                    <a href='pagina/novo' class="btn btn-md btn-success"><i class="fa fa-plus"></i> Nova Página</a>
                </div>  
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="80%">Titulo</th>
                  <th width="10%">Status</th>
                  <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                <?php //die("<PRE>" . print_r($paginas,1)); ?> 
                    
                <tr> 
                  <td><i class='fa fa-arrow-circle-o-right'></i> Home</td>
                  <td>Ativo</td>
                  <td>
                      <a href='#' class="btn btn-xs btn-default disabled"><i class="fa fa-pencil"></i> Editar</a>
                  </td>
                </tr>
                    
                <?php foreach($paginas['n0'] as $n0): ?>
                    <tr> 
                      <td><i class='fa fa-arrow-circle-o-right'></i> {{ $n0['titulo'] }}</td>
                      <td>{{ ($n0['status'] == 1) ? "Ativo" : "Inativo" }}</td>
                      <td>
                          <a href='/painel/pagina/editar/{{ $n0['id'] }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                      </td>
                    </tr>
                    <?php 
                    if(isset($paginas['n1'][$n0['titulo']])):
                    foreach($paginas['n1'][$n0['titulo']] as $n1): ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa  fa-level-down'></i> {{ $n1['titulo'] }}</td>
                          <td>{{ ($n1['status'] == 1) ? "Ativo" : "Inativo" }}</td>
                          <td>
                              <a href='/painel/pagina/editar/{{ $n1['id'] }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                          </td>
                        </tr>
                        <?php 
                        if(isset($paginas['n2'][$n1['titulo']])):
                        foreach($paginas['n2'][$n1['titulo']] as $n2): 
                        ?>
                            <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa  fa-level-down'></i> {{ $n2['titulo'] }}</td>
                              <td>{{ ($n2['status'] == 1) ? "Ativo" : "Inativo" }}</td>
                              <td>
                                  <a href='/painel/pagina/editar/{{ $n2['id'] }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                              </td>
                            </tr>
                        <?php
                        endforeach; 
                        endif;
                        ?>
                    <?php 
                    endforeach; 
                    endif;
                    ?>
                <?php endforeach; ?>
                            
                    <tr> 
                        <td><i class='fa fa-arrow-circle-o-right'></i> Contato</td>
                        <td>Ativo</td>
                        <td>
                            <a href='#' class="btn btn-xs btn-default disabled"><i class="fa fa-pencil"></i> Editar</a>
                        </td>
                    </tr>        
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