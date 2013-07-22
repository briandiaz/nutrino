<?php
session_start();
if(isset($_SESSION['correo']))
{
	if(isset($_POST['productos'])&&isset($_POST['cantidades']))
	{
		$productos = $_POST['productos'];
		$cantidades = $_POST['cantidades'];
		
		$correousuario = $_SESSION['correo'];
		$archivousuario = "archivos/".$correousuario.".pl";
		$enter = file_get_contents($archivousuario);
		$enter .= PHP_EOL.PHP_EOL;
		file_put_contents($archivousuario, $enter);	
		for($i = 0; $i < sizeof($productos);$i++){
			$predicado = "ultimacompra('".$correousuario."','".$productos[$i]."',".$cantidades[$i].").";
			$datos = file_get_contents($archivousuario);
			$datos .= $predicado.PHP_EOL;
			file_put_contents($archivousuario, $datos);
		}
		echo "Ultima Compra para este tipo de alimento ha sido registrada satisfactoriamente";
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