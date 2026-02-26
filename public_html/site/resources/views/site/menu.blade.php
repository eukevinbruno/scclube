<?php $url_base = getenv('URL_BASE'); ?>
<?php $configuracao = App\Configuracao::find(1); ?>
<?php 
use App\Http\Controllers\Site\SiteController;
$paginas = SiteController::menu();
?>
<!-- Header main-->
    <header>
        <div id="loading">
            <div class="image-load">
                <img src="<?php print $url_base; ?>/img/icons/Marty.gif" alt="loader" />
            </div>
        </div>
        <nav id="mmenu">
            <ul>
                
                <li>
                    <a href="<?php print $url_base; ?>/inicio">HOME</a>
                </li>
                
                @foreach($paginas['n0'] as $n0)
                <li>
                    <a href="<?php print $url_base; ?>/content/{{ $n0['slug'] }}">{{ strtoupper($n0['titulo']) }}</a>
                    
                    @if(isset($paginas['n1'][$n0['titulo']]))
                    <ul>
                    @foreach($paginas['n1'][$n0['titulo']] as $n1)
                    
                    <li>
                        <a href="<?php print $url_base; ?>/content/{{ $n1['slug'] }}">{{ strtoupper($n1['titulo']) }}</a>
                        
                        @if(isset($paginas['n2'][$n1['titulo']]))
                        <ul>
                        @foreach($paginas['n2'][$n1['titulo']] as $n2)
                            
                            <li>
                                <a href="<?php print $url_base; ?>/content/{{ $n2['slug'] }}">{{ strtoupper($n2['titulo']) }}</a>
                            </li>
                            
                        @endforeach 
                        </ul>
                        @endif
                    </li>
                     
                    @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
                
                <li>
                    <a href="<?php print $url_base; ?>/contato">CONTATO</a>
                </li>
                
            </ul>
        </nav>
        <div class="top-bar">
            <div class="container">
                <p class="greeting">{{ $configuracao->texto_bemvindo }}</p>
                <div class="quick-link">
                    <a href="#">2ª Via Boleto</a>|
                    <a href="<?php print $url_base; ?>/faq">FAQ</a>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="logo">
                    <a href="<?php print $url_base; ?>/inicio">
                        <img class="img-responsive" src="<?php print $url_base; ?>/img/icons/logo.png" alt="Logo" width='130' />
                    </a>
                </div>
                <div class="contact-widget" style="margin-top: 12px;">
                    <div class="contact-list hidden-lg-tablet">
                        <div class="item">
                            <i class="lnr lnr-phone-handset" style="color:#999999;"></i>
                            <div class="text">
                                <p class="top">Precisa de Ajuda?</p>
                                <p class="bot">{{ $configuracao->telefone }}</p>
                            </div>
                        </div>
                        <div class="item">
                            <i class="fa fa-whatsapp fa-color" style="color:#999999;"></i>
                            <div class="text">
                                <p class="top">WhatsApp</p>
                                <p class="bot">{{ $configuracao->whatsapp }}</p>
                            </div>
                        </div>
                        <div class="item">
                            <i class="fa fa-envelope fa-color" style="color:#999999"></i>
                            <div class="text">
                                <p class="top">Email</p>
                                <p class="bot">{{ $configuracao->email }}</p>
                            </div>
                        </div>
                    </div>
                    <button class="au-btn au-btn-sm au-btn-orange hidden-md-phone">Área do Associado</button>
                </div>
            </div>
        </div>
        <div class="navbar-main">
            <div class="container">
                <div class="navbar-holder">
                    <a class="navbar-toggle collapsed" href="#mmenu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <nav class="navbar-menu">
                        <ul class="menu">
                            <li class="dropdown">
                                <a href="<?php print $url_base; ?>/inicio">Home</a>
                            </li>
                            
                            
                            @foreach($paginas['n0'] as $n0)
                            <li class="dropdown">
                                <a href="<?php print $url_base; ?>/content/{{ $n0['slug'] }}">{{ $n0['titulo'] }}</a>

                                @if(isset($paginas['n1'][$n0['titulo']]))
                                <ul class="dropdown-menu">
                                @foreach($paginas['n1'][$n0['titulo']] as $n1)

                                <li class="dropdown-child">
                                    <a href="<?php print $url_base; ?>/content/{{ $n1['slug'] }}">{{ $n1['titulo'] }}</a>

                                    @if(isset($paginas['n2'][$n1['titulo']]))
                                    <ul class="dropdown-menu-child">
                                    @foreach($paginas['n2'][$n1['titulo']] as $n2)

                                        <li>
                                            <a href="<?php print $url_base; ?>/content/{{ $n2['slug'] }}">{{ strtoupper($n2['titulo']) }}</a>
                                        </li>

                                    @endforeach 
                                    </ul>
                                    @endif
                                </li>

                                @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                           
                            
                            <li>
                                <a href="<?php print $url_base; ?>/contato">Contato</a>
                            </li>
                            
                            
                        </ul>
                    </nav>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- End header main-->