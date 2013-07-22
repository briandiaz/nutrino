<?php
require ('prolog.class.php');
require('includes/archivos.class.php');

class Persona
{
	protected $args;
	public function __construct($args)
	{
		$this->args = $args;
		$this->args = array_map('strtolower', $this->args);
		$this->args['sexo'] = strtoupper($this->args['sexo']);
	}
	public function Argumentos()
	{
		$argumentos = "assertz(persona('".$this->args['primer_nombre']."', '".$this->args['segundo_nombre']."', '".$this->args['apellido']."', '";
		$argumentos .= $this->args['sexo']."', '".$this->args['fecha_nacimiento']."', ";
		$argumentos .= "'".$this->args['correo']."','".$this->args['contrasena']."'))";
		return $argumentos;
	}
	public function ArgumentoArchivo()
	{
		$argumentos = "persona('".$this->args['primer_nombre']."', '".$this->args['segundo_nombre']."', '".$this->args['apellido']."', '";
		$argumentos .= $this->args['sexo']."', '".$this->args['fecha_nacimiento']."', ";
		$argumentos .= "'".$this->args['correo']."','".$this->args['contrasena']."').";
		return $argumentos;
	}
	public function Registrar()
	{
		$archivo = "C:\\xampp\\htdocs\\nutrino\\archivos\\productos.pl";
		$archivousuario = "C:\\xampp\\htdocs\\nutrino\\archivos\\".$this->args['correo'].".pl";
		//$_SESSION['archivo'] = $this->args['correo'];
		$datos = file_get_contents($archivo);
		$datos .= $this->ArgumentoArchivo().PHP_EOL;
		file_put_contents($archivousuario, $datos);
		$data = $datos;
		if($this->args['diabetico']=="si")
		{
			$data = file_get_contents($archivousuario);
			$data .= "esdiabetico('".$this->args['correo']."').";
			file_put_contents($archivousuario, $data);
		}
		else
		{
			$data = file_get_contents($archivousuario);
			$data .= "esdiabetico('').";
			file_put_contents($archivousuario, $data);
		}

		// crear usuarios para el logueo
		$archivousuario = "C:\\xampp\\htdocs\\nutrino\\archivos\\usuarios.pl";
		$datos = $this->ArgumentoArchivo().PHP_EOL.file_get_contents($archivousuario);
		file_put_contents($archivousuario, $datos);
		/*$prolog = new Prolog("genericoprueba.pl",$this->Argumentos());
		$res = $prolog->Consulta();
		$archivos = new Archivos($this->args);
		$archivos->Crear();
		return $res;*/
	}
}
?>