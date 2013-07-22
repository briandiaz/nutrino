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
      Registrate
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

      

      <div class="span12">

        <ul class="breadcrumb">
          <li><a href="index.php">Inicio</a> <span class="divider">/</span></li>
          <li><a href="alimentos.php">Alimentos</a> <span class="divider">/</span></li>
          <li class="active"><a href="<?php echo $website->UrlActual(); ?>">Registrarse</a></li>
        </ul>
      </div>
        <h4 class="pull-left"></h4>
        <div class="span12" style="min-height:300px;">
          <h2>Regístrate</h2>
        <div class="form" id="datos">
              <form class="form-horizontal" id="registroUsuarioForm" name="registroUsuarioForm"  method="post" >
              <div class="control-group">
                <label class="control-label">
                  Primer Nombre
                </label>
                <div class="controls">
                  <input type="text" class="span9" id="primer_nombre" placeholder="Ingresa tu Primer Nombre" value=""  required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">
                  Segundo Nombre
                </label>
                <div class="controls">
                  <input type="text" class="span9" id="segundo_nombre" placeholder="Ingresa tu Segundo Nombre" value="" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">
                  Apellido
                </label>
                <div class="controls">
                  <input type="text" class="span9" id="apellido" placeholder="Ingresa tu Primer Apellido" value="" required/>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">
                  Sexo
                </label>
                <div class="controls">
                  <select class="span9" id="sexo" required>
                    <option value="">Seleccione su Sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">
                  Fecha de Nacimiento
                </label>
                <div class="controls">
                  <input type="date" class="span9" id="fecha_nacimiento"  required/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">
                  Correo
                </label>
                <div class="controls">
                  <input type="email" class="span9" id="correo" placeholder="Ingresa tu Correo Electrónico" required/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">
                  Contraseña
                </label>
                <div class="controls">
                  <input type="password" class="span9" id="contrasena" placeholder="Ingresa tu Contraseña" required/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">
                  ¿Es diabético?
                </label>
                <div class="controls">
                  <label class="radio inline">
                      <input type="radio" id="diabetico" name="diab" value="Si" />Si
                  </label>
                  <label class="radio inline">
                      <input type="radio" id="diabetico" name="diab" value="No" checked/>No
                  </label>
                </div>
              </div>
              
              <input type="hidden" value="<?php echo time(); ?>" id="tokenRegistrar" />
              
              <div class="form-actions">
                
                <button class="btn" id="registrarUsuario">
                  Registrar
                </button>
                <button type="reset" class="btn">
                  Reiniciar
                </button>
              </div>
              </form>
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
              $.post("get_productos_alergia.php", {id:id}, function(data){
                  $("button#guardarcompra").removeAttr("disabled");
                  $("#tablaproductos").html(data);
              });
            });
            var primer_nombre = $("input#primer_nombre").attr('value');
            segundo_nombre = $("input#segundo_nombre").attr('value'),
            apellido = $("input#apellido").attr('value'),
            correo = $("input#correo").attr('value'),
            sexo = $("select#sexo option:selected").attr('value'),
            fecha_nacimiento = $("input#fecha_nacimiento").attr('value'),
            contrasena = $("input#contrasena").attr('value'),
            tokenRegistrar = $("input#tokenRegistrar").attr('value'),
            diabetico = $("input#diabetico").attr('value');

            $("input#primer_nombre").change(function(){
                primer_nombre = $(this).val();
            });
            $("input#segundo_nombre").change(function(){
                segundo_nombre = $(this).val();
            });
            $("input#apellido").change(function(){
                apellido = $(this).val();
            });
            $("input#correo").change(function(){
                correo = $(this).val();
            });
            $("select#sexo").change(function(){
                sexo = $(this).val();
            });
            $("input#fecha_nacimiento").change(function(){
                fecha_nacimiento = $(this).val();
            });
            $("input#contrasena").change(function(){
                contrasena = $(this).val();
            });
            $("input[name='diab']").change(function(){
              diabetico = document.querySelector('input[name="diab"]:checked').value;
            });


            $('#registroUsuarioForm').submit(function(){
              $.post("registrar.php", {tokenRegistrar:tokenRegistrar,primer_nombre:primer_nombre,segundo_nombre:segundo_nombre,
                apellido:apellido,correo:correo,sexo:sexo,
                fecha_nacimiento:fecha_nacimiento,contrasena:contrasena,diabetico:diabetico}, 
                function(data){
                  $("#datos").html(data);
              });
              return false;
            });
        })
        }(window.jQuery)
  </script>
</body>
</html>