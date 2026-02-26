<?php $url_base = getenv('URL_BASE'); ?>

@extends('site.index')

@section('conteudo')

@include('site.menu') 


    
    
<div class="page-content home-page-1">
    
        <!-- SLIDER -->
        @if(count($sliders))
        <div class="rev_slider_wrapper slider-primary">
            <div class="rev_slider" id="rev_slider_1" style="display:none;">
                <ul>
                    <?php $contaSlider = 0; ?>
                    @foreach($sliders as $slider)
                    <?php $contaSlider++; ?>
                    <li class="slider-item-{{ $contaSlider }}" data-transition="fade">
                        <!-- MAIN IMAGE-->
                        <img class="rev-slidebg" src="<?php print $url_base; ?>/img/slider/{{ $slider->imagem }}" alt="#" />
                        <div class="tp-caption tp-resizeme slider-title" data-frames="[{&quot;delay&quot;:300,&quot;speed&quot;:600,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="left" data-hoffset="0" data-y="top" data-voffset="115">{{ $slider->titulo }}</div>
                        <div class="tp-caption tp-resizeme slider-subtitle" data-frames="[{&quot;delay&quot;:600,&quot;speed&quot;:600,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="left" data-y="top" data-hoffset="0" data-voffset="210">{{ $slider->subtitulo }}
                        </div>
                        
                        @if(empty($slider->url))
                        <button class="tp-caption tp-resizeme au-btn au-btn-white" data-frames="[{&quot;delay&quot;:300,&quot;speed&quot;:600,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="left" data-hoffset="0" data-y="top" data-voffset="320">{{ $slider->botao }}</button>
                        @else
                        <a href="{{ $slider->url }}">
                        <button class="tp-caption tp-resizeme au-btn au-btn-white" data-frames="[{&quot;delay&quot;:300,&quot;speed&quot;:600,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="left" data-hoffset="0" data-y="top" data-voffset="320">{{ $slider->botao }}</button>
                        </a>
                        @endif
                    </li>
                    @endforeach
                    
                </ul>
                <!-- END REVOLUTION SLIDER-->
            </div>
        </div>
        @endif
        
        <!-- PRODUTOS - BENEFICIOS -->
        @if(count($beneficios))
        <section class="product product-layout style-3">
            <div class="container">
                <div class="heading">
                    <h3 class="heading-section">Benefícios</h3>
                </div>
                <div class="sub-heading">
                    <span>Conheça todos os benefícios oferecidos para você.</span>
                </div>
                <div class="row">
                    @foreach($beneficios as $beneficio)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item style-2 match-item">
                            <div class="icon">
                                <i class="{{ $beneficio->icone }}"></i>
                            </div>
                            <div class="title">
                                <a href="<?php print $url_base; ?>/content/{{ $beneficio->slug }}">{{ $beneficio->titulo }}</a>
                            </div>
                            <div class="content">
                                {{ $beneficio->resumo }}
                            </div>
                            <div class="view-more">
                                <a href="<?php print $url_base; ?>/content/{{ $beneficio->slug }}">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </section>
        @endif
        
        <!-- VIDEOS -->
        @if(count($videos))
        <section class="product product-layout style-1">
            <div class="container">
                <div class="heading">
                    <h3>Vídeos</h3>
                </div>
                <div class="row">
                    @foreach($videos as $video)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-item style-1 match-item">
                            <iframe width="255" height="170" src="{{ $video->embed }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        
        <!-- NOTICIAS -->
        @if(count($noticias))
        <section class="product product-layout style-3">
            <div class="container">
                <div class="heading">
                    <h3 style="font-size: 36px; color: #0177d7; text-align: left;">Notícias</h3>
                </div>
                <div class="row">
                    @foreach($noticias as $noticia)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-item style-1 match-item">
                            <a class="image" href="<?php print $url_base; ?>/noticia/{{ $noticia->slug }}">
                                <img class="img-responsive" src="<?php print $url_base; ?>/img/noticia/{{ $noticia->imagem_chamada }}" alt="" />
                            </a>
                            <div class="title">
                                <a href="<?php print $url_base; ?>/noticia/{{ $noticia->slug }}">{{ $noticia->titulo }}</a>
                            </div>
                            <div class="content">
                                <p>{{ $noticia->subtitulo }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        
        
        <!-- DEPOIMENTOS -->
        @if(count($depoimentos))
        <section class="testinmonials testinmonials-layout style-1">
            <div class="container">
                <div class="heading">
                    <h3 class="heading-section">O que dizem nossos associados</h3>
                </div>
                <div class="row">
                    @foreach($depoimentos as $depoimento)
                    <div class="col-md-4 col-sm-6">
                        <!-- testinmonials item-->
                        <div class="testinmonial-item style-1 match-item">
                            <div class="content">
                                <p><i class="fa fa-quote-left"></i> {{ $depoimento->texto }} <i class="fa fa-quote-right"></i></p>
                            </div>
                            <div class="personal">
                                <div class="info">
                                    <div class="name">
                                        <span>{{ $depoimento->nome }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        @endif
        
        
        <!-- PARTNER-->
        @if(count($parceiros))
        <div class="partner partner-layout style-1">
            <div class="container">
                <div class="partner-list owl-carousel" data-items="{{ count($parceiros) }}" data-col-sm="1" data-col-md="2" data-col-lg="4" data-center="0">
                    <?php //die("<PRE>" . print_r($parceiros,1)); ?>
                    @foreach($parceiros as $parceiro)
                    <div class="partner-item">
                        <a href="#">
                            <img src="<?php print $url_base; ?>/img/partner/{{ $parceiro->imagem }}" alt="{{ $parceiro->nome }}" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!-- END PARTNER-->
        
        
    </div>

@endsection