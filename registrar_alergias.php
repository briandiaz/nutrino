<?php
session_start();
if(isset($_SESSION['correo']))
{
	if(isset($_POST['tokenAlergias']))
	{
		$strarr = implode("#", $_POST['alergias']);
		$alergias = explode("#", $strarr);
		/*$alergias = array(0 => '', 1 => '');
		$alergias = $_POST('alergias');*/
		$correousuario = $_SESSION['correo'];
		$archivousuario = "archivos/".$correousuario.".pl";
		foreach ($alergias as $alergia) {
			$predicado = "esalergico('".$correousuario."','".$alergia."').";
			$datos = file_get_contents($archivousuario);
			$datos .= $predicado.PHP_EOL;
			file_put_contents($archivousuario, $datos);	
		}
		echo "<div class='alert alert-success'>
			  <strong>Muy Bien!</strong> Alergias registradas correctamente
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