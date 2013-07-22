<?php
session_start();
require('includes/prolog.class.php');
if(isset($_SESSION['usuario']))
{
	if(isset($_POST['correo']))
	{
		$correousuario = $_SESSION['correo'];
		$archivousuario = "archivos/".$correousuario.".pl";
		$recomendacionContains = file_get_contents("archivos/recomendacion.pl");
		$datosrecomendacionUsuario = file_get_contents($archivousuario);
		if(!(strpos($datosrecomendacionUsuario,$recomendacionContains) !== false)){
			$enter = file_get_contents($archivousuario);
			$enter .= file_get_contents("archivos/recomendacion.pl");
			file_put_contents($archivousuario, $enter);				
		}
		$correo = strip_tags($_SESSION['correo']);
		$pro = new Prolog("archivos/".$correo.".pl","recomendacion('".$correo."',L),write(L)");
		$productos = $pro->Consulta();
		echo "<div class='span12 well'>";
		$data = "";
		echo "<table class='table table-bordered table-hover'>".PHP_EOL;
		echo "<thead><tr><th>Producto</th><th>Cantidad</th></thead><tbody>";
		foreach ($productos as $producto) {
			$prods = split("[]],[[]",$producto);
			foreach ($prods as $key) {
				$dat = str_replace("]", "", $key);
				$det = str_replace("[", "", $dat);
				$res = str_replace(",", "</td><td>", $det);
				echo '<tr><td>'.$res."</td></tr>";
			}
		}
		echo "</tbody></table>";
		echo "</div>";
		
	}
	else
	{
		echo "error";
	}
	
}
else
{
	header("Location: index.php");
}
?>