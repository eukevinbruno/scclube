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
                        <a href="<?php print $url_base; ?>/associar-se">Associar-se</a>
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
                            <form class="contact-form" name="contactform" method="post" action="/associar-se">
                                {{ csrf_field() }}
                                <input type="hidden" id="nome_empresa" value="{{ $configuracao->nome }}">
                                <div class="heading">
                                    <h3>Saiba como associar-se!</h3>
                                </div>
                                <div class="subtitle">
                                    <p>
                                        Imaginamos que você já tenha entendido o que é e como funciona a SC Clube, e deseja se associar a ela e Aderir a um de nossos Benefícios.
                                    </p>
                                    <p>
                                        Pois bem, para isso basta preencher o formulário de pré-cadastro abaixo, que logo em seguida, um de nossos colaboradores entrará em contato para dar procedimento a Adesão ao Benefício(s) escolhido(s). 
                                    </p>
                                </div>
                                <div class="input-group">
                                    <div class="input">
                                        <input type="text" name="nome" placeholder="Seu Nome" required />
                                    </div>
                                    <div class="input">
                                        <input type="text" name="email" placeholder="Seu Email" required />
                                    </div>
                                    <div class="input">
                                        <input type="text" name="telefone" placeholder="Telefone" required />
                                    </div>
                                    <div class="input">
                                        <input type="text" name="bairro_cidade" placeholder="Bairro/Cidade" />
                                    </div>
                                </div>
                                <div class="text-area">
                                    <textarea placeholder="Que benefício deseja?" name="beneficio" required></textarea>
                                </div>
                                <div class="action-group">
                                    <button class="au-btn au-btn-orange au-btn-lg" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="heading">
                                    <h3>Informações de Contato</h3>
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