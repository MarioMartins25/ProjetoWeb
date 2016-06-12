<?php
global $APP_Router;
global $APP_ViewDisp;
global $APP_WebAsset;

$user_ativo = $APP_ViewDisp->dataComposer->getDataForView('user');
$palavras = $APP_ViewDisp->dataComposer->getDataForView('palavras');
$dicas = $APP_ViewDisp->dataComposer->getDataForView('dicas');
/*echo "<pre>";
echo var_dump($dicas);
echo "</pre>";
die();*/
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


        <link href="../public/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="../public/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
        <link href="../public/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../public/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="../public/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="../public/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />


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
                  <!-- ####################### CONTENT ###################### -->
                  <form class="form-horizontal" action="router.php?route=dashboard&action=dicasPalavras" method="post" role="form">
                        <div class="col-sm-12">
                        	<div class="card-box">
                        		<div class="col-md-6">
                                    <h4 class="m-t-0 header-title"><b>Adicionar Dicas às Palavras</b></h4>
                            		<p class="text-muted m-b-30 font-13">
                            			Adicionar uma nova dica à palavra selecionada.
                            		</p>
                              </div>

                        		<div class="row">
                        			<div class="col-md-12">
                                  <div class="form-group">
                                    <div class="col-md-12">
                                      <label class="col-md-2 control-label" for="dica">Palavra</label>
                                      <div class="col-md-10">
                                      <select name="palavra" id="l_palavra" onchange="mudar(this.value)" class="form-control select2">
                                        <?php
                                        foreach ($palavras as $palavra) {
                                          ?>
                                            <option value="<?= $palavra->id; ?>"><?= $palavra->nome; ?></option>
                                          <?php
                                        }
                                        ?>

                                      </select>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 form-group">
                                      <div class="col-md-5">
                                      <select id="optgroup" class="form-control" size="8" multiple="multiple">
                                        <?php foreach($dicas as $dica) {?>
                                          <option value="<?= $dica->id; ?>"><?= $dica->nome; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                      <div class="col-md-2">

                                      <button type="button" id="optgroup_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                      <button type="button" id="optgroup_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>

                                      </div>

                                      <div class="col-md-5">
                                      <select name="to[]" id="optgroup_to" class="form-control" size="8" multiple="multiple">

                                      </select>
                                      </div>
                                    </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <button type="reset" class="btn btn-danger waves-effect waves-light" value="submit">Limpar</button>
                                          <button type="submit" class="btn btn-facebook waves-effect waves-light" value="submit">Guardar</button>

                                      </div>
                                  </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    </form>
<!-- ############## CONTENT ############## -->
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

<script src="../public/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="../public/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

<script src="../public/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="../public/plugins/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="../public/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../public/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="../public/js/multiselect.js"></script>
<script type="text/javascript">
function mudar(val)
{

  $.ajax({
  type: 'post',
  url: 'router.php?route=dicas&action=palavra',
  data: {
    palavra:val
  },
  success: function (response) {
    document.getElementById('optgroup_to').innerHTML = response;
  }
});
}
jQuery(document).ready(function($) {
  mudar(document.getElementById("l_palavra").value);

    $("#optgroup").multiselect({
      search: {
          left: '<input type="text" name="q" class="form-control" placeholder="Procurar..." />',
          right: '<input type="text" name="q" class="form-control" placeholder="Procurar..." />',
      }
    });


});
</script>
<script>

jQuery('#datepicker-autoclose').datepicker({
autoclose: true,
todayHighlight: true
});

</script>

<script type="text/javascript">
jQuery(document).ready(function($) {

  $(".select2").select2();

  	    $(".select2-limiting").select2({
  	      maximumSelectionLength: 1
  	    });

        $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='procurar dicas existentes...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='procurar dicas a aplicar...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

$('.counter').counterUp({
    delay: 100,
    time: 1200
});

$(".knob").knob();

});
</script>
<?php

if(isset($_SESSION['sucesso'])){
unset($_SESSION['sucesso']);
?>

<script src="../public/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script src="../public/pages/jquery.sweet-alert.init.js"></script>


<script>

$(document).ready(function(){
    sweetAlert(
      'As dicas foram inseridas',
      'Inseriu com sucesso as dicas à palavra selecionada!',
      'success'
    )
});
</script>
<?php
}

if(isset($_SESSION["erro"])){

$msg = "";

switch($_SESSION["erro"]){

case 1:
$msg = "'A palavra já possui uma das dicas selecionadas',
'Uma ou mais dicas que tentou adicionar à palavra, já se encontram adicionadas, utilize outras por favor!',
'error'";
break;
default:
$msg = "'Erro desconhecido',
'Ocorreu um erro atualmente desconhecido, volte a tentar mais tarde, por favor!',
'error'";
break;
}
unset($_SESSION['erro']);
?>

<script src="../public/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script src="../public/pages/jquery.sweet-alert.init.js"></script>


<script>

$(document).ready(function(){
sweetAlert(
  <?php echo $msg; ?>
)
});
</script>
<?php
}
?>
<!--@yield('script')-->


</body>
</html>
