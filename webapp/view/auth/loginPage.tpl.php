<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;
/*************************************************************
*
*           Prepare Data for usage in View
*
*************************************************************/

$viewData = $APP_ViewDisp->dataComposer->getDataForView('Erro');

//***********************************************************


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Jogo da Forca</title>

        <link href="../public/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.../js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../public/js/modernizr.min.js"></script>

    </head>
    <body class="fixed-left">
      <div class="account-pages"></div>
              <div class="clearfix"></div>

              <div class="wrapper-page">
                  <div class="caixa">
                      <div class="panel-heading">
                          <h3 class="text-center titulo"> Entrar<br />
                          <span class="titulo">Jogo<i class="md md-equalizer"></i>Forca</span></h3>
                      </div>

                      <div class="panel-body">
                          <form class="form-horizontal m-t-20" method="POST" action="<?php echo $APP_Router->buildURL('auth@login'); ?>">

                              <div class="form-group ">
                                  <div class="col-xs-12">
                                      <input class="form-control" type="text" required="" name="username" value="" placeholder="Username">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-xs-12">
                                      <input class="form-control" type="password" name="password" required="" value="" placeholder="Password">
                                  </div>
                              </div>

                              <div class="form-group text-center m-t-40">
                                  <div class="col-xs-12">
                                      <button class="btn btn-purple btn-block text-uppercase waves-effect waves-light" type="submit">
                                          Entrar
                                      </button>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 text-center">
                          <p>
                              Não tem uma conta? <a href="<?php echo $APP_Router->buildURL('auth@registar'); ?>" class="text-primary m-l-5"><b>Registar</b></a>
                          </p>
                      </div>
                  </div>

              </div>

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

        <script src="../public/js/jquery.core.js"></script>
        <script src="../public/js/jquery.app.js"></script>

        <?php

        if($viewData){
        ?>

        <script src="../public/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../public/pages/jquery.sweet-alert.init.js"></script>


            <script>

                $(document).ready(function(){
                    sweetAlert(
                      'Password incorreta',
                      'A password que inseriu está incorreta. For favor, insira a password correta!',
                      'error'
                    )
                });
            </script>
        <?php
        }
        ?>
    </body>
</html>
