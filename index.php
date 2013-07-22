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
      Nutrino
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/blue.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" />

    <!--[if lt IE 9]>
    <script src="js/html5shim.js"></script>
    <![endif]-->
    <?php
      $website->Preloader();
    ?>
  </head>
  
  <body>
    <?php
    if(isset($_SESSION['usuario'])){
      $website->HeaderSesion();
      $website->MensajeSesion();
    }
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
  <div class="container flex-main">
    <div class="row">
      
      <div class="span12">
        <?php 
          $website->Slider();
        ?>
      </div>
      <div class="span12">
        <div class="hero-unit">
          <a href="#" class="thumbnail alignleft" style="margin-top:-20px;">
            <img src="img/fotos/happy-customer.jpg" widh="200" height="150" alt="">
          </a>
        <!--
          <h1>
            Nutrino
          </h1>
        -->
          <img src="img/logo_hero.png" />
          <br/>
          <h4>
            <span class="bold">
              Nuestra aplicación web te ayudará a obtener una lista de los productos que debes comprar de acuerdo a tus gustos y necesidades.
            </span>
          </h4>
          <br/>
          <a class="btn btn-primary btn-large">
            Obtén tu compra
          </a>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
  <div class="promo">
    <div class="container">
      <div class="row">
        
        <?php
          $prolog = new Prolog("genericoprueba.pl", "listing(tipoalimento(X))");
          $recursos = new Recursos($website,$prolog);
          $recursos->MostrarProductos();
        ?>
    </div>
  </div>
  
  <?php
    $website->Footer();
  ?>
  <span class="totop">
    <a href="#">
      <i class="icon-chevron-up">
      </i>
    </a>
  </span>
  <script src="js/bootstrap.js"></script>
  <script src="js/filter.js"></script>
  <script src="js/jquery.tweet.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
  <script src="js/custom.js"></script>
<script> 
  !function ($) {
     $(function(){
  <?php
    if(isset($_SESSION['usuario']))
      $website->ScriptMensajeSesion();
  ?>
          $(".tweet").tweet({
          join_text: "auto",
          username: "briandiazme",
          avatar_size: 48,
          count: 5,
          loading_text: "cargando tweets..."
        });
    })
  }(window.jQuery)
  </script>
  </body>
</html>