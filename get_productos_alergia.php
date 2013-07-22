<?php
session_start();
require('includes/prolog.class.php');
if(isset($_SESSION['usuario']))
{
	if(isset($_POST['id']))
	{
		$tipoalimento = strip_tags($_POST['id']);
		$pro = new Prolog("archivos/productos.pl","listing(alimento(".$tipoalimento.",X))");
		$productos = $pro->Consulta();
		echo "<div class='span10 well'>";
		for($i = 0; $i < sizeof($productos);$i++) 
		{
			if(!empty($productos[$i]))
			{
				$productos[$i] = str_replace("alimento($tipoalimento, '", "", $productos[$i]);
				$productos[$i] = str_replace("').", "", $productos[$i]);
				echo "<div class='span3'><label class='checkbox'><input type='checkbox' value='$productos[$i]' id='esalergico[]' name='esalergico[]'>$productos[$i]</label></div>";		
			}
		  
		}
		echo "</div>";
		
	}
	else
	{
		echo "Error -_-'";
	}
	
}
else
{
	echo "<div style='margin: 0 auto;text-align:center' class='well'><h1>Error -.-</h1><h3>No estas logueado.</h3></div>";
}
?>