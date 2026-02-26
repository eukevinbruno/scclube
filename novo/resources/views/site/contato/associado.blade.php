<?php $url_base = getenv('URL_BASE'); ?>

@extends('site.index')

@section('conteudo')

@include('site.menu') 

<div class="page-content contact">
        <!-- HEADING PAGE-->
        <div class="heading-page heading-normal heading-project">
            <div class="container">
                <ul class="au-breadcrumb">
                    <li class="au-breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="<?php print $url_base; ?>/inicio">Home</a>
                    </li>
                    <li class="au-breadcrumb-item active">
                        <a href="<?php print $url_base; ?>/associado">Área do Associado</a>
                    </li>
                </ul>
            </div>
        </div>
        

        
        
        <!-- END HEADING PAGE-->
        <!-- CONTACT, STYLE 3-->
        <section class="contact contact-layout style-3 contact-layout-6">
            <div class="main-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="contact-form" name="contactform" action="https://marte.hinova.com.br/sga/area/4.1/login.action.php" method="post" >
                                <input type="hidden" name="dfsChave" id="dfsChave" value="051cd14ed5e56d8c7bc93e01b4d8d1fdbe7ba78eabcbcd2a5bc2661907610da33de2f26e55d34158ad60614b618f2bbaaf10212fc03e1df43b7a68dc25a69c61" > 
                                <div class="heading">
                                    <h3>Autenticação</h3>
                                </div>
                                <div class="subtitle">
                                    <p>
                                        Informe seu CPF ou CNPJ para ter acesso:
                                    </p>
                                </div>
                                <div class="input-group">
                                    <div class="input">
                                        <input type="text" name="dfsCpf" id="dfsCpf" maxlength="19" placeholder="Seu CPF ou CNPJ" required />
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input">
                                        <input type="password" name="dfsSenha" id="dfsSenha" placeholder="Sua Senha" required />
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input">
                                        <a href="https://marte.hinova.com.br/sga/area/4.1/lembrarSenha.php?chave=49570b649adf969697fb5331c18b97a88924272accf81482ce658488d4e4213f2acfcbac8b5f5408254201d0fc992ee0f6290281c915243ff7623d1b3c7fbe50" target="_blank" > Lembrar senha </a>
                                    </div>
                                </div>
                                
                                <div class="action-group">
                                    <button class="au-btn au-btn-orange au-btn-lg" name="pbEntrar" type="submit">ACESSAR</button>
                                    <input class="au-btn au-btn-grey au-btn-lg" name="pbReset" type="reset" value="LIMPAR">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="heading">
                                    <h3>Tem alguma dúvida?</h3>
                                </div>
                                <div class="subtitle">
                                    <p>
                                        Fale com a nossa equipe, estamos sempre prontos a lhe atender! 
                                    </p>
                                </div>
                                <ul class="contact-list">
                                    <li>
                                        <i class="fa fa-home"></i>{{ $configuracao->endereco }}, {{ $configuracao->numero }} {{ $configuracao->bairro }}, {{ $configuracao->cidade }}, {{ $configuracao->uf }} {{ $configuracao->cep }}</li>
                                    <li>
                                        <i class="fa fa-phone"></i>{{ $configuracao->telefone }}</li>
                                    <li>
                                        <i class="fa fa-whatsapp"></i>{{ $configuracao->whatsapp }}</li>
                                    <li>
                                        <i class="fa fa-envelope"></i>{{ $configuracao->email }}</li>
                                    <li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="google-map" id="google_map" data-map-x="{{ $configuracao->lat }}" data-map-y="{{ $configuracao->lng }}" data-pin="<?php print $url_base; ?>/img/icons/location.png" data-scrollwhell="0" data-draggable="1"></div>
        </section>
        <!-- END CONTACT, STYLE 3-->
    </div>

@endsection