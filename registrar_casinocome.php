<?php
session_start();
if(isset($_SESSION['correo']))
{
	if(isset($_POST['tokenCasiNoCome']))
	{
		$strarr = implode("#", $_POST['productos']);
		$productos = explode("#", $strarr);
		$tipo = $_POST['tipo'];
		$correousuario = $_SESSION['correo'];
		$archivousuario = "archivos/".$correousuario.".pl";
		$enter = file_get_contents($archivousuario);
		$enter .= PHP_EOL.PHP_EOL;
		file_put_contents($archivousuario, $enter);	
		foreach ($productos as $producto) {
			$correousuario = $_SESSION['correo'];
			$predicado = $tipo."casinocome('".$correousuario."','".$producto."').";
			$archivousuario = "archivos/".$correousuario.".pl";
			$datos = file_get_contents($archivousuario);
			$datos .= $predicado.PHP_EOL;
			file_put_contents($archivousuario, $datos);	
		}
		echo "<div class='alert alert-success'>
			  <strong>Muy Bien!</strong> Productos que <strong>casi no comes</strong> han sido registradas correctamente
			</div>";
	}
	else
	{
		echo "Error -_-";
	}
}
	else
	{
		echo "Error -_- sesion :(";
	}
?>