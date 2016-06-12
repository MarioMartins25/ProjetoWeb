<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;

$user_ativo = $APP_ViewDisp->dataComposer->getDataForView('user');

/*echo "<pre>";
echo var_dump($_SESSION);
echo "</pre>";
die();
*/
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
        <link href="../public/css/jogo.css" rel="stylesheet" type="text/css" />
        <link href="../public/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

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

                  <!-- ############################ JOGO ######################## -->
                  <?php
                  if(isset($_SESSION['JogoID'])){
                   ?>
                  <div class="row card-box">

                    <div class="col-sm-12">
                        <div class="col-md-12">

                          <div class="wrapper">

                             <h3 class="header-title text-center" style="color:white;"><b>Jogo da Forca</b></h3>
                              <p class="text-center">Utilize o teclado para tentar adivinhar a palavra. Se desejar peça uma ajuda, para ficar mais fácil! <i class="ti-face-smile"></i></p>
                          </div>
                  <div class="wrapper text-center">
                    <?php

                    $alfabeto = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
                          'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
                          'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

                      echo "<ul id='alfabeto'><form action='router.php?route=jogo&action=jogada' id='abc' method='POST' >";
                      echo '<input type="hidden" id="letra" name="letra" value="">';

                      $aux = 0;

                      for($i = 0; $i < count($alfabeto); $i++){
                        if(isset($_SESSION['AllUsed'])){
                          for($j = 0; $j < count($_SESSION['AllUsed']); $j++){
                            if(strtoupper($_SESSION['AllUsed'][$j]) == strtoupper($alfabeto[$i]) || $_SESSION['VidasJogo'] == 0 || isset($_SESSION['GANHOU'])){
                                $aux++;
                            }
                          }
                        }

                        if($aux == 0){
                          $classe = "letras";
                        }else{
                          $classe = "bloqueado";
                        }
                        $aux = 0;
                        echo "<li class='".$classe."' value='".$alfabeto[$i]."'>".$alfabeto[$i]."</li>";
                      }
                      echo "</form></ul>";


                      if(isset($_SESSION['Categoria'])){
                     ?>
                      <p id="catagoryName">A categoria da palavra é: <?= $_SESSION['Categoria']; ?></p>
                      <?php } ?>
                      <p id="my-word">
                      <?php

                        if(isset($_SESSION['PalavraOfuscada'])){
                          echo $_SESSION['PalavraOfuscada'];
                        }
                      ?>
                      </p>
                      <p>Tem <?= (isset($_SESSION['JogoID']))? $_SESSION['VidasJogo'] : 6 ; ?> vidas</p>
                      <?php if(isset($_SESSION['Dica'])){
                        ?>
                        <div class="panel panel-border panel-info" id="alfabeto">
        									<div class="panel-heading">
        										<h3 class="panel-title">Dica</h3>
        									</div>
        									<div class="panel-body" style="color:black;">
        										<p>
        											Dica: <b><?= $_SESSION['Dica'];?></b>
        										</p>
        									</div>
        								</div>
                      <?php
                        }
                      ?>
                       <canvas class="text-center" id="forca">This Text will show if the Browser does NOT support HTML5 Canvas tag</canvas>
                      <div class="container">
                        <a href="<?= (isset($_SESSION['JogoID']))? 'router.php?route=jogo&action=dica': '#'; ?> "><button class="button">Dica</button></a>
                        <a href="#" id="novoJogo"><button class="button">Novo jogo</button></a>
                      </div>
                  </div>

                  </div>
                </div>

                 </div>
                 <?php
               }
                  ?>
                  <!-- ############################ JOGO ######################## -->

                </div>
              </div>
            </div>


            <!-- content -->
            <?php
            if(isset($_SESSION['VidasJogo']) && $_SESSION['VidasJogo'] == 0){?>
              <audio id="audio" src="../public/audio/gameover.m4a" preload="auto"></audio>
            <?php
          }elseif(isset($_SESSION['GANHOU'])){?>
            <audio id="audio" src="../public/audio/wingame.m4a" preload="auto"></audio>
          <?php
          }
            ?>
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
        <script src="../public/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">

          <?php
          if(isset($_SESSION['GANHOU'])){?>
            document.getElementById('audio').play();
            $(document).ready(function(){

              swal({
                  title: "Wow... Ganhaste o jogo!!",
                  text: "Faz mais jogos e alcança o TOP 10...",
                  imageUrl: "../public/images/gamewin.png"
              });
            });
          <?php
          }
           ?>
          window.onload = function() {
            var c = document.getElementById("forca");
            var ctx = c.getContext("2d");

            var img = new Image;
            img.onload = function(){
              ctx.drawImage(img,0,0, 300, 150);
            };
            img.src = "../public/images/<?= $_SESSION['VidasJogo']; ?>.png";

          }


            jQuery(document).ready(function($) {

              $(".letras").click(function(){
                $("#letra").val($(this).attr("value"));
                $("#abc").submit();
              });


                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

                $('#novoJogo').click(function(){
                  swal({
                      title: "Deseja criar um novo jogo?",
                      text: "Deseja terminar este jogo e criar um novo jogo?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Sim!",
                      cancelButtonText: "Não!",
                      closeOnConfirm: false,
                      closeOnCancel: false
                  }, function(isConfirm){
                      if (isConfirm) {
                          swal("Já não vai poder jogar o jogo aberto!", "Foi criado um novo jogo.", "success");
                          location.href = "router.php?route=jogo&action=eliminarAberto";
                      } else {
                          swal("Vai continuar a jogar o jogo aberto", "O jogo anteriormente aberto vai continuar a ser jogado", "error");
                      }
                  });
                });

            });


        </script>

        <?php
        if(isset($_SESSION['VidasJogo']) && $_SESSION['VidasJogo'] == 0){
          ?>
          <script>
            document.getElementById('audio').play();
            $(document).ready(function(){

              swal({
                  title: "Ohhh perdeu o jogo!",
                  text: "Infelizmente, gastaste todas as tuas vidas...",
                  imageUrl: "../public/images/gameover.png"
              });
            });
          </script>
        <?php
        }


        if(!isset($_SESSION['JogoID'])){?>

          <script>

          $(document).ready(function(){
            swal({
                title: "Deseja criar um novo jogo?",
                text: "Não existe nenhum jogo em aberto, deseja criar um novo jogo?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    swal("Novo jogo!", "Será redirecionado para a página de jogo.", "success");
                    location.href = "router.php?route=jogo&action=novo";
                } else {
                    swal("Cancelado", "Será redirecionado para a página de estatisticas", "error");
                }
            });
          });
          </script>
          <?php
        }

        if(isset($_SESSION['JogoAberto'])){

        ?>

        <script>

        $(document).ready(function(){
          swal({
              title: "Jogo aberto!",
              text: "Anteriormente deixou um jogo por acabar, deseja iniciar um novo jogo?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Sim!",
              cancelButtonText: "Não!",
              closeOnConfirm: false,
              closeOnCancel: false
          }, function(isConfirm){
              if (isConfirm) {
                  swal("Já não vai poder jogar o jogo aberto!", "Foi criado um novo jogo.", "success");
                  location.href = "router.php?route=jogo&action=eliminarAberto";
              } else {
                  swal("Vai continuar a jogar o jogo aberto", "O jogo anteriormente aberto vai continuar a ser jogado", "error");
                  location.href = "router.php?route=jogo&action=novo";
              }
          });
        });

        </script>
        <?php
        }
        ?>

    </body>
</html>
