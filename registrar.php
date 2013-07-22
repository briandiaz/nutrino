<?php
session_start();
include('includes/persona.class.php');
if(isset($_SESSION['usuario']))
{
	header("Location: index.php");
}
else
{
	if(isset($_POST['tokenRegistrar']))
	{
		$args_persona = array(
			"primer_nombre" => strip_tags($_POST['primer_nombre']),
			"segundo_nombre" => strip_tags($_POST['segundo_nombre']),
			"apellido" => strip_tags($_POST['apellido']),
			"sexo" => strip_tags($_POST['sexo']),
			"fecha_nacimiento" => strip_tags($_POST['fecha_nacimiento']),
			"correo" => strip_tags($_POST['correo']),
      "contrasena" => strip_tags($_POST['contrasena']),
      "diabetico" => strip_tags($_POST['diabetico'])
		);
		$persona = new Persona($args_persona);
		$persona->Registrar();
    echo "<div clas='well'><h2>".$args_persona['primer_nombre']." ".$args_persona['segundo_nombre']." ha sido registrado correctamente</h2></div>";
		/*$prol = new Prolog("usuarios.pl","listing(persona)");
		$personas = $prol->Consulta();
		foreach ($personas as $persona) 
		{
			echo $persona."<br/>";
		}*/
	}
	else
	{
		echo "Error";
	}
}
?>