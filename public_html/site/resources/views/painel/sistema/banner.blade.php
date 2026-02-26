<?php
if(isset($s)):

    $acao = "editar";
    $return_id = $s->id;
    $return_titulo = $s->titulo;
    $return_subtitulo = $s->subtitulo;
    $return_botao = $s->botao;
    $return_url = $s->url;
    $return_ativo = $s->status;
    $varCheckAtivo = ($return_ativo == 1)? 'checked' : '';
    $varRequired = '';
        
else:    

    $acao = "novo";
    $return_id = '';
    $return_titulo = '';
    $return_subtitulo = '';
    $return_botao = '';
    $return_url = '';
    $varCheckAtivo = 'checked';
    $varRequired = 'required';
    
endif;
?>

@extends('painel.admin')

@section('conteudo')

<?php //$url_base = getenv('URL_BASE'); ?>

<!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gerenciar Slider
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar/Editar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            <form id="formUsuario" method="post" action="/painel/slider/salvar" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo" maxlength="50" value="<?php print $return_titulo; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" name="subtitulo" maxlength="70" value="<?php print $return_subtitulo; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Texto Botão</label>
                                    <input type="text" name="botao" maxlength="20" value="<?php print $return_botao; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Redirecionamento</label>
                                    <input type="text" name="url" maxlength="200" value="<?php print $return_url; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>                    

                        <div class="row">
                            Dimensões: 1920 x 480
                            <div class="col-md-12">
                             <div class="input-group">
                                <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                Procurar… <input type="file" id="imgInp" name="img_banner" required>
                                </span>
                                </span>
                                <input type="text" class="form-control">
                             </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="ativo" <?php print $varCheckAtivo; ?>>
                              Ativo
                            </label>
                          </div>
                        </div>
                    
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btnCadastro pull-right">Enviar Slider</button>
                </div> 

            </form>            
            
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <div class="col-md-6" style="padding-left: 0;">
                    <h3 class="box-title">Sliders</h3>
                </div>  
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="40%">Slider</th>
                  <th width="40%">Titulo</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($banners as $banner)
                    <tr>
                        <td><img src="{{ getenv('URL_BASE') }}/img/slider/{{ $banner->imagem }}" width="400"></td>
                        <td>{{ $banner->titulo }}</td>
                        <td>
                            <a href='/painel/slider/editar/{{ $banner->id }}' class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Editar</a>
                            <a href='/painel/slider/excluir/{{ $banner->id }}' class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Excluir</a>
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
    
@endsection