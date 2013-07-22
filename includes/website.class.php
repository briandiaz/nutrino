<?php
class Website
{
	public function __construct()
	{

	}
  public function UrlActual()
  {
     $url = "http://";
     if ($_SERVER["SERVER_PORT"] != "80") 
     {
        $url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } 
     else 
     {
        $url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
     }
     return $url;
  }
  public function TituloProducto($tipo)
  {
    $titulo = $this->Humanize($tipo);
    switch($titulo)
    {
      case "Bebidasalcoholicas":
        $titulo = "Bebidas Alcohólicas";
        break;
      case "Bebidassinalcohol":
        $titulo = "Bebidas Sin Alcohol";
        break;
    }
    return $titulo;
  }
  public function MostrarCategorias($argumentos,$bg)
  {
    echo '
        <div class="span4">
          <div class="pbox '.$bg.'">
            <div class="pcol-left">
              <a href="'.$argumentos['url'].'">
                <img class="thumbnail" style="background:white;" src="'.$argumentos['foto'].'" alt="" />
              </a>
            </div>
            <div class="pcol-right">
              <p class="pmed">
                <a href="'.$argumentos['url'].'">
                  '.$argumentos['nombre'].'
                </a>
              </p>
              <p class="psmall">
                <a href="'.$argumentos['url'].'">
                  Aprovecha nuestros especiales en los productos de esta categoría.
                </a>
              </p>
            </div>
            <div cass="clearfix">
            </div>
          </div>
        </div>';
  }
  public function MensajeSesion()
  {
    echo '<div id="mensajesesion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Bienvenido '.$_SESSION['usuario'].'</h3>
  </div>
  <div class="modal-body">
    <p>Para poder realizar un <strong>proceso exitoso</strong> y puedas obtener tu <i>compra inteligente</i> <strong>debes guiarte</strong> de los siguientes pasos:</p>
    <ul>
      <li>Debes dirigirte al área de <strong><a href="alergias.php" alt="_self">Alergias</a></strong> para registrar los alimentos a los que eres alérgico</li>
      <li>Luego registra los alimentos que consumes ocasionalmente y que casi no comes en el área de <strong><a href="consumo.php" alt="_self">Consumo</a></strong></li>
      <li>Al cumplir el paso anterior debes registrar los productos y la cantidad de la útima compra que hiciste en el área de <strong><a href="elegir.php" alt="_self">Compras</a></strong></li>
      <li>Y para finalizar sólo debes dirigirte a la <strong><a href="lista_compra.php" alt="_self">lista de tus productos</a></strong> y aceptar para mostrar tu compra.</li>
    </ul>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button>
  </div>
</div>
';
  }
  public function ScriptMensajeSesion()
  {
    echo '
          $(\'#mensajesesion\').modal();
';
  }
  public function Preloader()
  {
    echo '<link type="text/css" rel="stylesheet" href="css/queryLoader.css" />
    <script src="js/jquery.js"></script>
    <script src="js/preloader.script.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="img/favicon/favicon.png">
<div id="preloader">

  <div id="status"><h1 style="font:24px \'Segoe Ui\', sans-serif;">Cargando</h1><img src="img/ajax-loader.gif" style="margin-left:20px;"/></div>
</div>
    ';
  }
	public function Menu()
	{
		echo '
		<div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
        </a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li>
              <a href="index.php">
                <i class="icon-home"></i></a>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Mi cuenta 
                <b class="caret">
                </b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="lista_compra.php">
                    Lista de Productos
                  </a>
                </li>
                <li>
                  <a href="consumo.php">
                    Consumo
                  </a>
                </li>
                <li>
                  <a href="alergias.php">
                    Ingresa tus Alergias
                  </a>
                </li>
                <li>
                  <a href="elegir.php">
                    Ingresa tu primera Compra
                  </a>
                </li>
                <li>
                  <a href="agregar_producto.php">
                    Agregar Producto a Lista
                  </a>
                </li>
                <li>
                  <a href="eliminar_producto.php">
                    Eliminar Producto de Lista
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Alimentos 
                <b class="caret">
                </b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="alimentos.php?tipo=aceites">
                    Aceites
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=azucares">
                    Azúcares
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=alcohol">
                    Bebidas Alcohólicas
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=sinalcohol">
                    Bebidas Sin Alcohol
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=carnesblancas">
                    Carnes Blancas
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=carnesrojas">
                    Carnes Rojas
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=cereales">
                    Cereales
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=condimentos">
                    Condimentos
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=frutas">
                    Frutas
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=huevos">
                    Huevos
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=lacteos">
                    Lácteos
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=legumbres">
                    Legumbres
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=mariscos">
                    Mariscos
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=pescado">
                    Pescado
                  </a>
                </li>
                <li>
                  <a href="alimentos.php?tipo=verduras">
                    Verduras
                  </a>
                </li>
                </ul>
                </li>
                <li>
                  <a href="contacto">
                    Contacto
                  </a>
                </li>
              </ul>
            </div>
        </div>
      </div>
  </div>
		';
	}
	public function Sidebar()
	{
		return "";
	}
  public function Humanize($str) {
   
    $str = trim(strtolower($str));
    $str = preg_replace('/[^a-z0-9\s+]/', '', $str);
    $str = preg_replace('/\s+/', ' ', $str);
    $str = explode(' ', $str);
   
    $str = array_map('ucwords', $str);
   
    return implode(' ', $str);
  }
	public function Slider()
	{
		echo '<div class="flex-image flexslider">
          
          <ul class="slides">
            
            
            
            <li>
              
              <img src="img/fotos/supermarket.jpg" width="936px" height="526px" />
              
              <div class="flex-caption">
                
                <h3>
                  Aprovecha nuestros 
                  <span class="color">
                    Especiales!
                  </span>
                </h3>
                
                <p>
                  Nuestra aplicación web te ayudará a obtener una lista de los productos que debes comprar de acuerdo a tus gustos y necesidades. 
                </p>
                <div class="button">
                  <a href="producto.html">
                    Obtén tu compra
                  </a>
                </div>
              </div>
            </li>
            
            
            <li>
              <img src="img/fotos/supermarket2.jpg" width="936px" height="526px" />
              <div class="flex-caption">
                
                <h3>
                  Las carnes y embutidos 
                  <span class="color">
                    más baratos
                  </span>
                </h3>
                
                <p>
                  Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. 
                </p>
                <div class="button">
                  <a href="producto.html">
                    Obtén tu compra
                  </a>
                </div>
              </div>
              
            </li>
            
            <li>
              <img src="img/fotos/supermarket3.jpg" width="936px" height="526px" />
              <div class="flex-caption">
                
                <h3>
                  Productos selectos 
                  <span class="color">
                    En oferta!
                  </span>
                </h3>
                
                <p>
                  Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. 
                </p>
                <div class="button">
                  <a href="producto.html">
                    Obtén tu compra
                  </a>
                </div>
              </div>
              
            </li>
            
            <li>
              <img src="img/fotos/supermarket4.jpg" width="936px" height="526px" />
              <div class="flex-caption">
                
                <h3>
                  Hacemos el 
                  <span class="color">
                    mejor pan!
                  </span>
                </h3>
                
                <p>
                  Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. 
                </p>
                <div class="button">
                  <a href="producto.html">
                    Obtén tu compra
                  </a>
                </div>
              </div>
              
            </li>
            
            <li>
              <img src="img/fotos/boqueria-market.jpg" width="936px" height="526px" />
              <div class="flex-caption">
                
                <h3>
                  Las frutas 
                  <span class="color">
                    más frescas
                  </span>
                </h3>
                
                <p>
                  Ut commodo ullamcorper risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. 
                </p>
                <div class="button">
                  <a href="producto.html">
                    Obtén tu compra
                  </a>
                </div>
              </div>
              
            </li>
            
          </ul>
        </div>';
	}
	public function Header()
	{
		echo '<header>
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="logo">
              <a href="index.php"><img src="img/logo_2.png" /></a>
              <p class="meta">
                <h4><span class="bold">Tu compra inteligente</span></h4>
              </p>
            </div>
          </div>
          
          <div class="span5 offset3">
            
            
            <form class="form-search">
              <div class="input-append">
                <input class="span3" id="appendedInputButton" type="text" placeholder="Busca tu producto">
                <button class="btn" type="button">
                  Buscar
                </button>
              </div>
            </form>
            
            <div class="hlinks">
                            
            <span class="lr">
              <a href="#login" role="button" data-toggle="modal">
                Inicia Sesión
              </a>
              o 
              <a href="registrarse.php">
                Regístrate
              </a>
            </span>
          </div>
          
        </div>
        
      </div>
    </div>
  </header>';
	}


  public function HeaderSesion()
  {
    echo '<header>
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="logo">
              <a href="index.php"><img src="img/logo_2.png" /></a>
              <p class="meta">
                <h4><span class="bold">Tu compra inteligente</span></h4>
              </p>
            </div>
          </div>
          
          <div class="span5 offset3">
            
            
            <form class="form-search">
              <div class="input-append">
                <input class="span3" id="appendedInputButton" type="text" placeholder="Busca tu producto">
                <button class="btn" type="button">
                  Buscar
                </button>
              </div>
            </form>
            
            <div class="hlinks">
              <span>
                
                <span class="bold">
                  Hola '.$_SESSION['usuario'].'
                </span>
                               
                
              </span>
              
              
              
            <span class="lr">
              <a href="cerrar.php" role="button">
                Cerrar Sesión
              </a>
            </span>
          </div>
          
        </div>
        
      </div>
    </div>
  </header>';
  }

	public function RegistrarseModal()
	{
    //persona(40212345569,'jose','ismael','reyes','M','04/06/1989',210,5.8,3).
		echo '
<div id="register" class="modal hide fade" style="width:60%;margin-left: -30%;" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
      </button>
      <h4>
        Registrarse
      </h4>
    </div>
    <div class="modal-body">
      <div class="form">
        
        <form class="form-horizontal" action="registrar.php" method="POST">
          <div class="control-group">
            <label class="control-label" for="primer_nombre">
              Primer Nombre
            </label>
            <div class="controls">
              <input type="text" class="span9" id="primer_nombre" name="primer_nombre" placeholder="Ingresa tu Primer Nombre" required />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="segundo_nombre">
              Segundo Nombre
            </label>
            <div class="controls">
              <input type="text" class="span9" id="segundo_nombre" name="segundo_nombre" placeholder="Ingresa tu Segundo Nombre" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="apellido">
              Apellido
            </label>
            <div class="controls">
              <input type="text" class="span9" id="apellido" name="apellido" placeholder="Ingresa tu Primer Apellido" required/>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="sexo">
              Sexo
            </label>
            <div class="controls">
              <select class="span9" id="sexo" name="sexo" required>
                <option value="">Seleccione su Sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="fecha_nacimiento">
              Fecha de Nacimiento
            </label>
            <div class="controls">
              <input type="date" class="span9" id="fecha_nacimiento" name="fecha_nacimiento" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="peso">
              Peso
            </label>
            <div class="controls">
              <input type="number" class="span9" id="peso" name="peso"  min="0" max="1000" placeholder="Ingresa tu Peso en Libras" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="estatura">
              Estatura
            </label>
            <div class="controls">
              <input type="number" class="span9" id="estatura" name="estatura" step="any" min="0" max="100" placeholder="Ingresa tu Estatura en Pies" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="miembros_familia">
              Miembros Familia
            </label>
            <div class="controls">
              <input type="number" class="span9" id="miembros_familia" name="miembros_familia" min="0" max="1000" placeholder="Ingresa la Cantidad de Miembros en tu Familia" step="any" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="cedula">
              Cédula o Documento de Identidad
            </label>
            <div class="controls">
              <input type="number" class="span9" id="cedula" name="cedula" placeholder="Ingresa tu Cédula o Documento de Identidad" step="any" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="correo">
              Correo
            </label>
            <div class="controls">
              <input type="email" class="span9" id="correo" name="correo" placeholder="Ingresa tu Correo Electrónico" required/>
            </div>
          </div>
          
          
          <div class="control-group">
            <div class="controls">
              <label class="checkbox inline">
                <input type="checkbox" id="inlineCheckbox1" value="agree">
                Acepto los términos
              </label>
            </div>
          </div>
          
          <input type="hidden" value="'.time().'" id="tokenRegistrar" name="tokenRegistrar" />
          
          <div class="form-actions">
            
            <button type="submit" class="btn">
              Registrar
            </button>
            <button type="reset" class="btn">
              Reiniciar
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <p>
        ¿Ya tienes una cuenta?
        <a href="login.html">
          Inicia Sesión
        </a>
        aquí.
      </p>
    </div>
  </div>
		';
	}
	public function IniciarSesionModal()
	{
		echo '
<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
      </button>
      <h4>
        Iniciar Sesión
      </h4>
    </div>
    <div class="modal-body">
      
      <div class="form">
        
        
        <form class="form-horizontal" action="iniciarsesion.php" method="POST">
          
          
          <div class="control-group">
            <label class="control-label" for="email">
              Usuario
            </label>
            <div class="controls">
              <input type="text" class="input-large" id="email" name="email" />
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="contrasena">
              Contraseña
            </label>
            <div class="controls">
              <input type="password" class="input-large" id="contrasena" name="contrasena" />
            </div>
          </div>
          
          <div class="control-group">
            <div class="controls">
              <label class="checkbox inline">
                <input type="checkbox" id="inlineCheckbox1" value="agree">
                Recordar Contraseña
              </label>
            </div>
          </div>
          <input type="hidden" value="'.time().'" id="tokenIniciarSesion" name="tokenIniciarSesion" />
          
          
          <div class="form-actions">
            
            <button type="submit" class="btn">
              Iniciar Sesión
            </button>
            <button type="reset" class="btn">
              Reiniciar
            </button>
          </div>
        </form>
      </div>
      
      
    </div>
    <div class="modal-footer">
      <p>
        ¿No tienes una cuenta?
        <a href="register.html">
          Regístrate
        </a>
        aquí.
      </p>
    </div>
  </div>
		';
	}
  public function Footer()
  {
    echo '
    <footer>
    <div class="container">
      <div class="row">
        <div class="span12">
          
          <div class="row">
            
            <div class="span4">
              <div class="widget">
                <h5>
                  Contact
                </h5>
                <hr />
                <div class="social">
                  <a href="https://facebook.com/briandiazme">
                    <i class="icon-facebook facebook">
                    </i>
                  </a>
                  <a href="https://twitter.com/briandiazme">
                    <i class="icon-twitter twitter">
                    </i>
                  </a>
                  <a href="#">
                    <i class="icon-linkedin linkedin">
                    </i>
                  </a>
                  <a href="https://plus.google.com/u/0/101849039786176392346">
                    <i class="icon-google-plus google-plus">
                    </i>
                  </a>
                  
                </div>
                <hr />
                <i class="icon-home">
                </i>
                &nbsp; PUCMM, Santiago, República Dominicana
                <hr />
                <i class="icon-envelope-alt">
                </i>
                &nbsp; 
                <a href="mailto:brian@briandiaz.me">
                  brian@briandiaz.me
                </a>
                <hr />
                <i class="icon-envelope-alt">
                </i>
                &nbsp; 
                <a href="mailto:jreyes283@gmail.com">
                  jreyes283@gmail.com
                </a>
                <hr />
                
                <div class="payment-icons">
                  <img src="img/payment/americanexpress.gif" alt="" />
                  <img src="img/payment/visa.gif" alt="" />
                  <img src="img/payment/mastercard.gif" alt="" />
                  <img src="img/payment/discover.gif" alt="" />
                  <img src="img/payment/paypal.gif" alt="" />
                </div>
              </div>
            </div>
            
            <div class="span4">
              <div class="widget">
                <h5>
                  Ultimos Tweets
                </h5>
                <hr />
                <div class="tweet">
                </div>
              </div>
            </div>
            
            <div class="span4">
              <div class="widget">
                <h5>
                  Enlaces
                </h5>
                <hr />
                <div class="two-col">
                  <div class="col-left">
                    <ul>
                      <li>
                        <a href="#">
                          Condimentum
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Etiam at
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Fusce vel
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Vivamus
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Pellentesque
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Vivamus
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-right">
                    <ul>
                      <li>
                        <a href="#">
                          Condimentum
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Etiam at
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Fusce vel
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Vivamus
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Pellentesque
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          Vivamus
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="clearfix">
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
          <hr />
          
          <p class="copy">
            Copyright &copy; 2012 | 
            <a href="#">
              Your Site
            </a>
            - 
            <a href="#">
              Home
            </a>
            | 
            <a href="#">
              About Us
            </a>
            | 
            <a href="#">
              Service
            </a>
            | 
            <a href="#">
              Contact Us
            </a>
          </p>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>
  </footer>
    ';
  }
  public function ProductoFooter()
  {
    echo '
    <div class="recent-posts">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h4 class="title">
            Recent Items
          </h4>
          <div class="carousel_nav pull-right">
            <a class="prev" id="car_prev" href="#">
              <i class="icon-chevron-left">
              </i>
            </a>
            <a class="next" id="car_next" href="#">
              <i class="icon-chevron-right">
              </i>
            </a>
          </div>
          <div class="clearfix">
          </div>
          <ul class="rps-carousel">
            
            <li>
              <div class="rp-item">
                
                
                <div class="rp-image">
                  
                  <a href="producto.html">
                    <img src="img/photos/2.png" alt=""/>
                  </a>
                </div>
                <div class="rp-details">
                  
                  <h5>
                    <a href="producto.html">
                      HTC One V 
                      <span class="price pull-right">
                        $225
                      </span>
                    </a>
                  </h5>
                  <div class="clearfix">
                  </div>
                  <p>
                    Travel far away to a space station.
                  </p>
                  
                </div>
                
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    ';
  }
  public function Producto_Categoria($titulo,$foto)
  {
    echo '<div class="span3">
            <div class="item">
              <div class="item-image">
                <a href="#"><img src="'.$foto.'" alt="" /></a>
              </div>
              <div class="item-details">
                
                <h5><a href="#">'.$titulo.'</a><span class="ico"></span></h5>
                
                <p>Consume este excelente producto.</p>
                <hr />
                
                <div class="item-price pull-left"></div>
                
                <div class="button pull-right"><a href="#">Añadir a Compras</a></div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>';
  }
  public function ProductoCarousel($titulo,$foto)
  {
    echo '<li>
                <div class="rp-item"> 
                  
                  <div class="rp-image">        
                    <a href="single-item.html"><img src="'.$foto.'" alt=""/></a>
                  </div>
                  <div class="rp-details">
                    
                    <h5><a href="single-item.html">'.$titulo.'</a></h5>
                    <div class="clearfix"></div>
                    <p>Un producto que usted necesita.</p>         
                  </div>                
                </div>        
            </li>';
  }
}
?>