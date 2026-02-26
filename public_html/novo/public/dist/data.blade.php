<?php
if(isset($configuracao)):

    $return_id = $configuracao->id;
    $return_nome = $configuracao->nome;
    $return_email = $configuracao->email;
    $return_url = $configuracao->url;
    $return_telefone = $configuracao->telefone;
    $return_whatsapp = $configuracao->whatsapp;
    $return_cep = $configuracao->cep;
    $return_endereco = $configuracao->endereco;
    $return_numero = $configuracao->numero;
    $return_bairro = $configuracao->bairro;
    $return_cidade = $configuracao->cidade;
    $return_uf = $configuracao->uf;
    $return_lat = $configuracao->lat;
    $return_lng = $configuracao->lng;
    $return_facebook = $configuracao->facebook;
    $return_twitter = $configuracao->twitter;
    $return_instagram = $configuracao->instagram;
    $return_texto_bemvindo = $configuracao->texto_bemvindo;
    $return_metatag_keyword = $configuracao->metatag_keywords;
    $return_metatag_description = $configuracao->metatag_description;
    $return_metatag_title = $configuracao->metatag_title;
    
    $return_popup = $configuracao->popup;
    $return_popup_img = $configuracao->popup_img;
    $return_popup_url = $configuracao->popup_url;
    $return_popup_altura = $configuracao->popup_altura;
    $return_popup_largura = $configuracao->popup_largura;
    
endif;
?>


@extends('painel.admin')

@section('conteudo')

<!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configurações do Sistema
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
            
            
            <form id="formUsuario" method="post" action="/painel/sistema/salvar">
                <input type="hidden" name="id" value="<?php print $return_id; ?>">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="nome" maxlength="100" value="<?php print $return_nome; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" maxlength="100" value="<?php print $return_email; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="url" maxlength="200" value="<?php print $return_url; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" name="endereco" maxlength="100" value="<?php print $return_endereco; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Numero</label>
                                    <input type="text" name="numero" maxlength="20" value="<?php print $return_numero; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" maxlength="50" value="<?php print $return_bairro; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" maxlength="50" value="<?php print $return_cidade; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>UF</label>
                                    <input type="text" name="uf" maxlength="2" value="<?php print $return_uf; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="text" name="cep" maxlength="10" value="<?php print $return_cep; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" name="latitude" maxlength="30" value="<?php print $return_lat; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude" maxlength="30" value="<?php print $return_lng; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" name="telefone" maxlength="20" value="<?php print $return_telefone; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <input type="text" name="whatsapp" maxlength="20" value="<?php print $return_whatsapp; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" maxlength="200" value="<?php print $return_facebook; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" maxlength="200" value="<?php print $return_twitter; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" maxlength="200" value="<?php print $return_instagram; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Texto Bem Vindo</label>
                                    <input type="text" name="texto_bemvindo" maxlength="80" value="<?php print $return_texto_bemvindo; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Meta Tag Title</label>
                                    <textarea name="metatag_title" maxlength="100" class="form-control"><?php print $return_metatag_title; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="metatag_description" maxlength="200" class="form-control"><?php print $return_metatag_description; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <textarea name="metatag_keyword" maxlength="200" class="form-control"><?php print $return_metatag_keyword; ?></textarea>
                                </div>
                            </div>
                        </div>
                    
                </div>

                <div class="box-footer">
                    <button type="submit" id="razao-salvar" class="btn btn-primary btnCadastro pull-right">Salvar Configuração</button>
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
    
    
    <section class="content-header">
      <h1>
        Configurações do Popup
      </h1>
    </section>
    
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            
            <form id="formUsuario2" method="post" action="/painel/sistema/salvar-popup" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php print $return_id; ?>">
                {{ csrf_field() }}
                <!-- text input -->

                <div class="box-body">
                        
                        <div class="col-md-12">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Popup</label>
                                        <select name="popup" class="form-control" required>
                                            <option value="0" <?php if($return_popup == 0) echo("selected"); ?>>Desabilitado</option>
                                            <option value="1" <?php if($return_popup == 1) echo("selected"); ?>>Habilitado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Popup URL</label>
                                        <input type="text" name="popup_url" maxlength="200" value="<?php print $return_popup_url; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Altura Popup</label>
                                        <input type="text" name="popup_altura" maxlength="3" value="<?php print $return_popup_altura; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Largura Popup</label>
                                        <input type="text" name="popup_largura" maxlength="3" value="<?php print $return_popup_largura; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                <div class="form-group"> 
                                    <label>Popup Imagem</label>
                                 <div class="input-group">

                                    <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                    Procurar… <input type="file" id="imgInp" name="img_banner">
                                    </span>
                                    </span>
                                    <input type="text" class="form-control">
                                 </div>
                                </div>    
                                </div>
                            </div>
                            
                        </div>
                    
                        <div class="col-md-6">
                            @if(!empty($return_popup_img))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Popup Atual</label><br>
                                        <img src="../dist/img/{{ $return_popup_img }}" />
                                    </div>
                                </div>
                            </div>    
                            @endif
                        </div>
                    
                    
                        
                    
                    
                </div>

                <div class="box-footer">
                    <button type="submit" id="razao-salvar" class="btn btn-primary btnCadastro pull-right">Salvar Configuração Popup</button>
                </div> 

            </form>            
            
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>    
    
    
@endsection