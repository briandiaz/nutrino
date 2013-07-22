<?php
session_start();

require('includes/website.class.php');
require('includes/prolog.class.php');
require('includes/recursos.class.php');
$website = new Website();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    
    <title>
      Registra tu última compra - Nutrino
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/sidebar-nav.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/blue.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shim.js"></script>
    <![endif]-->
  
  
    <link rel="shortcut icon" href="img/favicon/favicon.png">
  </head>
  
  <body>
    <?php
    if(isset($_SESSION['usuario']))
      $website->HeaderSesion();
    else
      $website->Header();
    ?>

  <div id="cart" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="cartmodal" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
      </button>
      <h4>
        Lista de Compra
      </h4>
    </div>
    <div class="modal-body">
      
      <table class="table table-striped tcart">
        <thead>
          <tr>
            <th>Name</th>
            <th> Quantity </th>
            <th> Price </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="producto.html"> HTC One </a></td>
            <td> 2 </td>
            <td> $250 </td>
          </tr>
          <tr>
            <td><a href="producto.html"> Apple iPhone </a></td>
            <td> 1 </td>
            <td> $502 </td>
          </tr>
          <tr>
            <td><a href="producto.html"> Galaxy Note </a></td>
            <td> 4 </td>
            <td> $1303 </td>
          </tr>
          <tr>
            <th></th><th> Total </th><th> $2405 </th>
          </tr>
          </tbody>
        </table>
      
    </div>
    <div class="modal-footer">
      <a href="index.html" class="btn">
        Continuar
      </a>
      <a href="checkout.html" class="btn btn-danger">
        Procesar
      </a>
    </div>
  </div>
  <?php
    $website->IniciarSesionModal();
    $website->RegistrarseModal();
    $website->Menu();
  ?>

<div class="items">
  <div class="container">
    <div class="row">

      

      <div class="span9">

        <ul class="breadcrumb">
          <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
          <li><a href="alimentos.php">Alimentos</a> <span class="divider">/</span></li>
          <li class="active"><a href="<?php echo $website->UrlActual(); ?>">Compra</a></li>
        </ul>
        <h4 class="pull-left"></h4>


<div class="clearfix"></div>
<div class="container hero-unit">
        <div class="row">
          <?php
            $prolog = new Prolog("genericoprueba.pl", "listing(tipoalimento(X))");
            $recursos = new Recursos($website,$prolog);
            $tipoalimentos = $recursos->MostrarTipos();
            sort($tipoalimentos);
          ?>
          <form method="POST" id="gorm" name="gorm" enctype="application/x-www-form-urlencoded" action="#">
          <div class="span12">

          <div class="control-group">
            <label class="control-label" for="tipoalimento">
              Tipo de Alimento
            </label>
            <div class="controls">
              <select class="span6" id="tipoalimento" name="tipoalimento" required>
                <option value="" >Selecciona el tipo de alimento</option>
                <?php
                  foreach ($tipoalimentos as $tipo) {
                    if(!empty($tipo))
                      echo '<option value="'.$tipo.'" >'.$website->Humanize($tipo).'</option>';
                  }
                ?>
              </select> 
              <input type="hidden" id="tokenCompra" value="<?php echo time(); ?>" />
            </div>
          </div>
                    
          </div>
          <div class="span12">
            <div id="tablaproductos">
            </div>
          </div>
          <div class="span12">
            <div id="ultimacompra">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" id="guardarcompra" class="btn btn-primary">Guardar Compra</button>
            <button type="button" id="cancelarcompra" class="btn">Cancelar</button>
          </div>
          </form>

        </div>
</div>

      </div>                                                                    



    </div>
  </div>
</div>
      <hr class="featurette-divider">

<?php
  $website->Footer();
?>
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.js"></script> 
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/filter.js"></script> 
<script src="js/jquery.tweet.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/nav.js"></script> 
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script> 
<script src="js/custom.js"></script> 
<script>
  !function ($) {
     $(function(){
            $("button#guardarcompra").attr("disabled","disabled");
            $("select#tipoalimento").change(function(){
              $("#tablaproductos").html("<h2 style'color:blue'>Obteniendo informacion desde prolog...</h2>");
              var id = $("select#tipoalimento option:selected").attr('value');
              $.post("get_productos.php", {id:id}, function(data){
                  $("button#guardarcompra").removeAttr("disabled");
                  $("#tablaproductos").css("display","block");
                  $("#tablaproductos").html(data);
              });
            });
            $("#gorm").submit(function(){
              var cantidades = [];
              var productos = [];
              $("input[name='productos[]']:checked").each(function(i){
                productos[i] = $(this).val();
                cantidades[i] = $(this).parent().next().val();
                console.log($(this).val());
                console.log($(this).parent().next().val());
              });
              $.post("registrar_primera_compra.php", {cantidades:cantidades,productos:productos}, function(data){
                  $("#ultimacompra").html(data);
                  $("#tablaproductos").css("display","none");
                  $("#guardarcompra").attr("disabled","disabled");
              });
              return false;
            });
        })
        }(window.jQuery)
  </script>
</body>
</html>