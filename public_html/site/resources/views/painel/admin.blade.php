<?php $url_base = getenv('URL_BASE'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SC Clube | Painel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/plugins/iCheck/flat/blue.css">
    <!-- jvectormap -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php print $url_base; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <link href="<?php print $url_base; ?>/dist/css/sweet-alert.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SC Clube</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ Session::get('login.nome') }}</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/paginas">
            <i class="fa fa-file-text-o"></i> 
            <span>Páginas</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/noticias">
            <i class="fa fa-newspaper-o"></i> 
            <span>Notícias</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/videos">
            <i class="fa fa-video-camera"></i> 
            <span>Vídeos</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/depoimentos">
            <i class="fa fa-quote-left"></i> 
            <span>Depoimentos</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/sliders">
            <i class="fa fa-picture-o"></i> 
            <span>Slider</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/faq">
            <i class="fa fa-question"></i> 
            <span>FAQ</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/usuarios">
            <i class="fa fa-users"></i> 
            <span>Usuários</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/sistema">
            <i class="fa fa-gears"></i> 
            <span>Configurações</span>
          </a>
        </li>
        
        
        <li class="treeview">
          <a href="<?php print $url_base; ?>/painel/sair">
            <i class="fa fa-sign-out"></i>
            <span>Sair</span>
          </a>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
     
    @yield('conteudo')  
    
    
    
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
  <input type="hidden" id="url_base" value="<?php print $url_base; ?>">
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php print $url_base; ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php print $url_base; ?>/bootstrap/js/bootstrap.min.js"></script>


<!-- DataTables -->
<script src="<?php print $url_base; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php print $url_base; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php print $url_base; ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php print $url_base; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php print $url_base; ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php print $url_base; ?>/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php print $url_base; ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php print $url_base; ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php print $url_base; ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php print $url_base; ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php print $url_base; ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php print $url_base; ?>/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php print $url_base; ?>/dist/js/sweet-alert.min.js"></script>

<script src="<?php print $url_base; ?>/dist/js/ckeditor/ckeditor.js"></script>

<script src="<?php print $url_base; ?>/dist/js/demo.js"></script>
<script src="<?php print $url_base; ?>/dist/js/custom.js"></script>

<script src="<?php print $url_base; ?>/plugins/jquery.mask.min.js"></script>
<script src="<?php print $url_base; ?>/dist/js/site.js"></script>
<script src="<?php print $url_base; ?>/dist/js/clone.js"></script>
<script src="<?php print $url_base; ?>/dist/js/pesquisa.js"></script>

<script>
    CKEDITOR.replace( 'editor1', {
            height: 400
    } );
</script>
<script>
    CKEDITOR.replace( 'editor2', {
            height: 180
    } );
</script>
<script>
    CKEDITOR.replace( 'editor3', {
            height: 180
    } );
</script>
<script>
  $(function () {
    
    $('.datepicker').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy", 
        language: "pt-BR",
        showOtherMonths: true,
        selectOtherMonths: true,
        dayNames: ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado","Domingo"],
        dayNamesMin: ["D","S","T","Q","Q","S","S","D"],
        dayNamesShort: ["Dom","Seg","Ter","Qua","Qui","Sex","Sáb","Dom"],
        monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
        monthNamesShort: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
        nextText: "Próximo",
        prevText: "Anterior"
    });    
    
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
	  "pageLength": 200
    });
  });
  
</script>


<?php
if (Session::has('status.msg')){

    $error_msg = Session::get("status.msg");
    Session::forget('status.msg');
    
    if (isset($error_msg) AND $error_msg != ""):
        echo("<script>swal(\"$error_msg\");</script>");
    endif;
}    
?>   

<?php 
if(isset($error_redirect) AND $error_redirect != ""):
    header("location: $error_redirect");
endif;
?>


</body>
</html>
