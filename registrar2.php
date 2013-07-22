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
			"cedula" => strip_tags($_POST['cedula']),
			"primer_nombre" => strip_tags($_POST['primer_nombre']),
			"segundo_nombre" => strip_tags($_POST['segundo_nombre']),
			"apellido" => strip_tags($_POST['apellido']),
			"sexo" => strip_tags($_POST['sexo']),
			"fecha_nacimiento" => strip_tags($_POST['fecha_nacimiento']),
			"peso" => strip_tags($_POST['peso']),
			"estatura" => strip_tags($_POST['estatura']),
			"miembros_familia" => strip_tags($_POST['miembros_familia']),
			"correo" => strip_tags($_POST['correo']);
		);
		$persona = new Persona($args_persona);
		var_dump($persona->Registrar());
		$prol = new Prolog("persona.pl","listing(persona)");
		$personas = $prol->Consulta();
		foreach ($personas as $persona) 
		{
			echo $persona."<br/>";
		}
	}
	else
	{
		echo "Error";
	}
}
?>