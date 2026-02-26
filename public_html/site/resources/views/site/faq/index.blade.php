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
                    <a href="<?php print $url_base; ?>/faq">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END HEADING PAGE-->
    <section class="contact contact-layout-5">
        <div class="contact-wrapper">
            <div class="container">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="contact-info">
                                <div class="heading">
                                    <h3>FAQ</h3>
                                </div>
                                
                                @if(count($faqs))
                                <div class="info-accordion">
                                    <div data-accordion-group="data-accordion-group">
                                        
                                        <?php $contaPergunta = 0; ?>
                                        @foreach($faqs as $faq)
                                        <?php $contaPergunta++; ?>
                                        
                                        @if($contaPergunta == 1)
                                            <div class="accordion open" data-accordion="data-accordion">
                                                <div class="accordion-title" data-control="data-control">
                                                    <i class="fa fa-star"></i>
                                                    <h4>{{ $faq->pergunta }}</h4>
                                                </div>
                                                <div class="accordion-content" data-content="data-content">
                                                    <div class="textbox-info">
                                                        <p>
                                                            {{ $faq->resposta }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="accordion" data-accordion="data-accordion">
                                                <div class="accordion-title" data-control="data-control">
                                                    <i class="fa fa-star"></i>
                                                    <h4>{{ $faq->pergunta }}</h4>
                                                </div>
                                                <div class="accordion-content" data-content="data-content">
                                                    <div class="textbox-info">
                                                        <p>
                                                            {{ $faq->resposta }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @endforeach
                                        
                                        
                                        
                                    </div>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- SIDEBAR, STYLE 2-->
                            <div class="sidebar sidebar-style-1 sidebar-style-2">
                                <div class="contact-widget" style="margin-top: 65px;">
                                    <div class="heading-widget">
                                        <h3>Informações de Contato</h3>
                                    </div>
                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa fa-home"></i>&nbsp; {{ $configuracao->endereco }}, {{ $configuracao->numero }} {{ $configuracao->bairro }}, {{ $configuracao->cidade }}, {{ $configuracao->uf }} {{ $configuracao->cep }}</li>
                                        <li>
                                            <i class="fa fa-phone"></i>&nbsp; {{ $configuracao->telefone }}</li>
                                        <li>
                                            <i class="fa fa-whatsapp"></i>&nbsp; {{ $configuracao->whatsapp }}</li>
                                        <li>
                                            <i class="fa fa-envelope"></i>&nbsp; {{ $configuracao->email }}</li>
                                        <li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END SIDEBAR, STYLE 2-->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection