<?php $url_base = getenv('URL_BASE'); ?>

@extends('site.index')

@section('conteudo')

@include('site.menu') 

<div class="page-content blog-single">
        <!-- HEADING PAGE-->
        <div class="heading-page heading-normal heading-project">
            <div class="container">
                <ul class="au-breadcrumb">
                    <li class="au-breadcrumb-item">
                        <i class="fa fa-home"></i>
                        <a href="<?php print $url_base; ?>/inicio">Home</a>
                    </li>
                    <li class="au-breadcrumb-item active">
                        <a href="#">Notícia</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END HEADING PAGE-->
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- BLOG DETAIL-->
                    <section class="blog-single">
                        <div class="post-title">
                            <h1>{{ $noticia->titulo }}</h1>
                        </div>
                        
                        <div class="post-paragraph" style="margin-bottom: 30px; margin-top: -20px;">
                            {!! $noticia->subtitulo !!}
                        </div>
                        
                        
                        <div class="post-image">
                            <img class="img-responsive" src="<?php print $url_base; ?>/img/noticia/{{ $noticia->imagem }}" alt="{{ $noticia->titulo }}" />
                        </div>
                        <div class="post-paragraph">
                            
                            <div class="post-content" style="margin-top: 40px;">
                                
                                {!! $noticia->texto !!}
                                
                            </div>
                        </div>
                        
                        
                    </section>
                    <!-- END BLOG DETAIL-->
                </div>
                <div class="col-md-3">
                    <!-- SIDEBAR, STYLE 3-->
                    <div class="sidebar sidebar-style-3">
                        <div class="sidebar-cate sidebar-element">
                            <div class="sidebar-heading">
                                <h3>Categories</h3>
                            </div>
                            <div class="sidebar-cate-list">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-angle-right"></i>Business Market</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-angle-right"></i>Socials Network</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-angle-right"></i>Team Work</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-angle-right"></i>Rebuild Services</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-angle-right"></i>Electrical System</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END SIDEBAR, STYLE 3-->
                </div>
            </div>
        </div>
    </div>

@endsection