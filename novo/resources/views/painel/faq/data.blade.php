<?php
if(isset($f)):

    $acao = "editar";
    $return_id = $f->id;
    $return_pergunta = $f->pergunta;
    $return_resposta = $f->resposta;
    $return_ordem = $f->ordem;
    $varCheckAtivo = ($return_ativo == 1)? 'checked' : '';
    $varRequired = '';
        
else:    

    $acao = "novo";
    $return_id = '';
    $return_pergunta = '';
    $return_resposta = '';
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
        FAQ
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
            
            
            <form id="formUsuario" method="post" action="/painel/faq/salvar">
                <input type="hidden" name="acao" value="<?php print $acao; ?>">
                <input type="hidden" name="id" value="<?php print $return_id; ?>">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pergunta</label>
                                    <textarea class="form-control" name="pergunta" required><?php print $return_pergunta; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Resposta</label>
                                    <textarea class="form-control" name="resposta" required><?php print $return_resposta; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ordem</label>
                                    <input type="text" name="ordem" maxlength="2" value="<?php print $return_ordem; ?>" class="form-control">
                                </div>
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