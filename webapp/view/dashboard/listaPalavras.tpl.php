<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;

$user_ativo = $APP_ViewDisp->dataComposer->getDataForView('user');
$palavras = $APP_ViewDisp->dataComposer->getDataForView('palavras');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="../images/favicon_1.ico">

        <title>Jogo da Forca</title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="../public/plugins/morris/morris.css">

        <!--@yield('css')-->
        <link href="../public/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="../public/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link type="text/css" href="../public/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../public/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->

            <?php

             include( 'view/elements/topbar.php');

             ?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->


            <?php include ('view/elements/menu.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
              <!-- Start content -->
              <div class="content">
                <div class="container">


                  <!-- ################################# CONTEUDO ########################### -->
                  <div class="row card-box">
    <div class="col-sm-12">
        <div class="col-md-12">
            <h4 class="header-title"><b>Lista de Palavras</b></h4>
            <p class="text-muted m-b-30 font-13">
                Lista de todas as palavras do jogo.
            </p>
        </div>
        <div class="col-md-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Palavra</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>


                <tbody>
                <?php
                foreach ($palavras as $palavra) {
                  ?>
                    <tr>
                        <td><a href="#" class="palavra" data-pk="<?= $palavra->id; ?>" data-placement="right" data-type="text" url="router.php?route=dashboard&action=editarPalavra" name="palavra" data-title="Inserir a palavra"><?= $palavra->nome; ?></a></form></td>
                        <td><a href="#" class="categoria" data-pk="<?= $palavra->id; ?>" data-type="text" url="router.php?route=dashboard&action=editarCategoria" name="categoria" data-title="Inserir a categoria"><?= $palavra->categoria; ?></a></form></td>

                        <td>
                          <form action="router.php?route=dashboard&action=eliminarPalavra" method="post"><button class="btn btn-danger" name="palavra_id" value="<?= $palavra->id; ?>"><i class="fa fa-trash-o"></i></button></form>
                        </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ################################# CONTEUDO ########################### -->

</div>
</div>
</div>


<!-- content -->

<footer class="footer text-right">
© 2016 Programação para a web - servidor.
</footer>
</div>
<!-- END wrapper -->

<script>
var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/detect.js"></script>
<script src="../public/js/fastclick.js"></script>
<script src="../public/js/jquery.slimscroll.js"></script>
<script src="../public/js/jquery.blockUI.js"></script>
<script src="../public/js/waves.js"></script>
<script src="../public/js/wow.min.js"></script>
<script src="../public/js/jquery.nicescroll.js"></script>
<script src="../public/js/jquery.scrollTo.min.js"></script>

<script src="../public/plugins/peity/jquery.peity.min.js"></script>

<!-- jQuery  -->
<script src="../public/plugins/waypoints/lib/jquery.waypoints.js"></script>
<script src="../public/plugins/counterup/jquery.counterup.min.js"></script>



<script src="../public/plugins/morris/morris.min.js"></script>
<script src="../public/plugins/raphael/raphael-min.js"></script>

<script src="../public/plugins/jquery-knob/jquery.knob.js"></script>

<script src="../public/pages/jquery.dashboard.js"></script>

<script src="../public/js/jquery.core.js"></script>
<script src="../public/js/jquery.app.js"></script>
<script src="../public/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../public/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../public/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script type="text/javascript" src="../public/pages/jquery.xeditable.js"></script>

<?php

  if(isset($_SESSION['PalavraEliminada'])){
    unset($_SESSION['PalavraEliminada']);
    ?>

    <script type="text/javascript">
    $(document).ready(function(){
      swal({
          title: "Eliminou a palavra com êxito!",
          text: "A palavra foi eliminada com sucesso!"
      });
    });

    </script>


  <?php
    }
  ?>

<script>

  jQuery('#datepicker-autoclose').datepicker({
  autoclose: true,
  todayHighlight: true
  });

  </script>

  <script type="text/javascript">
  jQuery(document).ready(function($) {

    $('.palavra').editable(
      {
       type: 'text',
       url: 'router.php?route=dashboard&action=editarPalavra',
       name: 'data',
      }
    );
    $('.categoria').editable(
      {
       type: 'text',
       url: 'router.php?route=dashboard&action=editarCategoria',
       name: 'data',
      }
    );

  $('.counter').counterUp({
      delay: 100,
      time: 1200
  });

  $(".knob").knob();

  });
  </script>

  <!--@yield('script')-->


  </body>
</html>
