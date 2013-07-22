<?php
session_start();

require('includes/sesion.class.php');
if(!isset($_SESSION['usuario']))
{
	if(isset($_POST['tokenIniciarSesion']))
	{
		$correo = strip_tags($_POST['email']);
		$contrasena = strip_tags($_POST['contrasena']);
		$sesion = new Sesion($correo,$contrasena);
		if($sesion->Verificar() == "true")
		{
			$prolog = new Prolog("archivos/usuarios.pl","bienvenida('".$correo."')");
			$arg = $prolog->Consulta();
			$sesion_usuario = "";
			foreach ($arg as $key) {
				$sesion_usuario = $key;
			}
			$_SESSION['usuario'] = humanize($sesion_usuario);
			$_SESSION['correo'] = $correo;
			header("Location: index.php");
		}
		else
		{
			header("Location: index.php");
		}	
	}
}
else
{
	header("Location: index.php");
}
function humanize($str) {
 
	$str = trim(strtolower($str));
	$str = preg_replace('/[^a-z0-9\s+]/', '', $str);
	$str = preg_replace('/\s+/', ' ', $str);
	$str = explode(' ', $str);
 
	$str = array_map('ucwords', $str);
 
	return implode(' ', $str);
}
?>