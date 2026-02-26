<?php $url_base = getenv('URL_BASE'); ?>
<?php $configuracao = App\Configuracao::find(1); ?>
<?php 
use App\Http\Controllers\Site\SiteController;
$paginas = SiteController::menu();

use App\Http\Controllers\Site\PaginaController;
$beneficios_home = PaginaController::menutag('beneficio');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $configuracao->metatag_title }}</title>
    <meta name="referrer" content="no-referrer">
    <meta name="description" content="{{ $configuracao->metatag_description }}">
    <meta name="keywords" content="{{ $configuracao->metatag_keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php print $url_base; ?>/img/icons/favicon.ico" type="image/gif" sizes="16x16">
    <!--Styles-->
    <link href="<?php print $url_base; ?>/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/jQuery.mmenu/dist/css/jquery.mmenu.all.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/revolution/css/layers.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/revolution/css/navigation.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/vendor/revolution/css/settings.css" rel="stylesheet">
    <!-- Fonts-->
    <link href="<?php print $url_base; ?>/fonts/open-sans/css/open-sans.css" rel="stylesheet">
    <link href="<?php print $url_base; ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php print $url_base; ?>/fonts/Linearicons-Free-v1.0.0/style.css">
    <!--Theme style-->
    <link href="<?php print $url_base; ?>/css/main.css" rel="stylesheet">
	

    
</head>

<body>
    
    
    
    @yield('conteudo')
    
    <!-- FOOTER-->
    <footer>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="services-widget">
                            <div class="logo">
                                <img src="<?php print $url_base; ?>/img/icons/logo.png" alt="Logo" width='80' />
                            </div>
                            @if(count($beneficios_home))
                            <div class="services-list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            @foreach($beneficios_home as $beneficio)
                                            <li>
                                                <a href="<?php print $url_base; ?>/content/{{ $beneficio->slug }}">{{ $beneficio->titulo }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-widget">
                            <h3>Entre em Contato</h3>
                            <div class="content">
                                <p><span class="bold"></span><i class="lnr lnr-phone-handset" style="color:#cccccc;"></i>&nbsp;&nbsp; {{ $configuracao->telefone }} </p>
                                <p><span class="bold"></span><i class="fa fa-whatsapp fa-color" style="color:#cccccc;"></i>&nbsp;&nbsp; {{ $configuracao->whatsapp }} </p>
                                <p><span class="bold"></span><i class="fa fa-envelope fa-color" style="color:#cccccc"></i>&nbsp;&nbsp; {{ $configuracao->email }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="social-widget">
                            <h3>Siga nos</h3>
                            <ul class="social-list">
                                
                                @if($configuracao->facebook)
                                <li>
                                    <a href="{{ $configuracao->facebook }}" target="blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                @endif
                                
                                @if($configuracao->twitter)
                                <li>
                                    <a href="{{ $configuracao->twitter }}" target="blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                
                                @if($configuracao->instagram)
                                <li>
                                    <a href="{{ $configuracao->instagram }}" target="blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <p class="copyright">Copyright © 2018. {{ $configuracao->nome }} - Todos os direitos reservados.</p>
                <ul class="quick-link">
                    <li>
                        <a href="<?php print $url_base; ?>/inicio">Home</a>
                    </li>
                    
                    @foreach($paginas['n0'] as $n0)
                    <li>
                        <a href="<?php print $url_base; ?>/content/{{ $n0['slug'] }}">{{ $n0['titulo'] }}</a>
                    </li>
                    @endforeach
                    
                    <li>
                        <a href="<?php print $url_base; ?>/contato">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
<?php session_start(); ?>
@if(!isset($_SESSION['popup']))    
@if (App\Configuracao::find(1)->popup == 1) 
    
    <?php
    $popup_img = App\Configuracao::find(1)->popup_img;
    $popup_url = App\Configuracao::find(1)->popup_url;
    $popup_altura = App\Configuracao::find(1)->popup_altura;
    $popup_largura = App\Configuracao::find(1)->popup_largura;
    $_SESSION['popup'] = 'abriu';
    ?>

    <style>
        .ontop {
                z-index: 10000 !important;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                display: none;
                position: fixed;				
                background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }
        #popup {
                width: <?=$popup_largura?>px;
                height: <?=$popup_altura?>px;
                position: absolute;
                /* To align popup window at the center of screen*/
                top: 50%;
                left: 50%;
                margin-top: -100px;
                margin-left: -150px;
        }
    </style>
    
    <div id="myModal" class="ontop">
            <table border="1" id="popup">
                    <tr>
                            <td>
                                <a href="{{ $popup_url }}"><img src="<?php print $url_base; ?>/dist/img/{{ $popup_img }}" /></a>
                            </td>
                    </tr>
            </table>
    </div>
    
    <script type="text/javascript">
            function pop(div) {
                    document.getElementById(div).style.display = 'block';
            }
            function hide(div) {
                    document.getElementById(div).style.display = 'none';
            }
            //To detect escape button
            document.onkeydown = function(evt) {
                    evt = evt || window.event;
                    if (evt.keyCode == 27) {
                            hide('myModal');
                    }
            };
            var modal = document.getElementById('myModal');

            window.onclick = function(event) {
                if (event.target == modal) {
                    hide('myModal');
                }
            }
            
            window.onload = function() {
                pop('myModal');
            }
            
    </script>
    
    
    
    
@endif
@endif    
    
    
    <!-- END FOOTER-->
    <!--Scripts-->
    <script src="<?php print $url_base; ?>/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php print $url_base; ?>/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php print $url_base; ?>/vendor/jQuery.mmenu/dist/js/jquery.mmenu.min.umd.js"></script>
    <script src="<?php print $url_base; ?>/js/mmenu-function.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQlq-epbVCRsAOrGCzLOfltpM_PaQ2qIk"></script>
    <script src="<?php print $url_base; ?>/js/gmap.js"></script>
    <script src="<?php print $url_base; ?>/vendor/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?php print $url_base; ?>/js/owl-custom.js"></script>
    <script src="<?php print $url_base; ?>/vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php print $url_base; ?>/vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php print $url_base; ?>/js/revo-custom.js"></script>
    <script src="<?php print $url_base; ?>/vendor/matchHeight/dist/jquery.matchHeight-min.js"></script>
    <script src="<?php print $url_base; ?>/js/match-height-custom.js"></script>
    <script src="<?php print $url_base; ?>/js/custom.js"></script>
    
    <script src="<?php print $url_base; ?>/vendor/jquery-accordion/js/jquery.accordion.js"></script>
    <script src="<?php print $url_base; ?>/js/accordion-custom.js"></script>
	
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="<?php print $url_base; ?>/vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <!--End script-->
</body>

</html>