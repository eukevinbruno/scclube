<?php
if(isset($d)):

    $acao = "editar";
    $return_id = $d->id;
    $return_nome = $d->nome;
    $return_texto = $d->texto;
    $return_ativo = $d->status;
    $varCheckAtivo = ($return_ativo == 1)? 'checked' : '';
    $varRequired = '';
        
else:    

    $acao = "novo";
    $return_id = '';
    $return_nome = '';
    $return_texto = '';
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
        Depoimento
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
            
            
            <form id="formUsuario" method="post" action="/painel/depoimento/salvar">
                <input type="hidden" name="acao" value="<?php print $acao; ?>">
                <input type="hidden" name="id" value="<?php print $return_id; ?>">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="nome" maxlength="100" value="<?php print $return_nome; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" name="texto"><?php print $return_texto; ?></textarea>
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