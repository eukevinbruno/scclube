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
                    <a href="<?php print $url_base; ?>/content/{{ $pagina->slug }}">{{ $pagina->titulo }}</a>
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
                                    <h3>{{ $pagina->titulo }}</h3>
                                </div>
                                
                                
                                <div class="post-paragraph p1">
                                    <div class="post-content">
                                        {!! $pagina->texto !!}
                                    </div>
                                </div>
                                
                                @if(count($videos))
                                <div class="post-paragraph p1">
                                    <div class="post-content">
                                        <div class="row">
                                        @foreach($videos as $video)
                                        <div class="col-md-6 col-sm-6">
                                                <iframe width="330" height="220" src="{{ $video->embed }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        @endforeach
                                        </div>
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