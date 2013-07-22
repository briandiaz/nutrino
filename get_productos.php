<?php
session_start();
require('includes/prolog.class.php');
if(isset($_SESSION['usuario']))
{
	if(isset($_POST['id']))
	{
		$tipoalimento = strip_tags($_POST['id']);
		$pro = new Prolog("genericoprueba.pl","listing(alimento(".$tipoalimento.",X))");
		$productos = $pro->Consulta();
		echo "<div class='span12 well'>";
		for($i = 0; $i < sizeof($productos);$i++) 
		{
			if(!empty($productos[$i]))
			{
				$productos[$i] = str_replace("alimento($tipoalimento, '", "", $productos[$i]);
				$productos[$i] = str_replace("').", "", $productos[$i]);
				echo "<div class='span3'><label class='checkbox'><input type='checkbox' value='$productos[$i]' id='productos[]' name='productos[]'>$productos[$i]</label><input type='number' step='1' min='1' id='cantidad[]' name='cantidad[]' placeholder='Cantidad' /></div>";		
			}
		  
		}
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