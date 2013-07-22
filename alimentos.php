<?php
session_start();

require('includes/website.class.php');
require('includes/prolog.class.php');
$tipo = strip_tags($_GET['tipo']);
$website = new Website();
$pro = new Prolog("genericoprueba.pl","listing(alimento(".$tipo.",X))");
$foto = "img/alimentos/".strtolower($tipo).".png";
$productos = $pro->Consulta();
for($i = 0; $i < sizeof($productos);$i++) 
{
  $productos[$i] = str_replace("alimento($tipo, '", "", $productos[$i]);
  $productos[$i] = str_replace("').", "", $productos[$i]);
}
$titulo = $website->TituloProducto($tipo);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    
    <title>
      <?php echo $titulo; ?> - Nutrino
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
    <?php
      $website->Preloader();
    ?>
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

     

      <div class="span12">

        <ul class="breadcrumb">
          <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
          <li><a href="alimentos.php">Alimentos</a> <span class="divider">/</span></li>
          <li class="active"><a href="<?php echo $website->UrlActual(); ?>"><?php echo $titulo; ?></a></li>
        </ul>
        <h4 class="pull-left"><?php echo $titulo; ?></h4>


                                          
                                            <div class="controls pull-right">                               
                                                <select>
                                                <option>Sort By</option>
                                                <option>Name (A-Z)</option>
                                                <option>Name (Z-A></option>
                                                <option>Price (Low-High)</option>
                                                <option>Price (High-Low)</option>
                                                <option>Ratings</option>
                                                </select>  
                                            </div>

<div class="clearfix"></div>

        <div class="row">

          
          <?php
            foreach ($productos as $producto) {
              $website->Producto_Categoria($producto,$foto);
            }
            
          ?>

                  

        </div>


      </div>                                                                    



    </div>
  </div>
</div>

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

</body>
</html>