<?php
if(isset($n)):

    $acao = "editar";
    $return_id = $n->id;
    $return_slug = $n->slug;
    $return_titulo = $n->titulo;
    $return_subtitulo = $n->subtitulo;
    $return_texto = $n->texto;
    $return_imagem_chamada = $n->imagem_chamada;
    $return_imagem = $n->imagem;
    $return_ativo = $n->status;
    $varCheckAtivo = ($return_ativo == 1)? 'checked' : '';
    $varRequired = '';
        
else:    

    $acao = "novo";
    $return_id = '';
    $return_slug = '';
    $return_titulo = '';
    $return_subtitulo = '';
    $return_texto = '';
    $return_imagem_chamada = '';
    $return_imagem = '';
    $varCheckAtivo = 'checked';
    $varRequired = 'required';
    
endif;
?>

<style>
    .thumb-image{
        width: 160px;
        height: 100px;
    }
</style>


@extends('painel.admin')

@section('conteudo')

<!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notícia
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
            
            
            <form id="formUsuario" method="post" action="/painel/noticia/salvar" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="<?php print $acao; ?>">
                <input type="hidden" name="id" value="<?php print $return_id; ?>">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        @if($return_id != '')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" maxlength="100" value="<?php print $return_slug; ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo" maxlength="100" value="<?php print $return_titulo; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <textarea rows="3" class="form-control" name="subtitulo"><?php print $return_subtitulo; ?></textarea>
                                </div>
                            </div>
                        </div>
                    
                        
                        
                        <div class="clearfix"><br></div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="editor1"  name="texto"><?php print $return_texto; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"><br></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                               
                             <div class="input-group">
                                <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                Procurar Imagem Chamada… <input type="file" id="imagem1" name="img_chamada" required>
                                </span>
                                </span>
                                <input type="text" class="form-control">
                             </div>
                             Dimensões: 470 x 216    
                            </div>
                            
                            <div class="col-md-6" id="preview1">
                            </div>
                        </div>
                        
                        <div class="clearfix"><br></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                               
                             <div class="input-group">
                                <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                Procurar Imagem Principal… <input type="file" id="imagem2" name="img_principal" required>
                                </span>
                                </span>
                                <input type="text" class="form-control">
                             </div>
                             Dimensões: 1920 x 480    
                            </div>
                            
                            <div class="col-md-6" id="preview2">
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
                    <button type="submit" id="razao-salvar" class="btn btn-primary btnCadastro pull-right">Salvar</button>
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
    
@endsection