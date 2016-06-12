<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;

$user_ativo = $APP_ViewDisp->dataComposer->getDataForView('user');

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

        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/responsive.css" rel="stylesheet" type="text/css" />

        <link href="../public/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

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

                  <div class="col-sm-8">
                		<div class="card-box">
                			<h4 class="m-t-0 header-title"><b>Perfil</b></h4>
                			<p class="text-muted m-b-30 font-13">
                				Edite as suas informações pessoais.
                			</p>
                			<div class="row">
                				<div class="col-md-12">
                					<form class="form-horizontal" role="form">
                              <div class="form-group">
                                  <label class="col-md-2 control-label">Primeiro nome</label>
                                  <div class="col-md-4">
                                      <input type="text" class="form-control" placeholder="Primeiro nome">
                                  </div>

                                  <label class="col-md-2 control-label">Último nome</label>
                                  <div class="col-md-4">
                                      <input type="text" class="form-control" placeholder="Último nome">
                                  </div>

                              </div>
                              <div class="form-group">
                                  <label class="col-md-2 control-label" for="example-email">Email</label>
                                  <div class="col-md-4">
                                      <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                                  </div>
                                  <label class="col-md-2 control-label">Data de nascimento</label>
                                  <div class="col-sm-4">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose">
                                          <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                      </div><!-- input-group -->
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-2 control-label">Nova password</label>
                                  <div class="col-md-4">
                                      <input type="password" class="form-control" placeholder="Nova password">
                                  </div>
                                  <label class="col-md-2 control-label">Repetir nova password</label>
                                  <div class="col-md-4">
                                      <input type="password" class="form-control" placeholder="Repetir nova password">
                                  </div>
                              </div>
                            </form>
                				</div>
                			</div>
                		</div>
                	</div>
                    <div class="col-sm-4">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Fotografia de Perfil</b></h4>
                            <p class="text-muted m-b-30 font-13">
                                Edita a tua fotografia de perfil!
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-thumbnail"style="max-height:300px;" src="../public/images/logo.png">
                                    <form action="router.php?route=dashboard&action=imgperfil" method="POST" name="img_update" enctype="multipart/form-data">
                                        <input type="file" data-buttonText="Escolher imagem" name="img" class="filestyle col-sm-4" data-buttonbefore="true" required id="filestyle-8" accept="image/*">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-t-10">Atualizar imagem</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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
        <script src="../public/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="../public/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">

            jQuery(document).ready(function($) {

                $('.selectpicker').selectpicker();
                $(":file").filestyle({input: false});


                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
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
