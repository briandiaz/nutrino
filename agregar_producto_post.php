<?php
session_start();
require('includes/prolog.class.php');
if(isset($_SESSION['usuario']))
{
	if(isset($_POST['correo']))
	{
		$correo = strip_tags($_SESSION['correo']);
		$lista = $_POST['listaproductos'];
		$producto = $_POST['producto'];
		$pro = new Prolog("archivos/".$correo.".pl","recomendacion('".$correo."',L),agregarelemento('".$producto."',L,Res),write(Res)");
		$productos = $pro->Consulta();
		echo "<div class='span12 well'>";
		$data = "";
		//var_dump($productos);
		//echo json_encode($productos);
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