<?php
if(isset($p)):

    $acao = "editar";
    $return_id = $p->id;
    $return_parent_id = $p->parent_id;
    $return_slug = $p->slug;
    $return_titulo = $p->titulo;
    $return_texto = $p->texto;
    $return_redir = $p->redir;
    $return_tag = $p->tag;
    $return_resumo = $p->resumo;
    $return_icone = $p->icone;
    $return_video = $p->video;
    $return_ordem = $p->ordem;
    $return_ativo = $p->status;
    $varCheckAtivo = ($return_ativo == 1)? 'checked' : '';
    $varRequired = '';
        
else:    

    $acao = "novo";
    $return_id = '';
    $return_parent_id = '';
    $return_slug = '';
    $return_titulo = '';
    $return_texto = '';
    $return_redir = '';
    $return_tag = '';
    $return_resumo = '';
    $return_icone = '';
    $return_video = '';
    $return_ordem = '';
    $varCheckAtivo = 'checked';
    $varRequired = 'required';
    
endif;
?>


@extends('painel.admin')

@section('conteudo')

<!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Página
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
            
            
            <form id="formUsuario" method="post" action="/painel/pagina/salvar" enctype="multipart/form-data">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Selecione item pai</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ ($return_parent_id == $menu->id) ? "selected" : "" }}>{{ $menu->titulo }}</option>
                                        @endforeach;
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ordem</label>
                                    <input type="text" name="ordem" maxlength="2" value="<?php print $return_ordem; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="editor1" style="height : 1000px;" name="texto"><?php print $return_texto; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Resumo</label>
                                    <textarea class="form-control" style="height : 60px;" name="resumo" maxlength="200"><?php print $return_resumo; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tag de agrupamento</label>
                                    <input type="text" name="tag" maxlength="100" value="<?php print $return_tag; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Redirecionamento</label>
                                    <input type="text" name="redir" maxlength="200" value="<?php print $return_redir; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ícone</label>
                                    <input type="text" name="icone" maxlength="100" value="<?php print $return_icone; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vincula Galeria de Vídeos?</label>
                                    <select name="video" class="form-control">
                                        <option value="0" <?php if($return_video == 0) echo('selected'); ?>>Não</option>
                                        <option value="1" <?php if($return_video == 1) echo('selected'); ?>>Sim</option>
                                    </select>
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