<?php
if(isset($p)):

    $acao = "editar";
    $return_id = $p->id;
    $return_nome = $p->nome;
    $return_imagem = $p->imagem;
    $return_ativo = $p->status;
    $varCheckAtivo = ($return_ativo == 1)? 'checked' : '';
    $varRequired = '';
        
else:    

    $acao = "novo";
    $return_id = '';
    $return_nome = '';
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
        Parceiro
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
            
            
            <form id="formUsuario" method="post" action="/painel/parceiro/salvar" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="<?php print $acao; ?>">
                <input type="hidden" name="id" value="<?php print $return_id; ?>">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="nome" maxlength="100" value="<?php print $return_nome; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"><br></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                               
                             <div class="input-group">
                                <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                Procurar Imagem… <input type="file" id="imagem1" name="img_banner">
                                </span>
                                </span>
                                <input type="text" class="form-control">
                             </div>
                             Dimensões: 120 x 75
                            </div>
                            
                            <div class="col-md-6" id="preview1">
                            </div>
                        </div>
                        
                        <div class="clearfix"><br></div>
                        
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