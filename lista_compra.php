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
      Tu lista de compras inteligente - Nutrino
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
<div class="container">
        <div class="row">
          <?php
            $prolog = new Prolog("genericoprueba.pl", "listing(tipoalimento(X))");
            $recursos = new Recursos($website,$prolog);
            $tipoalimentos = $recursos->MostrarTipos();
            sort($tipoalimentos);
          ?>
          <form method="POST"  id="compraForm" name="compraForm">
          <div class="span12">
            <input type="text" id="correo" name="correo" value="<?php echo $_SESSION['correo']; ?>" />
            <input type="hidden" id="tokenCompra" name="tokenCompra" value="<?php echo time(); ?>" />
                    
          </div>
          <div class="form-actions">
            <button id="recibir" class="btn btn-primary">Ver Lista</button>
            <button type="button" id="cancelarcompra" class="btn">Cancelar</button>
          </div>
          <div class="span12">
            <div id="listaProductos">
            </div>
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

            $('#compraForm').submit(function(){
              var tokenCompra = $("#tokenCompra").val();
              var correo = $("#correo").val();
              $.post("resultados_compra.php", {tokenCompra:tokenCompra,correo:correo}, function(data){
                  $("#listaProductos").html(data);
              });
              return false;
            });
        })
        }(window.jQuery)
  </script>
</body>
</html>